<?php

use App\Color;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = new Color;
        $data->id = Uuid::uuid4()->toString();
        $data->name = '-';
        $data->save();
    }
}
