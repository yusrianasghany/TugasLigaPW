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
    $query = "INSERT INTO jadwal VALUES ('', '$club1', '$club2')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function gol($data) {
    global $conn;
    $gol1 = htmlspecialchars($data["gol1"]);
    $gol2 = htmlspecialchars($data["gol2"]);
    $lawan1 = htmlspecialchars($data["lawan1"]);
    $lawan2 = htmlspecialchars($data["lawan2"]);
    $totalGol1 = (int) "SELECT jumlahGol FROM club WHERE namaClub='$lawan1'" + $gol1;
    $query1 = "UPDATE club SET jumlahGol='$totalGol1' WHERE namaClub='$lawan1'";
    mysqli_query($conn, $query1);

    $totalGol2 = (int) "SELECT jumlahGol FROM club WHERE namaClub='$lawan2'" + $gol2;
    $query2 = "UPDATE club SET jumlahGol='$totalGol2' WHERE namaClub='$lawan2'";
    mysqli_query($conn, $query2);

    if($gol1 > $gol2) {
        $skorTambah = (int) "SELECT jumlahSkor FROM club WHERE namaClub='$lawan1'" + 3;
        $query3 = "UPDATE club SET jumlahSkor='$skorTambah' WHERE namaClub='$lawan1'";
        mysqli_query($conn, $query3);
    } else if ($gol1 == $gol2) {
        $skorTambah1 = (int) "SELECT jumlahSkor FROM club WHERE namaClub='$lawan1'" + 1;
        $skorTambah2 = (int) "SELECT jumlahSkor FROM club WHERE namaClub='$lawan2'" + 1;
        $query3 = "UPDATE club SET jumlahSkor='$skorTambah1' WHERE namaClub='$lawan1'";
        $query4 = "UPDATE club SET jumlahSkor='$skorTambah2' WHERE namaClub='$lawan2'";
        mysqli_query($conn, $query3);
        mysqli_query($conn, $query4);
    } else {
        $skorTambah = (int) "SELECT jumlahSkor FROM club WHERE namaClub='$lawan2'" + 3;
        $query3 = "UPDATE club SET jumlahSkor='$skorTambah' WHERE namaClub='$lawan2'";
        mysqli_query($conn, $query3);
    }

    return mysqli_affected_rows($conn);
}



// function addGol($namaklub, $gol){
//     global $conn;
//     $totalGol = "SELECT jumlahGol FROM club WHERE namaClub='$namaklub'" + $gol;
//     $query = "UPDATE club SET jumlahGol=$totalGol WHERE namaClub=$namaklub";
//     mysqli_query($conn, $query);
// }

function add($data) {
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $query = "INSERT INTO club VALUES ('', '$nama', 0, 0)";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
