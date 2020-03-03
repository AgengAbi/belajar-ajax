<?php

include 'koneksi.php';
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$sql = "UPDATE orang SET nama='$nama',alamat='$alamat' WHERE nama='".$_GET['nama']."'";
$result = mysqli_query($conn,$sql);
