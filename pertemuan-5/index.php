<?php
    require_once 'Lingkaran.php';
    require_once 'PersegiPanjang.php';
    require_once 'Segitiga.php';

    $lingkaran = new Lingkaran('5');
    $persegi_panjang = new PersegiPanjang('10', '20');
    $segitiga = new Segitiga('5', '12', '16', '18');

    $bidang = [$lingkaran, $persegi_panjang, $segitiga];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
</head>
<body>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">no</th>
          <th scope="col">Nama Bidang</th>
          <th scope="col">Keliling</th>
          <th scope="col">Luas</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $number = 1;
          foreach ($bidang as $bd){
        ?>
          <tr>
            <td><?= $number++ ?></td>
            <td><?= $bd->namaBidang() ?></td>
            <td><?= $bd->kelilingBidang() ?></td>
            <td><?= $bd->luasBidang() ?></td>
          </tr>
        <?php } ?>
          </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>