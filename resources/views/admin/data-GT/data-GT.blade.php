@extends('admin.layout.template_admin')
@section('title', 'Data Guru Tugas')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-4">Data Guru Tugas</h6>
                        <button type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling"
                            aria-controls="offcanvasScrolling" class="btn btn-success mb-3"><i
                                class="fas fa-plus"></i></button>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama GT</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Status Tugas</th>
                                <th scope="col">Asal kelas</th>
                                <th scope="col">Nama Madrasah </th>
                                <th scope="col">Nama PJGT</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gt as $key => $value)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->gt->alamat ?? '-' }}</td>
                                    <td>{{ $value->gt->status_tugas ?? '-' }}</td>
                                    <td>{{ $value->gt->asal_kelas ?? '-' }}</td>
                                    <td>{{ $value->gt->madrasah->nama_madrasah ?? '-' }}</td>
                                    <td>{{ $value->gt->pjgt->user->name ?? '-' }}</td>
                                    <td><span class="btn btn-success">{{ $value->status }}</span></td>
                                    <td>
                                        <div class="dropdown d-flex justify-content-center mt-3">
                                            <button class="btn btn-link p-0 border-0 text-dark" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-h"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><button type="button" data-bs-toggle="offcanvas"
                                                        data-bs-target="#offcanvasScrolling{{ $value->id }}"
                                                        aria-controls="offcanvasScrolling"
                                                        class="dropdown-item">Edit</button></li>
                                                    <li><button class="dropdown-item" type="button" data-bs-toggle="modal"
                                                            data-bs-target="#nonaktif{{ $value->id }}">Nonaktifkan</button>
                                                    </li>
                                                    <li><button class="dropdown-item" type="button" data-bs-toggle="modal"
                                                            data-bs-target="#modalhapus{{ $value->id }}">Hapus</button>
                                                    </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Modal nonaktif-->
                                <div class="modal fade" id="nonaktif{{ $value->id }}" tabindex="-1"
                                    aria-labelledby="nonaktif" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <img src="{{ asset('assets/img/logo.png') }}" width="30px"
                                                    style="margin-right: 20px" alt="">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Nonaktifkan Guru
                                                    Tugas</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Yakin Meonaktifkan Guru Tugas <span
                                                    class="fw-bold">{{ $value->name }}</span> ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                                <form action="{{ url('admin/data-GT/nonaktif/'.$value->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success">Nonaktifkan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal hapus-->
                                <div class="modal fade" id="modalhapus{{ $value->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <img src="{{ asset('assets/img/logo.png') }}" width="30px"
                                                    style="margin-right: 20px" alt="">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Guru Tugas
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Yakin Menghapus Guru Tugas <span class="fw-bold">{{ $value->name }}</span>
                                                ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                                <a href="{{ url('admin/data-GT/delete/' . $value->id) }}" type="button"
                                                    class="btn btn-success">Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false"
                                    tabindex="-1" id="offcanvasScrolling{{ $value->id }}"
                                    aria-labelledby="offcanvasScrollingLabel">
                                    <div class="offcanvas-header">
                                        <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Edit GT</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                        <div class="bg-light rounded h-100 p-4">
                                            <h6 class="mb-4">Form Edit GT</h6>
                                            <form action="{{ url('admin/data-GT/update/' . $value->id) }}"
                                                method="POST">
                                                @csrf
                                                <div class="mb-3">
                                                    <abel for="exampleInput{{ $value->name }}" class="form-label">Nama
                                                        GT</abel>
                                                    <input type="text" class="form-control"
                                                        value="{{ $value->name }}" name="name"
                                                        id="exampleInput{{ $value->name }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInput{{ $value->gt->alamat }}"
                                                        class="form-label">Alamat</label>
                                                    <input type="text" class="form-control "
                                                        value="{{ $value->gt->alamat }}" name="alamat"
                                                        id="exampleInput{{ $value->gt->alamat }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputstatustugas" class="form-label">Status
                                                        Tugas</label>
                                                    <select class="form-select" name="status_tugas"
                                                        id="exampleInputstatustugas">
                                                        <option selected disabled>Pilih Status Tugas</option>
                                                        <option value="Wajib" {{ $value->gt->status_tugas == 'Wajib' ? 'selected' : '' }}>Wajib</option>
                                                        <option value="Qodla" {{ $value->gt->status_tugas == 'Qodla' ? 'selected' : '' }}>Qodla</option>
                                                        <option value="Tathowwu" {{ $value->gt->status_tugas == 'Tathowwu' ? 'selected' : '' }}>Tathowwu</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputasalkelas" class="form-label">Asal
                                                        Kelas</label>
                                                    <select class="form-select" name="asal_kelas"
                                                        id="exampleInputasalkelas">
                                                        <option selected disabled>Pilih Asal Kelas</option>
                                                        <option value="MMU Ibtidaiyah"{{ $value->gt->asal_kelas == 'MMU Ibtidaiyah' ? 'selected' : '' }} >MMU Ibtidaiyah</option>
                                                        <option value="MMU Tsanawiyah" {{ $value->gt->asal_kelas == 'MMU Tsanawiyah' ? 'selected' : '' }}>MMU Tsanawiyah</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInput{{ $value->gt->gt_id }}"
                                                        class="form-label">Guru Tugas</label>
                                                    <select class="form-select" name="pjgt_id"
                                                        id="exampleInput{{ $value->gt->pjgt_id }}">
                                                        <option disabled selected>Pilih PJGT</option>
                                                        @foreach ($pjgt as $item)
                                                            <option value="{{ $item->pjgt->id }}"
                                                                {{ $item->pjgt->id == $value->gt->pjgt_id ? 'selected' : '' }}>
                                                                {{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInput{{ $value->gt->madrasah_id }}"
                                                        class="form-label">Madrasah</label>
                                                    <select class="form-select" name="madrasah_id"
                                                        id="exampleInput{{ $value->gt->madrasah_id }}">
                                                        <option disabled selected>Pilih Madrasah</option>
                                                        @foreach ($madrasah as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ $item->id == $value->gt->madrasah_id ? 'selected' : '' }}>
                                                                {{ $item->nama_madrasah }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3 form-check">
                                                    <input type="checkbox" class="form-check-input"
                                                        id="exampleCheck{{ $value->id }}">
                                                    <label class="form-check-label"
                                                        for="exampleCheck{{ $value->id }}">Yakin ??</label>
                                                </div>
                                                <button type="submit" class="btn btn-success mb-4"
                                                    id="submitBtn{{ $value->id }}" disabled>Simpan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const checkbox = document.getElementById('exampleCheck{{ $value->id }}');
                                        const button = document.getElementById('submitBtn{{ $value->id }}');

                                        checkbox.addEventListener('change', function() {
                                            button.disabled = !this.checked;
                                        });
                                    });
                                </script>
                            @endforeach
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
        <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Tambah PJGT</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Form Tambah GT</h6>
            <form action="{{ url('admin/data-GT/store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <abel for="exampleInputGT" class="form-label">Nama GT</abel>
                    <input type="text" class="form-control" name="name" id="exampleInputGT">
                </div>
                <div class="mb-3">
                    <abel for="exampleInputemail" class="form-label">Email</abel>
                    <input type="email" class="form-control" name="email" id="exampleInputemail">
                </div>
                <div class="mb-3">
                    <label for="exampleInputpassword" class="form-label">Password</label>
                    <input type="password" class="form-control " name="password" id="exampleInputpassword">
                </div>
                <div class="mb-3">
                    <label for="exampleInputAlamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control " name="alamat" id="exampleInputAlamat">
                </div>
                <div class="mb-3">
                    <label for="exampleInputstatustugas" class="form-label">Status Tugas</label>
                    <select class="form-select" name="status_tugas" id="exampleInputstatustugas">
                        <option selected disabled>Pilih Status Tugas</option>
                        <option value="Wajib">Wajib</option>
                        <option value="Qodla">Qodla</option>
                        <option value="Tathowwu">Tathowwu</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputasalkelas" class="form-label">Asal Kelas</label>
                    <select class="form-select" name="asal_kelas" id="exampleInputasalkelas">
                        <option selected disabled>Pilih Asal Kelas</option>
                        <option value="MMU Ibtidaiyah">MMU Ibtidaiyah</option>
                        <option value="MMU Tsanawiyah">MMU Tsanawiyah</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputGT" class="form-label">PJGT</label>
                    <select class="form-select" name="pjgt_id" id="exampleInputGT">
                        <option selected disabled>Pilih PJGT</option>
                        @foreach ($pjgt as $item)
                            <option value="{{ $item->pjgt->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputMadrasah" class="form-label">Madrasah</label>
                    <select class="form-select" name="madrasah_id" id="exampleInputMadrasah">
                        <option selected disabled>Pilih Madrasah</option>
                        @foreach ($madrasah as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_madrasah }}</option>
                        @endforeach
                    </select>
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
