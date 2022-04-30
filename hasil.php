<?php
    require 'connectMVC.php';
    
    $jadwal = view("SELECT * FROM jadwal");

    if(isset($_POST["submit"])) {
        if(gol($_POST) > 0) {
            echo "
                <script>
                alert('data berhasil ditambahkan');
                document.location.href = 'index.php'
                </script>
            ";
        } else {
            echo "
                <script>
                alert('data gagal ditambahkan');
                </script>
            ";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleHasil.css">
    <title>Input Skor pertandingan</title>
</head>
<body>

    <h1>Input Skor sepak bola</h1>

    <table border="1" cellpadding="10" cellspacing="0" align=center>
        <tr>
            <th>No.</th>
            <th>Jadwal</th>
            <th>Gol</th>
        </tr>    

        <?php $i = 1; ?>
        <?php foreach($jadwal as $row):
            if($row["istanding"]==0){
            ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $row["lawan1"];?> VS <?= $row["lawan2"];?></td>
            <td>
                <form action="" method="post">
                    <input type="number" name="gol1" required>
                    <h3>VS</h3>
                    <input type="number" name="gol2" required>
                    <br><br>
                    <input type="hidden" name="">
                    <input type="hidden" name="lawan1" value="<?= $row["lawan1"];?>">
                    <input type="hidden" name="lawan2" value="<?= $row["lawan2"];?>">
                    <input type="hidden" name="id" value="<?= $row["id"];?>">
                    <button type="submit" name="submit">Submit</button>
                </form>
            </td>
        </tr>
        <?php $i++; }endforeach; ?>
    </table>

    <br><br>

    <h1>Pertandingan yang selesai</h1>
    <table border="1" cellpadding="10" cellspacing="0" align=center>
        <tr>
            <th>No.</th>
            <th>Jadwal</th>
            <th>Hasil</th>
        </tr>    

        <?php $i = 1; ?>
        <?php foreach($jadwal as $row):
            if($row["istanding"]==1){
            ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $row["lawan1"];?> VS <?= $row["lawan2"];?></td>
            <td><?= $row["gol1"];?> — <?= $row["gol2"];?></td>
        </tr>
        <?php $i++; }endforeach; ?>
    </table>
    <br> <br>

    <div class="button">
    <input type="button" value="Go Back" onclick="history.back(-1)" />
    </div>
</body>
</html>
