<?php
    require 'connectMVC.php';
    
    $club = view("SELECT namaClub FROM club");

    if(isset($_POST["submit"])) {
        if(jadwal($_POST) > 0) {
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
    <title>Jadwal Klub</title>
</head>
<body>

    <h1>Daftar Club sepak bola</h1>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Nama Klub</th>
        </tr>    

        <?php $i = 1; ?>
        <?php foreach($club as $row):?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $row["namaClub"]; ?></td>
        </tr>
        <?php $i++; endforeach; ?>
    </table>

    <br>

    <h2>Masukkan jadwal pertandingan</h2>

    <form action="" method="post">
        <label for="lawan1">Klub pertama</label>
        <input type="text" name="lawan1" id="lawan1" required>
        <h3>VS</h3>
        <label for="lawan2">Klub pertama</label>
        <input type="text" name="lawan2" id="lawan2" required>
        <br>
        <br>
        <button type="submit" name="submit">Add</button>
    </form>
    
</body>
</html>