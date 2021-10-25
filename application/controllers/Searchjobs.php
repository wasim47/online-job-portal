<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Searchjobs extends CI_Controller {

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
		$keywords = $this->input->post('keywords');
		if(isset($keywords) && $keywords!=""){
			
			
			$data['branchmark']=ucfirst($keywords);
			
			$data['title']=" jobstarbd | Job List";
			$data['functionalCategory']		= $this->Index_model->getDataById('category','cat_id','functional','sub_cat_name','asc','');
			
			/*$config = array();
			$config['base_url'] = base_url('joblist/'.$slug);
			$config["per_page"] = 20;
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$total_row = $this->Index_model->get_search_job_Count($keywords);
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
			
			$data["total_rows"] = $total_row->num_rows();*/
		
			$data['joblist']		= $this->Index_model->get_search_job($keywords);
			//$this->Index_model->getDataById('jobpost','job_category',$slug,'job_id','desc','');
			
			$data['main_content']="frontend/searchjobs";
			$this->load->view('template',$data);
		}
		else{
			show_404();
		}
	}
	
	
	
	function details($slug)
	{
		if(isset($slug) && $slug!=""){
			$data['title']=" jobstarbd | Job List";
			$data['functionalCategory']		= $this->Index_model->getDataById('category','cat_id','functional','sub_cat_name','asc','');
			$data['jobdetails']		= $this->Index_model->getOneItemTable('jobpost','slug',$slug,'job_id','desc');
			$queryEmp = $this->db->query("SELECT * FROM employers WHERE cid='".$data['jobdetails']['emp_id']."'");
			$data['empRow'] = $queryEmp->row_array();
			
			$data['related_job']		= $this->Index_model->getDataById('jobpost','job_category',$data['jobdetails']['job_category'],'job_id','desc','3');
			
			if($this->session->userdata('jobseekersAccessId') && $this->session->userdata('jobseekersAccessId')!=""){
				$jobid = $data['jobdetails']['job_id'];
				$userid = $this->session->userdata('jobseekersAccessId');
				$checkapply		= $this->Index_model->getAllItemTable('applied_for_job','seeker_ID',$userid,'job_ID',$jobid,'id','desc');
				$data['checkapplyjob'] = $checkapply->num_rows();
			}
			else{
				$data['checkapplyjob'] = 0;
			}
		
			$data['main_content']="frontend/job_details";
			$this->load->view('template',$data);
		}
		else{
			show_404();
		}
	}
	

}

?>
