<?php
$mysqli = new mysqli("127.0.0.1", "root", "", "hdcevents");

if ($mysqli->connect_errno) {
    echo "Falha na conexão: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
} else {
    echo "Conexão funcionando perfeitamente!";
}
?>