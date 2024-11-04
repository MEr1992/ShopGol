<?php

namespace Database\Seeders\Person;

use Illuminate\Database\Seeder;
use Models\Person\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
                "title_en"=>"sadmin",
                "title_fa"=>"مدیر ارشد",
            ],
            [
                "title_en"=>"admin",
                "title_fa"=>"مدیر",
            ],
        ];
        foreach($items as $item)
        {
            Role::create($item);
        }
    }
}
