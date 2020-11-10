<?php
error_reporting(0);
require_once 'config.php';
$response = array();

 if (empty($_POST['nama_lengkap']) || empty($_POST['alamat']) || empty($_POST['no_telpon']) ) 
    {
        $response["success"] = 0;
        $response["message"] = "Pastikan semua data terisi!";
        echo json_encode($response);	
	} else {

        $id_biodata = $_POST['id_biodata'];
        $nama_lengkap = $_POST['nama_lengkap'];
        $alamat = $_POST['alamat'];
        $no_telpon = $_POST['no_telpon'];

        $sql = "UPDATE t_biodata SET nama_lengkap = '$nama_lengkap', alamat = '$alamat', no_telpon = '$no_telpon' WHERE id_biodata = '$id_biodata'";
        $res = mysqli_query($conn, $sql);         
        
        if ($res) {
                $response["success"] = 1;
                $response["message"] = "berhasil mengubah..";
                echo json_encode($response);
            } else {
                 $response["success"] = 0;
                 $response["message"]= "gagal mengubah..";
                 echo json_encode($response);
            }
        }

?>

<!-- <br><br>
<form action="regis.php" method="POST">
nama : <input type="text" name="nama"> <br>
email : <input type="text" name="username"><br>
pass : <input type="text" name="password"><br>
alamat : <input type="text" name="alamat"> <br>
no_telpn : <input type="text" name="no_telpon"> <br>
<input type="submit" value="daftar">
</form> -->