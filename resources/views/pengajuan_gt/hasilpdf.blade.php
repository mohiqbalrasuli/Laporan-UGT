<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pengajuan Guru Tugas</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @page {
            margin: 2cm;
            size: A4;
        }

        body {
            font-family: 'Times New Roman', serif;
            font-size: 12pt;
            line-height: 1.4;
            color: #000;
            background: white;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #000;
            padding-bottom: 20px;
        }

        .header img {
            width: 80px;
            height: auto;
            margin-bottom: 10px;
        }

        .header h1 {
            font-size: 18pt;
            font-weight: bold;
            margin: 5px 0;
        }

        .header h2 {
            font-size: 14pt;
            font-weight: bold;
            margin: 5px 0;
        }

        .header p {
            font-size: 12pt;
            margin: 5px 0;
        }

        .status-badge {
            background: #d4edda;
            border: 1px solid #c3e6cb;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .status-badge h4 {
            color: #155724;
            margin: 0 0 5px 0;
            font-size: 14pt;
        }

        .status-badge p {
            color: #155724;
            margin: 0;
            font-size: 11pt;
        }

        .section {
            margin-bottom: 25px;
        }

        .section-title {
            font-size: 14pt;
            font-weight: bold;
            margin-bottom: 15px;
            border-bottom: 1px solid #000;
            padding-bottom: 5px;
        }

        .data-row {
            display: flex;
            margin-bottom: 8px;
        }

        .data-label {
            width: 200px;
            font-weight: bold;
            flex-shrink: 0;
        }

        .data-value {
            flex: 1;
        }

        .data-row-2col {
            display: flex;
            gap: 50px;
            margin-bottom: 8px;
        }

        .data-col {
            flex: 1;
        }

        .data-col .data-label {
            width: 150px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-bottom: 20px;
        }

        .stat-card {
            border: 1px solid #000;
            padding: 10px;
            text-align: center;
        }

        .stat-number {
            font-size: 16pt;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 10pt;
        }

        .table-container {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 10pt;
        }

        th, td {
            border: 1px solid #000;
            padding: 5px;
            text-align: center;
        }

        th {
            background: #f0f0f0;
            font-weight: bold;
        }

        .footer {
            margin-top: 40px;
            text-align: center;
        }

        .print-btn {
            position: fixed;
            top: 20px;
            right: 20px;
            background: #dc3545;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 12pt;
            z-index: 1000;
        }

        @media print {
            .print-btn {
                display: none;
            }
        }

        /* Bootstrap overrides for PDF */
        .container-fluid {
            padding: 0;
        }

        .row {
            margin: 0;
        }

        .col-md-6, .col-md-4 {
            padding: 0 10px;
        }

        .mb-3 {
            margin-bottom: 15px !important;
        }

        .mb-4 {
            margin-bottom: 20px !important;
        }

        .text-center {
            text-align: center !important;
        }

        .fw-bold {
            font-weight: bold !important;
        }

        .text-muted {
            color: #6c757d !important;
        }

        .border-success {
            border-color: #198754 !important;
        }

        .border-primary {
            border-color: #0d6efd !important;
        }

        .border-danger {
            border-color: #dc3545 !important;
        }

        .text-success {
            color: #198754 !important;
        }

        .text-primary {
            color: #0d6efd !important;
        }

        .text-danger {
            color: #dc3545 !important;
        }

        .bg-light {
            background-color: #f8f9fa !important;
        }

        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }

        .table-primary {
            background-color: #cfe2ff !important;
        }

        .align-middle {
            vertical-align: middle !important;
        }

        .btn {
            display: inline-block;
            font-weight: 400;
            text-align: center;
            vertical-align: middle;
            cursor: pointer;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .btn-danger {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .me-3 {
            margin-right: 1rem !important;
        }

        .d-flex {
            display: flex !important;
        }

        .justify-content-center {
            justify-content: center !important;
        }

        .alert {
            position: relative;
            padding: 0.75rem 1.25rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: 0.25rem;
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        .alert-heading {
            color: inherit;
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, 0.125);
            border-radius: 0.25rem;
        }

        .card-body {
            flex: 1 1 auto;
            padding: 1rem;
        }

        .card-text {
            margin-top: 0;
            margin-bottom: 1rem;
        }

        .table-responsive {
            overflow-x: auto;
        }
    </style>
</head>
<body>

    <div class="header">
        @php
            $path = public_path('assets/img/image.png');
            $img = 'data:image/png;base64,' . base64_encode(file_get_contents($path));
        @endphp

        <img src="{{ $img }}" width="500px">
        <h1>FORMULIR PENGAJUAN GURU TUGAS</h1>
        <h2>Pondok Pesantren Al-Usymuni</h2>
        <p>Hasil Pendaftaran</p>
    </div>

    <div class="status-badge">
        <div class="data-row">
            <div class="data-label">Hari / Tanggal Pendaftaran:</div>
            <div class="data-value">{{ \Carbon\Carbon::parse($data->created_at)->translatedFormat('l, d F Y - H:i') }} WIB</div>
        </div>
    </div>

    <!-- Informasi Madrasah -->
    <div class="section">
        <div class="section-title">INFORMASI MADRASAH</div>

        <div class="data-row">
            <div class="data-label">Nama Madrasah:</div>
            <div class="data-value">{{ $data->nama_madrasah }}</div>
        </div>

        <div class="data-row">
            <div class="data-label">No. Telepon:</div>
            <div class="data-value">{{ $data->no_telp }}</div>
        </div>

        <div class="data-row">
            <div class="data-label">Alamat Madrasah:</div>
            <div class="data-value">{{ $data->alamat_madrasah }}</div>
        </div>
    </div>

    <!-- Pengurus dan Pimpinan -->
    <div class="section">
        <div class="section-title">PENGURUS DAN PIMPINAN</div>

        <div class="data-row-2col">
            <div class="data-col">
                <div class="data-row">
                    <div class="data-label">Nama Penanggung Jawab:</div>
                    <div class="data-value">{{ $data->nama_pjgt }}</div>
                </div>
            </div>
            <div class="data-col">
                <div class="data-row">
                    <div class="data-label">Umur Penanggung Jawab:</div>
                    <div class="data-value">{{ $data->umur_pjgt }} Tahun</div>
                </div>
            </div>
        </div>

        <div class="data-row-2col">
            <div class="data-col">
                <div class="data-row">
                    <div class="data-label">Kepala Madrasah:</div>
                    <div class="data-value">{{ $data->kepala_madrasah }}</div>
                </div>
            </div>
            <div class="data-col">
                <div class="data-row">
                    <div class="data-label">Umur Kepala Madrasah:</div>
                    <div class="data-value">{{ $data->umur_kepala_madrasah }} Tahun</div>
                </div>
            </div>
        </div>

        <div class="data-row-2col">
            <div class="data-col">
                <div class="data-row">
                    <div class="data-label">Ketua:</div>
                    <div class="data-value">{{ $data->ketua }}</div>
                </div>
            </div>
            <div class="data-col">
                <div class="data-row">
                    <div class="data-label">Wakil Ketua:</div>
                    <div class="data-value">{{ $data->wakil_ketua }}</div>
                </div>
            </div>
        </div>

        <div class="data-row-2col">
            <div class="data-col">
                <div class="data-row">
                    <div class="data-label">Sekretaris:</div>
                    <div class="data-value">{{ $data->sekretaris }}</div>
                </div>
            </div>
            <div class="data-col">
                <div class="data-row">
                    <div class="data-label">Bendahara:</div>
                    <div class="data-value">{{ $data->bendahara }}</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Kurikulum dan Pembelajaran -->
    <div class="section">
        <div class="section-title">KURIKULUM DAN PEMBELAJARAN</div>

        <div class="data-row-2col">
            <div class="data-col">
                <div class="data-row">
                    <div class="data-label">Kitab yang Dibaca:</div>
                    <div class="data-value">{{ $data->kitab_yang_dibaca }}</div>
                </div>
            </div>
            <div class="data-col">
                <div class="data-row">
                    <div class="data-label">Bahasa Makna Kitab:</div>
                    <div class="data-value">{{ $data->bahasa_makna_kitab }}</div>
                </div>
            </div>
        </div>

        <div class="data-row-2col">
            <div class="data-col">
                <div class="data-row">
                    <div class="data-label">Bahasa Pengantar Pelajaran:</div>
                    <div class="data-value">{{ $data->bahasa_pengantar_Pelajaran }}</div>
                </div>
            </div>
            <div class="data-col">
                <div class="data-row">
                    <div class="data-label">Madrasah Berada Di:</div>
                    <div class="data-value">{{ $data->madrasah_berada_di }}</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Data Guru -->
    <div class="section">
        <div class="section-title">DATA GURU</div>

        <div class="data-row-2col">
            <div class="data-col">
                <div class="data-row">
                    <div class="data-label">Jumlah Guru Laki Laki:</div>
                    <div class="data-value">{{ $data->jumlah_guru_lk }}</div>
                </div>
            </div>
            <div class="data-col">
                <div class="data-row">
                    <div class="data-label">Jumlah Guru Perempuan:</div>
                    <div class="data-value">{{ $data->jumlah_guru_pr }}</div>
                </div>
            </div>
            <div class="data-col">
                <div class="data-row">
                    <div class="data-label">Jumlah Guru (total) :</div>
                    <div class="data-value">{{ $data->jumlah_guru }}</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Data Murid -->
    <div class="section">
        <div class="section-title">DATA MURID - IBTIDA'IYAH DAN AWALIYAH/ULA</div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th rowspan="2" style="width: 100px;">KELAS</th>
                        <th colspan="6">Ibtida'iyah dan Awaliyah/Ula</th>
                        <th rowspan="2" style="width: 100px;">JUMLAH</th>
                    </tr>
                    <tr>
                        <th>I</th>
                        <th>II</th>
                        <th>III</th>
                        <th>IV</th>
                        <th>V</th>
                        <th>VI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="font-weight: bold;">Putera</td>
                        <td>{{ $data->jumlah_kelas_1_lk }}</td>
                        <td>{{ $data->jumlah_kelas_2_lk }}</td>
                        <td>{{ $data->jumlah_kelas_3_lk }}</td>
                        <td>{{ $data->jumlah_kelas_4_lk }}</td>
                        <td>{{ $data->jumlah_kelas_5_lk }}</td>
                        <td>{{ $data->jumlah_kelas_6_lk }}</td>
                        <td style="font-weight: bold; background: #f0f0f0;">{{ $data->jumlah_murid_lk }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Puteri</td>
                        <td>{{ $data->jumlah_kelas_1_pr }}</td>
                        <td>{{ $data->jumlah_kelas_2_pr }}</td>
                        <td>{{ $data->jumlah_kelas_3_pr }}</td>
                        <td>{{ $data->jumlah_kelas_4_pr }}</td>
                        <td>{{ $data->jumlah_kelas_5_pr }}</td>
                        <td>{{ $data->jumlah_kelas_6_pr }}</td>
                        <td style="font-weight: bold; background: #f0f0f0;">{{ $data->jumlah_murid_pr }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Jumlah</td>
                        <td>{{ $data->jumlah_kelas_1 }}</td>
                        <td>{{ $data->jumlah_kelas_2 }}</td>
                        <td>{{ $data->jumlah_kelas_3 }}</td>
                        <td>{{ $data->jumlah_kelas_4 }}</td>
                        <td>{{ $data->jumlah_kelas_5 }}</td>
                        <td>{{ $data->jumlah_kelas_6 }}</td>
                        <td style="font-weight: bold; background: #f0f0f0;">{{ $data->jumlah_murid }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Informasi Tambahan -->
    <div class="section">
        <div class="section-title">INFORMASI TAMBAHAN</div>

        <div class="data-row-2col">
            <div class="data-col">
                <div class="data-row">
                    <div class="data-label">Guru Tugas Yang Diajukan:</div>
                    <div class="data-value">{{ $data->gt_yang_diajukan }}</div>
                </div>
            </div>
            <div class="data-col">
                <div class="data-row">
                    <div class="data-label">Rencana Mengajar Kelas:</div>
                    <div class="data-value">{{ $data->rencana_mengajar_kelas }}</div>
                </div>
            </div>
        </div>

        <div class="data-row">
            <div class="data-label">Lain - Lain:</div>
            <div class="data-value">{{ $data->lain_lain }}</div>
        </div>
    </div>

    <div class="footer">
        <p>Dokumen ini dicetak pada {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y - H:i') }} WIB</p>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
