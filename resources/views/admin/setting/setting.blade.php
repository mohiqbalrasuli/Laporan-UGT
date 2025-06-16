@extends('admin.layout.template_admin')
@section('title','Pengaturan')
@section('content')
{{-- Notifikasi sukses --}}


<div class="container-fluid pt-4 px-4">
    @if (session('success'))
        <div class="row g-4">
            <div class="col-12">
                <div class="alert alert-success mt-2">{{ session('success') }}</div>
            </div>
        </div>
    @endif

    {{-- Notifikasi error --}}
    @if (session('error'))
        <div class="row g-4">
            <div class="col-12">
                <div class="alert alert-danger mt-2">{{ session('error') }}</div>
            </div>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert-error">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <div class="accordion accordion-flush" id="pengaturanAccordion">

        {{-- Akses PJGT --}}
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingPJGT">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePJGT" aria-expanded="false" aria-controls="collapsePJGT">
                    Pengaturan Akses Form Input Laporan PJGT
                </button>
            </h2>
            <div id="collapsePJGT" class="accordion-collapse collapse" aria-labelledby="headingPJGT" data-bs-parent="#pengaturanAccordion">
                <div class="accordion-body">
                    <form action="{{ url('admin/simpan-tanggal-pjgt/'.$aksesForm->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="tanggal_mulai_pjgt" class="form-label">Tanggal Mulai</label>
                            <input type="date" class="form-control" name="tanggal_mulai_pjgt"
                                value="{{ old('tanggal_mulai_pjgt', $aksesForm->tanggal_mulai_pjgt ?? '') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_akhir_pjgt" class="form-label">Tanggal Berakhir</label>
                            <input type="date" class="form-control" name="tanggal_akhir_pjgt"
                                value="{{ old('tanggal_akhir_pjgt', $aksesForm->tanggal_akhir_pjgt ?? '') }}" required>
                        </div>
                        <button type="submit" class="btn btn-success">Simpan PJGT</button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Akses GT --}}
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingGT">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseGT" aria-expanded="false" aria-controls="collapseGT">
                    Pengaturan Akses Form Input Laporan GT
                </button>
            </h2>
            <div id="collapseGT" class="accordion-collapse collapse" aria-labelledby="headingGT" data-bs-parent="#pengaturanAccordion">
                <div class="accordion-body">
                    <form action="{{ url('admin/simpan-tanggal-gt/'.$aksesForm->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="tanggal_mulai_gt" class="form-label">Tanggal Mulai</label>
                            <input type="date" class="form-control" name="tanggal_mulai_gt"
                                value="{{ old('tanggal_mulai_gt', $aksesForm->tanggal_mulai_gt ?? '') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_akhir_gt" class="form-label">Tanggal Berakhir</label>
                            <input type="date" class="form-control" name="tanggal_akhir_gt"
                                value="{{ old('tanggal_akhir_gt', $aksesForm->tanggal_akhir_gt ?? '') }}" required>
                        </div>
                        <button type="submit" class="btn btn-success">Simpan GT</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingUbahPassword">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseUbahPassword" aria-expanded="false" aria-controls="collapseUbahPassword">
                    Ubah Password
                </button>
            </h2>
            <div id="collapseUbahPassword" class="accordion-collapse collapse" aria-labelledby="headingUbahPassword" data-bs-parent="#pengaturanAccordion">
                <div class="accordion-body">
                    <form action="{{ url('admin/ubah-password/submit') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="currentPassword" class="form-label">Password Saat Ini</label>
                            <input type="password" class="form-control" name="password_lama" id="currentPassword" required>
                        </div>
                        <div class="mb-3">
                            <label for="newPassword" class="form-label">Password Baru</label>
                            <input type="password" class="form-control" name="password_baru" id="newPassword" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control" name="password_baru_confirmation" id="confirmPassword" required>
                        </div>
                        <button type="submit" id="submitBtn" class="btn btn-success">Ubah Password</button>
                    </form>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const password = document.querySelector('input[name="password_baru"]');
                            const confirmPassword = document.querySelector('input[name="password_baru_confirmation"]');
                            const submitBtn = document.getElementById('submitBtn');

                            function validatePasswords() {
                                if (password.value === confirmPassword.value && password.value !== '') {
                                    submitBtn.disabled = false;
                                } else {
                                    submitBtn.disabled = true;
                                }
                            }

                            password.addEventListener('input', validatePasswords);
                            confirmPassword.addEventListener('input', validatePasswords);
                        });
                    </script>

                </div>
            </div>
        </div>

    </div>
</div>

@endsection
