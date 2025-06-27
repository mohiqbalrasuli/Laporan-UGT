<?php

namespace Database\Seeders;

use App\Models\AksesFormModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AksesFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AksesFormModel::create([
            'tanggal_mulai_pjgt' => '2023-01-01',
            'tanggal_akhir_pjgt' => '2023-12-31',
            'tanggal_mulai_gt' => '2023-01-01',
            'tanggal_akhir_gt' => '2023-12-31'
        ]);
    }
}
