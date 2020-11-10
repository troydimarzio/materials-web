<?php
require_once 'config.php';

$result = mysqli_query($conn, "SELECT m.*, p.*, b.*, k.*, s.*, r.* FROM t_material m, t_penyedia p, t_biodata b, t_kategori_material k, t_satuan s, t_rating r WHERE p.id_penyedia = m.id_penyedia AND b.id_biodata = p.id_biodata AND k.id_kategori = m.id_kategori AND s.id_satuan = m.id_satuan AND r.id_rating = p.id_rating ORDER BY m.id_material DESC");  
$json_response = array();  

while ($row = mysqli_fetch_array($result)) {
	$row_array['id_material']   = $row['id_material'];
	$row_array['nama'] = ucwords($row['nama_material']);
	$row_array['deskripsi']     = ucwords($row['deskripsi']);
	$row_array['harga']         = $row['harga'];
	$row_array['stok']          = $row['stok'];
	$row_array['satuan']        = "/" . ucwords($row['satuan']);
	$row_array['kategori']      = ucwords($row['kategori']);
	$row_array['foto']          = $row['photo_material'];
	$row_array['toko']          = ucwords($row['nama_penyedia']);
	$row_array['rating']        = ucwords($row['rating']);
	$row_array['alamat']	    = ucwords($row['alamat']);
	array_push($json_response, $row_array);  
}  
	echo json_encode(array("post" => $json_response));  
?>
