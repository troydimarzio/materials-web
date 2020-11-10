// edit head menu
function headMenu($id, $caption, $sort, $status) {
	var id = document.getElementById('id').value;
	if(id == null) {
		$('#id').val("");
		$('#caption').val("");
		$('#sort').val("");
	} else {
		$('#id').val($id);
		$('#caption').val($caption);
		$('#sort').val($sort);
		document.getElementById($status).checked = true;
	}
}

// edit menu
function menu($id_menu, $title, $url, $deskripsi, $icon, $head, $sort) {
	var id = document.getElementById('id_menu').value;
	if(id == null) {
		$('#id_menu').val("");
		$('#title').val("");
		$('#url').val("");
		$('#deskripsi').val("");
		$('#icon').val("");
		$('#head').val("");
		$('#sort_menu').val("");
	} else {
		$('#id_menu').val($id_menu);
		$('#title').val($title);
		$('#url').val($url);
		$('#deskripsi').val($deskripsi);
		$('#icon').val($icon);
		$('#head').val($head);
		$('#sort_menu').val($sort);
	}
}

// edit user
function user($kd, $email, $password){
	$('#kd').val($kd);
	$('#email').val($email);
	$('#password').val($password);
}

// edit profil toko
function editProfilToko($id_penyedia, $nama_toko, $rekening, $bank) {
	var id = document.getElementById('id_toko').value;
	if(id == null) {
		$('#id_toko').val("");
		$('#nama_toko').val("");
		$('#rekening').val("");
		$('#bank').val("");
	} else {
		$('#id_toko').val($id_penyedia);
		$('#nama_toko').val($nama_toko);
		$('#rekening').val($rekening);
		$('#bank').val($bank);
	}
}

// edit profil tukang
function editProfilTukang($id_tukang, $umur, $lama_kerja, $no_telpon_tukang, $id_spesialis) {
	var id = document.getElementById('qwerty').value;
	if(id == null) {
		$('#qwerty').val("");
		$('#umur').val("");
		$('#lama_kerja').val("");
		$('#no_telponnn').val("");
		// $('#spesialis').val("");
	} else {
		$('#qwerty').val($id_tukang);
		$('#umur').val($umur);
		$('#lama_kerja').val($lama_kerja);
		$('#no_telponnn').val($no_telpon_tukang);
		$('#spesialis').val($id_spesialis);
	}
}

// edit profil
function editProfil($nama, $alamat) {
	$('#nama_lengkap').val($nama);
	$('#alamat').val($alamat);
}

function editMaterial($id_material, $nama, $harga, $stok, $satuan, $deskripsi, $kategori) {
	var id = document.getElementById('id_material').value;
	if(id == null) {
		$('#nama_material').val("");
		$('#harga').val("");
		$('#stok').val("");
		$('#deskripsi_m').val("");
	} else {
		$('#id_material').val($id_material);
		$('#nama_material').val($nama);
		$('#harga').val($harga);
		$('#stok').val($stok);
		$('#satuan').val($satuan);
		$('#deskripsi_m').val($deskripsi);
		$('#kategori').val($kategori);
	}
}
