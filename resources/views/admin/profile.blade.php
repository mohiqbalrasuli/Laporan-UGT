@extends('admin.layout.template_admin')
@section('title', 'Profile Admin')
@section('content')
    <div class="container-fluid pt-4 px-4">
        @if (session('success'))
            <div class="alert alert-success mt-2" role="alert">{{ session('success') }}</div>
        @endif
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-4">Data Guru Tugas</h6>
                        <button class="btn btn-link p-0 border-0 text-dark" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
                            <i class="fas fa-edit"></i> <!-- untuk vertikal -->
                            <!-- Atau ganti dengan fa-ellipsis-h jika mau horizontal -->
                        </button>
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
                                <th>Nama Pengurus</th>
                                <th> : </th>
                                <td>{{ $pengurus->name }}</td>
                            </tr>
                                <th>Email</th>
                                <th> : </th>
                                <td>{{ $pengurus->email }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-success btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
<div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
    id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Edit prngurus </h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Form Edit Pengrus UGT</h6>
            <form action="{{ url('admin/update/' . $pengurus->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <abel for="exampleInput{{ $pengurus->name }}" class="form-label">Nama</abel>
                    <input type="text" class="form-control" value="{{ $pengurus->name }}" name="name"
                        id="exampleInput{{ $pengurus->name }}">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck{{ $pengurus->id }}">
                    <label class="form-check-label" for="exampleCheck{{ $pengurus->id }}">Yakin ??</label>
                </div>
                <button type="submit" class="btn btn-success mb-4" id="submitBtn{{ $pengurus->id }}"
                    disabled>Simpan</button>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkbox = document.getElementById('exampleCheck{{ $pengurus->id }}');
        const button = document.getElementById('submitBtn{{ $pengurus->id }}');

        checkbox.addEventListener('change', function() {
            button.disabled = !this.checked;
        });
    });
</script>
