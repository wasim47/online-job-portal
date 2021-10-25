<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Index_model');
		date_default_timezone_set('Asia/Dhaka');
     	$this->load->library('email');
		$this->load->library('pagination');
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
	}
	function index()
	{
		$data['title']="mhinternational";
		$data['newscategory']		= $this->Index_model->getDataById('category','menuPosition','Top','sequence','asc','');
		$data['newscategory_b']		= $this->Index_model->getDataById('category','menuPosition','Bottom','sequence','asc','');
		$data['popular_news']		= $this->Index_model->commonAllData('news_manage','popular_news','1','n_id','desc','6');
		$data['latest_news']		= $this->Index_model->commonAllData('news_manage','last_updated','1','n_id','desc','6');
		$data['mostread_news']		= $this->Index_model->most_readnews();
		$data['picture_gallery']=$this->Index_model->getDataById('photogallery','','','b_id','desc','20');
		$data['vedioGallery']		= $this->Index_model->commonAllData('vedio_gallery','','','photo_album_id','desc','2');
		
		$data['search_data']=$this->input->post('search_data');
		$keyword=$this->input->post('search_data');
		
		$totalresult=$this->Index_model->searchdata($keyword,'','');
		$data['total_pages']=$totalresult->num_rows();
		$config = array();
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $config['base_url'] = base_url('search');
		$config['total_rows'] = $totalresult->num_rows();
		$config['num_links'] = 10;
      	$config['per_page'] = 30;
		$config['uri_segment'] =3;
		
        $config['cur_tag_open'] = '&nbsp;<a class="current">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';
        $this->pagination->initialize($config);
		$data['paginationdata']= $this->pagination->create_links();
		$data['pageSl'] = $page;
		
		//$data['productgallery']	= $this->Index_model->searchdata($keyword,$category,$config['per_page'],$page);
		$data['searchnewslist']	= $this->Index_model->searchdata($keyword,$config['per_page'],$page);
		
		$data['main_content']="frontend/search_gallery";
		$this->load->view('template',$data);
	}
	

}

?>
