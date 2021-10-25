<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Index_model');
		date_default_timezone_set('Asia/Dhaka');
     	$this->load->library('email');
		$this->load->library('pagination');
		$this->load->helper('form');
		$this->load->library('facebook');
		$this->load->helper('url');
		$config['charset'] = "UTF-8";
	}
	
	
	
	
	 public function fblogin(){
		$userData = array();
		
		// Check if user is logged in
		if($this->facebook->is_authenticated()){
			// Get user facebook profile details
			$userProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,gender,locale,picture');

            // Preparing data for database insertion
            $userData['oauth_provider'] = 'facebook';
            $userData['oauth_uid'] = $userProfile['id'];
            $userData['first_name'] = $userProfile['first_name'];
            $userData['last_name'] = $userProfile['last_name'];
            $userData['email'] = $userProfile['email'];
            $userData['gender'] = $userProfile['gender'];
            $userData['locale'] = $userProfile['locale'];
            $userData['profile_url'] = 'https://www.facebook.com/'.$userProfile['id'];
            $userData['picture_url'] = $userProfile['picture']['data']['url'];
			
            // Insert or update user data
            $userID = $this->user->checkUser($userData);
			
			// Check user data insert or update status
            if(!empty($userID)){
                $data['userData'] = $userData;
                $this->session->set_userdata('userData',$userData);
            } else {
               $data['userData'] = array();
            }
			
			// Get logout URL
			$data['logoutUrl'] = $this->facebook->logout_url();
		}else{
            $fbuser = '';
            $data['authUrl'] =  $this->facebook->login_url();
        }
		
		
		
    }

	public function fblogout() {
		// Remove local Facebook session
		$this->facebook->destroy_session();
		// Remove user data from session
		$this->session->unset_userdata('userData');
		// Redirect to login page
        redirect('index');
    }
	
	
	
	
	
	
	function index()
	{
		$this->fblogin();
		// $data['authUrl'] =  $this->facebook->login_url();
		$data['title']=" jobstarbd";
		$data['specialCategory']		= $this->Index_model->getDataById('category','cat_id','special-category','scid','asc','');
		$data['functionalCategory']		= $this->Index_model->getDataById('category','cat_id','functional','sub_cat_name','asc','');
		$data['industrialCategory']		= $this->Index_model->getDataById('category','cat_id','industrial','sub_cat_name','asc','');
		$data['divisionCategory']		= $this->Index_model->getDataById('category','cat_id','division','scid','asc','');
		
		$data['starjobseekers']		= $this->Index_model->getDataById('jobseekers','starjobseekers','1','id','asc','9');
		$data['topemployers']		= $this->Index_model->getDataById('employers','top','1','cid','asc','9');
		
		
		$data['starjobseekers_more']		= $this->Index_model->getDataById('jobseekers','starjobseekers','1','id','asc','18');
		$data['topemployers_more']		= $this->Index_model->getDataById('employers','top','1','cid','asc','18');
		
		$data['hotjobs']		= $this->Index_model->getHotJobs();
		$data['successstory']		= $this->Index_model->getDataById('success_story','','','m_id','desc','4');
		$data['hrnews']		= $this->Index_model->getDataById('news','status','1','news_id','desc','5');
		$data['hevents']		= $this->Index_model->getDataById('events','status','1','m_id','desc','5');
		$data['workshopList']		= $this->Index_model->getDataById('workshop','','','courses_id','asc','6');
		$data['courseList']		= $this->Index_model->getDataById('courses_training','','','courses_id','asc','6');
		
		$data['totalcv']		= $this->Index_model->getDataById('jobseekers','','','id','desc','');
		$data['totalemp']		= $this->Index_model->getDataById('employers','','','cid','desc','');
		$data['livejobs']		= $this->Index_model->getDataById('jobpost','status','1','job_id','desc','');
		$data['newjobs']		= $this->Index_model->getDataById('jobpost','status','0','job_id','desc','');
		
		
		$data['picture_gallery']=$this->Index_model->getDataById('photogallery','','','b_id','desc','20');
		$data['vedioGallery']		= $this->Index_model->commonAllData('vedio_gallery','','','photo_album_id','desc','2');
		
		$data['main_content']="frontend/index";
		$this->load->view('template',$data);
	}
	

}

?>
