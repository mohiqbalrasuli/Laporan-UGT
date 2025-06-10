@extends('admin.layout.template_admin')
@section('title', 'Setting')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <h4>Pengaturan Tanggal Akses Form Laporan</h4>

            {{-- Notifikasi sukses --}}
            @if (session('success'))
                <div class="alert alert-success mt-2">{{ session('success') }}</div>
            @endif

            {{-- Notifikasi error --}}
            @if (session('error'))
                <div class="alert alert-danger mt-2">{{ session('error') }}</div>
            @endif
        </div>

        {{-- Form PJGT --}}
        <div class="col-md-6">
            <div class="card bg-light">
                <div class="card-header bg-success text-white">
                    Pengaturan Form Laporan PJGT
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/simpan-tanggal-pjgt/'.$aksesForm->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="pjgt_start" class="form-label">Tanggal Mulai</label>
                            <input type="date" class="form-control" name="tanggal_mulai_pjgt" required>
                        </div>
                        <div class="mb-3">
                            <label for="pjgt_end" class="form-label">Tanggal Berakhir</label>
                            <input type="date" class="form-control" name="tanggal_berakhir_pjgt" required>
                        </div>
                        <button type="submit" class="btn btn-success">Simpan PJGT</button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Form GT --}}
        <div class="col-md-6">
            <div class="card bg-light">
                <div class="card-header bg-success text-white">
                    Pengaturan Form Laporan GT
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/simpan-tanggal-gt/'.$aksesForm->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="gt_start" class="form-label">Tanggal Mulai</label>
                            <input type="date" class="form-control" name="tanggal_mulai_gt" required>
                        </div>
                        <div class="mb-3">
                            <label for="gt_end" class="form-label">Tanggal Berakhir</label>
                            <input type="date" class="form-control" name="tanggal_berakhir_gt" required>
                        </div>
                        <button type="submit" class="btn btn-success">Simpan GT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
