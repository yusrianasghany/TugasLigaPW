<?php
    require 'connectMVC.php';
    
    $club = view("SELECT * FROM club ORDER BY jumlahSkor DESC");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peringkat Klasemen</title>
</head>
<body>

    <h1>Peringkat Klasemen Sementara</h1>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Nama Klub</th>
            <th>Jumlah Skor</th>
            <th>Jumlah Gol</th>
        </tr>    

        <?php $i = 1; ?>
        <?php foreach($club as $row):?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $row["namaClub"]; ?></td>
            <td><?= $row["jumlahSkor"]; ?></td>
            <td><?= $row["jumlahGol"]; ?></td>
        </tr>
        <?php $i++; endforeach; ?>
    </table>

    <br>
    
</body>
</html>