<?php
    $arrJudul = ['No', 'NIM', 'Nama', 'Nilai', 'Keterangan', 'Grade', 'Predikat'];

    $m1 = ['nim' => '0110219001', 'nama' => 'mahasiswa1', 'nilai' => 44];
    $m2 = ['nim' => '0110219002', 'nama' => 'mahasiswa2', 'nilai' => 61];
    $m3 = ['nim' => '0110219003', 'nama' => 'mahasiswa3', 'nilai' => 100];
    $m4 = ['nim' => '0110219004', 'nama' => 'mahasiswa4', 'nilai' => 95];
    $m5 = ['nim' => '0110219005', 'nama' => 'mahasiswa5', 'nilai' => 33];
    $m6 = ['nim' => '0110219006', 'nama' => 'mahasiswa6', 'nilai' => 26];
    $m7 = ['nim' => '0110219007', 'nama' => 'mahasiswa7', 'nilai' => 89];
    $m8 = ['nim' => '0110219008', 'nama' => 'mahasiswa8', 'nilai' => 42];
    $m9 = ['nim' => '0110219009', 'nama' => 'mahasiswa9', 'nilai' => 72];
    $m10 = ['nim' => '011021910', 'nama' => 'mahasiswa10', 'nilai' => 80];

    $mahasiswa = [$m1, $m2, $m3, $m4, $m5, $m6, $m7, $m8, $m9, $m10];

    $totalMahasiswa = count($mahasiswa);
    $jumlahNilai = array_column($mahasiswa, 'nilai');
    $nilaiTertinggi = max($jumlahNilai);
    $nilaiTerendah = min($jumlahNilai);
    $totalNilai = array_sum($jumlahNilai);
    $nilaiRataRata = $totalNilai / $totalMahasiswa;

    $result = [
        'Nilai Tertinggi' => $nilaiTertinggi,
        'Nilai Terendah' => $nilaiTerendah,
        'Nilai Rata-rata' => $nilaiRataRata,
        'Jumlah Mahasiswa' => $totalMahasiswa
    ]
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Nilai Mahasiswa</title>

    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <div class="container py-5">
        <h1 class="text-center mb-5">Data Mahasiswa</h1>

        <!-- table -->
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive mb-4" style="max-height: 300px;">
                    <table class="table table-striped mb-0 sticky">
                        <thead>
                            <tr>
                                <?php foreach ($arrJudul as $judul) { ?>
                                    <th><?= $judul ?></th>
                                <?php } ?>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                $number = 1;

                                foreach ($mahasiswa as $mhs){
                                    $nilai = $mhs['nilai'];
                                    $keterangan = ($nilai >= 60) ? "<span class='badge rounded-pill text-bg-success'>Lulus</span>" : 
                                                                    "<span class='badge rounded-pill text-bg-danger'>Tidak Lulus</span>";

                                    if ($nilai >= 85 && $nilai <= 100) $grade = 'A';
                                    else if ($nilai >= 75 && $nilai < 85) $grade = 'B';
                                    else if ($nilai >= 60 && $nilai < 75) $grade = 'C';
                                    else if ($nilai >= 30 && $nilai < 60) $grade = 'D';
                                    else if ($nilai >= 0 && $nilai < 30) $grade = 'E';
                                    else $grade = '';

                                    switch ($grade) {
                                        case 'A': $predikat = 'Memuaskan'; break;
                                        case 'B': $predikat = 'Baik'; break;
                                        case 'C': $predikat = 'Cukup'; break;
                                        case 'D': $predikat = 'Kurang'; break;
                                        case 'E': $predikat = 'Buruk'; break;
                                        default: $predikat = 'Buruk';
                                    }
                            ?>
                                <tr bgcolor="white">
                                    <td><?= $number++ ?></td>
                                    <td><?= $mhs['nim'] ?></td>
                                    <td><?= $mhs['nama'] ?></td>
                                    <td><?= $mhs['nilai'] ?></td>
                                    <td><?= $keterangan ?></td>
                                    <td><?= $grade ?></td>
                                    <td><?= $predikat ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

                <!-- hasil -->
                <?php foreach ($result as $key => $value) { ?>
                    <ul class="list-group mb-2">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?= $key ?>
                            <span class="badge rounded-pill text-bg-dark"><?= $value ?></span>
                        </li>
                    </ul>
                <?php } ?>
            </div>
        </div>
    </div>


    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>