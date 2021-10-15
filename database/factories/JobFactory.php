<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Company;
use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;

class JobFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Job::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = FakerFactory::create('nl_NL');
        return [
            'function' => $faker->jobTitle(),
            'description' => $faker->text(),
            'company_id' => Company::factory(),
            'city_id' => City::factory()
        ];
    }
}
