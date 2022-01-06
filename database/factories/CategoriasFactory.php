<?php

namespace Database\Factories;

use App\Models\Categorias;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoriasFactory extends Factory
{
    protected $model = Categorias::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [         
            'name' => Str::random(20)         
        ];
    }
}
