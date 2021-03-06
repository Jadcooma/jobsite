<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $sectors = array('IT', 'Sales', 'Chemie', 'Retail');

        return [
            'name' => $this->faker->company() .' '. $this->faker->companySuffix(),
            'sector' => $sectors[array_rand($sectors)]
        ];
    }
}