<?php

/**
 * php artisan db:seed --class=CreateFromUserSeeder
 */

namespace Database\Seeders;

use App\Models\FrontUser;
use Illuminate\Database\Seeder;

class CreateFromUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tábla kiürítése
        \DB::table('frontuser')->truncate();
        
        // Nyitó üzenet kiírása
        $this->command->warn(PHP_EOL . 'Creating FrontUser...');
        
        // Létrehozandó rekordok száma
        $count = 1000;
        
        // Progress indítása
        $this->command->getOutput()->progressStart($count);
        
        // Rekordok létrehozása
        for( $i = 0; $i < $count; $i++ ) {
            //Book::factory(1)->create();
            FrontUser::factory(1)->create();
            
            // Progressbar frissítése
            $this->command->getOutput()->progressAdvance();
        }
        
        // Progressbar lezárása
        $this->command->getOutput()->progressFinish();
        
        // Záró üzenet kiírása
        $this->command->info(PHP_EOL . 'FrontUser created');
    }
}
