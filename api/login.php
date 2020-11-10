<?php
require_once 'config.php';

$response = array();

//  cek apakah nilai yang dikirimkan android sudah terisi
if (isset($_POST['user']) && isset($_POST['password'])) {
    
    $email    = $_POST['user'];
    $password = $_POST['password'];

     $user = mysqli_query($conn, "SELECT u.*, b.* FROM t_user u, t_biodata b WHERE u.kd_user = b.kd_user AND u.email = '$email'");

    $row = mysqli_fetch_assoc($user);
		if($row['email'] == $email) {
            
            if($row['status'] == 1) {
                if(password_verify($password, $row['password'])) {
                    $response["success"] = 1;
                    $response["message"] = "Login Berhasil.";
                    $response['id_biodata'] = $row['id_biodata'];
                    $response['nama_lengkap'] = $row['nama_lengkap'];
                    $response['alamat'] = $row['alamat'];
                    $response['no_telpon'] = $row['no_telpon'];
                } else {
                    $response["success"] = 0;
                    $response["message"] = "Password salah!";
                }
                
            } else {
                $response["success"] = 0;
                $response["message"] = "Akun belum di aktivasi!";
            }

    	} else {
            $response["success"]  = 0;
            $response["message"]  = "Email belum pernah terdaftar!";
        }
        echo json_encode($response);
} 

?>

<h1>Login</h1> 
		<form action="login.php" method="post"> 
		    Username:<br /> 
		    <input type="text" name="user" placeholder="username" /> 
		    <br /><br /> 
		    Password:<br /> 
		    <input type="password" name="password" placeholder="password" value="" /> 
		    <br /><br /> 
		    <input type="submit" value="Login" /> 
		</form> 

		