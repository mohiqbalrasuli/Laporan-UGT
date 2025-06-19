<?php

namespace App\Exports;

use App\Models\LaporanGT;
use App\Models\LaporanGTModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class LaporanGTExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return LaporanGTModel::with(['gt.user', 'gt.madrasah', 'gt.pjgt.user'])->get()->map(function ($laporan) {
            return [
                'id' => $laporan->id,
                'gt_id' => $laporan->gt_id,
                'user_id' => $laporan->gt->user->name ?? null,
                'madrasah_id' => $laporan->gt->madrasah->nama ?? null,
                'pjgt_id' => $laporan->gt->pjgt->user->name ?? null,
                'tanggal' => $laporan->tanggal,
                'keterangan' => $laporan->keterangan,
            ];
        });
    }
}
