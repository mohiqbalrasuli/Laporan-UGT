@component('mail::message')
# Selamat!

Akun Anda sebagai GT telah diaktifkan.

**Nama:** {{ $gt->name }}

Silakan login ke aplikasi.

@component('mail::button', ['url' => url('/login')])
Login Sekarang
@endcomponent

Terima kasih,<br>
{{ config('app.name') }}
@endcomponent
