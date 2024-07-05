<?php

//render halaman menjadi json
header('Conten-Type: application/json');

require '../config/app.php';

$query = select("SELECT * FROM barang");

echo json_encode(['data_barang' => $query]);