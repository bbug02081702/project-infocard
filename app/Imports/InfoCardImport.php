<?php

namespace App\Imports;

use App\Models\InfoCard;
use Maatwebsite\Excel\Concerns\ToModel;


class InfoCardImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new InfoCard([
            'NameCard' => $row[1],
            'PhotoCard' => $row[2],
            'WalletCard' => $row[3],
            'QrcodeCard' => $row[4],
            'AddressCard' => $row[5],
            'created_at' => $row[6],
            'updated_at' => $row[7]
        ]);
    }
}
