@extends('PJGT.layout.template_PJGT')
@section('title', 'Laporan Masalah')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            @if (session('success'))
                <div class="alert alert-success mt-2">{{ session('success') }}</div>
            @endif
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Laporan Masalah</h6>
                    <form action="{{ url('PJGT/laporan-masalah/store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <abel for="exampleInputGT" class="form-label">Subjek</abel>
                            <input type="text" class="form-control" name="Subjek" id="exampleInputGT">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="Isi" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck">
                            <label class="form-check-label" for="exampleCheck">Yakin ??</label>
                        </div>
                        <button type="submit" class="btn btn-success mb-4" id="submitBtn" disabled>Simpan</button>
                    </form>
                </div>
            </div>
        </div>
        {{-- script button submit --}}
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const checkbox = document.getElementById('exampleCheck');
                const button = document.getElementById('submitBtn');

                checkbox.addEventListener('change', function() {
                    button.disabled = !this.checked;
                });
            });
        </script>
    </div>
    @endsection
