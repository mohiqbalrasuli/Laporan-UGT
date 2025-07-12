<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Verifikasi Ubah Password</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f8f8f8; padding: 20px;">
    <div style="max-width: 500px; margin: auto; background: #ffffff; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <h2 style="color: #333; text-align: center;">Verifikasi Ubah Password</h2>
        <p style="font-size: 16px; color: #555;">
            Assalamu'alaikum wr. wb. {{ Auth::user()->name ?? 'Pengguna' }},
        </p>
        <p style="font-size: 16px; color: #555;">
            Kami menerima permintaan untuk mengubah password akun Anda. Silakan gunakan kode berikut untuk memverifikasi permintaan ini:
        </p>

        <div style="text-align: center; margin: 30px 0;">
            <span style="display: inline-block; background: #026119; color: #fff; font-size: 24px; font-weight: bold; padding: 15px 30px; border-radius: 8px;">
                {{ $kode }}
            </span>
        </div>

        <p style="font-size: 16px; color: #555;">
            Jika Anda tidak merasa melakukan permintaan ini, silakan abaikan email ini.
        </p>
        <p style="font-size: 16px; color: #555;">
            Terima kasih,<br>
            <strong>Admin UGT PPU</strong>
        </p>
    </div>
</body>
</html>
