@extends($layout)
@section('title','Input Kode Verifikasi')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            @if ($errors->any())
            <div class="alert-error">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Input Kode Verifikasi</h6>
                @if (Auth::user()->role === 'GT')
                    <form action="{{ url('GT/verifikasi-kode') }}" method="POST">
                @elseif (Auth::user()->role === 'PJGT')
                    <form action="{{ url('PJGT/verifikasi-kode') }}" method="POST">
                @endif
                @csrf
                    <div class="mb-3">
                        <label for="currentPassword" class="form-label">Kode Verifikasi</label>
                        <input type="text" class="form-control" name="kode" id="currentPassword" required>
                    </div>
                    <button type="submit" id="submitBtn" class="btn btn-success">Verifikasi & Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
