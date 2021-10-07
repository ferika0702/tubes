<?php
include "koneksi.php";

$id=$_POST['id'];
$nama=$_POST['nama'];
$password=md5($_POST['password']) ;
$email=$_POST['email'];
$nomor=$_POST['nomor'];

$sql="INSERT INTO user (id,nama,password,email,nomor) VALUES 
('$id','$nama','$password','$email','$nomor')";

if(mysqli_query($connect, $sql)){
	?>
	"Berhasil membuat akun";
	<a href="halamanLogin.html">Login kembali</a>
	<?php
}else{
	echo "silahkan daftar ulang".mysqli_error($connect);

}
mysqli_close($connect);
?>