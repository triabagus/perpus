<?php

$judul           = $_POST['judul_buku'];
$kode_peminjam	 = $_POST['nama_peminjam'];
$sql=mysql_query("select * from data_anggota where id = '$kode_peminjam'");
$data = mysql_fetch_array($sql);
$id = $data['id'];
$nama = $data['nama'];
$tgl_pinjam	     = $_POST['tgl_pinjam'];
$tgl_kembali 	 = $_POST['tgl_kembali'];
$keterangan	     = $_POST['keterangan'];

//if( empty($nama) || empty($jk) || empty($kelas) || empty($perlu) || empty($cari) || empty($saran) ){
    //echo "<b>Data Harus Di isi.!!!</b>";
//}else{

$query = mysql_query("INSERT INTO trans_pinjam(judul_buku, id_peminjam, nama_peminjam, tgl_pinjam, tgl_kembali, status, ket ) VALUES ('$judul', '$id', '$nama', '$tgl_pinjam','$tgl_kembali','pinjam', '$keterangan')");
if ($query){
	echo "<script>alert('Data Berhasil dimasukan!'); window.location = 'input-transaksi.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dimasukan!'); window.location = 'input-transaksi.php'</script>";	
}
?>