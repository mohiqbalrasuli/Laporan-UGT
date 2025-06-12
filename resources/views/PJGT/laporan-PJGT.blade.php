@extends('PJGT.layout.template_PJGT')

@section('title', 'Data Laporan PJGT')

@section('content')
    @foreach ($laporan_pjgt as $laporan)
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-12">
                    <div class="bg-light rounded h-100 p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="mb-4">Data Laporan PJGT</h6>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Laporan Ke</th>
                                    <th> : </th>
                                    <td>{{ $laporan->laporan_ke }}</td>
                                </tr>
                                <tr>
                                    <th>No. Induk PJGT</th>
                                    <th> : </th>
                                    <td>{{ $laporan->pjgt->no_induk }}</td>
                                </tr>
                                <tr>
                                    <th>Nama PJGT</th>
                                    <th> : </th>
                                    <td>{{ $laporan->pjgt->user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat Rumah</th>
                                    <th> : </th>
                                    <td>{{ $laporan->pjgt->alamat }}</td>
                                </tr>
                                <tr>
                                    <th>Nama Madrasah</th>
                                    <th> : </th>
                                    <td>{{ $laporan->pjgt->madrasah->nama_madrasah ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat Madrasah</th>
                                    <th> : </th>
                                    <td>{{ $laporan->pjgt->madrasah->alamat_madrasah ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Nama Kepala Madrasah</th>
                                    <th> : </th>
                                    <td>{{ $laporan->pjgt->madrasah->nama_kepala_madrasah ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Laporan Bulan</th>
                                    <th> : </th>
                                    <td>{{ $laporan->laporan_bulan }}</td>
                                </tr>
                                <tr>
                                    <th>Tahun</th>
                                    <th> : </th>
                                    <td>{{ $laporan->tahun }}</td>
                                </tr>
                                <tr>
                                    <th>Nama Guru Tugas</th>
                                    <th> : </th>
                                    <td>{{ $laporan->pjgt->gt->user->name ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat Guru Tugas</th>
                                    <th> : </th>
                                    <td>{{ $laporan->pjgt->gt->alamat ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>GT Menjadi Wali Kelas</th>
                                    <th> : </th>
                                    <td>Kelas {{ $laporan->wali_kelas }}</td>
                                </tr>
                                <tr>
                                    <th>Tingkat</th>
                                    <th> : </th>
                                    <td>{{ implode(', ', $laporan->tingkat) }}</td>
                                </tr>
                                <tr>
                                    <th>GT Menjadi Guru Fak Kelas</th>
                                    <th> : </th>
                                    <td>{{ implode(', ', $laporan->guru_fak_kelas) }}</td>
                                </tr>
                                <tr>
                                    <th>GT Menjadi Guru</th>
                                    <th> : </th>
                                    <td>{{ implode(', ', $laporan->menjadi_guru) }}</td>
                                </tr>
                                <tr>
                                    <th>GT Masuk Madrasah/Sekolah</th>
                                    <th> : </th>
                                    <td>{{ $laporan->gt_masuk_madrasah }}</td>
                                </tr>
                                <tr>
                                    <th>GT Mengajar Murid Balighah</th>
                                    <th> : </th>
                                    <td>{{ $laporan->murid_balighah }}</td>
                                </tr>
                                <tr>
                                    <th>Jenis kegiatan</th>
                                    <th> : </th>
                                    <td>{{ $laporan->jenis_kegiatan }}</td>
                                </tr>
                                <tr>
                                    <th>Dilaksanakan Diwaktu</th>
                                    <th> : </th>
                                    <td>{{ implode(', ', $laporan->waktu_kegiatan) }}</td>
                                </tr>
                                <tr>
                                    <th>Sifat Kegiatan</th>
                                    <th> : </th>
                                    <td>{{ $laporan->sifat_kegiatan }}</td>
                                </tr>
                                <tr>
                                    <th>Keadaan Rambut Guru Tugas</th>
                                    <th> : </th>
                                    <td>{{ $laporan->rambut_gt }}</td>
                                </tr>
                                <tr>
                                    <th>GT pernah Bepergian</th>
                                    <th> : </th>
                                    <td>{{ $laporan->gt_bepergian }}</td>
                                </tr>
                                <tr>
                                    <th>Bepergian Sebanyak</th>
                                    <th> : </th>
                                    <td>{{ $laporan->berpergian_sebanyak ?? '-' }} kali</td>
                                </tr>
                                <tr>
                                    <th>Tujuan Bepergian</th>
                                    <th> : </th>
                                    <td>{{ $laporan->tujuan_bepergian ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>GT pernah Pulang Kampung</th>
                                    <th> : </th>
                                    <td>{{ $laporan->gt_pernah_pulang_kampung }}</td>
                                </tr>
                                <tr>
                                    <th>Pulang Kampung Sebanyak</th>
                                    <th> : </th>
                                    <td>{{ $laporan->pulang_kampung_sebanyak ?? '-' }} kali</td>
                                </tr>
                                <tr>
                                    <th>GT pernah Melakukan Pelanggaran</th>
                                    <th> : </th>
                                    <td>{{ $laporan->gt_melakukan_pelanggaran }}</td>
                                </tr>
                                <tr>
                                    <th>Pelanggaran Berupa</th>
                                    <th> : </th>
                                    <td>{{ $laporan->pelanggran_berupa ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>PJGT Mengambil Tindakan Pelanggaran</th>
                                    <th> : </th>
                                    <td>{{ $laporan->pjgt_mengambil_tindakan }}</td>
                                </tr>
                                <tr>
                                    <th>Tindakan Pelanggaran Berupa</th>
                                    <th> : </th>
                                    <td>{{ $laporan->tindakan_berupa ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Surat Ijin Dari Pengurus Telah Dipakai</th>
                                    <th> : </th>
                                    <td>{{ $laporan->surat_ijin_dipakai }} kali</td>
                                </tr>
                                <tr>
                                    <th>Hubungan Sosial dengan PJGT</th>
                                    <th> : </th>
                                    <td>{{ $laporan->hubungan_dengan_pjgt }}</td>
                                </tr>
                                <tr>
                                    <th>Hubungan Sosial dengan Kepala Madrasah</th>
                                    <th> : </th>
                                    <td>{{ $laporan->hubungan_dengan_kepmad }}</td>
                                </tr>
                                <tr>
                                    <th>Hubungan Sosial dengan Guru</th>
                                    <th> : </th>
                                    <td>{{ $laporan->hubungan_dengan_guru }}</td>
                                </tr>
                                <tr>
                                    <th>Hubungan Sosial dengan wali Santri/Murid/Masyarakat</th>
                                    <th> : </th>
                                    <td>{{ $laporan->hubungan_dengan_wali_murid_masyarakat }}</td>
                                </tr>
                                <tr>
                                    <th>Hubungan Sosial dengan Murid Didalam Kelas</th>
                                    <th> : </th>
                                    <td>{{ $laporan->hubungan_dengan_murid_dikelas }}</td>
                                </tr>
                                <tr>
                                    <th>Hubungan Sosial dengan Murid Diluar Kelas</th>
                                    <th> : </th>
                                    <td>{{ $laporan->hubungan_dengan_murid_diluar }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggapan Umum Murid Terhadap Guru Tugas</th>
                                    <th> : </th>
                                    <td>{{ $laporan->tanggapan_murid }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggapan Umum Masyarakat Terhadap Guru Tugas</th>
                                    <th> : </th>
                                    <td>{{ $laporan->tanggapan_masyarakat }}</td>
                                </tr>
                                <tr>
                                    <th>Bisyaroh 1</th>
                                    <th> : </th>
                                    <td>
                                        {{ $laporan->bisyaroh_satu }}
                                        {{ $laporan->bisyaroh_satu === 'Ya' ? ', Rp' . $laporan->bisyaroh_satu_sebanyak : '' }}
                                    </td>

                                </tr>
                                <tr>
                                    <th>Bisyaroh 2</th>
                                    <th> : </th>
                                    <td>{{ $laporan->bisyaroh_dua }}{{ $laporan->bisyaroh_dua === 'Ya' ? ', Rp' . $laporan->bisyaroh_satu_sebanyak : '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Bisyaroh 3</th>
                                    <th> : </th>
                                    <td>{{ $laporan->bisyaroh_tiga }}{{ $laporan->bisyaroh_tiga === 'Ya' ? ', Rp' . $laporan->bisyaroh_satu_sebanyak : '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Bisyaroh 4</th>
                                    <th> : </th>
                                    <td>{{ $laporan->bisyaroh_empat }}{{ $laporan->bisyaroh_empat === 'Ya' ? ', Rp' . $laporan->bisyaroh_satu_sebanyak : '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Bisyaroh 5</th>
                                    <th> : </th>
                                    <td>{{ $laporan->bisyaroh_lima }}{{ $laporan->bisyaroh_lima === 'Ya' ? ', Rp' . $laporan->bisyaroh_satu_sebanyak : '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Bisyaroh 6</th>
                                    <th> : </th>
                                    <td>{{ $laporan->bisyaroh_enam }}{{ $laporan->bisyaroh_enam === 'Ya' ? ', Rp' . $laporan->bisyaroh_satu_sebanyak : '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Bisyaroh 7</th>
                                    <th> : </th>
                                    <td>{{ $laporan->bisyaroh_tujuh }}{{ $laporan->bisyaroh_tujuh === 'Ya' ? ', Rp' . $laporan->bisyaroh_satu_sebanyak : '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Bisyaroh 8</th>
                                    <th> : </th>
                                    <td>{{ $laporan->bisyaroh_delapan }}{{ $laporan->bisyaroh_delapan === 'Ya' ? ', Rp' . $laporan->bisyaroh_satu_sebanyak : '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Bisyaroh 9</th>
                                    <th> : </th>
                                    <td>{{ $laporan->bisyaroh_sembilan }}{{ $laporan->bisyaroh_sembilan === 'Ya' ? ', Rp' . $laporan->bisyaroh_satu_sebanyak : '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Bisyaroh 10</th>
                                    <th> : </th>
                                    <td>{{ $laporan->bisyaroh_sepuluh }}{{ $laporan->bisyaroh_sepuluh === 'Ya' ? ', Rp' . $laporan->bisyaroh_satu_sebanyak : '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Usulan Dan Lain Lain</th>
                                    <th> : </th>
                                    <td>{{ $laporan->usulan }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
