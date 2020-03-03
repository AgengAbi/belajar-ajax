<?php

include 'koneksi.php';

$sql = "DELETE FROM orang WHERE nama='".$_GET['nama']."'";
$result = mysqli_query($conn,$sql);
