<?php

use Illuminate\Database\Seeder;

class CarouselImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\CarouselImage::class, 5)->create();
    }
}
