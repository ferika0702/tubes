<html>
<head>
	<link rel="stylesheet" type="text/css" href="edit.css">
</head>
<body>
	<table>
		<tr>
			<th>ID</th>
			<th>Nama</th>
			<th>Email</th>
			<th>No.Hp</th>
		</tr>
		<?php
		include "koneksi.php";

		$query="SELECT * FROM user";
		$result=mysqli_query($connect, $query);

		if(mysqli_num_rows($result) > 0){
			while($row=mysqli_fetch_assoc($result)){
				?>
				<tr>
					<td> <?php echo $row["id"] ?> </td>
					<td> <?php echo $row["nama"] ?> </td>
					<td> <?php echo $row["email"] ?> </td>
					<td> <?php echo $row["nomor"] ?> </td>

					<td>
						<a href="editForm.php?id=<?php echo $row['id']; ?>">Edit</a>
						<a href="hapus.php?id=<?php echo $row['id']; ?>">Hapus</a>
					</td>
					<h2><a href="TugasWeb.html">Kembali ke Home</a></h2>
				</tr>
				<?php
			}
		}
		else{
			echo "0 result";
		}
		?>
	</table>
</body>
</html>