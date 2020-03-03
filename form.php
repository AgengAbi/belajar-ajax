<!DOCTYPE html>
<html>
	<head>
		<title>Form</title>
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	</head>
	<body>
		<form action="form.php" method="POST">
			Nama <input type="text" name="nama"><br>
			Alamat <input type="text" name="alamat"><br>
			<input type="submit" value="kirim">
		</form>
	</body>
</html>

<?php
// echo '<pre>';
// print_r($_POST);

$servername = "localhost";
$username = "root";
$password = "";
$database = "belajar";

$conn = mysqli_connect($servername,$username,$password,$database);

if(!$conn){
	die("Connection failed : " .mysqli_connect_error());
}
// echo "Connection successfull";

$sql = "SELECT * FROM orang";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		echo $row['nama']." ".$row['alamat']. "<br>";
	}
}

if (isset($_POST['nama'])) {
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$sql = "INSERT INTO orang VALUES ('$nama','$alamat')";

	if(mysqli_query($conn,$sql)){
		echo "Berhasil Memasukan Data";
	} else {
		echo "Error Memasukan Data <br>" .mysql_error($conn);
	}
}

mysqli_close($conn);

?>