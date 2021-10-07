<?php
include "koneksi.php";

$nama=$_GET['nama'];
$email=$_GET['email'];
$nomor=$_GET['nomor'];

$query="UPDATE user SET nama='$nama', email='$email',nomor='$nomor' WHERE id='id'";
$result=mysqli_query($connect, $query);

if($result){
	echo "Berhasil update date ke database";
	?>
	<a href="edit.php">Liat table lagi</a>
	<?php
}else{
	echo "Gagal update data".mysqli_error($connect);
}
?>