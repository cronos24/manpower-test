<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    protected $table = 'categories';

    use HasFactory;
    protected $fillable = [
        'name'
    ];    

    public function productos()
    {
        return $this->hasMany(Productos::class);
    }
}