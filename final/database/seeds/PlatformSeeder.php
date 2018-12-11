<?php

use App\Platform;
use Illuminate\Database\Seeder;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $platforms = [
            'Windows' => 'fab fa-windows',
            'Mac OS X' => 'fab fa-apple',
            'Linux' => 'fab fa-linux',
            'Steam OS' => 'fab fa-steam'
        ];

        foreach ($platforms as $platform => $icon) {
            Platform::create([
                'name' => $platform,
                'icon' => $icon
            ]);
        }
    }
}
