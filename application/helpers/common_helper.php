<?php
if (!function_exists('commonboutique_panel'))
{
    function commonboutique_panel($urlname){
		 $ci=& get_instance();
	     $ci->load->database();
       $data['enterpriseData'] = $ci->db->query("select * from institute where urlname ='".$urlname."'");
	   return $data['enterpriseData']; 
    }
}