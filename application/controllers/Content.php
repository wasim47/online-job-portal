<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Content extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Index_model');
		date_default_timezone_set('Asia/Dhaka');
     	$this->load->library('email');
		$this->load->helper('form');
		$this->load->helper('url');
	}
	function index()
	{
		$cat=$this->uri->segment(2);
		$scat=$this->uri->segment(3);
		$lcat=$this->uri->segment(4);
		if(isset($lcat)){
			$slug=$lcat;
			$branch = $cat.' / '.$scat.' / '.$lcat;
		}
		elseif(isset($scat)){
			$slug=$scat;
			$branch = $cat.' / '.$scat;
		}
		elseif(isset($cat)){
			$slug=$cat;
			$branch = $cat;
		}
		$url=urldecode($slug);
		$exp=explode('-',$slug);
		$imp=implode(' ',$exp);
		$data['title']=ucfirst($imp);
		
		$expB=explode('-',$branch);
		$impB=implode(' ',$expB);
		$data['branchmark']=ucfirst($impB);
		
		$data['articledetails']	= $this->Index_model->getOneItemTable('article_manage','menu_title',$url,'a_id','desc',1);
		
		if($slug=='contact-us' || $slug=='contact'){
			$data['main_content']="frontend/contact_view";
		}
		else{
			$data['main_content']="frontend/article_details";
		}
        $this->load->view('template', $data);
	}
	
}

?>
