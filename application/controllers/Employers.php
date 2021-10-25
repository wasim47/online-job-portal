<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employers extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Index_model');
		date_default_timezone_set('Asia/Dhaka');
     	$this->load->library('email');
		$this->load->library('pagination');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('download');
		$config['charset'] = "UTF-8";
	}
	
	function registration()
	{
		$data['title']="Employers Account | jobstarbd";
		$data['branchmark']='Employers Account';
		$this->form_validation->set_rules('company_name', 'Company Name', 'trim|required');

		if($this->input->post('registration') && $this->input->post('registration')!=""){

			if($this->form_validation->run() != false){
				$config['allowed_types'] = '*';
				$config['remove_spaces'] = true;
				$config['max_size'] = '1000000';
				$config['upload_path'] = './asset/uploads/employers/';
				$config['charset'] = "UTF-8";
				$new_name = "logo_".time();
				$config['file_name'] = $new_name;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if (isset($_FILES['logo']['name']))
					{
						if($this->upload->do_upload('logo')){
							$upload_data	= $this->upload->data();
							$save['logo']	= $upload_data['file_name'];
						}
						else{
							$upload_data	= $this->input->post('stillimg');
							$save['logo']	= $upload_data;	
						}
					}
					
					
                $expval=explode(' ',$this->input->post('company_name'));
                $impval=implode('-',$expval);
				$save['slug']=strtolower(str_replace('/', '_', $impval));
				$save['company_name']		=$this->input->post('company_name');
				$save['alt_company_name']	=$this->input->post('alt_company_name');
				$save['contact_person']		=$this->input->post('contact_person');
				$save['p_designation']		=$this->input->post('p_designation');
				$save['p_email']			=$this->input->post('p_email');
				$save['p_contact']			=$this->input->post('p_contact');
				$save['industryType']		=$this->input->post('industryType');
				$save['com_address']		=$this->input->post('com_address');
				$save['country']			=$this->input->post('country');
				$save['city']				=$this->input->post('city');
				$save['area']				=$this->input->post('area');
				$save['billing_address']	=$this->input->post('billing_address');
				$save['com_contact']		=$this->input->post('com_contact');
				$save['com_email']			=$this->input->post('com_email');
				$save['website']			=$this->input->post('website');
				$save['business_details']	=$this->input->post('business_details');
				$save['user_name']			=$this->input->post('user_name');
				$save['password']			=md5(sha1(md5($this->input->post('password'))));
				$save['passwordHints']		=$this->input->post('password');
				$save['date']	   		 = date('Y-m-d');
				
				
				if($this->input->post('c_id')!=""){
					$c_id=$this->input->post('c_id');
					$this->Index_model->update_table('employers','cid',$c_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('employers', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect($_SERVER['HTTP_REFERER'], 'refresh');
			}
			else{
				$data['main_content']="frontend/employers/employers_registration";
        		$this->load->view('template', $data);
			}
		}
		else{
			$data['main_content']="frontend/employers/employers_registration";
			$this->load->view('template', $data);
		}
	}
	
	
	
	public function employersLogin()
     {
	 
		 if($this->session->userdata('employersAccessMail')) redirect("employers/dashboard");
	 	$data['title']="Employers Login | jobstarbd";
		$data['branchmark']='Employers Login';
	 	if($this->input->post('login') && $this->input->post('login')!=""){
			
			  $username = $this->input->post("username");
			  $password = $this->input->post("password");
			  $this->form_validation->set_rules("username", "Email", "trim|required|min_length[6]");
			  $this->form_validation->set_rules("password", "Password", "trim|required");
	
			  if ($this->form_validation->run() == FALSE)
			  {
				  redirect('employers/employersLogin');
			  }
			  else
			  {
				$result_log = $this->Index_model->get_employersLogin($username, $password);
				if($result_log->num_rows() > 0) //active user record is present
				{
				 $usr_result = $result_log->row_array();
				  $sessiondata = array(
					'employersAccessMail'=>$username,
					'employersAccessName'=> $usr_result['company_name'],
					'employersAccessId' => $usr_result['cid'],
					'password' => TRUE
				   );
					$this->session->set_userdata($sessiondata);
					redirect("employers/dashboard/");
				}
				else
				{
				 $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" style="padding:7px; margin-bottom:5px">
				 Invalid Email and password!</div>');
				 redirect('employers/employersLogin');
				}
			  }
		 }
		else{
			$data['main_content']="frontend/employers/employers_login";
			$this->load->view('template', $data);
		}
     }
	 
    function logout()
  	{
	  $sessiondata = array(
				'employersAccessMail'=>'',
				'employersAccessName'=> '',
				'employersAccessId' => '',
				'password' => FALSE
		 );
	$this->session->unset_userdata($sessiondata);
	$this->session->sess_destroy();
    redirect('employers/employersLogin', 'refresh');
  }
  
 function dashboard()
	{
		if(!$this->session->userdata('employersAccessMail')) redirect("employers/employersLogin");
		$data['title']="Employers Dashboard Jobster BD | Bangladesh Leargest Online Job";
		$data['branchmark']='Employers Login';
		$employersid = $this->session->userdata('employersAccessId');
		$data['update'] = $this->Index_model->getOneItemTable('employers','cid',$employersid,'cid','desc');
		
		$data['main_content']="frontend/employers/dashboard";
        $this->load->view('template',$data);
	}
	
	function joblist()
	{
		if(!$this->session->userdata('employersAccessMail')) redirect("employers/employersLogin");
		$data['title']="Employers Dashboard Jobster BD | Bangladesh Leargest Online Job";
		$data['branchmark']='Job List';
		$employersid = $this->session->userdata('employersAccessId');
		
		$sts = base64_decode($this->input->get('s'));
		
		if(isset($sts) && $sts!=""){
			if($sts=='pending'){	
				$s = '0';				
			}
			
			elseif($sts=='approved'){	
				$s = '1';				
			}
			elseif($sts=='onlive'){	
				$s = '1';			
			}
			$data['jobpostlist'] = $this->Index_model->getAllItemTable('jobpost','emp_id',$employersid,'status',$s,'job_id','desc');
		}
		else{
			$data['jobpostlist'] = $this->Index_model->getAllItemTable('jobpost','emp_id',$employersid,'','','job_id','desc');
		}
		
		
		$data['main_content']="frontend/employers/joblist";
        $this->load->view('template',$data);
	}
	
	
	
	
	function appliedjoblist()
	{
		if(!$this->session->userdata('employersAccessMail')) redirect("employers/employersLogin");
		$data['title']="Employers Dashboard Jobster BD | Bangladesh Leargest Online Job";
		$data['branchmark']='Job List';
		$employersid = $this->session->userdata('employersAccessId');
		
		$data['jobpostlist'] = $this->Index_model->getAppliedJobs($employersid);		
		$data['main_content']="frontend/employers/applied_joblist";
        $this->load->view('template',$data);
	}
	
	
	
	
	function browsecv()
	{
		if(!$this->session->userdata('employersAccessMail')) redirect("employers/employersLogin");
		$data['title']="Employers Dashboard Jobster BD | Bangladesh Leargest Online Job";
		$data['branchmark']='Job List';
		$employersid = $this->session->userdata('employersAccessId');
				
		$data['jobpostlist'] = $this->Index_model->getAllItemTable('jobpost','emp_id',$employersid,'','','job_id','desc');
		
		$data['main_content']="frontend/employers/browse_cv";
        $this->load->view('template',$data);
	}
	
	function browse_cv_ajax()
	{
		//$ipaddress = $this->get_client_ip();
		if(!$this->session->userdata('employersAccessMail')) redirect("employers/employersLogin");
			$exp_to	=$this->input->post('exp_to');
			$exp_from		=$this->input->post('exp_from');
			$keywords		=$this->input->post('keywords');
			$emp_ID		= $this->session->userdata('employersAccessId');
			//$save['ip_address']		= $ipaddress;
			// AND expected_salary BETWEEN '$exp_from' AND '$exp_to'
			
			//$totalcvfind = "SELECT * FROM jobseekers WHERE FIND_IN_SET('$keywords', skills)";
			$data['totalcvrow'] = $this->Index_model->searchCv($keywords,$exp_from,$exp_to);

        	$this->load->view('frontend/employers/browse_cv_list',$data);
		
			/*$jsondata = array('apply'=>'Successfully Applied','user'=>'Loggedin','color'=>'#0e9a46');
		}
		else{
			$jsondata = array('apply'=>'Can not Appliy','user'=>'Please Login first','color'=>'#ff0000');
		}

		echo json_encode($jsondata);*/
		
		//$data = array('status'=>'Can not Appliy','user'=>'please Login');
		//json_encode($data);
		//echo 'Success';
	}
	
	
	function myprofile()
	{
		if(!$this->session->userdata('employersAccessMail')) redirect("employers/employersLogin");
		$employersid = $this->session->userdata('employersAccessId');
		
		$data['title']="employers Dashboard Jobster BD | Bangladesh Leargest Online Job";
		$getpagetype = $this->input->get('pages');		
		
		if(isset($getpagetype) && $getpagetype!=""){
			$pagetype = base64_decode($getpagetype);
			$data['update'] = $this->Index_model->getOneItemTable('employers','cid',$employersid,'cid','desc');
			$data['main_content']="frontend/employers/".$pagetype;
			$this->load->view('template',$data);
		}
		else{
			show_error();
		}
	}
	
	
	function myprofile_action()
	{	
		if(!$this->session->userdata('employersAccessMail')) redirect("employers/employersLogin");
		$employersid = $this->session->userdata('employersAccessId');
		$data['title']="employers Account | jobstarbd";
		$data['branchmark']='employers Account';

		$getpagetype = $this->input->get('action');		
		
		if(isset($getpagetype) && $getpagetype!=""){
			$pagetype = base64_decode($getpagetype);
			if($pagetype=='editprofile'){				
				$config['allowed_types'] = '*';
				$config['remove_spaces'] = true;
				$config['max_size'] = '1000000';
				$config['upload_path'] = './asset/uploads/employers/';
				$config['charset'] = "UTF-8";
				$new_name = "logo_".time();
				$config['file_name'] = $new_name;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if (isset($_FILES['logo']['name']))
					{
						if($this->upload->do_upload('logo')){
							$upload_data	= $this->upload->data();
							$save['logo']	= $upload_data['file_name'];
						}
						else{
							$upload_data	= $this->input->post('stillimg');
							$save['logo']	= $upload_data;	
						}
					}
					
					
                $expval=explode(' ',$this->input->post('company_name'));
                $impval=implode('-',$expval);
				$save['slug']=strtolower(str_replace('/', '_', $impval));
				$save['company_name']		=$this->input->post('company_name');
				$save['alt_company_name']	=$this->input->post('alt_company_name');
				$save['contact_person']		=$this->input->post('contact_person');
				$save['p_designation']		=$this->input->post('p_designation');
				$save['p_email']			=$this->input->post('p_email');
				$save['p_contact']			=$this->input->post('p_contact');
				$save['industryType']		=$this->input->post('industryType');
				$save['com_address']		=$this->input->post('com_address');
				$save['country']			=$this->input->post('country');
				$save['city']				=$this->input->post('city');
				$save['area']				=$this->input->post('area');
				$save['billing_address']	=$this->input->post('billing_address');
				$save['com_contact']		=$this->input->post('com_contact');
				$save['com_email']			=$this->input->post('com_email');
				$save['website']			=$this->input->post('website');
				$save['business_details']	=$this->input->post('business_details');
				$save['user_name']			=$this->input->post('user_name');
				$save['password']			=md5(sha1(md5($this->input->post('password'))));
				$save['passwordHints']		=$this->input->post('password');
				$save['date']	    = date('Y-m-d');
		
				$this->Index_model->update_table('employers','cid',$employersid,$save);
				$s='Updated';
				$this->session->set_flashdata('employerssuccessMsg', '<h2 class="alert alert-success" style="text-align:center">Successfully '.$s.'</h2>');
				redirect($_SERVER['HTTP_REFERER'], 'refresh');
			}
			elseif($pagetype=='changepassword'){
				$this->form_validation->set_rules('oldpassword', 'Old Password', 'trim|required');
					$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[confirmpassword]');
					$this->form_validation->set_rules('confirmpassword', 'Password Confirmation', 'required');
					$old_password = md5(sha1(md5($this->input->post('oldpassword'))));
					$usId = $this->session->userdata('employersAccessId');
					$sesionmail = $this->session->userdata('employersAccessMail');
					$queryCheck = $this->Index_model->checkOldPass('employers','com_email',$sesionmail,'password',$old_password,'cid',$usId);
					//echo $queryCheck->num_rows();
					if($queryCheck->num_rows() >0 ){
						if($this->form_validation->run() != false){
							$password =md5(sha1(md5($this->input->post('password'))));
							$passwordHints =$this->input->post('password');
							$dataUpdate = array(
								'password'		=> $password,
								'passwordHints'	=> $passwordHints,
								'active'		=> 1
							);
							
							$query = $this->Index_model->updateTable('employers','cid',$usId,$dataUpdate);
							if($query){
								$this->session->set_flashdata('globalMsg','<div class="alert alert-success">Password Change Successfully </div>');
								redirect($_SERVER['HTTP_REFERER'],'refresh');
							}
						}
						else{
							$data['main_content']="frontend/employers/changepassword";
							$this->load->view('template',$data);
						}
					}
					else{
						$this->session->set_flashdata('globalMsg', '<div class="alert alert-danger">Old Password not match </div>');
						redirect($_SERVER['HTTP_REFERER'],'refresh');
					}
			}
			
			
		}
		else{
			show_404();
		}
		
		

		
	}
	
	
	
	function postjobs()
	{
		if(!$this->session->userdata('employersAccessMail')) redirect("employers/employersLogin");
		$data['title']="Post Jobs | jobstarbd";
		$artiId = $this->uri->segment(3);
		$data['jobpostUpdate'] = $this->Index_model->getAllItemTable('jobpost','job_id',$artiId,'','','job_id','desc');
		$data['allcategory']		= $this->Index_model->getDataById('jobtype','','','cat_name','asc','');
		if($this->input->post('registration') && $this->input->post('registration')!=""){

		$this->form_validation->set_rules('job_title', 'Job Title', 'trim|required');
		
		if ($this->form_validation->run() != FALSE){		
				$proTitle = explode(' ',$this->input->post('job_title'));				
				$proUrl = implode("-",$proTitle);
				$save['slug']		= str_replace('/', '_', $proUrl);
				
				
			$save['emp_id']				= $this->session->userdata('employersAccessId');
			$save['job_title']			= $this->input->post('job_title');			
			$save['catType']			= $this->input->post('catType');
			$save['job_category']		= $this->input->post('job_category');
			$save['publishedBy']	    = $this->input->post('publishedBy');
			$save['vacancy']	    	= $this->input->post('vacancy');
			$save['jobNatur']	    	= $this->input->post('jobNatur');
			$save['jobLevel']	    	= $this->input->post('jobLevel');
			$save['ageRange']	    	= $this->input->post('ageRange');
			$save['expNeed']	    	= $this->input->post('expNeed');
			$save['experience']	    	= $this->input->post('experience');
			$save['requirement']		= $this->input->post('requirement');
			$save['responsibilities']	= $this->input->post('responsibilities');			
			$save['location']			= $this->input->post('location');
			$save['salary']				= $this->input->post('salary');
			$save['benifits']	    	= $this->input->post('benifits');
			$save['education_qualification']	    = $this->input->post('education_qualification');
			$save['requirement']	    = $this->input->post('requirement');
			$save['responsibilities']	    = $this->input->post('responsibilities');
			$save['allow_gender']	    = $this->input->post('allow_gender');
			$save['contactAddress']	    = $this->input->post('contactAddress');
			$save['applyOnline']		= $this->input->post('applyOnline');
			$save['customEmail']		= $this->input->post('customEmail');
			
			$save['needCVPhoto']		= $this->input->post('needCVPhoto');
			$save['cvRewceivedOption']		= $this->input->post('cvRewceivedOption');
			$save['applyInstruction']		= $this->input->post('applyInstruction');
			$save['deadline']		= $this->input->post('deadline');
			$save['displayComName']		= $this->input->post('displayComName');
			$save['displayComAddress']		= $this->input->post('displayComAddress');
			$save['hot_jobs']		= $this->input->post('hot_jobs');
			
			
			$save['seo_title']			= $this->input->post('seo_title');
			$save['key_word']	    	= $this->input->post('key_word');
			$save['seo_details']		= $this->input->post('seo_details');
			$hour = gmdate('H');
			$minute = gmdate('i');
			$seconds = gmdate('s');
			
			$day = gmdate('d');
			$month = gmdate('m');
			$year = gmdate('Y');
			$hour = $hour + 6;
			$ShowBangladeshTime = date("H:i", mktime ($hour,$minute));
	
			$currentDate 				= date("Y-m-d", mktime ($hour,$minute,$seconds,$month,$day,$year));
			$save['date']	   			= $currentDate;
			$save['count_date']	    	= date("Y-n-j");
			$save['posting_time']		= $ShowBangladeshTime;
			$save['hot_jobs']			= $this->input->post('hot_jobs');
			$save['status']				= $this->input->post('status');
				
				
				if($this->input->post('job_id')!=""){
					$b_id=$this->input->post('job_id');
					$this->Index_model->update_table('jobpost','job_id',$b_id,$save);
					$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully Updated</h2>');
					redirect($_SERVER['HTTP_REFERER'], 'refresh');
				}
				else{
					$query = $this->Index_model->inertTable('jobpost', $save);
					$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully to Inserted</h2>');
					redirect($_SERVER['HTTP_REFERER'], 'refresh');
				}
				
			}
			else{
				$data['main_content']="frontend/employers/jobpost";
				$this->load->view('template', $data);
			}
		}
		else{
			$data['main_content']="frontend/employers/jobpost";
			$this->load->view('template', $data);
		}
	}
	
	
	
public function downloadPdf($file) {
		$data = file_get_contents("./asset/upload/jobseeker_cv/".$file);
			$name = $file;
			force_download($name, $data);
	}	
	
	
}

?>
