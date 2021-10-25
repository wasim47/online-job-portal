<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Workshop extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Index_model');
		date_default_timezone_set('Asia/Dhaka');
     	$this->load->library('email');
		$this->load->library('pagination');
		$this->load->helper('form');
		$this->load->helper('url');
		$config['charset'] = "UTF-8";
	}
	function index()
	{
		$data['title']="News | Job Starbd";
		
			$config = array();
			$config['base_url'] = base_url('news');
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
		
			$data['newsgallery']	= $this->Index_model->get_news_gallery($config["per_page"],$page);
			$data['main_content']="frontend/news_gallery";
			$this->load->view('template',$data);
	}
	
	function details($slug)
	{
		$ntitle=$this->uri->segment(3);
		$newstitle = urldecode($ntitle);
		$catebycatTitle = $this->Index_model->getDataById('news','slug',$newstitle,'','','');
		foreach($catebycatTitle->result() as $cattable);
		$newsheadline=$cattable->news_title;
		$data['newsid']=$cattable->news_id;
		$data['slug']	=$newstitle;
		$data['title']	=$newsheadline;
		
		$data['news_details']	= $this->Index_model->get_news_details($newstitle);
		$data['main_content']="frontend/news_details";
        $this->load->view('template', $data);
	}
	
}

?>
