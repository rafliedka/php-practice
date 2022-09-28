<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Data Gaji Pegawai</title>

    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- custom css -->
    <link rel="stylesheet" href="src/css/style.css">
</head>

<body>
    <div class="container">
        <h3 class="text-center mt-5">Form Input Data Gaji Pegawai</h3>
        <hr />

        <!-- form -->
        <form class="row g-3" method="POST">
            <!-- nama pegawai -->
            <div class="col-md-6">
                <label for="inputName" class="form-label fw-semibold">Nama Pegawai <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="inputName" name="nama" autocomplete="off" required />
            </div>

            <!-- agama -->
            <div class="col-md-6">
                <label for="inputAgama" class="form-label fw-semibold">Agama <span class="text-danger">*</span></label>
                <select id="inputAgama" name="agama" class="form-select" required>
                    <option value="" selected>-- Pilih Agama --</option>
                    <option value="islam">Islam</option>
                    <option value="kristen">Kristen</option>
                    <option value="katolik">Katolik</option>
                    <option value="hindu">Hindu</option>
                    <option value="budha">Budha</option>
                </select>
            </div>

            <!-- jabatan -->
            <div class="col-md-6">
                <label class="form-label d-block fw-semibold">Jabatan <span class="text-danger">*</span></label>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" id="manager" type="radio" name="jabatan" value="Manager" required />
                    <label class="form-check-label" for="manager">Manager</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" id="asisten" type="radio" name="jabatan" value="Asisten" required />
                    <label class="form-check-label" for="asisten">Asisten</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" id="kabag" type="radio" name="jabatan" value="Kepala Bagian" required />
                    <label class="form-check-label" for="kabag">Kepala Bagian</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" id="staff" type="radio" name="jabatan" value="Staff" required />
                    <label class="form-check-label" for="staff">Staff</label>
                </div>
            </div>

            <!-- status -->
            <div class="col-md-6">
                <label class="form-label d-block fw-semibold">Status <span class="text-danger">*</span></label>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" id="menikah" type="radio" name="status" value="Menikah" required />
                    <label class="form-check-label" for="menikah">Menikah</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" id="belumMenikah" type="radio" name="status" value="Belum Menikah" required />
                    <label class="form-check-label" for="belumMenikah">Belum Menikah</label>
                </div>
            </div>

            <!-- jumlah anak -->
            <div class="col-12">
                <label for="inputjmlanak" class="form-label fw-semibold">Jumlah Anak</label>
                <input type="text" class="form-control" id="inputjmlanak" name="jmlanak" autocomplete="off" />
            </div>

            <!-- button submit -->
            <div class="col-12">
                <button type="submit" name="proses" class="btn btn-sm btn-primary">Simpan</button>
            </div>
        </form>

        <?php
            // tangkap request value
            $nama = $_POST['nama'];
            $agama = $_POST['agama'];
            $jabatan = $_POST['jabatan'];
            $status = $_POST['status'];
            $jumlahAnak = $_POST['jmlanak'];
            $tombol = $_POST['proses'];

            // menentukan gaji pokok
            switch ($jabatan) {
                case "Manager": $gajiPokok = 20000000; break;
                case "Asisten": $gajiPokok = 15000000; break;
                case "Kepala Bagian": $gajiPokok = 10000000; break;
                case "Staff": $gajiPokok = 4000000; break;
                default: $gajiPokok = 0; break;
            }

            // menentukan tunjangan keluarga
            if ($status == "Menikah" && $jumlahAnak <= 2) $tunjanganKeluarga = $gajiPokok * 5 / 100;
            else if ($status == "Menikah" && $jumlahAnak <= 5) $tunjanganKeluarga = $gajiPokok * 10 / 100;
            else if ($status == "Menikah" && $jumlahAnak > 5) $tunjanganKeluarga = $gajiPokok * 15 / 100;
            else $tunjanganKeluarga = 0;

            // menentukan tunjangan jabatan, gaji kotor, zakat dan gaji bersih
            $tunjanganJabatan = $gajiPokok * 20 / 100;
            $gajiKotor = $gajiPokok + $tunjanganJabatan + $tunjanganKeluarga;
            $zakatProfesi = $agama == "islam" && $gajiKotor >= 6000000 ? $gajiKotor * 2.5 / 100 : 0;
            $gajiBersih = $gajiKotor - $zakatProfesi;

            if (isset($tombol)) { 
        ?>
            <div class="table-responsive rounded my-5">
                <table class="table table-bordered mb-2">
                    <thead>
                        <tr bgcolor="#fde047">
                            <th>Nama Pegawai</th>
                            <th>Jabatan</th>
                            <th>Agama</th>
                            <th>Status</th>
                            <th>Jumlah Anak</th>
                            <th>Gaji Pokok</th>
                            <th>Tunjangan Jabatan</th>
                            <th>Tunjangan Keluarga</th>
                            <th>Gaji Kotor</th>
                            <th>Zakat Profesi</th>
                            <th>Take Home Pay</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr bgcolor="#fefce8">
                            <td><?= $nama; ?> </td>
                            <td><?= $jabatan; ?></td>
                            <td><?= $agama; ?></td>
                            <td><?= $status; ?></td>
                            <td><?= $jumlahAnak; ?></td>
                            <td><?= 'Rp ',number_format($gajiPokok, 2, ',', '.'); ?></td>
                            <td><?= 'Rp ',number_format($tunjanganJabatan, 2, ',', '.'); ?></td>
                            <td><?= 'Rp ',number_format($tunjanganKeluarga, 2, ',', '.'); ?></td>
                            <td><?= 'Rp ',number_format($gajiKotor, 2, ',', '.'); ?></td>
                            <td><?= 'Rp ',number_format($zakatProfesi, 2, ',', '.'); ?></td>
                            <td><?= 'Rp ',number_format($gajiBersih, 2, ',', '.'); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        <?php } else { ?>
            <div class="alert alert-warning my-5" role="alert">
                Data belum dibuat..!
            </div>
        <?php } ?>
    </div>


    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>