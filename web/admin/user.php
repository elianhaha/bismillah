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
function delete($id)
{
    global $connect;
    mysqli_query($connect, "DELETE FROM register WHERE id = '$id'");
    return mysqli_affected_rows($connect);
}
