<html>
<head>
</head>
<body>
	<?php
	include "koneksi.php";
	$id=$_GET['id'];
	$query="SELECT * FROM user WHERE id='$id'";
	$result=mysqli_query($connect, $query);
	?>
	<form action="prosesEdit.php" method="GET">
		<table>
			<?php
			while($row=mysqli_fetch_array($result)){
			?>
			<tr>
				<td>Id : </td>
				<td><input type="text" name="id" value="<?php echo $row['id'];?>">
				</tr>
				<tr>
					<td>Nama : </td>
					<td><input type="text" name="nama" value="<?php echo $row['nama']; ?>"></td>
				</tr>
				<tr>
					<td>Email : </td>
					<td><input type="text" name="email" value="<?php echo $row['email']; ?>"></td>
				</tr>
				<tr>
					<td>No.Hp : </td>
					<td><input type="text" name="nomor" value="<?php echo $row['nomor']; ?>"></td>
				</tr>
				<tr>
					<td> <input type="submit" name="simpan" value="Simpan"> </td>
				</tr>
				</td> <!-- aneh -->
			</tr>
			<?php	
			}
			?>
		</table>
	</form>
</body>
</html>