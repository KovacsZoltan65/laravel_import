<?php

namespace Database\Seeders;

use App\Models\FrontUser;
use DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\LazyCollection;
use function public_path;

class FrontUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Query logolás letiltása
        DB::disableQueryLog();

        LazyCollection::make(function () {
            $handle = fopen(public_path('frontuser.csv'), 'r');

            while( ($line = fgetcsv($handle,4096)) !== false ) {
                $dataString = implode(';', $line);
                $row = explode(',', $dataString);
                yield $row;
            }

            fclose($handle);
        })->skip(1)
        ->chunk(1000)
        ->each(function(LazyCollection $chunk) {
            $records = $chunk->map(function($row){
                return [
                         'org_id' => $row[1],
                           'name' => $row[2],
                        'website' => $row[3],
                        'country' => $row[4],
                    'description' => $row[5],
                        'founded' => $row[6],
                       'industry' => $row[7],
                       'employee' => $row[8],
                ];
            })->toArray();

            //DB::table('frontuser')->insert($records);
            FrontUser::create($records);
        });
    }
}
