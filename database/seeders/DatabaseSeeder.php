<?php

namespace Database\Seeders;

use App\Models\Participation;
use App\Models\Team;
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
<<<<<<< HEAD

=======
        Participation::factory()->count(50)->create();


//        $this->call([
////            TeamSeeder::class
//        ]);
>>>>>>> master
    }
}
