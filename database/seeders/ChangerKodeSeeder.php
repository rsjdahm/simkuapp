<?php

namespace Database\Seeders;

use App\Models\Parameter\Global\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChangerKodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Unit::all() as $item) {
            Unit::where('id', $item->id)
                ->update([
                    'kode' => $item->kd_urusan . '-' . str_pad($item->kd_bidang, 2, '0', STR_PAD_LEFT) . '.' . '0-00' . '.' . '0-00' . '.' . str_pad($item->kd_unit, 2, '0', STR_PAD_LEFT)
                ]);
        }
    }
}
