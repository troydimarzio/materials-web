<?php
error_reporting(0);
require_once 'config.php';
$response = array();

 if (empty($_POST['nama']) || empty($_POST['username']) || empty($_POST['password']) || empty($_POST['alamat']) || empty($_POST['no_telpon'])) 
    {
        $response["success"] = 0;
        $response["message"] = "Pastikan semua data terisi!";
        echo json_encode($response);	
	} else {

        $nama      = $_POST['nama'];
        $email     = $_POST['username'];
        $password  = $_POST['password'];
        $pass      = password_hash($password, PASSWORD_DEFAULT);
        $alamat    = $_POST['alamat'];
        $no_telpon = $_POST['no_telpon'];
        $kd_user   = md5($_POST['username']);

        $user = mysqli_query($conn, "SELECT * FROM t_user WHERE email = '$email'");

        if(mysqli_num_rows($user) == 0) {
            $sql1 = "INSERT INTO t_user(kd_user, email, password) VALUES('$kd_user', '$email', '$pass')";
            $sql2 = "INSERT INTO t_biodata(nama_lengkap, kd_user, alamat, no_telpon) VALUES('$nama', '$kd_user', '$alamat', '$no_telpon')";

            mysqli_query($conn, $sql1);
            mysqli_query($conn, $sql2);
        
        if ($user) {
                $response["success"] = 1;
                $response["message"] = "berhasil";
                echo json_encode($response);
            } else {
                 $response["success"] = 0;
                 $response["message"]= "Registrasi Gagal.";
                 echo json_encode($response);
            }
        }
        
    } 

	// if (mysqli_num_rows($user) == 0) {
	//   // query menambah data member
    
 //    $sql3 = "SELECT * FROM t_user WHERE email = '$email' AND password = '$pass'";


 //    if () {
 //        $response["success"] = 1;
 //        $response["message"] = "Registrasi Berhasil.";
 //        echo json_encode($response);
 //    } else {
 //        $response["success"] = 0;
 //        $response["message"]= "Registrasi Gagal.";
 //        echo json_encode($response);
 //  		} 
 //  	}
//  }
?>

<br><br>
<form action="regis.php" method="POST">
nama : <input type="text" name="nama"> <br>
email : <input type="text" name="username"><br>
pass : <input type="text" name="password"><br>
alamat : <input type="text" name="alamat"> <br>
no_telpn : <input type="text" name="no_telpon"> <br>
<input type="submit" value="daftar">
</form>