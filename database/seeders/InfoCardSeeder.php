<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InfoCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('info_cards')->insert([
            'NameCard' => 'TestNameCard',
            'WalletCard' => 'Test eieiei',
            'QrcodeCard' => 'Test Qrcode Card',
            'AddressCard' => 'Test Address Card',
        ]);
    }
}
