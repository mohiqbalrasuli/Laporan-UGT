<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Akun Diaktifkan</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">
    <div style="max-width: 600px; margin: auto; background-color: #ffffff; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <img src="{{ asset('assets/img/logo.png') }}" alt="LOGO PPU" width="100px">
        <h2 style="color: #333;">Assalamu'alaikum wr. wb.</h2>
        <p>Akun Anda sebagai <strong>GT</strong> telah diaktifkan.</p>

        <p><strong>Nama PJGT:</strong> {{ $pjgt->name }}</p>

        <p>Silakan login ke aplikasi.</p>

        <div style="margin: 30px 0;">
            <a href="{{ url('/login') }}" style="background-color: #026119; color: #ffffff; padding: 12px 20px; text-decoration: none; border-radius: 5px; display: inline-block;">
                Login Sekarang
            </a>
        </div>

        <p>Terima kasih,<br>
        <span>Admin UGT PPU</span></p>
    </div>
</body>
</html>
