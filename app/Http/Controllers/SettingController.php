<?php

namespace App\Http\Controllers;

use App\Models\AksesFormModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function setting()
    {
        $aksesForm = AksesFormModel::first();
        return view('admin.setting.setting',compact('aksesForm'));
    }

    public function simpanTanggalPJGT(Request $request, $id)
    {
        $aksesFormpjgt = AksesFormModel::findOrFail($id);
        $data=[
            'tanggal_mulai_pjgt' => $request->tanggal_mulai_pjgt,
            'tanggal_akhir_pjgt' => $request->tanggal_akhir_pjgt
        ];
        $aksesFormpjgt->update($data);
        return back()->with('success', 'Tanggal PJGT disimpan!');
    }

    public function simpanTanggalGT(Request $request, $id)
    {
        $aksesFormgt = AksesFormModel::findOrFail($id);
        $data=[
            'tanggal_mulai_gt' => $request->tanggal_mulai_gt,
            'tanggal_akhir_gt' => $request->tanggal_akhir_gt
        ];
        $aksesFormgt->update($data);
        return back()->with('success', 'Tanggal GT disimpan!');
    }
}
