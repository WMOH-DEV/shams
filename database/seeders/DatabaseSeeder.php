<?php

namespace Database\Seeders;

use App\Models\admin\City;
use App\Models\admin\Role;
use App\Models\admin\Setting;
use App\Models\admin\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'عضو',]);
        Role::create(['name' => 'تاجر',]);
        Role::create(['name' => 'أدمن',]);

      //  City::factory()->count(30)->create();
        $this->call(CitySeeder::class);

        $user = User::create([
            'name' => 'وائل محمد',
            'email' => 'wmoh.mail+shams@gmail.com',
            'password' => \Hash::make('waelshams'),
            'phone' => '12345678',
            'email_verified_at' => now(),
            'role_id' => '3',
            'city_id' => '3',
        ]);

//        $user = User::create([
//            'name' => 'Marslia',
//            'email' => 'admin@marslia.com',
//            'password' => \Hash::make('marslia'),
//            'phone' => '12345678',
//            'email_verified_at' => now(),
//            'role_id' => '3',
//            'city_id' => '3',
//        ]);


        User::factory()->count(100)->create();

        Setting::create([
            'site_name' => 'شمس',
        ]);

    }
}
