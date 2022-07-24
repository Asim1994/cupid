<?php
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Seeder;
use App\User;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   public function run()
    {
        User::create([
            'first_name' => 'Mr.',
            'last_name' => 'Admin',
            'email' => 'admin@email.com',
            'password'=>\Illuminate\Support\Facades\Hash::make('12345678'),
            'dob' => '1994-07-01',
            'gender' => 'Male',
            'annual_income' => '2000',
            'occupation' => 'Private_job',
            'family_type' => 'Joint_family',
            'manglik' => 'No',
            'role' => 1,
        ]);
       $faker = Faker::create();
       for ($i=0; $i < 30; $i++) { 
	    	User::create([
	            'first_name' => $faker->randomElement(['Mr', 'Miss']),
	            'last_name' =>  $faker->name(),
	            'email' => Str::random(5).'@email.com',
	            'password'=>\Illuminate\Support\Facades\Hash::make('12345678'),
	            'dob' => $faker->dateTimeBetween($startDate = '-360 month',$endDate = '-120 month'),
	            'gender' => $faker->randomElement(['Male', 'Female']),
	            'annual_income' => rand(10, 20000),
	            'occupation' => $faker->randomElement(['Private_job', 'Government_Job','Business']),
	            'family_type' => $faker->randomElement(['Joint_family', 'Nuclear_family']),
	            'manglik' => $faker->randomElement(['Yes', 'No']),
	            'role' => 2,
	        ]);
    	}
    }
}
 