<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomTable extends Model
{
    use HasFactory;

    protected $table = 'custom_table_11';

    protected $fillable = [
        'field1',
        'field2',
        'description',
    ];
}
