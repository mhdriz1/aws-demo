<?php

namespace App\Console\Commands;

use Aws\Firehose\FirehoseClient;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Elastic\Elasticsearch\ClientBuilder;

class SeedProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $xmlString = file_get_contents(storage_path() . "/app/xml/rss1.xml");
        $xmlObject = simplexml_load_string($xmlString, 'SimpleXMLElement', LIBXML_NOCDATA);

        $json = json_encode($xmlObject);
        $array = json_decode($json, true);

        $products = $array['Product'];

        $bar = $this->output->createProgressBar(count($products));

        $maxBatch = 500;

        $batch = [];

        foreach($products as $product) {

            $data = [
                'product_id' => $this->clean($product['ProductID']),
                'product_name' => $this->clean($product['Name']),
                'product_desc' => $this->clean($product['Description']),
                'product_url' => $this->clean($product['ProductURL']),
                'product_price' => $this->clean($product['Price']),
                'product_image' => $this->clean($product['Image']),
                'product_category' => $this->clean($product['Category']),
                'currency' => $this->clean($product['Currency']),
                'seller_name' => $this->clean($product['SellerName']),
                'timestamp'   => Carbon::now()->timestamp
            ];

            $client = ClientBuilder::create()
                ->setHosts([
                    env('ELASTICSEARCH_URL', 'https://vpc-product-kb7mvtklxncsx3n4nycqzbeqfe.ap-southeast-1.es.amazonaws.com/')
                ])
                ->build();
            $response = $client->info();

            echo $response['version']['number'];

//            $batch[] = [
//                'Data' => \json_encode($data) . PHP_EOL
//            ];
//
//            if(count($batch) >= $maxBatch) {
//                $this->stream($batch);
//
//                $batch = [];
//            }

            $bar->advance();
        }

        $bar->finish();

        return 0;
    }

    public function stream($batch) {
        $firehose = new FirehoseClient([
            'version'     => 'latest',
            'region'      => env('KINESIS_REGION'),
            'credentials' => [
                'key'    => env('KINESIS_KEY'),
                'secret' => env('KINESIS_SECRET'),
            ],
        ]);

        $firehose->putRecordBatch([
            'DeliveryStreamName' => env('KINESIS_DELIVERY_STREAM_NAME'),
            'Records'            => $batch,
        ]);
    }

    public function clean($data) {
        return is_array($data) || empty($data) ? '' : $data;
    }
}
