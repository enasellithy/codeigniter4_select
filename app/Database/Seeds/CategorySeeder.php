<?php

namespace App\Database\Seeds;

use App\Models\Category;
use CodeIgniter\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $mainCategory = new Category;
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            $mainCategory->save(
                [
                    'name' => $faker->name,
                ]
            );
            $subCategory = new Category;
            $subCategory->save([
                'name' => 'Sub Category 0' . $i++,
                'parent_id' => 1,
                'model_name' => Category::class,
            ]);
            $sup2 = new Category;
            $sup2->save([
                'name' => 'Child For Sub Category 0' . $i++,
                'parent_id' => 1,
                'model_name' => Category::class,
            ]);

            $subCategory = new Category;
            $subCategory->save([
                'name' => 'Sub Category 2' . $i++,
                'parent_id' => 2,
                'model_name' => Category::class,
            ]);
            $sup2 = new Category;
            $sup2->save([
                'name' => 'Child For Sub Category 2' . $i++,
                'parent_id' => 4,
                'model_name' => Category::class,
            ]);

        }
    }
}
