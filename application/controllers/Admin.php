<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Index_model');
		date_default_timezone_set('Asia/Dhaka');
     	$this->load->library('email');
		$this->load->library('cart');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('url');
	}
	
	



/////////////////////// Admin Login Part ////////////////////////////////	 
	
	
	function index()
	{
		if($this->session->userdata('userAccessMail')) redirect("admin/dashboard");
		$data['title']="Jobster BD | Bangladesh Leargest Online Job";
        $this->load->view('admin/index',$data);
	}
	
	public function userLogin()
     {
          $username = $this->input->post("username");
  		  $password = $this->input->post("password");
          $this->form_validation->set_rules("username", "Email", "trim|required|min_length[6]|valid_email");
          $this->form_validation->set_rules("password", "Password", "trim|required");

          if ($this->form_validation->run() == FALSE)
          {
              redirect('admin');
          }
          else
          {
                    $usr_result = $this->Index_model->get_userLogin($username, $password);
                    if($usr_result > 0) //active user record is present
                    {
					  $sessiondata = array(
						'userAccessMail'=>$username,
						'userAccessName'=> $usr_result['username'],
						'userAccessId' => $usr_result['id'],
						'password' => TRUE
					   );
						$this->session->set_userdata($sessiondata);
						redirect("admin/dashboard/");
                    }
                    else
                    {
                     $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" style="padding:7px; margin-bottom:5px">Invalid Email and password!</div>');
                     redirect('admin');
                    }
          }
     }
	 
    function logout()
  	{
	  $sessiondata = array(
				'userAccessMail'=>'',
				'userAccessName'=> '',
				'userAccessId' => '',
				'password' => FALSE
		 );
	$this->session->unset_userdata($sessiondata);
	$this->session->sess_destroy();
    redirect('admin', 'refresh');
  }
  	
	
	function dashboard()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$data['title']="Dashboard Jobster BD | Bangladesh Leargest Online Job";
		$data['totalinst'] = $this->Index_model->getTable('jobpost','job_id','desc');
		$data['totalstd'] = $this->Index_model->getTable('category','scid','desc');
		$data['totalphoto'] = $this->Index_model->getTable('photogallery','b_id','desc');
		$data['totalvideo'] = $this->Index_model->getTable('vedio_gallery','photo_album_id','desc');
		
		$data['main_content']="admin/dashboard";
        $this->load->view('admin_template',$data);
	}


/////////////////////// Configuration Part ////////////////////////////////	

public function general()
	{
		
			$data['title'] =  'General Setting | jobstarbd';
			if(!$this->session->userdata('userAccessMail')) redirect("admin");
				$data['adminUpdate'] = $this->Index_model->getAllItemTable('configuration','','','','','id','desc');
				
				if($this->input->post('registration') && $this->input->post('registration')!=""){
						$config['allowed_types'] = '*';
						$config['remove_spaces'] = true;
						$config['max_size'] = '1000000';
						$config['upload_path'] = './asset/uploads/default/';
						$config['charset'] = "UTF-8";
						$new_name = "Banner_".time();
						$config['file_name'] = $new_name;
						$this->load->library('upload', $config);
						$this->upload->initialize($config);
							if (isset($_FILES['userphoto']['name']))
							{
								if($this->upload->do_upload('userphoto')){
									$upload_data	= $this->upload->data();
									$save['logo']	= $upload_data['file_name'];
								}
								else{
									$upload_data	=  $this->input->post('stillimg');
									$save['logo']	= $upload_data;	
								}
							}
						
						
						if($this->input->post('userAccess')!=""){
						$userAccess = $this->input->post('userAccess');
							//print_r($userAccess);
						$impaccess=implode(',',$userAccess);
						}
						else{
						 $impaccess='';
						}
						
						$save['username']	    = $username;
						$save['userid']	    	= $institute_id;
						$save['idcard']	    	= $this->input->post('idcard');
						$save['eseba']	    	= $this->input->post('eseba');
						$save['menu']	    	= $this->input->post('menu');
						$save['def_title']	    	= $this->input->post('def_title');
						$save['fContent']	    	= $this->input->post('fContent');
						$save['features']		= $impaccess;
						$save['created_on']	    = date('Y-m-d');
						$save['active']	    	= 1;
						
						if($this->input->post('user_id')!=""){
							$user_id=$this->input->post('user_id');
							$this->Index_model->update_table('configuration','id',$user_id,$save);
							$s='Updated';
						}
						else{
							$query = $this->Index_model->inertTable('configuration', $save);
							$s='Inserted';
							}
						$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
						redirect('admin/general', 'refresh');
				}
				else{
					$data['main_content']="admin/configuration/general_setting";
					$this->load->view('admin_template', $data);
				}
	}
	
	
	
	
	
	
	public function passwordChange()
	{
			$data['title'] =  'Passwored Change | jobstarbd';
			if(!$this->session->userdata('userAccessMail')) redirect("admin");
				if($this->input->post('changePassword')){
					$this->form_validation->set_rules('oldpassword', 'Old Password', 'trim|required');
					$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[confirmpassword]');
					$this->form_validation->set_rules('confirmpassword', 'Password Confirmation', 'required');
					$old_password = sha1($this->input->post('oldpassword'));
					$usId = $this->session->userdata('instituteAccessId');
					
					$queryCheck = $this->Index_model->checkOldPass('admin_users',$old_password,$usId);
					//echo $queryCheck->num_rows();
					if($queryCheck->num_rows() >0 ){
						if($this->form_validation->run() != false){
							$password =sha1($this->input->post('password'));
							$passwordHints =$this->input->post('password');
							$dataUpdate = array(
								'password'		=> $password,
								'pass_hints'	=> $passwordHints,
								'active'		=> 1,
								'update_date'	=> date('Y-m-d H:i:s')
							);
							
							$query = $this->Index_model->updateTable('admin_users','id',$usId,$dataUpdate);
							if($query){
								$this->session->set_flashdata('globalMsg','<div class="alert alert-success">Password Change Successfully </div>');
								redirect($_SERVER['HTTP_REFERER'],'refresh');
							}
						}
						else{
							$data['main_content']="admin/configuration/change_password";
							$this->load->view('admin_template', $data);
						}
					}
					else{
						$this->session->set_flashdata('globalMsg', '<div class="alert alert-danger">Old Password not match </div>');
						redirect($_SERVER['HTTP_REFERER'],'refresh');
					}
				}
				else{
					$data['main_content']="admin/configuration/change_password";
					$this->load->view('admin_template', $data);
				}
	}
	
	
	public function profileUpdate()
	{
		
			$data['title'] =  'Profile Update | jobstarbd';
			if(!$this->session->userdata('userAccessMail')) redirect("admin");
				    $data['instituteUpdate'] = $this->Index_model->getAllItemTable('institute','uni_id',$institute_id,'','','uni_id','desc');
					$data['countryAll']= $this->Index_model->getDataById('countryall','parent_id','0','name','asc','');
					$data['division_list']= $this->Index_model->getDataById('divisions','','','name','asc','');
					
					if($this->input->post('registration') && $this->input->post('registration')!=""){
						$this->form_validation->set_rules('institute_name', 'Institute name', 'trim|required');
						$this->form_validation->set_rules('inst_type', 'Institute Type', 'trim|required');
			
						if($this->form_validation->run() != false){
							$config['allowed_types'] = '*';
							$config['remove_spaces'] = true;
							$config['max_size'] = '1000000';
							$config['upload_path'] = './asset/uploads/institute/';
							$config['charset'] = "UTF-8";
							$new_name = "institute_".time();
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
										$upload_data	= $this->input->post('stillImage');
										$save['logo']	= $upload_data;	
									}
								}	
							
							$clstype = $this->input->post('class_type');
							$arrayvalctype = join(',',$clstype);
							$save['name']	    = $this->input->post('institute_name');
							$expval=explode(' ',$this->input->post('institute_name'));
							$impval=implode('-',$expval);
							$save['slug']	    	= addslashes(strtolower($impval));
							$save['banglanam']	    = $this->input->post('banglanam');
							$save['subtitle']	    = $this->input->post('subtitle');
							$save['inst_type']	    = $this->input->post('inst_type');
							$save['class_type']	    = $arrayvalctype;
							$save['inst_code']	    = $this->input->post('einno');
							$save['noofstd']	    = $this->input->post('noofstd');
							$save['branchno']	    = $this->input->post('branchno');
							$save['email']	   		= $this->input->post('email');
							$save['contact']	    = $this->input->post('contact');

							$save['telephone']	    = $this->input->post('telephone');
							$save['fax']	    	= $this->input->post('fax');
							$save['division']	    = $this->input->post('division');
							$save['district']	    = $this->input->post('city');
							$save['thana']	    	= $this->input->post('thana');
							$save['street']	    	= $this->input->post('street');
											
							$save['institute_details']	    = $this->input->post('details');
							$save['address']	    = $this->input->post('address');
							$save['date']	    = date('Y-m-d');
							$save['active']	    	= 1;
							
							
							if($this->input->post('uni_id')!=""){
								$uni_id=$this->input->post('uni_id');
								$this->Index_model->update_table('institute','uni_id',$uni_id,$save);
								$s='Updated';
							}
							else{
								$query = $this->Index_model->inertTable('institute', $save);
								$s='Inserted';
							}
								
							
							$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
							redirect(base_url('admin/profileUpdate'), 'refresh');
						}
						else{
							$data['main_content']="admin/configuration/update_profile";
							$this->load->view('admin_template', $data);
						}
					}
					else{
						$data['main_content']="admin/configuration/update_profile";
						$this->load->view('admin_template', $data);
					}
		}
	
/////////////////////// Admin Modification Part ////////////////////////////////	 
	
	function administration_list()
	{
			$data['title'] =  'Admin List | jobstarbd';

			if(!$this->session->userdata('userAccessMail')) redirect("admin");
				$data['title']="Admin List | institute Management System";
				$data['admin_list'] = $this->Index_model->getAllItemTable('admin_users','','','','','id','desc');
				
				$data['main_content']="admin/administration/admin_list";
				$this->load->view('admin_template',$data);
	} 
	
	function administration_registration()
	{
		
			$data['title'] =  'Admin Registration | jobstarbd';
			if(!$this->session->userdata('userAccessMail')) redirect("admin");
				$data['title']="Admin Registration | institute Management System";
				$userId=$this->uri->segment(3);
				$data['adminUpdate'] = $this->Index_model->getAllItemTable('admin_users','id',$userId,'','','id','desc');
				
				if($this->input->post('registration') && $this->input->post('registration')!=""){
					if($userId!=''){
						$original_value = $this->db->query("SELECT email FROM admin_users WHERE id = ".$userId)->row()->email;
						if($this->input->post('email') != $original_value) {
						   $is_unique =  '|is_unique[admin_users.email]';
						} else {
						   $is_unique =  '';
						}
						
						$original_value = $this->db->query("SELECT userid FROM admin_users WHERE id = ".$userId)->row()->userid;
						if($this->input->post('userid') != $original_value) {
						   $is_unique1 =  '|is_unique[admin_users.userid]';
						} else {
						   $is_unique1 =  '';
						}
					}
					else{
						$is_unique =  '|is_unique[admin_users.email]';	
						$is_unique1 =  '|is_unique[admin_users.userid]';	
					}
					
					$this->form_validation->set_rules('username', 'Admin Name', 'trim|required');
					//$this->form_validation->set_rules('userid', 'User ID', 'trim|required'.$is_unique1);
					$this->form_validation->set_rules('email', 'Login Email', 'trim|required'.$is_unique);
					$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[confirmpassword]');
					$this->form_validation->set_rules('confirmpassword', 'Password Confirmation', 'required');
					
					if($this->form_validation->run() != false){
						$config['allowed_types'] = '*';
						$config['remove_spaces'] = true;
						$config['max_size'] = '1000000';
						$config['upload_path'] = './asset/uploads/admin/';
						$config['charset'] = "UTF-8";
						$new_name = "admin_".time();
						$config['file_name'] = $new_name;
						$this->load->library('upload', $config);
						$this->upload->initialize($config);
							if (isset($_FILES['userphoto']['name']))
							{
								if($this->upload->do_upload('userphoto')){
									$upload_data	= $this->upload->data();
									$save['photo']	= $upload_data['file_name'];
								}
								else{
									$upload_data	=  $this->input->post('stillimg');
									$save['photo']	= $upload_data;	
								}
							}
						
						
						if($this->input->post('userAccess')!=""){
						$userAccess = $this->input->post('userAccess');
							//print_r($userAccess);
						$impaccess=implode(',',$userAccess);
						}
						else{
						 $impaccess='';
						}
						$save['username']	    = $this->input->post('username');
						$save['urlname']	    = $this->input->post('userUrl');
						$save['userid']	    	= $this->input->post('userid');
						$save['contactno']	    = $this->input->post('contactno');
						$save['admin_type']	    = $this->input->post('admintype');
						$save['admin_access']	= $impaccess;
						$save['email']	    	= $this->input->post('email');
						$save['password']	    = sha1($this->input->post('password'));
						$save['pass_hints']	    = $this->input->post('password');
						$save['created_on']	    = date('Y-m-d');
						$save['active']	    	= 1;
						
						if($this->input->post('user_id')!=""){
							$user_id=$this->input->post('user_id');
							$this->Index_model->update_table('admin_users','id',$user_id,$save);
							$s='Updated';
						}
						else{
							$query = $this->Index_model->inertTable('admin_users', $save);
							$s='Inserted';
							}
						$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
						redirect('admin/administration_list', 'refresh');
						
					}
					else{
						$data['main_content']="admin/administration/admin_registration";
						$this->load->view('admin_template', $data);
						}
				}
				else{
					$data['main_content']="admin/administration/admin_registration";
					$this->load->view('admin_template', $data);
				}
	}
	


	
	
	
	
	
	////////////// Member Part/////////////////////////////////////////////////////////
	function member_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$data['title']="Member List | Jobster BD";
		$details=$this->uri->segment(3);
		$data['member_list'] = $this->Index_model->getTable('member','id','desc');
		if($details!=''){
			$mid=$this->uri->segment(4);
			$data['memberDetails'] = $this->Index_model->getAllItemTable('member','id',$mid,'','','id','desc');
			$data['main_content']="admin/member/memberDetails";
		}
		else{
			$data['main_content']="admin/member/member_list";
		}
		$this->load->view('admin_template',$data);
	} 
	
	
/////////////////////// menu ////////////////////////////////	 
	function menu_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$data['title']="Menu List | Jobster BD";
		$data['menu_list'] = $this->Index_model->getTable('menu','m_id','desc');
		$data['main_content']="admin/menu/menu_list";
        $this->load->view('admin_template',$data);
	} 
	 
   function update_sequence()
	{
		$seqence=$this->input->get('sequence');
		$id=$this->input->get('id');
		$colid=$this->input->get('colid');
		$table=$this->input->get('table');
		$this->Index_model->update_squnce($table,$seqence,$colid,$id);     
		redirect($_SERVER['HTTP_REFERER'], '');
	}
	
	function menu_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin/dashboard");
		$artiId=$this->uri->segment(3);
		$data['menuUpdate'] = $this->Index_model->getAllItemTable('menu','m_id',$artiId,'','','m_id','desc');
		$data['root_menu'] = $this->Index_model->getAllItemTable('menu','root_id',0,'','','menu_name','asc');
		if(!$artiId){
			$data['title']="menu Registration | Jobster BD";
			$this->form_validation->set_rules('menu_name', 'menu name', 'trim|required');
		}
		else{
			$data['title']="menu Update | Jobster BD";
			$this->form_validation->set_rules('menu_name', 'menu name', 'trim|required');
		}
		if($this->input->post('registration') && $this->input->post('registration')!=""){
			if($this->form_validation->run() != false){
			$expval=explode(' ',$this->input->post('menu_name'));
			$impval=implode('-',$expval);
				$save['menu_name']	    = addslashes($this->input->post('menu_name'));
				$save['slug']	    = addslashes(strtolower($impval));
				$save['menu_type']	    = $this->input->post('menu_type');
				$save['root_id']	    = $this->input->post('root_id');
				$save['sroot_id']	    = $this->input->post('sroot_id');
				$save['page_structure']	    = $this->input->post('page_structure');
				$save['external_link']	    = $this->input->post('externallink');
				$save['date']	    = date('Y-m-d');
				
				if($this->input->post('m_id')!=""){
					$m_id=$this->input->post('m_id');
					$this->Index_model->update_table('menu','m_id',$m_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('menu', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/menu_list', 'refresh');
			}
			else{
				$data['main_content']="admin/menu/menu_action";
        		$this->load->view('admin_template', $data);
				}
		}
		$data['main_content']="admin/menu/menu_action";
        $this->load->view('admin_template', $data);
	}
	
	
	/////////////////////// currency ////////////////////////////////	 
	function currency_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$data['title']="currency List | Jobster BD";
		$data['currency_list'] = $this->Index_model->getTable('currency','m_id','desc');
		$data['main_content']="admin/currency/currency_list";
        $this->load->view('admin_template',$data);
	} 
	 
 	
	function currency_registration()
	{
		
		if(!$this->session->userdata('userAccessMail')) redirect("admin/dashboard");
		$artiId=$this->uri->segment(3);
		$data['currencyUpdate'] = $this->Index_model->getAllItemTable('currency','m_id',$artiId,'','','m_id','desc');
		$data['title']="currency Registration | Jobster BD";
		$this->form_validation->set_rules('currency_name', 'currency name', 'trim|required');
		$this->form_validation->set_rules('currency_symble', 'Currency Symble', 'trim|required');
		if($this->input->post('registration') && $this->input->post('registration')!=""){
			if($this->form_validation->run() != false){
			$expval=explode(' ',$this->input->post('currency_name'));
			$impval=implode('-',$expval);
				$save['currency_name']	    = addslashes($this->input->post('currency_name'));
				$save['symble']	    = $this->input->post('currency_symble');
				$save['price']	    = addslashes($this->input->post('price'));
				$save['slug']	    = addslashes(strtolower($impval));
				$save['date']	    = date('Y-m-d');
				
				if($this->input->post('m_id')!=""){
					$m_id=$this->input->post('m_id');
					$this->Index_model->update_table('currency','m_id',$m_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('currency', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/currency_list', 'refresh');
			}
			else{
				$data['main_content']="admin/currency/currency_action";
        		$this->load->view('admin_template', $data);
				}
		}
		$data['main_content']="admin/currency/currency_action";
        $this->load->view('admin_template', $data);
	}
	
	
	function ajaxData()
	{
		if($this->input->get('root_id')!=""){
			$rid=$this->input->get('root_id');
			$url=base_url()."'/admin/ajaxData?sroot_id='+this.value+''";
			$sroot_menu = $this->Index_model->getAllItemTable('menu','root_id',$rid,'','','menu_name','asc');
			$svar='<select name="sroot_id" class="form-control" style="width:60%;" onChange="getSubMenu('.$url.')">
								<option value="">Sub Menu</option>';
								 foreach($sroot_menu->result() as $rootmenu):
									$svar .= '<option value="'.$rootmenu->m_id.'">'.$rootmenu->menu_name.'</option>';
								endforeach;
							$svar .= '</select>';
			echo $svar;
		}
		elseif($this->input->get('div_id')!=""){
			$rid=$this->input->get('div_id');
			$url="'".base_url()."admin/ajaxData?district_id='+this.value+''";
			$sroot_menu = $this->Index_model->getAllItemTable('districts','division_id',$rid,'','','name','asc');
			$svar='<select name="city" id="city" class="form-control" onChange="getLocation('.$url.')" style="width:30%">
								<option value="">Districts</option>';
								 foreach($sroot_menu->result() as $rootmenu):
									$svar .= '<option value="'.$rootmenu->id.'">'.$rootmenu->name.'</option>';
								endforeach;
							$svar .= '</select>';
			echo $svar;
		}
		elseif($this->input->get('district_id')!=""){
			$rid=$this->input->get('district_id');
			$sroot_menu = $this->Index_model->getAllItemTable('upazilas','district_id',$rid,'','','name','asc');
			$svar='<select name="thana" id="thana" class="form-control" style="width:30%">
								<option value="">Thana</option>';
								 foreach($sroot_menu->result() as $rootmenu):
									$svar .= '<option value="'.$rootmenu->id.'">'.$rootmenu->name.'</option>';
								endforeach;
							$svar .= '</select>';
			echo $svar;			
		}
		elseif($this->input->get('cat_id')!=""){
			$rid=$this->input->get('cat_id');
			//$url="'".base_url()."admin/ajaxCategory?subcat_id='+this.value+''";
			$sroot_menu = $this->Index_model->getAllItemTable('category','cat_id',$rid,'','','sub_cat_name','asc');
			$svar='<select name="job_category" id="job_category" class="form-control">
								<option value="">Category</option>';
								 foreach($sroot_menu->result() as $rootmenu):
									$svar .= '<option value="'.$rootmenu->sub_cat_slug.'">'.$rootmenu->sub_cat_name.'</option>';
								endforeach;
							$svar .= '</select>';
			echo $svar;
		}
	}


/////////////////////// content ////////////////////////////////	 
	function content_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$data['title']="content List | Jobster BD";
		$data['content_list'] = $this->Index_model->getTable('article_manage','a_id','desc');
		$data['main_content']="admin/content/content_list";
        $this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function content_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin/dashboard");
		$data['root_menu'] = $this->Index_model->getAllItemTable('menu','','','','','menu_name','asc');
		$artiId=$this->uri->segment(3);
		if(!$artiId){
			$data['title']="content Registration | Jobster BD";
		}
		else{
			$data['title']="content Update | Jobster BD";
		}
		$data['contentUpdate'] = $this->Index_model->getAllItemTable('article_manage','a_id',$artiId,'','','a_id','desc');
		if($this->input->post('registration') && $this->input->post('registration')!=""){
			$this->form_validation->set_rules('headline', 'content Headline', 'trim|required');
			$this->form_validation->set_rules('details', 'content Details', 'trim|required');
			
			if($this->form_validation->run() != false){
				$save['menu_title']	    = $this->input->post('root_id');
				$save['headline']	    = $this->input->post('headline');
				$save['details']	    	= $this->input->post('details');
				$save['date']	    = date('Y-m-d');
				
				if($this->input->post('a_id')!=""){
					$a_id=$this->input->post('a_id');
					$this->Index_model->update_table('article_manage','a_id',$a_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('article_manage', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/content_list', 'refresh');
			}
			else{
				$data['main_content']="admin/content/content_action";
        		$this->load->view('admin_template', $data);
				}
		}
		$data['main_content']="admin/content/content_action";
        $this->load->view('admin_template', $data);
	}
	
	/////////////////////// banner ////////////////////////////////	 
	function banner_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$data['title']="banner List | Jobster BD";
		$data['banner_list'] = $this->Index_model->getTable('banner','b_id','desc');
		$data['main_content']="admin/banner/banner_list";
        $this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function banner_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin/dashboard");
		$artiId=$this->uri->segment(3);
		if(!$artiId){
			$data['title']="Banner Registration | Jobster BD";
		}
		else{
			$data['title']="Banner Update | Jobster BD";
		}
		$data['bannerUpdate'] = $this->Index_model->getAllItemTable('banner','b_id',$artiId,'','','b_id','desc');
		if($this->input->post('registration') && $this->input->post('registration')!=""){
			$this->form_validation->set_rules('banner_name', 'banner name', 'trim|required');
			
			if($this->form_validation->run() != false){
				
			$config['allowed_types'] = '*';
			$config['remove_spaces'] = true;
			$config['max_size'] = '1000000';
			$config['upload_path'] = './asset/uploads/banner/';
			$config['charset'] = "UTF-8";
			$new_name = "Banner_".time();
			$config['file_name'] = $new_name;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
				if (isset($_FILES['bannerPhoto']['name']))
				{
					if($this->upload->do_upload('bannerPhoto')){
						$upload_data	= $this->upload->data();
						$save['image']	= $upload_data['file_name'];
					}
					else{
						$upload_data	= "";
						$save['image']	= $upload_data;	
					}
				}	
				
				$save['banner_name']	    = $this->input->post('banner_name');
				$save['date']	    = date('Y-m-d');
				
				if($this->input->post('b_id')!=""){
					$b_id=$this->input->post('b_id');
					$this->Index_model->update_table('banner','b_id',$b_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('banner', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/banner_list', 'refresh');
			}
			else{
				$data['main_content']="admin/banner/banner_action";
        		$this->load->view('admin_template', $data);
				}
		}
		$data['main_content']="admin/banner/banner_action";
        $this->load->view('admin_template', $data);
	}


/////////////////////// advertisement ////////////////////////////////	 
	function advertisement_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$data['title']="advertisement List | Jobster BD";
		$data['advertisement_list'] = $this->Index_model->getTable('advertisement','b_id','desc');
		$data['main_content']="admin/advertisement/advertisement_list";
        $this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function advertisement_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin/dashboard");
		$artiId=$this->uri->segment(3);
		if(!$artiId){
			$data['title']="advertisement Registration | Jobster BD";
		}
		else{
			$data['title']="advertisement Update | Jobster BD";
		}
		$data['advertisementUpdate'] = $this->Index_model->getAllItemTable('advertisement','b_id',$artiId,'','','b_id','desc');
		if($this->input->post('registration') && $this->input->post('registration')!=""){
			$this->form_validation->set_rules('advertisement_name', 'advertisement name', 'trim|required');
			
			if($this->form_validation->run() != false){
				$config['allowed_types'] = '*';
				$config['remove_spaces'] = true;
				$config['max_size'] = '1000000';
				$config['upload_path'] = './asset/uploads/advertisement/';
				$config['charset'] = "UTF-8";
				$new_name = "Advertisement_".time();
				$config['file_name'] = $new_name;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if (isset($_FILES['ad_photo']['name']))
					{
						if($this->upload->do_upload('ad_photo')){
							$upload_data	= $this->upload->data();
							$save['image']	= $upload_data['file_name'];
						}
						else{
							$upload_data	= "";
							$save['image']	= $upload_data;	
						}
					}	
				
				$save['advertisement_name']	    = $this->input->post('advertisement_name');
				$save['date']	    = date('Y-m-d');
				
				if($this->input->post('b_id')!=""){
					$b_id=$this->input->post('b_id');
					$this->Index_model->update_table('advertisement','b_id',$b_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('advertisement', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/advertisement_list', 'refresh');
			}
			else{
				$data['main_content']="admin/advertisement/advertisement_action";
        		$this->load->view('admin_template', $data);
				}
		}
		$data['main_content']="admin/advertisement/advertisement_action";
        $this->load->view('admin_template', $data);
	}
	
	
	
	
	
	/////////////////////// Job Type Area ////////////////////////////////	 
	function jobtype_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$data['title']="jobtype List | jobstarbd";
		$data['jobtype_list'] = $this->Index_model->getTable('jobtype','cid','desc');
		$data['main_content']="admin/job_category/jobtype_list";
        $this->load->view('admin_template',$data);
	} 
	 
	 
	function jobtype_action()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$artiId=$this->uri->segment(3);
		$data['jobtypeUpdate'] = $this->Index_model->getAllItemTable('jobtype','cid',$artiId,'','','cid','desc');
		if(!$artiId){
			$data['title']="jobtype Registration | jobstarbd";
			$this->form_validation->set_rules('jobtype_name', 'jobtype name', 'callback_jobtype_check');
		}
		else{
			$data['title']="jobtype Update | jobstarbd";
			$this->form_validation->set_rules('jobtype_name', 'jobtype name', 'trim|required');
		}
		
		
		if($this->input->post('registration') && $this->input->post('registration')!=""){
			if($this->form_validation->run() != false){
				
				$expval=explode(' ',$this->input->post('jobtype_name'));
				$impval=implode('-',$expval);
				$save['cat_name']	    = addslashes($this->input->post('jobtype_name'));
				$save['cat_slug']	    = addslashes(strtolower(str_replace('/','_',$impval)));
				$save['create_date']	= date('Y-m-d');
				$save['sequence']	    = 0;
				$save['status']	    = $this->input->post('status');
				
				if($this->input->post('cid')!=""){
					$cid=$this->input->post('cid');
					$this->Index_model->update_table('jobtype','cid',$cid,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('jobtype', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/jobtype_list', 'refresh');
			}
			else{
				$data['main_content']="admin/job_category/jobtype_action";
        		$this->load->view('admin_template', $data);
				}
		}
		else{
			$data['main_content']="admin/job_category/jobtype_action";
			$this->load->view('admin_template', $data);
		}
	}
	

	public function jobtype_check($str)
	{
		$value = $this->Index_model->category_exist($str);		
		if ($value->num_rows() > 0)
		{
			$this->form_validation->set_message('username_check', 'The %s already exist');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

/////////////////////// Job category ////////////////////////////////	 
	function category_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$data['title']="category List | jobstarbd";
		$data['category_list'] = $this->Index_model->getTable('category','scid','desc');
		$data['main_content']="admin/job_category/category_list";
        $this->load->view('admin_template',$data);
	} 
	 
	 
	function category_action()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$artiId=$this->uri->segment(3);
		$cate=$this->input->post('category');
		$data['categoryUpdate'] = $this->Index_model->getAllItemTable('category','scid',$artiId,'','','scid','desc');
		$data['category_list'] = $this->Index_model->getTable('jobtype','cid','desc');
		if(!$artiId){
			$data['title']="category Registration | jobstarbd";
		     $this->form_validation->set_rules('category_name', 'category name', 'trim|required');
			//$this->form_validation->set_rules('category_name', 'Sub Category name', 'callback_subcategory_check['.$bouid.','.$cate.']');
		}
		else{
			$data['title']="category Update | jobstarbd";
			$this->form_validation->set_rules('category_name', 'category name', 'trim|required');
		}
		if($this->input->post('registration') && $this->input->post('registration')!=""){
			if($this->form_validation->run() != false){
				
				$expval=explode(' ',$this->input->post('category_name'));
				$impval=implode('-',$expval);
				$save['cat_id']	    = $cate;
				$save['sub_cat_name']	    = addslashes($this->input->post('category_name'));
				$save['sub_cat_slug']	    = addslashes(strtolower(str_replace('/','_',$impval)));
				$save['create_date']	    = date('Y-m-d');
				$save['status']	    = $this->input->post('status');
				
				if($this->input->post('scid')!=""){
					$scid=$this->input->post('scid');
					$this->Index_model->update_table('category','scid',$scid,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('category', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/category_list', 'refresh');
			}
			else{
				$data['main_content']="admin/job_category/category_action";
        		$this->load->view('admin_template', $data);
				}
		}
		$data['main_content']="admin/job_category/category_action";
        $this->load->view('admin_template', $data);
	}
	
	

	public function subcategory_check($str,$journalist,$catid)
	{
		$value = $this->Index_model->subcategory_exist($str,$journalist,$catid);		
		if ($value->num_rows() > 0)
		{
			$this->form_validation->set_message('subcategory_check', 'The %s already exist');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	
	
	function ajaxCatData()
	{
		if($this->input->get('root_id')!=""){
			$rid=$this->input->get('root_id');
			$url="'".base_url()."admin/ajaxData?sroot_id='+this.value+''";
			$sroot_category = $this->Index_model->getAllItemTable('category','root_id',$rid,'','','category_name','asc');
			$svar='<select name="sroot_id" class="form-control" style="width:60%;" onChange="getSubcategory('.$url.')">
								<option value="">Sub category</option>';
								 foreach($sroot_category->result() as $rootcategory):
									$svar .= '<option value="'.$rootcategory->cid.'">'.$rootcategory->category_name.'</option>';
								endforeach;
							$svar .= '</select>';
			echo $svar;
		}
		elseif($this->input->get('sroot_id')!=""){
			$rid=$this->input->get('sroot_id');
			$sroot_category = $this->Index_model->getAllItemTable('category','sroot_id',$rid,'','','category_name','asc');
			$svar='<select name="lroot_id" class="form-control" style="width:60%;">
								<option value="">Last category</option>';
								 foreach($sroot_category->result() as $rootcategory):
									$svar .= '<option value="'.$rootcategory->cid.'">'.$rootcategory->category_name.'</option>';
								endforeach;
							$svar .= '</select>';
			echo $svar;
		}
	}

	
	
	/////////////////////// jobpost////////////////////////////////	 
	
	function jobpost_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$data['title']="jobpost List | jobstarbd";
		$data['jobpostlist'] = $this->Index_model->getDataById('jobpost','','','job_id','desc','');
		
		$data['main_content']="admin/jobpost/jobpost_list";
        $this->load->view('admin_template',$data);
	} 
	 
	
	
	function jobpost_action()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$artiId=$this->uri->segment(3);
		if(!$artiId){
			$data['title']="jobpost Insert | jobstarbd";
		}
		else{
			$data['title']="jobpost Update | jobstarbd";
		}
		$data['jobpostUpdate'] = $this->Index_model->getAllItemTable('jobpost','job_id',$artiId,'','','job_id','desc');
		$data['allcategory']		= $this->Index_model->getDataById('jobtype','','','cat_name','asc','');
		if($this->input->post('registration') && $this->input->post('registration')!=""){

		$this->form_validation->set_rules('job_title', 'Job Title', 'trim|required');
		
		if ($this->form_validation->run() != FALSE){		
				$proTitle = explode(' ',$this->input->post('job_title'));				
				$proUrl = implode("-",$proTitle);
				$save['slug']		= str_replace('/', '_', $proUrl);
				
			$joblavel = $this->input->post('jobLevel');
			$jlavelarr = join(',',$joblavel);
			
			$jobNatur = $this->input->post('jobNatur');
			$jnatelarr = join(',',$jobNatur);
				
			$save['emp_id']				= $this->session->userdata('emp_id');
			$save['job_title']			= $this->input->post('job_title');			
			$save['catType']			= $this->input->post('catType');
			$save['job_category']		= $this->input->post('job_category');
			$save['publishedBy']	    = $this->input->post('publishedBy');
			$save['vacancy']	    	= $this->input->post('vacancy');
			$save['jobNatur']	    	= $jnatelarr;
			$save['jobLevel']	    	= $jlavelarr;
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
				$data['main_content']="admin/jobpost/jobpost_action";
        		$this->load->view('admin_template', $data);
				}
		}
		else{
			$data['main_content']="admin/jobpost/jobpost_action";
			$this->load->view('admin_template', $data);
		}
	}
	
	
	
	/////////////////////// news ////////////////////////////////	 
	function news_list()
	{
			if(!$this->session->userdata('userAccessMail')) redirect("admin");
			$data['title']="news List | institute Management System";
			$data['news_list'] = $this->Index_model->getAllItemTable('news','','','','','news_id','desc');
			$data['main_content']="admin/news/news_list";

			$this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function news_registration()
	{
		
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$artiId=$this->uri->segment(3);
		if(!$artiId){

			$data['title']="news Registration | institute Management System";
		}
		else{
			$data['title']="news Update | institute Management System";
		}
		$data['newsUpdate'] = $this->Index_model->getAllItemTable('news','news_id',$artiId,'','','news_id','desc');
		
		if($this->input->post('registration') && $this->input->post('registration')!=""){
			$this->form_validation->set_rules('newsTitle', 'news Title', 'trim|required');
			if($this->form_validation->run() != false){
				
			$config['allowed_types'] = '*';
			$config['remove_spaces'] = true;
			$config['max_size'] = '1000000';
			$config['upload_path'] = './asset/uploads/news/';
			$config['charset'] = "UTF-8";
			$new_name = "news_".time();
			$config['file_name'] = $new_name;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
				if (isset($_FILES['logo']['name']))
				{
					if($this->upload->do_upload('logo')){
						$upload_data	= $this->upload->data();
						$save['image']	= $upload_data['file_name'];
					}
					else{
						$upload_data	= $this->input->post('stillImage');
						$save['image']	= $upload_data;	
					}
				}	
				
				$save['news_title']	    = $this->input->post('newsTitle');
				$expval=explode(' ',$this->input->post('newsTitle'));
			    $impval=implode('-',$expval);
				$save['slug']	    = addslashes(str_replace('/','_',$impval));
				$save['post']	    = $this->input->post('post_by');
				$save['short_description']	    = $this->input->post('short_desc');
				$save['status']	    = $this->input->post('status');
				$save['key_word']	    = $this->input->post('keyword');
				$save['seo_details']	    = $this->input->post('meta_desc');
				$save['date_time']	    = date('Y-m-d H:i:s');
				
				if($this->input->post('news_id')!=""){
					$news_id=$this->input->post('news_id');
					$this->Index_model->update_table('news','news_id',$news_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('news', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/news_list', 'refresh');
			}
			else{
				$data['main_content']="admin/news/news_action";
        		$this->load->view('admin_template', $data);
				}
			}
			$data['main_content']="admin/news/news_action";
			$this->load->view('admin_template', $data);
	}
	
	
	
	
	
	/////////////////////// Events ////////////////////////////////	 
	function events_list()
	{
			if(!$this->session->userdata('userAccessMail')) redirect("admin");
			$data['title']="events List | institute Management System";

			$data['events_list'] = $this->Index_model->getAllItemTable('events','','','','','m_id','desc');
			
			$data['main_content']="admin/events/events_list";
			$this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function events_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$artiId=$this->uri->segment(3);
		
		$data['eventsUpdate'] = $this->Index_model->getAllItemTable('events','m_id',$artiId,'','','m_id','desc');
		if(!$artiId){
			$data['title']="Events Registration | institute Management System";
			$this->form_validation->set_rules('events_name', 'events name', 'trim|required|is_unique[events.events_name]');
		}
		else{
			$data['title']="Events Update | institute Management System";
			$this->form_validation->set_rules('events_name', 'events name', 'trim|required');
		}
		if($this->input->post('registration') && $this->input->post('registration')!=""){

			if($this->form_validation->run() != false){
				$config['allowed_types'] = '*';
				$config['remove_spaces'] = true;
				$config['max_size'] = '1000000';
				$config['upload_path'] = './asset/uploads/event/';
				$config['charset'] = "UTF-8";
				$new_name = "Advertisement_".time();
				$config['file_name'] = $new_name;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if (isset($_FILES['ad_photo']['name']))
					{
						if($this->upload->do_upload('ad_photo')){
							$upload_data	= $this->upload->data();
							$save['image']	= $upload_data['file_name'];
						}
						else{
							$upload_data	= "";
							$save['image']	= $upload_data;	
						}
					}
					
					
			$expval=explode(' ',$this->input->post('events_name'));
			$impval=implode('-',$expval);
				$save['events_name']	    = addslashes($this->input->post('events_name'));
				$save['events_details']	    = addslashes($this->input->post('details'));
				$save['slug']	    = addslashes(strtolower($impval));
				$save['upcomming_id']	    = $this->input->post('upcomming');
				$save['latest_id']	    = $this->input->post('latest');
				$save['status']	    = 1;
				$save['date']	    = date('Y-m-d');
				
				if($this->input->post('m_id')!=""){
					$m_id=$this->input->post('m_id');
					$this->Index_model->update_table('events','m_id',$m_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('events', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/events_list', 'refresh');
			}
			else{
				$data['main_content']="admin/events/events_action";
        		$this->load->view('admin_template', $data);
				}
		}
		else{
			$data['main_content']="admin/events/events_action";
			$this->load->view('admin_template', $data);
		}
	}
	
	
	
	
	
	/////////////////////// success_story ////////////////////////////////	 
	function success_story_list()
	{
			if(!$this->session->userdata('userAccessMail')) redirect("admin");
			$data['title']="success_story List | institute Management System";

			$data['success_story_list'] = $this->Index_model->getAllItemTable('success_story','','','','','m_id','desc');
			
			$data['main_content']="admin/success_story/success_story_list";
			$this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function success_story_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$artiId=$this->uri->segment(3);
		
		$data['success_storyUpdate'] = $this->Index_model->getAllItemTable('success_story','m_id',$artiId,'','','m_id','desc');
		if(!$artiId){
			$data['title']="success_story Registration | institute Management System";
			$this->form_validation->set_rules('success_story_name', 'success_story name', 'trim|required|is_unique[success_story.success_story_name]');
		}
		else{
			$data['title']="success_story Update | institute Management System";
			$this->form_validation->set_rules('success_story_name', 'success_story name', 'trim|required');
		}
		if($this->input->post('registration') && $this->input->post('registration')!=""){

			if($this->form_validation->run() != false){
				$config['allowed_types'] = '*';
				$config['remove_spaces'] = true;
				$config['max_size'] = '1000000';
				$config['upload_path'] = './asset/uploads/story/';
				$config['charset'] = "UTF-8";
				$new_name = "Advertisement_".time();
				$config['file_name'] = $new_name;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if (isset($_FILES['ad_photo']['name']))
					{
						if($this->upload->do_upload('ad_photo')){
							$upload_data	= $this->upload->data();
							$save['image']	= $upload_data['file_name'];
						}
						else{
							$upload_data	= "";
							$save['image']	= $upload_data;	
						}
					}
					
					
				$expval=explode(' ',$this->input->post('success_story_name'));
				$impval=implode('-',$expval);
				$save['success_story_name']	    = addslashes($this->input->post('success_story_name'));
				$save['success_story_details']	    = addslashes($this->input->post('details'));
				$save['slug']	    = addslashes(strtolower($impval));
				$save['date']	    = date('Y-m-d');
				
				if($this->input->post('m_id')!=""){
					$m_id=$this->input->post('m_id');
					$this->Index_model->update_table('success_story','m_id',$m_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('success_story', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/success_story_list', 'refresh');
			}
			else{
				$data['main_content']="admin/success_story/success_story_action";
        		$this->load->view('admin_template', $data);
				}
		}
		else{
			$data['main_content']="admin/success_story/success_story_action";
			$this->load->view('admin_template', $data);
		}
	}
	
	
	/////////////////////// Courses Training ////////////////////////////////	 
	function courses_training_list()
	{
			if(!$this->session->userdata('userAccessMail')) redirect("admin");
			$data['title']="courses_training List | institute Management System";

			$data['courses_training_list'] = $this->Index_model->getAllItemTable('courses_training','','','','','courses_id','desc');
			
			$data['main_content']="admin/courses_training/courses_training_list";
			$this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function courses_training_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$artiId=$this->uri->segment(3);
		
			$data['courses_trainingUpdate'] = $this->Index_model->getAllItemTable('courses_training','courses_id',$artiId,'','','courses_id','desc');
			$data['title']="Courses Training Update | jobstarbd";
			$this->form_validation->set_rules('couTitle', 'Training Title', 'trim|required');

		if($this->input->post('registration') && $this->input->post('registration')!=""){

			if($this->form_validation->run() != false){
				
                $expval=explode(' ',$this->input->post('couTitle'));
                $impval=implode('-',$expval);
				$save['slug']=strtolower(str_replace('/', '_', $impval));
				$save['title']=$this->input->post('couTitle');
				$save['c_duration']=$this->input->post('c_duration');
				$save['comp_name']=$this->input->post('comp_name');
				$save['comp_add']=$this->input->post('comp_add');
				$save['phone']=$this->input->post('phone');
				$save['email']=$this->input->post('email');
				$save['web']=$this->input->post('web');
				$save['app_deadline']=$this->input->post('app_deadline');
				$save['c_starts']=$this->input->post('c_starts');
				$save['c_fee']=$this->input->post('c_fee');
				$save['short_text']=$this->input->post('short_text');
				$save['details_text']=$this->input->post('details_text');
				$save['date']	    = date('Y-m-d');
				
				
				if($this->input->post('c_id')!=""){
					$c_id=$this->input->post('c_id');
					$this->Index_model->update_table('courses_training','courses_id',$c_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('courses_training', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/courses_training_list', 'refresh');
			}
			else{
				$data['main_content']="admin/courses_training/courses_training_action";
        		$this->load->view('admin_template', $data);
				}
		}
		else{
			$data['main_content']="admin/courses_training/courses_training_action";
			$this->load->view('admin_template', $data);
		}
	}
	
	
	
	
	
	/////////////////////// Workshop ////////////////////////////////	 
	function workshop_list()
	{
			if(!$this->session->userdata('userAccessMail')) redirect("admin");
			$data['title']="workshop List | institute Management System";

			$data['workshop_list'] = $this->Index_model->getAllItemTable('workshop','','','','','courses_id','desc');
			
			$data['main_content']="admin/workshop/workshop_list";
			$this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function workshop_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$artiId=$this->uri->segment(3);
		
			$data['workshopUpdate'] = $this->Index_model->getAllItemTable('workshop','courses_id',$artiId,'','','courses_id','desc');
			$data['title']="Courses Training Update | jobstarbd";
			$this->form_validation->set_rules('couTitle', 'Training Title', 'trim|required');

		if($this->input->post('registration') && $this->input->post('registration')!=""){

			if($this->form_validation->run() != false){
				
                $expval=explode(' ',$this->input->post('couTitle'));
                $impval=implode('-',$expval);
				$save['slug']=strtolower(str_replace('/', '_', $impval));
				$save['title']=$this->input->post('couTitle');
				$save['c_duration']=$this->input->post('c_duration');
				$save['comp_name']=$this->input->post('comp_name');
				$save['comp_add']=$this->input->post('comp_add');
				$save['phone']=$this->input->post('phone');
				$save['email']=$this->input->post('email');
				$save['web']=$this->input->post('web');
				$save['app_deadline']=$this->input->post('app_deadline');
				$save['c_starts']=$this->input->post('c_starts');
				$save['c_fee']=$this->input->post('c_fee');
				$save['short_text']=$this->input->post('short_text');
				$save['details_text']=$this->input->post('details_text');
				$save['date']	    = date('Y-m-d');
				
				
				if($this->input->post('c_id')!=""){
					$c_id=$this->input->post('c_id');
					$this->Index_model->update_table('workshop','courses_id',$c_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('workshop', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/workshop_list', 'refresh');
			}
			else{
				$data['main_content']="admin/workshop/workshop_action";
        		$this->load->view('admin_template', $data);
				}
		}
		else{
			$data['main_content']="admin/workshop/workshop_action";
			$this->load->view('admin_template', $data);
		}
	}
	
	
	
	/////////////////////// Networks ////////////////////////////////	 
	function networks_list()
	{
			if(!$this->session->userdata('userAccessMail')) redirect("admin");
			$data['title']="networks List | institute Management System";

			$data['networks_list'] = $this->Index_model->getAllItemTable('networks','','','','','courses_id','desc');
			
			$data['main_content']="admin/networks/networks_list";
			$this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function networks_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$artiId=$this->uri->segment(3);
		
			$data['networksUpdate'] = $this->Index_model->getAllItemTable('networks','courses_id',$artiId,'','','courses_id','desc');
			$data['title']="Courses Training Update | jobstarbd";
			$this->form_validation->set_rules('username', 'Training Title', 'trim|required');

		if($this->input->post('registration') && $this->input->post('registration')!=""){

			if($this->form_validation->run() != false){
				
                $expval=explode(' ',$this->input->post('couTitle'));
                $impval=implode('-',$expval);
				$save['slug']=strtolower(str_replace('/', '_', $impval));
				$save['username']=$this->input->post('username');
				$save['designation']=$this->input->post('designation');
				$save['comp_name']=$this->input->post('comp_name');
				$save['comp_add']=$this->input->post('comp_add');
				$save['phone']=$this->input->post('phone');
				$save['email']=$this->input->post('email');
				$save['web']=$this->input->post('web');
				$save['details_about']=$this->input->post('details_text');
				$save['date']	    = date('Y-m-d');
				
				
				if($this->input->post('c_id')!=""){
					$c_id=$this->input->post('c_id');
					$this->Index_model->update_table('networks','courses_id',$c_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('networks', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/networks_list', 'refresh');
			}
			else{
				$data['main_content']="admin/networks/networks_action";
        		$this->load->view('admin_template', $data);
				}
		}
		else{
			$data['main_content']="admin/networks/networks_action";
			$this->load->view('admin_template', $data);
		}
	}
	
	
	
	
	
	
	
	
	
	/////////////////////// jobseekers ////////////////////////////////	 
	function jobseekers_list()
	{
			if(!$this->session->userdata('userAccessMail')) redirect("admin");
			$data['title']="jobseekers List | institute Management System";

			$data['jobseekers_list'] = $this->Index_model->getAllItemTable('jobseekers','','','','','id','desc');
			
			$data['main_content']="admin/jobseekers/jobseekers_list";
			$this->load->view('admin_template',$data);
	} 
	 
	 
	 public function starJobSeekers()
	{
			$starjob = $this->input->post('starjob');
			$userid = $this->input->post('userid');
			
			$save['starjobseekers']	    	= $this->input->post('starjob');
			$this->Index_model->update_table('jobseekers','id',$userid,$save);
			$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
			redirect('admin/jobseekers_list', 'refresh');
	}
	 
	 
	function jobseekers_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$artiId=$this->uri->segment(3);
		
			$data['jobseekersUpdate'] = $this->Index_model->getAllItemTable('jobseekers','id',$artiId,'','','id','desc');
			$data['title']="Courses Training Update | jobstarbd";
			$this->form_validation->set_rules('username', 'Username', 'trim|required');

		if($this->input->post('registration') && $this->input->post('registration')!=""){

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
				
				
				if($this->input->post('c_id')!=""){
					$c_id=$this->input->post('c_id');
					$this->Index_model->update_table('jobseekers','id',$c_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('jobseekers', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/jobseekers_list', 'refresh');
			}
			else{
				$data['main_content']="admin/jobseekers/jobseekers_action";
        		$this->load->view('admin_template', $data);
				}
		}
		else{
			$data['main_content']="admin/jobseekers/jobseekers_action";
			$this->load->view('admin_template', $data);
		}
	}
	
	
	
	
	
	/////////////////////// employers ////////////////////////////////	 
	function employers_list()
	{
			if(!$this->session->userdata('userAccessMail')) redirect("admin");
			$data['title']="employers List | institute Management System";

			$data['employers_list'] = $this->Index_model->getAllItemTable('employers','','','','','cid','desc');
			
			$data['main_content']="admin/employers/employers_list";
			$this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function employers_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$artiId=$this->uri->segment(3);
		
			$data['employersUpdate'] = $this->Index_model->getAllItemTable('employers','cid',$artiId,'','','cid','desc');
			$data['title']="Courses Training Update | jobstarbd";
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
				$save['date']	    = date('Y-m-d');
				
				
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
				redirect('admin/employers_list', 'refresh');
			}
			else{
				$data['main_content']="admin/employers/employers_action";
        		$this->load->view('admin_template', $data);
				}
		}
		else{
			$data['main_content']="admin/employers/employers_action";
			$this->load->view('admin_template', $data);
		}
	}
	
	
	
	/////////////////////// latest_update ////////////////////////////////	 
	function latest_update_list()
	{
			if(!$this->session->userdata('userAccessMail')) redirect("admin");
			$data['title']="latest_update List | Institute Management System";
			$data['latest_update_list'] = $this->Index_model->getAllItemTable('latest_update','','','','','latest_update_id','desc');
			
			$data['main_content']="admin/latest_update/latest_update_list";
			$this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function latest_update_registration()
	{
			if(!$this->session->userdata('userAccessMail')) redirect("admin");
				$artiId=$this->uri->segment(3);
				
				$data['latest_updateUpdate'] = $this->Index_model->getAllItemTable('latest_update','latest_update_id',$artiId,'','','latest_update_id','desc');
				if(!$artiId){
					$data['title']="latest_update Registration | institute Management System";
					$this->form_validation->set_rules('latest_update_headline', 'latest_update name', 'trim|required|is_unique[latest_update.latest_update_headline]');
				}
				else{
					$data['title']="latest_update Update | institute Management System";
					$this->form_validation->set_rules('latest_update_headline', 'latest_update name', 'trim|required');
				}
				if($this->input->post('registration') && $this->input->post('registration')!=""){
					if($this->form_validation->run() != false){
						$config['allowed_types'] = '*';
						$config['remove_spaces'] = true;
						$config['max_size'] = '1000000';
						$config['upload_path'] = './asset/uploads/latest_update/';
						$config['charset'] = "UTF-8";
						$new_name = "Advertisement_".time();
						$config['file_name'] = $new_name;
						$this->load->library('upload', $config);
						$this->upload->initialize($config);
							if (isset($_FILES['ad_photo']['name']))
							{
								if($this->upload->do_upload('ad_photo')){
									$upload_data	= $this->upload->data();
									$save['image']	= $upload_data['file_name'];
								}
								else{
									$upload_data	= $this->input->post('stillimg');
									$save['image']	= $upload_data;	
								}
							}
							
							
						$expval=explode(' ',$this->input->post('latest_update_headline'));
						$impval=implode('-',$expval);
						
						$save['update_type']	    = $this->input->post('update_type');
						$save['latest_update_headline']	    = addslashes($this->input->post('latest_update_headline'));
						$save['ndate']	    = addslashes($this->input->post('ndate'));
						$save['latest_update_details']	    = addslashes($this->input->post('details'));
						$save['slug']	    = addslashes(strtolower(str_replace('/','_',$impval)));						
						$save['date_time']	    = date('Y-m-d H:i:s');
						
						if($this->input->post('latest_update_id')!=""){
							$latest_update_id=$this->input->post('latest_update_id');
							$this->Index_model->update_table('latest_update','latest_update_id',$latest_update_id,$save);
							$s='Updated';
						}
						else{
							$query = $this->Index_model->inertTable('latest_update', $save);
							$s='Inserted';
							}
						$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
						redirect('admin/latest_update_list', 'refresh');
					}
					else{
						$data['main_content']="admin/latest_update/latest_update_action";
						$this->load->view('admin_template', $data);
						}
				}
				else{
					$data['main_content']="admin/latest_update/latest_update_action";
					$this->load->view('admin_template', $data);
				}
	}
	
	
	
	
	function messages_list()
	{
			if(!$this->session->userdata('userAccessMail')) redirect("admin");
			$data['title']="messages List | Institute Management System";
			$data['messages_list'] = $this->Index_model->getAllItemTable('messages','','','a_id','','','desc');
			
			$data['main_content']="admin/messages/messages_list";
			$this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function messages_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
			
		$data['root_menu'] = $this->Index_model->getAllItemTable('menu','','','','','menu_name','asc');
		$artiId=$this->uri->segment(3);
		if(!$artiId){
			$data['title']="messages Registration | Institute Management System";
		}
		else{
			$data['title']="messages Update | Institute Management System";
		}
		$data['messagesUpdate'] = $this->Index_model->getAllItemTable('messages','a_id',$artiId,'','','a_id','desc');
		if($this->input->post('registration') && $this->input->post('registration')!=""){

				/// Principal
				$config['allowed_types'] = '*';
				$config['remove_spaces'] = true;
				$config['max_size'] = '1000';
				$config['upload_path'] = './asset/uploads/messages/';
				$config['charset'] = "UTF-8";
				$new_name = "chairmen_".time();
				$config['file_name'] = $new_name;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if (isset($_FILES['photo']['name']))
					{
						if($this->upload->do_upload('photo')){
							$upload_data	= $this->upload->data();
							$save['photo']	= $upload_data['file_name'];
						}
						else{
							$upload_data	=  $this->input->post('stillimg');
							$save['photo']	= $upload_data;	
						}
					}	
				
				$save['msg_title']	    = addslashes($this->input->post('msg_title'));
				$save['msg_content']	    = addslashes($this->input->post('msg_content'));
				$save['date']	    		= date('Y-m-d');
				
				if($this->input->post('a_id')!=""){
					$a_id=$this->input->post('a_id');
					$this->Index_model->update_table('messages','a_id',$a_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('messages', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/messages_list', 'refresh');
			}
			else{
				$data['main_content']="admin/messages/messages_action";
				$this->load->view('admin_template', $data);
			}
	}
	
	
	
	
	/////////////////////// photogallery ////////////////////////////////	 
	function photogallery_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$data['title']="photogallery List | Jobster BD";
		$data['photogallery_list'] = $this->Index_model->getTable('photogallery','b_id','desc');
		$data['main_content']="admin/photogallery/photogallery_list";
        $this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function photogallery_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin/dashboard");
		$artiId=$this->uri->segment(3);
		if(!$artiId){
			$data['title']="photogallery Registration | Jobster BD";
		}
		else{
			$data['title']="photogallery Update | Jobster BD";
		}
		$data['photogalleryUpdate'] = $this->Index_model->getAllItemTable('photogallery','b_id',$artiId,'','','b_id','desc');
		
		if($this->input->post('registration') && $this->input->post('registration')!=""){
			$this->form_validation->set_rules('photogallery_name', 'photogallery name', 'trim|required');
			
			if($this->form_validation->run() != false){
				
			$config['allowed_types'] = '*';
			$config['remove_spaces'] = true;
			$config['max_size'] = '1000000';
			$config['upload_path'] = './asset/uploads/photogallery/';
			$config['charset'] = "UTF-8";
			$new_name = "photogallery_".time();
			$config['file_name'] = $new_name;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
				if (isset($_FILES['photogalleryPhoto']['name']))
				{
					if($this->upload->do_upload('photogalleryPhoto')){
						$upload_data	= $this->upload->data();
						$save['image']	= $upload_data['file_name'];
					}
					else{
						$upload_data	= "";
						$save['image']	= $upload_data;	
					}
				}	
				
				$save['photogallery_name']	    = $this->input->post('photogallery_name');
				$save['date']	    = date('Y-m-d');
				
				if($this->input->post('b_id')!=""){
					$b_id=$this->input->post('b_id');
					$this->Index_model->update_table('photogallery','b_id',$b_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('photogallery', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/photogallery_list', 'refresh');
			}
			else{
				$data['main_content']="admin/photogallery/photogallery_action";
        		$this->load->view('admin_template', $data);
				}
		}
		$data['main_content']="admin/photogallery/photogallery_action";
        $this->load->view('admin_template', $data);
	}
	
	

	
	
	
function approve()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$approve_val[]=$this->input->get('approve_val');
		$tablename=$this->input->get('tablename');
		$id=$this->input->get('id');
		$status=$this->input->get('status');
		$this->Index_model->get_approve($approve_val,$tablename,$id,$status);   
		redirect($_SERVER['HTTP_REFERER'],'refresh');
	}
	
	function deapprove()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$approve_val[]=$this->input->get('approve_val');
		$tablename=$this->input->get('tablename');
		$id=$this->input->get('id');
		$status=$this->input->get('status');
		$this->Index_model->get_deapprove($approve_val,$tablename,$id,$status);   
		redirect($_SERVER['HTTP_REFERER'],'refresh');
	}
	
///////////  All  Delete///////////////////////
public function deleteData($tableName,$colId){
	if(!$this->session->userdata('userAccessMail')) redirect("index");
		$cID = $this->input->get('deleteId');
		$this->Index_model->deletetable_row($tableName, $colId, $cID);
		redirect($_SERVER['HTTP_REFERER'],'refresh');
}

	public function deleteAllData($tableName,$colId,$cID){
	if(!$this->session->userdata('userAccessMail')) redirect("index");
		$this->Index_model->deletetable_row($tableName, $colId, $cID);
		redirect($_SERVER['HTTP_REFERER'],'refresh');
	}
/*public function deleteData($tableName,$colId){
		$cID = $this->input->get('deleteId');
		$this->Index_model->deletetable_row($tableName, $colId, $cID);
	}*/
	
	
	
	
function sequenceManage()
	{
		$tbl=$this->input->get('tbl');
		$tid=$this->input->get('tid');
		$seqence=$this->input->get('sequence');
		$id=$this->input->get('id');
		
		$query = $this->db->query("select * from ".$tbl." where sequence='".$seqence."'");
			foreach($query->result() as $row);
			$sequenceVal=$row->sequence;
			$nid=$row->$tid;
			
			if($seqence!=$sequenceVal){
				$update=$this->db->query("update ".$tbl." set sequence='".$seqence."' where ".$tid."='".$id."'");
			}
			else{
				$query1 = "select * from ".$tbl." where ".$tid."='".$id."'";
				$results1 = $this->db->query($query1);
				foreach($results1->result() as $row1);
				$sequenceVal1=$row1->sequence;
				$nid1=$row1->$tid;
			
				$update=$this->db->query("update ".$tbl." set sequence='".$sequenceVal1."' where ".$tid."='".$nid."'");
				$update1=$this->db->query("update ".$tbl." set sequence='".$seqence."' where ".$tid."='".$id."'");
			}
		redirect($_SERVER['HTTP_REFERER']);
	}
		
	
	/////////////////////// partners ////////////////////////////////	 
	function partners_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$data['title']="Usefull link List | Agninet";
		$data['partners_list'] = $this->Index_model->getTable('partners','link_id','desc');
		$data['main_content']="admin/partners/partners_list";
        $this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function partners_registration()
	{
		
		$artiId=$this->uri->segment(3);
		
		$data['partnersUpdate'] = $this->Index_model->getAllItemTable('partners','link_id',$artiId,'','','link_id','desc');
		if(!$artiId){
			$data['title']="partners Registration | Agninet";
			$this->form_validation->set_rules('headline', 'Link Title', 'trim|required|is_unique[partners.headline]');
			$this->form_validation->set_rules('link_url', 'Link URL', 'trim|required|is_unique[partners.link_url]');
		}
		else{
			$data['title']="partners Update | Agninet";
			$this->form_validation->set_rules('headline', 'Link Title', 'trim|required');
			$this->form_validation->set_rules('link_url', 'Link URL', 'trim|required');
		}
		if($this->input->post('registration') && $this->input->post('registration')!=""){
			if($this->form_validation->run() != false){
			
				$config['allowed_types'] = '*';
				$config['remove_spaces'] = true;
				$config['max_size'] = '1000000';
				$config['upload_path'] = './asset/uploads/partners/';
				$config['charset'] = "UTF-8";
				$new_name = "photogallery_".time();
				$config['file_name'] = $new_name;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if (isset($_FILES['images']['name']))
					{
						if($this->upload->do_upload('images')){
							$upload_data	= $this->upload->data();
							$save['image']	= $upload_data['file_name'];
						}
						else{
							$upload_data	= "";
							$save['image']	= $upload_data;	
						}
					}
				
				
				$expval=explode(' ',$this->input->post('headline'));
				$impval=implode('-',$expval);
				$save['headline']	    = addslashes($this->input->post('headline'));
				$save['link_url']	    = addslashes($this->input->post('link_url'));
				$save['slug']	    = addslashes(strtolower($impval));
				$save['date_time']	    = date('Y-m-d H:i:s');
				
				if($this->input->post('link_id')!=""){
					$link_id=$this->input->post('link_id');
					$this->Index_model->update_table('partners','link_id',$link_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('partners', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/partners_list', 'refresh');
			}
			else{
				$data['main_content']="admin/partners/partners_action";
        		$this->load->view('admin_template', $data);
				}
		}
		else{
			$data['main_content']="admin/partners/partners_action";
        	$this->load->view('admin_template', $data);
		}
	}
	
	
	
	
	/////////////////////// voting ////////////////////////////////	 
	function voting_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$data['title']="Usefull link List | Agninet";
		$data['voting_list'] = $this->Index_model->getTable('voting','voting_id','desc');
		$data['main_content']="admin/voting/voting_list";
        $this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function voting_registration()
	{
		
		$artiId=$this->uri->segment(3);
		
		$data['votingUpdate'] = $this->Index_model->getAllItemTable('voting','voting_id',$artiId,'','','voting_id','desc');
		if(!$artiId){
			$data['title']="voting Registration | Agninet";
			$this->form_validation->set_rules('headline', 'Voting Title', 'trim|required|is_unique[voting.status]');
			$this->form_validation->set_rules('end_date', 'End Date', 'trim|required|is_unique[voting.end_date]');
		}
		else{
			$data['title']="Voting Update | Jobster BD";
			$this->form_validation->set_rules('headline', 'Link Title', 'trim|required');
			$this->form_validation->set_rules('end_date', 'End Date', 'trim|required');
		}
		if($this->input->post('registration') && $this->input->post('registration')!=""){
			if($this->form_validation->run() != false){
				$save['voting_sub']	    = addslashes($this->input->post('headline'));
				$save['start_date']	    = $this->input->post('start_date');
				$save['end_date']	    = $this->input->post('end_date');
				$save['status']	= $this->input->post('publish_now');
				
				if($this->input->post('voting_id')!=""){
					$voting_id=$this->input->post('voting_id');
					$this->Index_model->update_table('voting','voting_id',$voting_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('voting', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/voting_list', 'refresh');
			}
			else{
				$data['main_content']="admin/voting/voting_action";
        		$this->load->view('admin_template', $data);
				}
		}
		else{
			$data['main_content']="admin/voting/voting_action";
        	$this->load->view('admin_template', $data);
		}
	}
	
	
	
	/////////////////////// Video ////////////////////////////////	 
	function video_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$data['title']="Video List | GEE Bangladesh";
		$data['video_list'] = $this->Index_model->getTable('vedio_gallery','photo_album_id','desc');
		$data['main_content']="admin/video/video_list";
        $this->load->view('admin_template',$data);
	} 
	 
	 
	function video_registration()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("admin");
		$artiId=$this->uri->segment(3);
		$bouid=$this->input->post('journalist');
		$data['videoUpdate'] = $this->Index_model->getAllItemTable('vedio_gallery','photo_album_id',$artiId,'','','photo_album_id','desc');
		$data['allcategory']		= $this->Index_model->getDataById('category','','','cat_name','asc','');
		$data['title']="Video Gallery";
		$this->form_validation->set_rules('video_name', 'video name', 'trim|required');
		$this->form_validation->set_rules('video_link', 'video Url', 'trim|required');
		//$this->form_validation->set_rules('coverimages', 'Cover images', 'trim|required');
		
		if($this->input->post('registration') && $this->input->post('registration')!=""){
			if($this->form_validation->run() != false){
				$config['allowed_types'] = '*';
				$config['remove_spaces'] = true;
				$config['max_size'] = '1000000';
				$config['upload_path'] = './asset/uploads/vedio/';
				$config['charset'] = "UTF-8";
				$new_name = "coverimages_".time();
				$config['file_name'] = $new_name;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if (isset($_FILES['coverimages']['name']))
					{
						if($this->upload->do_upload('coverimages')){
							$upload_data	= $this->upload->data();
							$save['album_ima']	= $upload_data['file_name'];
						}
						else{
							$upload_data	= $this->input->post('stillimg');
							$save['album_ima']	= $upload_data;	
						}
					}

				$expval=explode(' ',$this->input->post('video_name'));
				$impval=implode('-',$expval);
				$save['category']	    	= $this->input->post('cat_id');
				$save['photo_album_name']	= addslashes($this->input->post('video_name'));
				$save['vedio_link']	    	= addslashes($this->input->post('video_link'));
				$save['date']	    		= date('Y-m-d');
				$save['status']	    		= $this->input->post('status');
				
				if($this->input->post('photo_album_id')!=""){
					$cid=$this->input->post('photo_album_id');
					$this->Index_model->update_table('vedio_gallery','photo_album_id',$cid,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('vedio_gallery', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('admin/video_list', 'refresh');
			}
			else{
				$data['main_content']="admin/video/video_action";
        		$this->load->view('admin_template', $data);
				}
		}
		else{
			$data['main_content']="admin/video/video_action";
			$this->load->view('admin_template', $data);
		}
	}

}

?>
