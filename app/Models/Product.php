<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Searchable, HasFactory;

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function searchableFields()
    {
        return $this->toArray();
    }
}
