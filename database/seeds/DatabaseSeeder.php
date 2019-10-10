<?php

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
        $this->call(HotelTableSeeder::class);
        $this->call(RoomTableSeeder::class);
        $this->call(ReservationTableSeeder::class);

    }
}
