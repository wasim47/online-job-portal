<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Index_model');
		date_default_timezone_set('Asia/Dhaka');
     	$this->load->library('email');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('pagination');
	}
	function photos()
	{
		$data['title']	="Photo Gallery";
		$data['newscategory']		= $this->Index_model->getDataById('category','menuPosition','Top','sequence','asc','');
		$data['newscategory_b']		= $this->Index_model->getDataById('category','menuPosition','Bottom','sequence','asc','');
		
		$config = array();
        $config['base_url'] = base_url('gallery/photos/');
        $config["per_page"] = 12;
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$total_row = $this->Index_model->getDataById('photogallery','','','b_id','desc','');
        $config["total_rows"] = $total_row->num_rows();
        $config['num_links'] = 10;
        $config['cur_tag_open'] = '&nbsp;<a class="current">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';
		$config["uri_segment"] = 3;
        $this->pagination->initialize($config);
		$data['paginationdata']= $this->pagination->create_links();
		$data['pageSl'] = $page;
		
		$data['photogallery']	= $this->Index_model->getDataByIdWithPagination('photogallery','','','b_id','desc',$config["per_page"],$page);
		$data['main_content']="frontend/photo_gallery";
        $this->load->view('template', $data);
	}
	
	function videos()
	{
		$data['title']	="Video Gallery";
		$data['newscategory']		= $this->Index_model->getDataById('category','menuPosition','Top','sequence','asc','');
		$data['newscategory_b']		= $this->Index_model->getDataById('category','menuPosition','Bottom','sequence','asc','');
		
		$config = array();
        $config['base_url'] = base_url('gallery/videos/');
        $config["per_page"] = 12;
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$total_row = $this->Index_model->getDataById('vedio_gallery','','','photo_album_id','desc','');
        $config["total_rows"] = $total_row->num_rows();
        $config['num_links'] = 10;
        $config['cur_tag_open'] = '&nbsp;<a class="current">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';
		$config["uri_segment"] = 3;
        $this->pagination->initialize($config);
		$data['paginationdata']= $this->pagination->create_links();
		$data['pageSl'] = $page;
		
		$data['videogallery']	= $this->Index_model->getDataByIdWithPagination('vedio_gallery','','','photo_album_id','desc',$config["per_page"],$page);		
		$data['main_content']="frontend/video_gallery";
        $this->load->view('template', $data);
	}
	
	
	
}

?>
