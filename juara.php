<?php
    require 'connectMVC.php';
    
    $club = view("SELECT * FROM club ORDER BY jumlahSkor DESC, jumlahGol DESC LIMIT 1");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleJuara.css">
    <title>Klub Juara</title>
</head>
<body>

    <h1>Juara Liga PW</h1>

    <table border="1" cellpadding="10" cellspacing="0" align=center>
        <tr>
            <th>Nama Klub</th>
            <th>Jumlah Skor</th>
            <th>Jumlah Gol</th>
        </tr>    

        <?php foreach($club as $row):?>
        <tr>
            <td><?= $row["namaClub"]; ?></td>
            <td><?= $row["jumlahSkor"]; ?></td>
            <td><?= $row["jumlahGol"]; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h1>Selamat kepada Klub <?= $row["namaClub"]; ?></h1>
    
    <br> <br>

    <div class="button">
    <input type="button" value="Go Back" onclick="history.back(-1)" />
    </div>

</body>
</html>
