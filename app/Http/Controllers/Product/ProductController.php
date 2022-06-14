<?php

namespace App\Http\Controllers\Product;

use App\Models\DynamoProduct;
use App\Models\Product;
use Aws\Athena\AthenaClient;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class ProductController
{

    public function elasticsearch(Request $request)
    {
        $q = $request->input('q');

        $products = Product::search($q)
            ->paginate(15);

        return view('elasticsearch', compact('products', 'q'));
    }

    public function athena(Request $request)
    {
        $q = $request->input('q');

        $products = [];

        $client = new AthenaClient([
            'version'     => 'latest',
            'region'      => env('ATHENA_REGION'),
            'credentials' => [
                'key'    => env('ATHENA_KEY'),
                'secret' => env('ATHENA_SECRET'),
            ],
        ]);

        $query = \DB::table('product');

        if (!empty($q)) {
            $query->whereRaw("product_name LIKE '%" . $q . "%'");
        }

        $query = str_replace('`', '', $query->take(15)->toSql());

        $resultSet = $client->startQueryExecution([
            'QueryExecutionContext' => [
                'Database' => 'product-database',
            ],
            'QueryString'           => $query,
            'ResultConfiguration'   => [
                'OutputLocation' => 's3://decade/',
            ],
        ]);

        $executionId = $resultSet->get('QueryExecutionId');

        $query_success = false;
        $query_status  = '';

        while (!$query_success) {
            $status = $client->getQueryExecution([
                'QueryExecutionId' => $executionId,
            ]);

            $query_status = $status->get('QueryExecution')['Status']['State'];

            if (in_array($query_status, ['FAILED', 'SUCCEEDED'])) {
                $query_success = true;
            }
        }

        if ($query_status !== 'SUCCEEDED') {
            return view('athena', compact('products', 'q'));
        }

        $nextPage  = true;
        $nextToken = '';

        while ($nextPage) {
            $args = [
                'QueryExecutionId' => $executionId,
            ];

            if (!empty($nextToken)) {
                $args['NextToken'] = $nextToken;
            }

            $result = $client->getQueryResults($args);

            $resultSet = $result->get('ResultSet');

            $nextToken = $result->get('NextToken');

            if (empty($nextToken)) {
                $nextPage = false;
            }

            foreach ($resultSet as $type => $result) {
                if ($type !== 'Rows') {
                    continue;
                }

                foreach ($result as $index => $row) {
                    if (!$index) {
                        continue;
                    }

                    $columns = $row['Data'];
                    $temp    = [];

                    foreach ($columns as $i => $column) {
                        $temp[] = $column['VarCharValue'] ?? '';
                    }

                    $products[] = $temp;
                }
            }
        }

        return view('athena', compact('products', 'q'));
    }

    public function rds(Request $request)
    {
        $q = $request->input('q');

        $products = Product::query();

        if(!empty($q)) {
            $products->where('product_name', 'LIKE', '%' . $q . '%');
        }

        $products = $products->paginate();

        return view('rds', compact('products', 'q'));
    }

    public function dynamodb(Request $request)
    {
        $productId = $request->input('product_id');
        $products  = [];

        if(!empty($productId)) {
            $products = \DB::connection('dynamodb')
                ->table('Product')
                ->keyCondition('product_id', '=', $productId)
                ->keyCondition('timestamp', '<=', Carbon::now()->timestamp)
                ->query()['Items'];
        }

        return view('dynamo', compact('productId', 'products'));
    }

    public function s3(Request $request)
    {
        $files = Storage::disk('s3')->allFiles();

        return view('s3', compact('files'));
    }

}
