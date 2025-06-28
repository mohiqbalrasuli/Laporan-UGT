<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pengajuan Guru Tugas</title>
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
            .header h2, .header h3 {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="form-container">
            <div class="form-header d-flex align-items-center justify-content-center">
                <div class="header">
                    <h2>Formulir Pengajuan Guru Tugas</h2>
                    <h3>Pondok Pesantren Al-Usymuni</h3>
                    <p class="mb-0">Silakan lengkapi data madrasah dengan benar</p>
                </div>
            </div>

            <div class="form-body">
                <form id="madrasahForm" action="{{ url('pengajuan-gt/store') }}" method="POST">
                    @csrf
                    <!-- Informasi Madrasah -->
                    <div class="section-title">
                        <i class="fas fa-school"></i>
                        <span>Informasi Madrasah</span>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nama_madrasah" class="form-label">Nama Madrasah <span class="required">*</span></label>
                            <input type="text" class="form-control" id="nama_madrasah" name="nama_madrasah" required>
                            <div class="invalid-feedback">Nama madrasah harus diisi</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="no_telp" class="form-label">No. Telepon <span class="required">*</span></label>
                            <input type="tel" class="form-control" id="no_telp" name="no_telp" required>
                            <div class="invalid-feedback">No. telepon harus diisi</div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="alamat_madrasah" class="form-label">Alamat Madrasah <span class="required">*</span></label>
                        <textarea class="form-control" id="alamat_madrasah" name="alamat_madrasah" rows="3" required></textarea>
                        <div class="invalid-feedback">Alamat madrasah harus diisi</div>
                    </div>

                    <!-- Pengurus dan Pimpinan -->
                    <div class="section-title">
                        <i class="fas fa-users"></i>
                        <span>Pengurus dan Pimpinan</span>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nama_pjgt" class="form-label">Nama Penanggung Jawab <span class="required">*</span></label>
                            <input type="text" class="form-control" id="nama_pjgt" name="nama_pjgt" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="umur_pjgt" class="form-label">Umur Penanggung Jawab <span class="required">*</span></label>
                            <input type="number" class="form-control" id="umur_pjgt" name="umur_pjgt" min="20" max="100" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="kepala_madrasah" class="form-label">Kepala Madrasah <span class="required">*</span></label>
                            <input type="text" class="form-control" id="kepala_madrasah" name="kepala_madrasah" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="umur_kepala_madrasah" class="form-label">Umur Kepala Madrasah <span class="required">*</span></label>
                            <input type="number" class="form-control" id="umur_kepala_madrasah" name="umur_kepala_madrasah" min="20" max="100" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="ketua" class="form-label">Ketua <span class="required">*</span></label>
                            <input type="text" class="form-control" id="ketua" name="ketua" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="wakil_ketua" class="form-label">Wakil Ketua <span class="required">*</span></label>
                            <input type="text" class="form-control" id="wakil_ketua" name="wakil_ketua" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="sekretaris" class="form-label">Sekretaris <span class="required">*</span></label>
                            <input type="text" class="form-control" id="sekretaris" name="sekretaris" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="bendahara" class="form-label">Bendahara <span class="required">*</span></label>
                            <input type="text" class="form-control" id="bendahara" name="bendahara" required>
                        </div>
                    </div>

                    <!-- Kurikulum dan Pembelajaran -->
                    <div class="section-title">
                        <i class="fas fa-book"></i>
                        <span>Kurikulum dan Pembelajaran</span>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="madrasah_berada_di" class="form-label">Madrasah Berada Di <span class="required">*</span></label>
                            <select class="form-select" id="madrasah_berada_di" name="madrasah_berada_di" required>
                                <option value="" selected disabled>Pilih</option>
                                <option value="Dalam Pesantren">Dalam Pesantren</option>
                                <option value="Luar Pesantren">Luar Pesantren</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="kitab_yang_dibaca" class="form-label">Kitab Yang Dibaca <span class="required">*</span></label>
                            <select class="form-select" id="kitab_yang_dibaca" name="kitab_yang_dibaca" required>
                                <option value="" selected disabled>Pilih</option>
                                <option value="Memakai Makna">Memakai Makna</option>
                                <option value="Tidak Memakai Makna">Tidak Memakai Makna</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="bahasa_makna_kitab" class="form-label">Bahasa Makna Kitab <span class="required">*</span></label>
                            <select class="form-select" id="bahasa_makna_kitab" name="bahasa_makna_kitab" required>
                                <option value="" selected disabled>Pilih Bahasa</option>
                                <option value="Indonesia">Bahasa Indonesia</option>
                                <option value="Madura">Bahasa Madura</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="bahasa_pengantar_Pelajaran" class="form-label">Bahasa Pengantar Pelajaran <span class="required">*</span></label>
                        <select class="form-select" id="bahasa_pengantar_Pelajaran" name="bahasa_pengantar_Pelajaran" required>
                            <option value="" selected disabled>Pilih Bahasa</option>
                            <option value="Indonesia">Bahasa Indonesia</option>
                            <option value="Madura">Bahasa Madura</option>
                        </select>
                    </div>

                    <!-- Data Guru -->
                    <div class="section-title">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <span>Data Guru</span>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="jumlah_guru_lk" class="form-label">Guru Laki-laki <span class="required">*</span></label>
                            <input type="number" class="form-control" id="jumlah_guru_lk" name="jumlah_guru_lk" min="0" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="jumlah_guru_pr" class="form-label">Guru Perempuan <span class="required">*</span></label>
                            <input type="number" class="form-control" id="jumlah_guru_pr" name="jumlah_guru_pr" min="0" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="jumlah_guru" class="form-label">Jumlah Guru Total <span class="required">*</span></label>
                            <input type="number" class="form-control" id="jumlah_guru" name="jumlah_guru" min="0" readonly>
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
                                        <td><input type="number" class="form-control form-control-sm text-center" id="jumlah_kelas_1_lk" name="jumlah_kelas_1_lk" min="0" value="0"></td>
                                        <td><input type="number" class="form-control form-control-sm text-center" id="jumlah_kelas_2_lk" name="jumlah_kelas_2_lk" min="0" value="0"></td>
                                        <td><input type="number" class="form-control form-control-sm text-center" id="jumlah_kelas_3_lk" name="jumlah_kelas_3_lk" min="0" value="0"></td>
                                        <td><input type="number" class="form-control form-control-sm text-center" id="jumlah_kelas_4_lk" name="jumlah_kelas_4_lk" min="0" value="0"></td>
                                        <td><input type="number" class="form-control form-control-sm text-center" id="jumlah_kelas_5_lk" name="jumlah_kelas_5_lk" min="0" value="0"></td>
                                        <td><input type="number" class="form-control form-control-sm text-center" id="jumlah_kelas_6_lk" name="jumlah_kelas_6_lk" min="0" value="0"></td>
                                        <td><input type="number" class="form-control form-control-sm text-center fw-bold bg-light" id="jumlah_murid_lk" name="jumlah_murid_lk" readonly></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Puteri</td>
                                        <td><input type="number" class="form-control form-control-sm text-center" id="jumlah_kelas_1_pr" name="jumlah_kelas_1_pr" min="0" value="0"></td>
                                        <td><input type="number" class="form-control form-control-sm text-center" id="jumlah_kelas_2_pr" name="jumlah_kelas_2_pr" min="0" value="0"></td>
                                        <td><input type="number" class="form-control form-control-sm text-center" id="jumlah_kelas_3_pr" name="jumlah_kelas_3_pr" min="0" value="0"></td>
                                        <td><input type="number" class="form-control form-control-sm text-center" id="jumlah_kelas_4_pr" name="jumlah_kelas_4_pr" min="0" value="0"></td>
                                        <td><input type="number" class="form-control form-control-sm text-center" id="jumlah_kelas_5_pr" name="jumlah_kelas_5_pr" min="0" value="0"></td>
                                        <td><input type="number" class="form-control form-control-sm text-center" id="jumlah_kelas_6_pr" name="jumlah_kelas_6_pr" min="0" value="0"></td>
                                        <td><input type="number" class="form-control form-control-sm text-center fw-bold bg-light" id="jumlah_murid_pr" name="jumlah_murid_pr" readonly></td>
                                    </tr>
                                    <tr class="table-warning">
                                        <td class="fw-bold">Jumlah</td>
                                        <td><input type="number" class="form-control form-control-sm text-center fw-bold bg-warning" id="jumlah_kelas_1" name="jumlah_kelas_1" readonly></td>
                                        <td><input type="number" class="form-control form-control-sm text-center fw-bold bg-warning" id="jumlah_kelas_2" name="jumlah_kelas_2" readonly></td>
                                        <td><input type="number" class="form-control form-control-sm text-center fw-bold bg-warning" id="jumlah_kelas_3" name="jumlah_kelas_3" readonly></td>
                                        <td><input type="number" class="form-control form-control-sm text-center fw-bold bg-warning" id="jumlah_kelas_4" name="jumlah_kelas_4" readonly></td>
                                        <td><input type="number" class="form-control form-control-sm text-center fw-bold bg-warning" id="jumlah_kelas_5" name="jumlah_kelas_5" readonly></td>
                                        <td><input type="number" class="form-control form-control-sm text-center fw-bold bg-warning" id="jumlah_kelas_6" name="jumlah_kelas_6" readonly></td>
                                        <td><input type="number" class="form-control form-control-sm text-center fw-bold bg-success text-white" id="jumlah_murid" name="jumlah_murid" readonly></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Informasi Tambahan -->
                    <div class="section-title">
                        <i class="fas fa-info-circle"></i>
                        <span>Informasi Tambahan</span>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="gt_yang_diajukan" class="form-label">Guru Tetap yang Diajukan <span class="required">*</span></label>
                            <input type="number" class="form-control" id="gt_yang_diajukan" name="gt_yang_diajukan" min="0" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="rencana_mengajar_kelas" class="form-label">Rencana Mengajar Kelas <span class="required">*</span></label>
                            <input type="text" class="form-control" id="rencana_mengajar_kelas" name="rencana_mengajar_kelas" placeholder="Contoh: Kelas 1-3" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="lain_lain" class="form-label">Lain-lain</label>
                        <textarea class="form-control" id="lain_lain" name="lain_lain" rows="4" placeholder="Keterangan tambahan atau catatan khusus..."></textarea>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="text-center d-flex justify-content-center">
                        <button type="button" class="btn btn-secondary me-3" id="resetBtn">
                            <i class="fas fa-undo"></i> Reset Form
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('madrasahForm');
            const resetBtn = document.getElementById('resetBtn');

            // Reset form
            resetBtn.addEventListener('click', function() {
                if (confirm('Apakah Anda yakin ingin mereset semua data?')) {
                    form.reset();
                    form.classList.remove('was-validated');
                    calculateAllTotals();
                }
            });

            // Function to calculate totals for each class
            function calculateClassTotals() {
                for (let i = 1; i <= 6; i++) {
                    const lkInput = document.getElementById(`jumlah_kelas_${i}_lk`);
                    const prInput = document.getElementById(`jumlah_kelas_${i}_pr`);
                    const totalInput = document.getElementById(`jumlah_kelas_${i}`);

                    if (lkInput && prInput && totalInput) {
                        const lk = parseInt(lkInput.value) || 0;
                        const pr = parseInt(prInput.value) || 0;
                        totalInput.value = lk + pr;
                    }
                }
            }

            // Function to calculate total students by gender
            function calculateGenderTotals() {
                let totalLk = 0;
                let totalPr = 0;

                for (let i = 1; i <= 6; i++) {
                    const lkInput = document.getElementById(`jumlah_kelas_${i}_lk`);
                    const prInput = document.getElementById(`jumlah_kelas_${i}_pr`);

                    if (lkInput && prInput) {
                        totalLk += parseInt(lkInput.value) || 0;
                        totalPr += parseInt(prInput.value) || 0;
                    }
                }

                const totalLkInput = document.getElementById('jumlah_murid_lk');
                const totalPrInput = document.getElementById('jumlah_murid_pr');
                const grandTotalInput = document.getElementById('jumlah_murid');

                if (totalLkInput) totalLkInput.value = totalLk;
                if (totalPrInput) totalPrInput.value = totalPr;
                if (grandTotalInput) grandTotalInput.value = totalLk + totalPr;
            }

            // Function to calculate all totals
            function calculateAllTotals() {
                calculateClassTotals();
                calculateGenderTotals();
            }

            // Add event listeners for student count inputs
            for (let i = 1; i <= 6; i++) {
                const lkInput = document.getElementById(`jumlah_kelas_${i}_lk`);
                const prInput = document.getElementById(`jumlah_kelas_${i}_pr`);

                if (lkInput) lkInput.addEventListener('input', calculateAllTotals);
                if (prInput) prInput.addEventListener('input', calculateAllTotals);
            }

            // Auto-calculate total teachers
            function updateTeacherTotal() {
                const lkInput = document.getElementById('jumlah_guru_lk');
                const prInput = document.getElementById('jumlah_guru_pr');
                const totalInput = document.getElementById('jumlah_guru');

                if (lkInput && prInput && totalInput) {
                    const lk = parseInt(lkInput.value) || 0;
                    const pr = parseInt(prInput.value) || 0;
                    totalInput.value = lk + pr;
                }
            }

            // Add event listeners for teacher count inputs
            const teacherLkInput = document.getElementById('jumlah_guru_lk');
            const teacherPrInput = document.getElementById('jumlah_guru_pr');

            if (teacherLkInput) teacherLkInput.addEventListener('input', updateTeacherTotal);
            if (teacherPrInput) teacherPrInput.addEventListener('input', updateTeacherTotal);

            // Phone number formatting
            const phoneInput = document.getElementById('no_telp');
            phoneInput.addEventListener('input', function() {
                this.value = this.value.replace(/\D/g, '');
            });

            // Initialize calculations on page load
            calculateAllTotals();
        });
    </script>
</body>
</html>
