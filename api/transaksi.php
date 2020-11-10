<?php
error_reporting(0);
require_once 'config.php';
$response = array();

    $id_biodata = $_POST['id_biodata'];
    $id_material = $_POST['id_material'];
    $jumlah = $_POST['jumlah'];
    $total = $_POST['total_harga'];

    $sql = "INSERT INTO t_transaksi(id_biodata, id_material, quantity, total_harga) VALUES ($id_biodata, $id_material, '$jumlah', '$total')";
    $res = mysqli_query($conn, $sql);
    
    if ($res) {
            $response["success"] = 1;
            $response["message"] = "Sukses..";
            echo json_encode($response);
        } else {
             $response["success"] = 0;
             $response["message"]= "Gagal..";
             echo json_encode($response);
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