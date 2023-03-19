<?php

namespace Database\Seeders;

use App\Models\Listing;
use App\Models\User;
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
//         \App\Models\User::factory(5)->create();
          $user = User::factory()->create();
         Listing::factory(6)->create([
             'user_id'=>$user->id
         ]);

//         Listing::create([
//             'title'=>'Listing One',
//             'tags'=> 'Laravel, Javascript',
//             'company'=> 'Acme Corp',
//             'location'=> 'Boston, MA',
//             'email'=> 'email.1@gmail.com',
//             'website'=> 'https://www.acme.com',
//             'description'=>'To use MySQL,
//                 make sure you install it,
//                 setup a database and then add
//                 your db credentials(database,
//                 username and password) to the
//                 .env.example file and rename it to .env'
//         ]);
//        Listing::create([
//            'title'=>'Listing Two',
//            'tags'=> 'Laravel, Javascript',
//            'company'=> 'Acme2 Corp',
//            'location'=> 'Washington, MA',
//            'email'=> 'email.2@gmail.com',
//            'website'=> 'https://www.acme2.com',
//            'description'=>'To use MySQL,
//                 make sure you install it,
//                 setup a database and then add
//                 your db credentials(database,
//                 username and password) to the
//                 .env.example file and rename it to .env'
//        ]);
    }
}
