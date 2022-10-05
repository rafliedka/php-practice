<?php
require 'Pegawai.php';
//ciptakan object
$pegawai1 = new Pegawai('001','Pegawai1','Manager','Kristen Katholik','Belum Menikah');
$pegawai2 = new Pegawai('011','pegawai2','Asisten Manager','Islam','Menikah');
$pegawai3 = new Pegawai('007','pegawai3','Kepala Bagian','Islam','Belum menikah');
$pegawai4 = new Pegawai('201','pegawai4','Staff','Hindu','Belum menikah');
$pegawai5 = new Pegawai('111','pegawai5','Asisten Manager','Kristen Katholik','Belum menikah');

//cetak struktur gaji
echo '<h3 align="center">'.Pegawai::PT.'</h3>';
$pegawai1->mencetak();
$pegawai2->mencetak();
$pegawai3->mencetak();
$pegawai4->mencetak();
$pegawai5->mencetak();
echo 'Jumlah Pegawai: '.Pegawai::$jml;