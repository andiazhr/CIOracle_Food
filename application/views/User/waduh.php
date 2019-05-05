<?php
include"tanggal.php";
//SOURCE atau TANGGAL YANG AKAN DIRUBAH
$tanggal_indo = "31/03/2013";
$tanggal_jam_indo = "31/03/2013 12:13:55";
echo "Format Tanggal Indo : ". $tanggal_indo;
echo "<br><br>";
echo "Format Tanggal dan Jam Indo : ". $tanggal_jam_indo;
echo "<br><br><hr>";
//HASIL KONVERSI
echo "Hasil Ubah Format tanggal indonesia ke SQL : ".format_indotosql($tanggal_indo);
echo "<br><br>";
echo "Hasil Ubah ke Format Formal/biasa, cth. 31 Maret 2013 : ".format_date($tanggal_indo);
echo "<br><br>";
echo "Ambil Tanggal Sekarang : ".get_now();
echo "<br><br>";
echo "Ambil Tanggal dan jam sekarang : ".datetime_now();
echo "<br><br>";
echo "Ubah Tanggal dan waktu Indonesia ke Format SQL : ".format_datetime_sql($tanggal_jam_indo);
echo "<br><br>";
echo "Ubah Tanggal dan waktu SQL sekarang ke Format Formal/biasa : ".format_datetime_indo(datetime_now());
?>

Kalau sudah silahkan eksekusi dan lihat hasilnya.