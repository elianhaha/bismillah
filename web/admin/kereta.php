<?php
$connect = mysqli_connect('localhost', 'root', '', 'test');

function query($query)
{
    global $connect;
    $result = mysqli_query($connect, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambahkereta($data)
{
    global $connect;
    $nama_kereta = $data['nama_kereta'];
    $berangkat = $data['berangkat'];
    $jam_berangkat = $data['jam_berangkat'];
    $tujuan = $data['tujuan'];
    $jam_tujuan = $data['jam_tujuan'];
    $harga = $data['harga'];

    mysqli_query($connect, "INSERT INTO kereta VALUES('','$nama_kereta','$berangkat','$jam_berangkat','$tujuan','$jam_tujuan',$harga)");
}

function search($keyword)
{
    $query = "SELECT * FROM kereta WHERE nama_kereta LIKE '%$keyword%' OR
                                        berangkat LIKE '%$keyword%' OR
                                        tujuan LIKE '%$keyword%'";
    return query($query);
}
function delete($id)
{
    global $connect;
    mysqli_query($connect, "DELETE FROM kereta WHERE id = '$id'");
    return mysqli_affected_rows($connect);
}
