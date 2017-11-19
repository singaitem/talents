<?php

use Illuminate\Database\Seeder;
use App\Position;
class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $benefit = new Position();
        $benefit->name='Benefit Supervisor';
        $benefit->save();

        $benefit = new Position();
        $benefit->name='Benefit Approval';
        $benefit->save();

        $it = new Position();
        $it->name='IT Developer';
        $it->save();

        $manager = new Position();
        $manager->name='Manager';
        $manager->save();
    }
}
