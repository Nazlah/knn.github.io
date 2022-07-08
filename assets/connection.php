<?php
// kalau pakai offline
// $db = new mysqli("localhost","root","","db_knn");

// kalau hosting
$db = new mysqli("sql203.ezyro.com","ezyro_32127337","k0y0l4","ezyro_32127337_nazlah");

// cek koneksi
if ($db->connect_error) {
	echo "Gagal menyambungkan ke MySQL : ".$db->connect_error;
	exit();
}
?>