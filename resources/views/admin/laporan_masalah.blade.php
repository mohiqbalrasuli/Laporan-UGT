@extends($layout)
@section('title', 'Laporan Masalah')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Laporan GT Bermasalah</h6>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama PJGT</th>
                                <th scope="col">Nama GT</th>
                                <th scope="col">Subjek</th>
                                <th scope="col">Isi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laporan_pjgt as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->pjgt->user->name }}</td>
                                    <td>{{ $item->pjgt->gt->user->name }}</td>
                                    <td>{{ $item->Subjek }}</td>
                                    <td>{{ $item->Isi }}</td>
                                    <td>
                                        @if (Auth::user()->role == 'admin')
                                            <a href="{{ url('/laporan-masalah/delete-laporan-gt/'.$item->id) }}" class="btn btn-danger btn-sm">Hapus</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Laporan PJGT Bermasalah</h6>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama GT</th>
                                <th scope="col">Nama PJGT</th>
                                <th scope="col">Subjek</th>
                                <th scope="col">Isi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laporan_gt as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->gt->user->name }}</td>
                                    <td>{{ $item->gt->pjgt->user->name }}</td>
                                    <td>{{ $item->Subjek }}</td>
                                    <td>{{ $item->Isi }}</td>
                                    <td>
                                        @if (Auth::user()->role == 'admin')
                                            <a href="{{ url('/laporan-masalah/delete-laporan-pjgt/'.$item->id) }}" class="btn btn-danger btn-sm">Hapus</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
