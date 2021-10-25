<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Testimonial extends CI_Controller {

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
		$data['title']="News | mhinternational";
		$data['menu']	= $this->Index_model->getDataById('menu','root_id',0,'m_id','asc','');
		$menuid=array('2','3','5','4');
		$data['footermenu']	= $this->Index_model->getDataByIdArray('menu','m_id',$menuid,'m_id','desc','4');
		$data['picture_gallery']=$this->Index_model->getDataById('photogallery','','','b_id','desc','20');
		$data['successstory']=$this->Index_model->getDataById('success_story','','','story_id','desc','4');
		$data['testimonial_gallery']=$this->Index_model->getDataById('success_story','','','story_id','desc','');
		$data['picture_gallery']=$this->Index_model->getDataById('photogallery','','','b_id','desc','20');
		$data['main_content']="frontend/testimonial_gallery";
		$this->load->view('template',$data);
	}
	
	function testimonial_details($slug)
	{
		$url=urldecode($slug);
		$exp=explode('-',$slug);
		$imp=implode(' ',$exp);
		$data['title']=ucfirst($imp);
		$data['slug']=$slug;
		$data['menu']	= $this->Index_model->getDataById('menu','root_id',0,'m_id','asc','');
		$menuid=array('2','3','5','4');
		$data['footermenu']	= $this->Index_model->getDataByIdArray('menu','m_id',$menuid,'m_id','desc','4');
		$data['picture_gallery']=$this->Index_model->getDataById('photogallery','','','b_id','desc','20');
		$data['successstory']=$this->Index_model->getDataById('success_story','','','story_id','desc','4');
		$data['testimonialdetails']	= $this->Index_model->getOneItemTable('success_story','slug',$url,'story_id','desc',1);
		
		$data['main_content']="frontend/testimonial_details";
        $this->load->view('template', $data);
	}
	
}

?>
