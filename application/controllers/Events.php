<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Events extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Index_model');
		date_default_timezone_set('Asia/Dhaka');
     	$this->load->library('email');
		$this->load->library('cart');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('pagination');
	}
	function index()
	{
			$data['title']="Events | mhinternational";
			$config = array();
			$config['base_url'] = base_url('events');
			$config["per_page"] = 20;
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$total_row = $this->Index_model->get_news_galleryCount();
			$config["total_rows"] = $total_row->num_rows();
			$config['num_links'] = 10;
			$config['cur_tag_open'] = '<li><a class="active">';
			$config['cur_tag_close'] = '</a></li>';
			$config['next_link'] = '<li>Next';
			$config['prev_link'] = '<li>Previous';
			$config["uri_segment"] = 3;
			$this->pagination->initialize($config);
			$data['paginationdata']= $this->pagination->create_links();
			$data['pageSl'] = $page;
			
			$data["total_rows"] = $total_row->num_rows();
			
		$data['eventgallery']=$this->Index_model->getDataById('events','','','m_id','desc','4');
		$data['main_content']="frontend/events_gallery";
		$this->load->view('template',$data);
	}
	
	function details($slug)
	{
		$url=urldecode($slug);
		$exp=explode('-',$slug);
		$imp=implode(' ',$exp);
		$data['title']=ucfirst($imp);
		$data['slug']=$slug;
		$data['eventsdetails']	= $this->Index_model->getOneItemTable('events','slug',$url,'m_id','desc',1);
		$data['main_content']="frontend/events_details";
        $this->load->view('template', $data);
	}
}

?>
