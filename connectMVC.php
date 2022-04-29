<?php
    $conn = new mysqli('localhost', 'root', '', 'ligapw');

function add($data) {
    global $conn;
    $nama = $data["nama"];
    $query = "INSERT INTO club VALUES ('', '$nama', 0, 0)";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
