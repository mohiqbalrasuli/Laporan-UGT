@extends($layout)

@section('title','Ubah Password')

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
                <h6 class="mb-4">Ubah Password</h6>
                @if (Auth::user()->role === 'GT')
                    <form action="{{ url('GT/ubah-password/submit') }}" method="POST">
                @elseif (Auth::user()->role === 'PJGT')
                    <form action="{{ url('PJGT/ubah-password/submit') }}" method="POST">
                @endif
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
            </div>
        </div>
    </div>
</div>
@endsection
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
