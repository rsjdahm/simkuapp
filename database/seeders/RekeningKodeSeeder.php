<?php

namespace Database\Seeders;

use App\Models\Parameter\Global\RekAkun;
use App\Models\Parameter\Global\RekJenis;
use App\Models\Parameter\Global\RekKelompok;
use App\Models\Parameter\Global\RekObjek;
use App\Models\Parameter\Global\RekRincObjek;
use App\Models\Parameter\Global\RekSubRincObjek;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RekeningKodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (RekAkun::all() as $rek) {
            RekAkun::where('id', $rek->id)->update([
                'kode' => $rek->kd_rek1
            ]);
        }

        foreach (RekKelompok::all() as $rek) {
            RekKelompok::where('id', $rek->id)->update([
                'kode' => $rek->kd_rek1 . '.' . $rek->kd_rek2
            ]);
        }

        foreach (RekJenis::all() as $rek) {
            RekJenis::where('id', $rek->id)->update([
                'kode' => $rek->kd_rek1 . '.' . $rek->kd_rek2 . '.' . str_pad($rek->kd_rek3, 2, '0', STR_PAD_LEFT)
            ]);
        }

        foreach (RekObjek::all() as $rek) {
            RekObjek::where('id', $rek->id)->update([
                'kode' => $rek->kd_rek1 . '.' . $rek->kd_rek2 . '.' . str_pad($rek->kd_rek3, 2, '0', STR_PAD_LEFT) . '.' . str_pad($rek->kd_rek4, 2, '0', STR_PAD_LEFT)
            ]);
        }

        foreach (RekRincObjek::all() as $rek) {
            RekRincObjek::where('id', $rek->id)->update([
                'kode' => $rek->kd_rek1 . '.' . $rek->kd_rek2 . '.' . str_pad($rek->kd_rek3, 2, '0', STR_PAD_LEFT) . '.' . str_pad($rek->kd_rek4, 2, '0', STR_PAD_LEFT) . '.' . str_pad($rek->kd_rek5, 2, '0', STR_PAD_LEFT)
            ]);
        }

        foreach (RekSubRincObjek::all() as $rek) {
            RekSubRincObjek::where('id', $rek->id)->update([
                'kode' => $rek->kd_rek1 . '.' . $rek->kd_rek2 . '.' . str_pad($rek->kd_rek3, 2, '0', STR_PAD_LEFT) . '.' . str_pad($rek->kd_rek4, 2, '0', STR_PAD_LEFT) . '.' . str_pad($rek->kd_rek5, 2, '0', STR_PAD_LEFT) . '.' . str_pad($rek->kd_rek6, 4, '0', STR_PAD_LEFT)
            ]);
        }
    }
}
