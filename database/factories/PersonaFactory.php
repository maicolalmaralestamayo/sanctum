<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PersonaFactory extends Factory
{
    public function definition()
    {
        return [
            'carne'=> $this->faker->regexify('[0-9]{11}'),
            'nombre_apellidos'=>  Str::upper($this->faker->firstName().' '.$this->faker->lastName())
        ];
    }
}
