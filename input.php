<?php
    require 'connectMVC.php';
    
    if(isset($_POST["submit"])) {
        if(add($_POST) > 0) {
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
    <link rel="stylesheet" href="styleInput.css">
    <title>Input Klub</title>
</head>
<body>
<h1>Masukkan data klub sepak bola</h1>

<form action="" method="post">
<br> 
<br> 
    <label for="nama">Nama Klub </label>
    <input type="text" name="nama" id="nama" required>
    <br>
    <button type="submit" name="submit">Add</button>
    <input type="button" value="Go Back" onclick="history.back(-1)" />

</form>
    
</body>
</html>
