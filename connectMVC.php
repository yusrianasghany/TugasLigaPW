<?php
    $conn = new mysqli('localhost', 'root', '', 'ligapw');

function view($q) {
    global $conn;
    $result = mysqli_query($conn, $q);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    $tes = 10;
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

function add($data) {
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $query = "INSERT INTO club VALUES ('', '$nama', 0, 0)";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
