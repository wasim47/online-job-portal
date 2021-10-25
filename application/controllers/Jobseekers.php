<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jobseekers extends CI_Controller {

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
	
	function registration()
	{
		$data['title']="jobseekers Account | jobstarbd";
		$data['branchmark']='jobseekers Account';

			$this->form_validation->set_rules("email", "Email", "trim|required|min_length[6]|valid_email|is_unique[jobseekers.email]");
			$this->form_validation->set_rules('username', 'Username', 'trim|required');

			if($this->form_validation->run() != false){


				$config['allowed_types'] = '*';
				$config['remove_spaces'] = true;
				$config['max_size'] = '1000000';
				$config['upload_path'] = './asset/uploads/jobseeker_cv/';
				$config['charset'] = "UTF-8";
				$new_name = "cv_".time();
				$config['file_name'] = $new_name;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if (isset($_FILES['cv']['name']))
					{
						if($this->upload->do_upload('cv')){
							$upload_data	= $this->upload->data();
							$save['cv_upload']	= $upload_data['file_name'];
						}
						else{
							$upload_data	= $this->input->post('stillimg');
							$save['cv_upload']	= $upload_data;	
						}
					}
					
					
				$save['fullname']		=$this->input->post('fullname');
				$save['email']	=$this->input->post('email');
				$save['phone']		=$this->input->post('phone');
				$save['username']			=$this->input->post('username');
				$save['password']			=md5(sha1(md5($this->input->post('password'))));
				$save['password_hints']		=$this->input->post('password');
				$save['date']	   		 = date('Y-m-d');
				
				
				if($this->input->post('c_id')!=""){
					$c_id=$this->input->post('c_id');
					$this->Index_model->update_table('jobseekers','id',$c_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('jobseekers', $save);
					$s='Inserted';
					}
					$this->session->set_flashdata('jobseekerssuccessMsg', '<h2 class="alert alert-success" style="text-align:center">Successfully '.$s.'</h2>');
					redirect($_SERVER['HTTP_REFERER'], 'refresh');
				}
			else{
				redirect($_SERVER['HTTP_REFERER'], 'refresh');
			}	
					
					
				
			
		
	}
	
	
	
	public function jobseekersLogin()
     {
	 
	 	//echo $this->session->userdata('jobseekersAccessMail');
	 	if($this->session->userdata('jobseekersAccessMail')) redirect("jobseekers/dashboard");
	 	$data['title']="jobseekers Login | jobstarbd";
		$data['branchmark']='Jobseekers Login';
	 	if($this->input->post('login') && $this->input->post('login')!=""){
			
			  $username = $this->input->post("username");
			  $password = $this->input->post("password");
			  $this->form_validation->set_rules("username", "Username", "trim|required|min_length[6]");
			  $this->form_validation->set_rules("password", "Password", "trim|required");
	
			  if ($this->form_validation->run() == FALSE)
			  {
				  redirect('jobseekers/jobseekersLogin');
			  }
			  else
			  {
				$result_log = $this->Index_model->get_jobseekersLogin($username, $password);
				//echo $result_log->num_rows();
				if($result_log->num_rows() > 0) //active user record is present
				{
				 $usr_result = $result_log->row_array();
				  $sessiondata = array(
					'jobseekersAccessMail'=>$username,
					'jobseekersAccessName'=> $usr_result['fullname'],
					'jobseekersAccessId' => $usr_result['id'],
					'password' => TRUE
				   );
					$this->session->set_userdata($sessiondata);
					redirect("jobseekers/dashboard/");
				}
				else
				{
				 $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" style="padding:7px; margin-bottom:5px">
				 Invalid Email and password!</div>');
				 redirect('jobseekers/jobseekersLogin');
				}
			  }
		 }
		else{
			$data['main_content']="frontend/jobseekers/jobseekers_login";
			$this->load->view('template', $data);
		}
     }
	 
    function logout()
  	{
	  $sessiondata = array(
				'jobseekersAccessMail'=>'',
				'jobseekersAccessName'=> '',
				'jobseekersAccessId' => '',
				'password' => FALSE
		 );
	$this->session->unset_userdata($sessiondata);
	$this->session->sess_destroy();
    redirect('jobseekers/jobseekersLogin', 'refresh');
  }
  
 function dashboard()
	{
		if(!$this->session->userdata('jobseekersAccessMail')) redirect("jobseekers/jobseekersLogin");
		$data['title']="jobseekers Dashboard Jobster BD | Bangladesh Leargest Online Job";
		$data['branchmark']='jobseekers Login';
		$data['totalinst'] = $this->Index_model->getTable('jobpost','job_id','desc');
		$data['totalstd'] = $this->Index_model->getTable('category','scid','desc');
		$data['totalphoto'] = $this->Index_model->getTable('photogallery','b_id','desc');
		$data['totalvideo'] = $this->Index_model->getTable('vedio_gallery','photo_album_id','desc');
		
		$data['main_content']="frontend/jobseekers/dashboard";
        $this->load->view('template',$data);
	}
	
	
	function myprofile()
	{
		if(!$this->session->userdata('jobseekersAccessMail')) redirect("jobseekers/jobseekersLogin");
		$jobseekersid = $this->session->userdata('jobseekersAccessId');
		
		$data['title']="jobseekers Dashboard Jobster BD | Bangladesh Leargest Online Job";
		$getpagetype = $this->input->get('pages');		
		
		if(isset($getpagetype) && $getpagetype!=""){
			$pagetype = base64_decode($getpagetype);
			$data['update'] = $this->Index_model->getOneItemTable('jobseekers','id',$jobseekersid,'id','desc');
			$data['main_content']="frontend/jobseekers/".$pagetype;
			$this->load->view('template',$data);
		}
		else{
			show_error();
		}
	}
	
	
	function myprofile_action()
	{	
		if(!$this->session->userdata('jobseekersAccessMail')) redirect("jobseekers/jobseekersLogin");
		$jobseekersid = $this->session->userdata('jobseekersAccessId');
		$data['title']="jobseekers Account | jobstarbd";
		$data['branchmark']='jobseekers Account';

		$getpagetype = $this->input->get('action');		
		
		if(isset($getpagetype) && $getpagetype!=""){
			$pagetype = base64_decode($getpagetype);
			if($pagetype=='editprofile'){				
				$config['allowed_types'] = '*';
				$config['remove_spaces'] = true;
				$config['max_size'] = '1000000';
				$config['upload_path'] = './asset/uploads/jobseeker_cv/';
				$config['charset'] = "UTF-8";
				$new_name = "cv_".time();
				$config['file_name'] = $new_name;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if (isset($_FILES['cv_upload']['name']))
					{
						if($this->upload->do_upload('cv_upload')){
							$upload_data	= $this->upload->data();
							$save['cv_upload']	= $upload_data['file_name'];
						}
						else{
							$upload_data	= "";
							$save['cv_upload']	= $upload_data;	
						}
					}
					
					
                $expval=explode(' ',$this->input->post('couTitle'));
                $impval=implode('-',$expval);
				$save['slug']=strtolower(str_replace('/', '_', $impval));
				$save['username']=$this->input->post('username');
				$save['phone']=$this->input->post('phone');
				$save['email']=$this->input->post('email');
				$save['web']=$this->input->post('web');
				$save['expected_salary']=$this->input->post('expected_salary');
				$save['skills']=$this->input->post('skills');
				$save['linkedin']=$this->input->post('linkedin');
				$save['github']=$this->input->post('github');
				$save['coverlatter']=$this->input->post('coverlatter');
				$save['about_your_self']=$this->input->post('about_your_self');
				$save['career_summery']=$this->input->post('career_summery');
				$save['date']	    = date('Y-m-d');
		
				$this->Index_model->update_table('jobseekers','id',$jobseekersid,$save);
				$s='Updated';
				$this->session->set_flashdata('jobseekerssuccessMsg', '<h2 class="alert alert-success" style="text-align:center">Successfully '.$s.'</h2>');
				redirect($_SERVER['HTTP_REFERER'], 'refresh');
			}
			elseif($pagetype=='changepassword'){
				$this->form_validation->set_rules('oldpassword', 'Old Password', 'trim|required');
					$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[confirmpassword]');
					$this->form_validation->set_rules('confirmpassword', 'Password Confirmation', 'required');
					$old_password = md5(sha1(md5($this->input->post('oldpassword'))));
					$usId = $this->session->userdata('jobseekersAccessId');
					$sesionmail = $this->session->userdata('jobseekersAccessMail');
					$queryCheck = $this->Index_model->checkOldPass('jobseekers','email',$sesionmail,'password',$old_password,'id',$usId);
					//echo $queryCheck->num_rows();
					if($queryCheck->num_rows() >0 ){
						if($this->form_validation->run() != false){
							$password =md5(sha1(md5($this->input->post('password'))));
							$passwordHints =$this->input->post('password');
							$dataUpdate = array(
								'password'		=> $password,
								'pass_hints'	=> $passwordHints,
								'active'		=> 1,
								'update_date'	=> date('Y-m-d H:i:s')
							);
							
							$query = $this->Index_model->updateTable('jobseekers','id',$usId,$dataUpdate);
							if($query){
								$this->session->set_flashdata('globalMsg','<div class="alert alert-success">Password Change Successfully </div>');
								redirect($_SERVER['HTTP_REFERER'],'refresh');
							}
						}
						else{
							$data['main_content']="frontend/jobseekers/changepassword";
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
			show_error();
		}
		
		

		
	}
	
	
	
	function apply_jobs()
	{
		$jobid = $this->input->post('jobid');
		//$ipaddress = $this->get_client_ip();
		if($this->session->userdata('jobseekersAccessId') && $this->session->userdata('jobseekersAccessId')!=""){
			$save['job_ID']		=$this->input->post('jobid');
			$save['expected_salary']	=$this->input->post('exsalary');
			$save['cover_letter']		=$this->input->post('coverletter');
			$save['employer_ID']		=$this->input->post('employeeid');
			$save['seeker_ID']		= $this->session->userdata('jobseekersAccessId');
			//$save['ip_address']		= $ipaddress;
			
			$this->Index_model->inertTable('applied_for_job', $save);
			$jsondata = array('apply'=>'Successfully Applied','user'=>'Loggedin','color'=>'#0e9a46');
		}
		else{
			$jsondata = array('apply'=>'Can not Appliy','user'=>'Please Login first','color'=>'#ff0000');
		}

		echo json_encode($jsondata);
		
		//$data = array('status'=>'Can not Appliy','user'=>'please Login');
		//json_encode($data);
		//echo 'Success';
	}
	
	function emailtofrins()
	{
		if($this->session->userdata('jobseekersAccessId') && $this->session->userdata('jobseekersAccessId')!=""){
			$save['job_ID']			= $this->input->post('jobid');
			$save['messages']		= $this->input->post('umessage');
			$save['rec_mail']		= $this->input->post('rmail');
			$save['seeker_ID']		=  $this->session->userdata('jobseekersAccessId');
			$jurl		= $this->input->post('jurl');
			$jtitle		= $this->input->post('jtitle');
			$msguser		= $this->input->post('umessage');
			$username = $this->session->userdata('jobseekersAccessName');
			
				$tomaila=$this->input->post('rmail');
				$frommaila="info@jobstarbd.com";
				$subjecta=$username." Sent you a New job request via jobstarbd.com";
				$config = array (
							  'mailtype' => 'html',
							  'charset'  => 'utf-8',
							  'priority' => '1'
							   );
				$this->email->initialize($config);
				$this->email->set_newline('\r\n');
				$email_bodya ="
				<table width='95%' border='0' cellpadding='0' align='center' cellspacing='0' style=' 
				border:2px solid #f00; border-radius:13px; padding-left:20px;'>
				<tr style='background-color:#fff'>
				<th width='26%' height='79' align='center'> 
				<img src='".base_url('assets/images/logo.png')."' />
				<th colspan='2' align='left'></th>
				</tr>
				<tr>
				<th height='37' colspan='3' align='left' 
					style='font-size:22px; color:#333; text-decoration:none;'>Login Information</th>
				</tr>
				<tr>
				<td height='137' colspan='3' align='right' valign='top'>
				<table width='100%' border='0' cellspacing='0' cellpadding='0'>
				<tr>
                    <td width='37%' height='31'><strong>Sender</strong></td>
                    <td width='3%'><strong>:</strong></td>
                    <td width='60%'>$email</td>
				</tr>
				<tr>
                    <td width='37%' height='31'><strong>Message</strong></td>
                    <td width='3%'><strong>:</strong></td>
                    <td width='60%'>$msguser</td>
				</tr>
                <tr>
                    <td width='37%' height='31'><strong>Job Title</strong></td>
                    <td width='3%'><strong>:</strong></td>
                    <td width='60%'>$jtitle</td>
				</tr>
				<tr>
				<td height='29'><strong>Job Link</strong></td>
				<td><strong>:</strong></td>
				<td>$jurl</td>
				</tr>
				
				<tr>
				  <td colspan='3'> You can for this job form jobstarbd.com<br>Please Click here to apply <a href='".$jurl."' style='background-color:#00CC66; padding:10px 20px; color:#fff; font-size:16px; font-family:Verdana, Arial, Helvetica, sans-serif; text-decoration:none;'>Apply Now</a></td>
				  </tr>
				<tr>
				  <td colspan='3'>&nbsp;</td>
				  </tr>
				</table></td>
				</tr>
				</table>";
			
				//$this->email->initialize($config);
				$this->email->from($frommaila, 'jobstarbd.com');
				$this->email->to($tomaila);
				//$this->email->bcc();
				$this->email->subject($subjecta);
				$this->email->message($email_bodya);
				$this->email->send();
			
			
			$this->Index_model->inertTable('emailed_jobs', $save);
			$jsondata = array('apply'=>'Successfully Sent mail','user'=>'Loggedin','color'=>'#0e9a46');
		}
		else{
			$jsondata = array('apply'=>'Can not send email','user'=>'Please Login first','color'=>'#ff0000');
		}

		echo json_encode($jsondata);
		
		//$data = array('status'=>'Can not Appliy','user'=>'please Login');
		//json_encode($data);
		//echo 'Success';
	}
	
	function get_client_ip() {
		$ipaddress = '';
		if (isset($_SERVER['HTTP_CLIENT_IP']))
			$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
		else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
			$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		else if(isset($_SERVER['HTTP_X_FORWARDED']))
			$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
		else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
			$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
		else if(isset($_SERVER['HTTP_FORWARDED']))
			$ipaddress = $_SERVER['HTTP_FORWARDED'];
		else if(isset($_SERVER['REMOTE_ADDR']))
			$ipaddress = $_SERVER['REMOTE_ADDR'];
		else
			$ipaddress = 'UNKNOWN';
		return $ipaddress;
	}
}

?>
