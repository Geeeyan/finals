<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MusicSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('music')->insert([
            ['title' => 'Anong Oras Na',        'artist' => 'Blaster',       'album' => 'Last Fool Show', 'duration' => '05:39', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Who Knows',             'artist' => 'Daniel Caesar', 'album' => 'Son of Spergy',  'duration' => '03:46', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Karma',                 'artist' => 'IV of Spades',  'album' => 'Andalucia',      'duration' => '04:06', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Lumang Kanta',          'artist' => 'Zild',          'album' => 'Medisina',       'duration' => '03:50', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Mundo',                 'artist' => 'IV Of Spades',  'album' => 'Single',         'duration' => '05:49', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Dilim',                 'artist' => 'Zild',          'album' => 'Superpower',     'duration' => '04:31', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Ibang Planeta',         'artist' => 'Zild',          'album' => 'Single',         'duration' => '04:17', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Slow Dancing In The Dark', 'artist' => 'Joji',       'album' => 'Ballads 1',      'duration' => '03:31', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Konsensya',             'artist' => 'IV Of Spades',  'album' => 'Andalucia',      'duration' => '03:33', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Kalapastangan',         'artist' => 'Fitterkarma',   'album' => 'Single',         'duration' => '04:36', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Glimpse of Us',         'artist' => 'Joji',          'album' => 'SMITHEREENS',    'duration' => '03:53', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Aswang Sa Maynila',     'artist' => 'Fitterkarma',   'album' => 'Single',         'duration' => '02:43', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Pwede Ka Ba',           'artist' => 'Frank Ely',     'album' => 'Single',         'duration' => '03:19', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Dulo Ng Hangganan',     'artist' => 'IV Of Spades',  'album' => 'CLAPCLAP!',      'duration' => '05:28', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
