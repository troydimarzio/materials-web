<?php
error_reporting(0);
require_once 'config.php';
$response = array();

        $id_biodata = $_POST['id_biodata'];

        $sql = "UPDATE t_transaksi SET id_status = 4 WHERE id_biodata = '$id_biodata'";
        $res = mysqli_query($conn, $sql);         
        
        if ($res) {
                $response["success"] = 1;
                $response["message"] = "Pesanan dibatalkan..";
                echo json_encode($response);
            } else {
                 $response["success"] = 0;
                 $response["message"]= "error..";
                 echo json_encode($response);
            }

?>