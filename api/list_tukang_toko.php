<?php
require_once 'config.php';

$result = mysqli_query($conn, "SELECT u.*, t.*, s.* FROM t_tukang_toko t, t_spesialis s, t_user u WHERE t.id_spesialis = s.id_spesialis AND t.kd_user = u.kd_user");  
$json_response = array();  

while ($row = mysqli_fetch_array($result)) {  
	$row_array['nama']           = ucwords($row['nama']);
	$row_array['spesialis']      = ucwords($row['spesialis']);
	$row_array['pengalaman']     = ucwords($row['pengalaman_kerja']);
	$row_array['id_tukang_toko'] = $row['id_tukang_toko'];
	$row_array['no_telpon_tt'] = $row['no_telpon_tt'];
	array_push($json_response, $row_array);
}  
	echo json_encode(array("post" => $json_response));  
?>  