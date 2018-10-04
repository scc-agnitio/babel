<?php

use App\Platform;
use function foo\func;
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
        $platforms = collect([
            'Engager iOS',
            'Engager UWP',
            'SPA',
            'Remote',
            'Microsites',
            'ShareDoc',
            'Builder',
        ]);

        $platforms->each(function ($platform) {
            Platform::create([
                'name' => $platform,
                'key' => mb_strtolower(str_slug($platform, '_'))
            ]);
        });
    }
}
