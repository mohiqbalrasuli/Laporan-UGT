<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data Madrasah</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .form-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            margin: 20px auto;
            max-width: 1000px;
            overflow: hidden;
        }
        .form-header {
            background: linear-gradient(135deg, #4CAF50, #45a049);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .form-body {
            padding: 40px;
        }
        .section-title {
            color: #333;
            font-weight: 600;
            margin: 30px 0 20px 0;
            padding-bottom: 10px;
            border-bottom: 2px solid #4CAF50;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .form-label {
            font-weight: 500;
            color: #555;
            margin-bottom: 8px;
        }
        .form-control, .form-select {
            border: 2px solid #e9ecef;
            border-radius: 8px;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }
        .form-control:focus, .form-select:focus {
            border-color: #4CAF50;
            box-shadow: 0 0 0 0.2rem rgba(76, 175, 80, 0.25);
        }
        .btn-primary {
            background: linear-gradient(135deg, #4CAF50, #45a049);
            border: none;
            padding: 12px 30px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #45a049, #4CAF50);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(76, 175, 80, 0.4);
        }
        .btn-secondary {
            background: #6c757d;
            border: none;
            padding: 12px 30px;
            border-radius: 8px;
            font-weight: 500;
        }
        .row-equal-height {
            display: flex;
            flex-wrap: wrap;
        }
        .required {
            color: #dc3545;
        }
        .invalid-feedback {
            display: block;
        }
        @media (max-width: 768px) {
            .form-body {
                padding: 20px;
            }
            .form-header {
                padding: 20px;
            }
            img {
                width: 100px;
            }
            .header h2 ,.header h3 {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="form-container">
            <div class="form-header d-flex align-items-center justify-content-center">
               <img src="{{ asset('assets/img/logo.png')}}" alt="LOGO MMU" width="130px">
                <div class="header">
                    <h2>Formulir Pengajuan Guru Tugas</h2>
                    <h3>Pondok Pesantren Al-Usymuni</h3>
                    <p class="mb-0">Hasil Pendaftaran</p>
                </div>
            </div>
            <div class="form-body">
                <!-- Status Badge -->
                <div class="alert alert-success mb-4" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle me-2 fs-4"></i>
                        <div>
                            <h5 class="alert-heading mb-1">Pendaftaran Berhasil!</h5>
                            <p class="mb-0">Pengajuan Guru Tugas telah berhasil didaftarkan pada <strong>{{ \Carbon\Carbon::parse($hasil->created_at)->translatedFormat('l, d F Y - H:i') }} WIB</strong></p>
                        </div>
                    </div>
                </div>
                <!-- Data Display -->
                <div id="registrationData">
                    <!-- Informasi Madrasah -->
                    <div class="section-title">
                        <i class="fas fa-school"></i>
                        <span>Informasi Madrasah</span>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Nama Madrasah</label>
                            <div class="form-control-plaintext fw-bold">{{ $hasil->nama_madrasah }}</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">No. Telepon</label>
                            <div class="form-control-plaintext">{{ $hasil->no_telp }}</div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-muted">Alamat Madrasah</label>
                        <div class="form-control-plaintext">{{ $hasil->alamat_madrasah }}</div>
                    </div>


                    <!-- Pengurus dan Pimpinan -->
                    <div class="section-title">
                        <i class="fas fa-users"></i>
                        <span>Pengurus dan Pimpinan</span>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Nama Penanggung Jawab</label>
                            <div class="form-control-plaintext fw-bold">{{ $hasil->nama_pjgt }}</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Umur Penanggung Jawab</label>
                            <div class="form-control-plaintext">{{ $hasil->umur_pjgt }} Tahun</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Kepala Madrasah</label>
                            <div class="form-control-plaintext fw-bold">{{ $hasil->kepala_madrasah }}</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Umur Kepala Madrasah</label>
                            <div class="form-control-plaintext">{{ $hasil->umur_kepala_madrasah }} Tahun</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Ketua</label>
                            <div class="form-control-plaintext">{{ $hasil->ketua }}</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Wakil Ketua</label>
                            <div class="form-control-plaintext">{{ $hasil->wakil_ketua }}</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Sekretaris</label>
                            <div class="form-control-plaintext">{{ $hasil->sekretaris }}</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Bendahara</label>
                            <div class="form-control-plaintext">{{ $hasil->bendahara }}</div>
                        </div>
                    </div>

                    <!-- Kurikulum dan Pembelajaran -->
                    <div class="section-title">
                        <i class="fas fa-book"></i>
                        <span>Kurikulum dan Pembelajaran</span>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Kitab yang Dibaca</label>
                            <div class="form-control-plaintext">{{ $hasil->kitab_yang_dibaca }}</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Bahasa Makna Kitab</label>
                            <div class="form-control-plaintext">{{ $hasil->bahasa_makna_kitab }}</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Bahasa Pengantar Pelajaran</label>
                            <div class="form-control-plaintext">{{ $hasil->bahasa_pengantar_Pelajaran }}</div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Madrasah Berada Di</label>
                            <div class="form-control-plaintext">{{ $hasil->madrasah_berada_di }}</div>
                        </div>
                    </div>

                    <!-- Data Guru -->
                    <div class="section-title">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <span>Data Guru</span>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="card text-center border-success">
                                <div class="card-body">
                                    <i class="fas fa-users text-success mb-2" style="font-size: 1.5rem;"></i>
                                    <h4 class="text-success fw-bold">{{ $hasil->jumlah_guru }}</h4>
                                    <p class="card-text text-muted mb-0">Total Guru</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card text-center border-primary">
                                <div class="card-body">
                                    <i class="fas fa-male text-primary mb-2" style="font-size: 1.5rem;"></i>
                                    <h4 class="text-primary fw-bold">{{ $hasil->jumlah_guru_lk }}</h4>
                                    <p class="card-text text-muted mb-0">Guru Laki-laki</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card text-center border-danger">
                                <div class="card-body">
                                    <i class="fas fa-female text-danger mb-2" style="font-size: 1.5rem;"></i>
                                    <h4 class="text-danger fw-bold">{{ $hasil->jumlah_guru_pr }}</h4>
                                    <p class="card-text text-muted mb-0">Guru Perempuan</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Data Murid -->
                    <div class="section-title">
                        <i class="fas fa-graduation-cap"></i>
                        <span>Data Murid - Ibtida'iyah dan Awaliyah/Ula</span>
                    </div>

                    <div class="mb-4">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="table-primary">
                                    <tr>
                                        <th rowspan="2" class="text-center align-middle" style="width: 100px;">KELAS</th>
                                        <th colspan="6" class="text-center">Ibtida'iyah dan Awaliyah/Ula</th>
                                        <th rowspan="2" class="text-center align-middle" style="width: 100px;">JUMLAH</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center">I</th>
                                        <th class="text-center">II</th>
                                        <th class="text-center">III</th>
                                        <th class="text-center">IV</th>
                                        <th class="text-center">V</th>
                                        <th class="text-center">VI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="fw-bold">Putera</td>
                                        <td class="text-center">{{ $hasil->jumlah_kelas_1_lk }}</td>
                                        <td class="text-center">{{ $hasil->jumlah_kelas_2_lk }}</td>
                                        <td class="text-center">{{ $hasil->jumlah_kelas_3_lk }}</td>
                                        <td class="text-center">{{ $hasil->jumlah_kelas_4_lk }}</td>
                                        <td class="text-center">{{ $hasil->jumlah_kelas_5_lk }}</td>
                                        <td class="text-center">{{ $hasil->jumlah_kelas_6_lk }}</td>
                                        <td class="text-center fw-bold bg-light">{{ $hasil->jumlah_murid_lk }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Puteri</td>
                                        <td class="text-center">{{ $hasil->jumlah_kelas_1_pr }}</td>
                                        <td class="text-center">{{ $hasil->jumlah_kelas_2_pr }}</td>
                                        <td class="text-center">{{ $hasil->jumlah_kelas_3_pr }}</td>
                                        <td class="text-center">{{ $hasil->jumlah_kelas_4_pr }}</td>
                                        <td class="text-center">{{ $hasil->jumlah_kelas_5_pr }}</td>
                                        <td class="text-center">{{ $hasil->jumlah_kelas_6_pr }}</td>
                                        <td class="text-center fw-bold bg-light">{{ $hasil->jumlah_murid_pr }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Jumlah</td>
                                        <td class="text-center">{{ $hasil->jumlah_kelas_1 }}</td>
                                        <td class="text-center">{{ $hasil->jumlah_kelas_2 }}</td>
                                        <td class="text-center">{{ $hasil->jumlah_kelas_3 }}</td>
                                        <td class="text-center">{{ $hasil->jumlah_kelas_4 }}</td>
                                        <td class="text-center">{{ $hasil->jumlah_kelas_5 }}</td>
                                        <td class="text-center">{{ $hasil->jumlah_kelas_6 }}</td>
                                        <td class="text-center fw-bold bg-light">{{ $hasil->jumlah_murid }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="section-title">
                        <i class="fas fa-users"></i>
                        <span>Informasi Tambahan</span>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Guru Tugas Yang Di Ajukan</label>
                            <div class="form-control-plaintext fw-bold">{{ $hasil->gt_yang_diajukan }}</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Rencana Mengajar kelas</label>
                            <div class="form-control-plaintext">{{ $hasil->rencana_mengajar_kelas }}</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Lain - Lain</label>
                            <div class="form-control-plaintext">{{ $hasil->lain_lain }}</div>
                        </div>
                    </div>
                    <div class="text-center d-flex justify-content-center">
                        <a href="{{ url('/pengajuan-gt/cetak/'.$hasil->id) }}" class="btn btn-danger me-3" id="resetBtn">
                            <i class="fas fa-print"></i> Cetak
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('madrasahForm');
            const resetBtn = document.getElementById('resetBtn');

            // Form validation
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                event.stopPropagation();

                if (form.checkValidity()) {
                    // Collect form data
                    const formData = new FormData(form);
                    const data = Object.fromEntries(formData);

                    // Here you would typically send data to server
                    console.log('Form Data:', data);

                    // Show success message
                    alert('Data berhasil disimpan!');
                } else {
                    // Show validation errors
                    form.classList.add('was-validated');
                }
            });

            // Reset form
            resetBtn.addEventListener('click', function() {
                if (confirm('Apakah Anda yakin ingin mereset semua data?')) {
                    form.reset();
                    form.classList.remove('was-validated');
                }
            });

            // Auto-calculate totals for table format
            function calculateTableTotals() {
                let totalPutera = 0;
                let totalPuteri = 0;

                // Calculate row totals (Putera and Puteri)
                for (let i = 1; i <= 6; i++) {
                    const lkValue = parseInt(document.getElementById(`jumlah_kelas_${i}_lk`).value) || 0;
                    const prValue = parseInt(document.getElementById(`jumlah_kelas_${i}_pr`).value) || 0;

                    totalPutera += lkValue;
                    totalPuteri += prValue;

                    // Update column total for each class
                    document.getElementById(`jumlah_kelas_${i}`).value = lkValue + prValue;
                }

                // Update row totals
                document.getElementById('jumlah_murid_lk').value = totalPutera;
                document.getElementById('jumlah_murid_pr').value = totalPuteri;
                document.getElementById('jumlah_murid').value = totalPutera + totalPuteri;
            }

            // Add event listeners for table inputs
            for (let i = 1; i <= 6; i++) {
                document.getElementById(`jumlah_kelas_${i}_lk`).addEventListener('input', calculateTableTotals);
                document.getElementById(`jumlah_kelas_${i}_pr`).addEventListener('input', calculateTableTotals);
            }

            // Auto-calculate total students when individual counts change
            function updateTotal(prefix) {
                const lkInput = document.getElementById(prefix + '_lk');
                const prInput = document.getElementById(prefix + '_pr');
                const totalInput = document.getElementById(prefix);

                if (lkInput && prInput && totalInput) {
                    const lk = parseInt(lkInput.value) || 0;
                    const pr = parseInt(prInput.value) || 0;
                    totalInput.value = lk + pr;
                }
            }

            // Add event listeners for auto-calculation (only for guru data now)
            ['jumlah_guru'].forEach(prefix => {
                const lkInput = document.getElementById(prefix + '_lk');
                const prInput = document.getElementById(prefix + '_pr');

                if (lkInput && prInput) {
                    lkInput.addEventListener('input', () => updateTotal(prefix));
                    prInput.addEventListener('input', () => updateTotal(prefix));
                }
            });

            // Phone number formatting
            const phoneInput = document.getElementById('no_telp');
            phoneInput.addEventListener('input', function() {
                // Remove non-numeric characters
                this.value = this.value.replace(/\D/g, '');
            });

            // Smooth scrolling for form sections
            document.querySelectorAll('.section-title').forEach(title => {
                title.style.cursor = 'pointer';
                title.addEventListener('click', function() {
                    this.scrollIntoView({ behavior: 'smooth', block: 'start' });
                });
            });
        });
    </script>
</body>
</html>
