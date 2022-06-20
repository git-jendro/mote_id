<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->id = Uuid::uuid4()->toString();
        $user->first_name = "Admin";
        $user->last_name = "Mote";
        $user->username = "it_mote_id";
        $user->password = Hash::make('123123');
        $user->save();
    }
}
