<?php
    $conn = new mysqli('localhost', 'root', '', 'ligapw');

function view($q) {
    global $conn;
    $result = mysqli_query($conn, $q);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function jadwal($data) {
    global $conn;
    $club1 = htmlspecialchars($data["lawan1"]);
    $club2 = htmlspecialchars($data["lawan2"]);
    $query = "INSERT INTO jadwal VALUES ('', '$club1', '$club2','','','')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function gol($data) {
    global $conn;
    $gol1 = htmlspecialchars($data["gol1"]);
    $gol2 = htmlspecialchars($data["gol2"]);
    $lawan1 = htmlspecialchars($data["lawan1"]);
    $lawan2 = htmlspecialchars($data["lawan2"]);
    $id = htmlspecialchars($data["id"]);

    $query1 = "UPDATE club SET jumlahGol=jumlahGol+$gol1 WHERE namaClub='$lawan1'";
    mysqli_query($conn, $query1);

    $query2 = "UPDATE club SET jumlahGol=jumlahGol+$gol2 WHERE namaClub='$lawan2'";
    mysqli_query($conn, $query2);

    if($gol1 > $gol2) {
        $query3 = "UPDATE club SET jumlahSkor=jumlahSkor+3 WHERE namaClub='$lawan1'";
        mysqli_query($conn, $query3);
    } else if ($gol1 == $gol2) {
        $query3 = "UPDATE club SET jumlahSkor=jumlahSkor+1 WHERE namaClub='$lawan1'";
        $query4 = "UPDATE club SET jumlahSkor=jumlahSkor+1 WHERE namaClub='$lawan2'";
        mysqli_query($conn, $query3);
        mysqli_query($conn, $query4);
    } else {
        $query3 = "UPDATE club SET jumlahSkor=jumlahSkor+3 WHERE namaClub='$lawan2'";
        mysqli_query($conn, $query3);
    }

    $query5 = "UPDATE jadwal SET gol1=$gol1, gol2=$gol2, istanding=1 where id=$id";
    mysqli_query($conn, $query5);

    return mysqli_affected_rows($conn);
}

function add($data) {
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $query = "INSERT INTO club VALUES ('$nama', 0, 0)";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
