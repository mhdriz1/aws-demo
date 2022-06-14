<?php

namespace App\Models;

use Kitar\Dynamodb\Model\Model;

class DynamoProduct extends Model
{
    public $connection = 'dynamodb';

    protected $table = 'Product';
    protected $primaryKey = 'product_id';
    protected $sortKey = 'timestamp';
}
