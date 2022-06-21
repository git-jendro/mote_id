<?php

use App\Size;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = new Size();
        $data->id = Uuid::uuid4()->toString();
        $data->name = '-';
        $data->save();
    }
}
