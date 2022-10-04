<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Faker\Generator as FakerG;
use DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Category');
        
        for($i = 0; $i < 10; $i++){
            self::insertItems($faker);
        }
    }

    private function insertItems(FakerG $faker){
        DB::table('category')->insert([
            'title' => $faker->catchPhrase(),
            'slug' => $faker->unique()->regexify('[A-Z]{4}'),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
