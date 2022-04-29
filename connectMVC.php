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
    // addGol($lawan1, $gol1);
    // addGol($lawan2, $gol2);

}

function addGol($namaklub, $gol){
    global $conn;
    $totalGol = ($conn->query("SELECT jumlahGol FROM club WHERE namaClub='$namaklub'")) + $gol;
    $rs = $conn->query("UPDATE club SET jumlahGol='$totalGol' WHERE namaClub='$namaklub'");
}

function add($data) {
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $query = "INSERT INTO club VALUES ('', '$nama', 0, 0)";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}