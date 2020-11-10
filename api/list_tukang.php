<?php
require_once 'config.php';

$result = mysqli_query($conn, "SELECT b.*, t.*, s.* FROM t_biodata b, t_tukang t, t_spesialis s WHERE b.id_biodata = t.id_biodata AND s.id_spesialis = t.id_spesialis");  
$json_response = array();  

while ($row = mysqli_fetch_array($result)) {  
	$row_array['nama_tukang']       = ucwords($row['nama_lengkap']);
	$row_array['spesialis_tukang']  = ucwords($row['spesialis']);
	$row_array['status']     = ucwords($row['status_kerja']);
	$row_array['no_telpon']  = $row['no_telpon_tukang'];
	$row_array['umur']       = $row['umur'] . " Tahun";
	$row_array['pengalaman'] = $row['pengalaman_kerja'];
	$row_array['alamat']     = ucwords($row['alamat']);
	array_push($json_response, $row_array);
}  
	echo json_encode(array("post" => $json_response));  
?>  