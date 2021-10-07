<?php
include "koneksi.php";

$id=$_GET['id'];
$query="DELETE FROM user WHERE id='$id'";
$result=mysqli_query($connect, $query);

if($result){
	echo "Data berhasil dihapus";
	?>
	<a href="edit.php">Lihat data di Tabel</a>
	<?php
}else{
	echo "Data gagal dihapus".mysqli_error($connect);
}
?>