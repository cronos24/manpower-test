<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $table = 'products';

    use HasFactory;
    protected $fillable = [
        'categories_id', 'users_id', 'name', 'quantity'
    ];    
}