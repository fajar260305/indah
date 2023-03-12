<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Paket;
use App\Models\Diskon;
use App\Models\Transaksi;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();

        Paket::create([
            'nama_paket' => 'express',
            'batas_waktu' => '3',
            'harga' => 12000,
        ]);
        Paket::create([
            'nama_paket' => 'reguler',
            'batas_waktu' => '2',
            'harga' => 8000,
        ]);
        Paket::create([
            'nama_paket' => 'normal',
            'batas_waktu' => '6',
            'harga' => 6000,
        ]);

        // Diskon::create([
        //     'nama_diskon' => 'hemat',
        //     'total_diskon' => 2500,
        // ]);
        // Diskon::create([
        //     'nama_diskon' => 'jumbo',
        //     'total_diskon' => 4000,
        // ]);

        Transaksi::create([
            'paket_id' => 1,
            'user_id' => 1,
            'diskon' => 2000,
            'kode_invoice' => 'fl001',
            'nama_pelanggan' => 'fajarusshodik',
            'tgl_masuk' => date('Y-m-d', strtotime(23-02-2023)),
            'tgl_keluar' => date('Y-m-d', strtotime(23-02-2023)),
            'qty' => 2,
            'status' => 'baru',
            'total_harga' => 10000,
        ]);

        


    }
}
