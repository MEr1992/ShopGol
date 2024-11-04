<?php

namespace Database\Seeders\Person;

use Illuminate\Database\Seeder;
use Models\Person\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ["firstname"=>"سانگار", "lastname"=>"مدیر ارشد", "role_id"=>"1", "mobile"=>"09191964745", "password"=>bcrypt("09191964745"), "status_id"=>"1", "lang"=>"fa", "photo"=>"1.jpg",],
            ["firstname"=>"گل پخش", "lastname"=>"مدیریت", "role_id"=>"2", "mobile"=>"09191532091", "password"=>bcrypt("09191532091"), "status_id"=>"1", "lang"=>"fa", "photo"=>"1.jpg",],
        ];
        foreach($items as $item)
        {
            User::create($item);
        }
    }
}
