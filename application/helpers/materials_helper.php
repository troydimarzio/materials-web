<?php

if (!function_exists("uuid_generator")) {

    function uuid_generator() {
        $CI = & get_instance();
        $get = $CI->db->query("select uuid() as uid")->row();
        return $get->uid;
    }

}

if (!function_exists("auto_inc")) {

    function auto_inc($id, $table) {
        $CI = & get_instance();
        $get = $CI->db->query("SELECT MAX($id)+1 as id FROM  $table")->row();
        if (!empty($get->id)){
           return $get->id; 
        }  else {
            return 1;
        }
        
    }

}

function cek_akses()
{
    $CI =& get_instance();
    if(!$CI->session->userdata('nama')) {
        redirect('auth');
    } else {
        $id_level  = $CI->session->userdata('id_level');
        $url       = $CI->uri->segment(1);
        $queryUrl  = $CI->db->get_where('t_url', ['url' => $url])->row_array();
        $head_menu = $queryUrl['id_head_menu'];
        $akses     = $CI->db->get_where('t_hak_akses', ['id_level' => $id_level, 'id_head_menu' => $head_menu]);
        
        if($akses->num_rows() == 1){
            echo "salah";
        }
    }
}


?>
