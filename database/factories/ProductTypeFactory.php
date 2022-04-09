<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Аккумуляторы',
            'description' => 'Автомобильный аккумулятор является важным элементом электрооборудования - наряду с генератором выступает источником тока.'
        ];
    }
}
