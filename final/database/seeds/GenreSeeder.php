<?php

use App\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = [
            'Shooter',
            'Fighting',
            'Puzzle',
            'Roleplaying',
            'Simulation',
            'Strategy',
            'Sports',
            'Platformer',
            'Stealth',
            'Virtual Reality',
        ];

        foreach ($genres as $genre) {
            Genre::create([
                'name' => $genre,
            ]);
        }
    }
}
