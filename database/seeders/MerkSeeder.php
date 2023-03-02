<?php

namespace Database\Seeders;

use App\Models\Merk;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MerkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('merks')->delete();
        Merk::create(['nm_merk' => 'Eiger']);
        Merk::create(['nm_merk' => 'Arei']);
        Merk::create(['nm_merk' => 'Consigna']);
        Merk::create(['nm_merk' => 'Deuter']);
        Merk::create(['nm_merk' => 'SevenSummit']);
        Merk::create(['nm_merk' => 'Avtech']);
        Merk::create(['nm_merk' => 'Cartenz']);
    }
}
