<?php include('tophead.php'); ?>
<style type="text/css">
h1{
	font-family:Arial, Helvetica, sans-serif;
	color:#999999;
}
.wrapper{width:600px; margin-left:auto;margin-right:auto;}
.welcome_txt{
	margin: 20px;
	background-color: #EBEBEB;
	padding: 10px;
	border: #D6D6D6 solid 1px;
	-moz-border-radius:5px;
	-webkit-border-radius:5px;
	border-radius:5px;
}
.fb_box{
	margin: 20px;
	background-color: #FFF0DD;
	padding: 10px;
	border: #F7CFCF solid 1px;
	-moz-border-radius:5px;
	-webkit-border-radius:5px;
	border-radius:5px;
}
.fb_box .image{ text-align:center;}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div class="feedback-left">
	
    <a href="http://jobs.jobstarbd.com/feedback.php" class="btn btn-default" target="_blank"><i class="fa fa-comments-o" aria-hidden="true"></i>&nbsp;Feedback</a>
</div>

<div class="row"><?php  echo $this->session->flashdata('jobseekerssuccessMsg');?></div>
    
<div class="header" ng-controller="myCont">
  <?php /*?><div class="header-toolbar">
    <div class="container">
      <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6 list-inline">
              <ul id="inline-popups">
                <li><a href="#log-in">Employers</a></li>
                <li><a href="#log-in">Login</a></li>
                <li><a href="#create-account">My jobstarbd</a></li>
                <li><a href="#create-account">Contact Us</a></li>
              </ul>
            </div>
            
            
            <div class="col-xs-12 col-sm-6 pull-right">
            	  <div class="col-sm-7">
                       <ul class="top-socials">
								<li><a href="https://facebook.com/jobstarbd"><i class="fa fa-facebook"></i></a></li>							
								<li><a href="https://linkedin.com/jobstarbd"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="https://plus.google.com/jobstarbd"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="https://twitter.com/jobstarbd"><i class="fa fa-youtube"></i></a></li>	
                                <li><a href="https://twitter.com/jobstarbd"><i class="fa fa-twitter"></i></a></li>	
							</ul>
                 </div>
                  <div class="col-sm-3">
                       <div class="version">
                       <a href="candidate-listing.html" class="eng">ENG</a>
                       <a href="candidate-listing.html" class="bng">বাংলা</a>
                  </div>
                </div>
                  <div class="col-sm-2 time">{{theTime}}</div>
            </div>
      </div>
    </div>
  </div><?php */?>
  
  
  <!------------Header part temprorary hide ---------------->
  
  <div class="row custom-header">
    <div class="row">
      <div class="col-md-2 col-sm-2 col-xs-12">
      <div  class="custom-logo"><a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/images/logo.png" alt="" style="width:100%; height:auto" /></a></div>
       <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
       </div>
       
      
      
      <div class="col-md-10 col-sm-12 col-xs-12" style="margin:0; padding:0"> 
      	<div class="col-md-12 col-sm-12 col-xs-12" style="margin:0; padding:0"> 
      	  <div class="navbar navbar-default" role="navigation">
          <div class="navbar-collapse collapse" id="nav-main">
            <ul class="nav navbar-nav" style="margin-right:15px;">
            
            <?php
            	if($this->session->userdata('jobseekersAccessMail') && $this->session->userdata('jobseekersAccessMail')!=""){
				?>
                <li><a href="<?php echo base_url('jobseekers/logout');?>">Logout</a></li>
                <?php
				}
				else{
			?>
              <li><a href="javascript:void();" data-toggle="modal" data-target="#regModal">Create account</a></li>
              <li><a href="javascript:void();" data-toggle="modal" data-target="#loginModal">Login</a></li>
             <?php
             }
			 ?> 
               <li class="dropdown active"><a href="#">My Jobstarbd <span class="caret"></span></a>
                      <ul class="dropdown-menu"> 
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Messages</a></li>
                        <li><a href="#">Becoame a Star Jobseeker</a></li>
                        <li><a href="#">My Jobs	</a></li>
                        <li><a href="#">My Network</a></li>
                    </ul>
                </li>
              <?php
               $mainmenu = $this->db->query("SELECT * FROM menu WHERE root_id = 0 AND status = 1 AND menu_type='Top Menu' AND squence!='0' ORDER BY squence ASC");
			   if($mainmenu->num_rows() > 0){
				foreach($mainmenu->result() as $fmenu):
				$menu_name=$fmenu->menu_name;
				$slug=$fmenu->slug;
				$strMenu=$fmenu->page_structure;
				$external_link=$fmenu->external_link;
				$m_id=$fmenu->m_id;
				$targetf=$fmenu->target;
				
				if($strMenu=='url'){
					if($targetf=='_blank'){
							$url=$external_link;
						 }
						 else{
							$url=$external_link.'/'.$slug;
						 }
				}
				elseif($strMenu=='gallery'){
					if($slug=='photo-gallery'){
						$url=base_url('gallery/photo_gallery');
					}
					elseif($slug=='video-gallery'){
						$url=base_url('gallery/video_gallery');
					}
					else{
						$url=base_url();
					}
					
				}
				else{
					$url=base_url($strMenu.'/'.$slug);
				}
				$query_scat=$this->db->query("SELECT * FROM menu WHERE root_id='".$m_id."' AND sroot_id=0 AND status=1 AND squence!='0' ORDER BY squence ASC");
				if($query_scat->num_rows() > 0){
					$cls='class="dropdown active"';
					$arrow = '<span class="caret"></span>';
				}
				else{
					$cls='';
					$arrow ='';
				}		
			   ?>
                	<li <?php echo $cls;?>><a href="<?php echo $url;?>" target="<?php echo $targetf;?>"><?php echo $menu_name;?> <?php echo $arrow;?></a>
                    <?php if($query_scat->num_rows() > 0){?>
                 	   <ul class="dropdown-menu">                       
                        	 <?php 
							 $count = 0;
							 foreach($query_scat->result() as $srow){ 
							 $urls=base_url('content/'.$slug.'/'.$srow->slug);							  
							 ?>
                                  <li><a href="<?php echo $urls;?>"><?php echo $srow->menu_name;?></a></li>
                              <?php 							  }
							  ?>
                	</ul>
                    <?php } ?>
                    </li>
                <?php 
					endforeach;
				}
				?>
                
                
                <li> 
                 <ul class="top-socials">
                    <li><a href="https://facebook.com/jobstarbd"><i class="fa fa-facebook"></i></a></li>							
                    <li><a href="https://linkedin.com/jobstarbd"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="https://youtube.com/jobstarbd"><i class="fa fa-youtube"></i></a></li>	
                </ul>
                </li>
                
                <li class="dropdown active" style="background:#005483; border-radius:5px;margin:15px 60px 0 60px; height:auto; padding:6px; font-size:12px; color:#fff">
                For Employers <span class="caret"></span>
                      <ul class="dropdown-menu"> 
                       <?php
							if($this->session->userdata('employersAccessMail') && $this->session->userdata('employersAccessMail')!=""){
							?>
							<li><a href="<?php echo base_url('employers/logout');?>">Logout</a></li>
							<?php
							}
							else{
						?>
						 <li><a href="<?php echo base_url('employers/registration');?>">Create Account</a></li>
                         <li><a href="<?php echo base_url('employers/employersLogin');?>">Login</a></li>
						 <?php
						 }
						 ?> 
                        <li><a href="#">Browse CVs</a></li>
                        <li><a href="#">Access CV Bank</a></li>
                        <li><a href="#">Receive Star Jobseeker CVs</a></li>
                        <li><a href="<?php echo base_url('employers/postjobs');?>">Post Jobs</a></li>
                        <li><a href="#">Services & Packages</a></li>
                        <li><a href="#">Freelancers</a></li>
                        <li><a href="#">Internship Seekers</a></li>
                        <li><a href="#">Tutors</a></li>
                        <li><a href="#">My Network</a></li>
                    </ul>
                </li>
                <li>
              	  <div class="version">
                       <a href="#" class="eng">ENG</a>
                       <a href="#" class="bng">বাংলা</a>
                  </div>
                 </li>
                 
            </ul>
            <!-- Nav collapes end --> 
          </div>
          <div class="clearfix"></div>
        </div>
        </div>
       
      </div>
      
    <!-- row end --> 
  </div>
  </div>
  
  
    <div id="regModal" class="modal fade" role="dialog" style="top:10%;">
                	<div class="modal-dialog">
                    	<div class="modal-content">
                            <div class="modal-header" style="background:#0194e8">
                                <button type="button" class="btn btn-danger btn-xs pull-right" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title" style="width:50%; float:left; color:#fff">Job Seeker Registration</h4>
                            </div>
                            <div class="modal-body">
                            	<?php echo form_open('jobseekers/registration');?>
                            	<div class="col-sm-7">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="text" name="fullname" required placeholder="Full Name" class="form-control inputForm" />
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="text" name="phone" required  placeholder="Phone Number" class="form-control inputForm" />
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="email" name="email" required placeholder="E-mail Address" class="form-control inputForm" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="text" name="username" required placeholder="User Name" class="form-control inputForm" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="password" name="password" required  class="form-control inputForm"  placeholder="Password"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="password" required name="confirmpassword" class="form-control inputForm"  placeholder="Re-type Password"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                    <input type="file" name="cv[]" class="file">
                                                    <div class="input-group col-xs-12" style="width:80%;" >
                                                      <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
                                                      <input type="text" class="form-control input-xs inputForm" disabled placeholder="Upload Your CV">
                                                      <span class="input-group-btn">
                                                        <button class="browse btn btn-warning input-xs" type="button"><i class="glyphicon glyphicon-search"></i> Browse</button>
                                                      </span>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12" style="margin-top:10px;">
                                                <input type="checkbox" required name="agree"/>
                                                <label style="font-size:11px;">I Agree to the jobstarbd.com <a href="#">Terms & Conditions.</a></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4"></label>
                                            <div class="col-sm-8 pull-right" style="margin-top:10px; float:right">
                                            <button type="submit" class="btn btn-success btn-submit">Submit</button></div>
                                        </div>
                                     </div>
                                <?php echo form_close();?>
                                
                                <div class="col-sm-5">
                                	<div style="width:100%; margin:20%;"><h4 style="margin-left:10%">----OR----</h4></div>
                                    <div style="width:100%; margin:10% 0;">
                                    	<img src="<?php echo base_url("assets/images/fblogin.png");?>" style="width:100%; height:auto" /><br /><br />
                                        <img src="<?php echo base_url("assets/images/googlelogni.png");?>" style="width:100%; height:auto" />
                                    </div>
                                    
                                    <?php /*?><?php
									if(!empty($authUrl)) {
										echo '<a href="'.$authUrl.'"><img src="'.base_url().'assets/images/fblogin.png" alt=""  style="width:100%; height:auto"/></a>';
									}else{
									?>
									<div class="wrapper">
										<div class="welcome_txt">Welcome <b><?php echo $userData['first_name']; ?></b></div>
										<div class="fb_box">
											<p class="image"><img src="<?php echo $userData['picture_url']; ?>" alt="" width="300" height="220"/></p>
											<p><b>Facebook ID : </b><?php echo $userData['oauth_uid']; ?></p>
											<p><b>Name : </b><?php echo $userData['first_name'].' '.$userData['last_name']; ?></p>
											<p><b>Email : </b><?php echo $userData['email']; ?></p>
											<p><b>Gender : </b><?php echo $userData['gender']; ?></p>
											<p><b>Locale : </b><?php echo $userData['locale']; ?></p>
											<p><b>You are login with : </b>Facebook</p>
											<p><a href="<?php echo $userData['profile_url']; ?>" target="_blank">Click to Visit Facebook Page</a></p>
											<p><b>Logout from <a href="<?php echo $logoutUrl; ?>">Facebook</a></b></p>
										</div>
									</div>
									<?php } ?><?php */?>


                                </div>
                            </div>
                            <div class="modal-footer" style="border:none;">
                            	
                            </div>
                        </div>
                    </div>
                </div>
    <div id="loginModal" class="modal fade" role="dialog" style="top:10%;">
                	<div class="modal-dialog">
                    	<div class="modal-content">
                            <div class="modal-header" style="background:#0194e8">
                                <button type="button" class="btn btn-danger btn-xs pull-right" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title" style="width:50%; float:left; color:#fff">Job Seeker Login</h4>
                            </div>
                            <div class="modal-body">
                            	<?php echo form_open('jobseekers/jobseekersLogin');?>                            	
                                <div class="form-group">
                                	<label class="control-label col-sm-4"> Username Or Email<span class="require">*</span></label>
                                    <div class="col-sm-8">
                                    	<input type="text" name="username" required placeholder="Email Address or Username" class="form-control inputForm" />
                                    </div>
                                </div>
                                <div class="form-group">
                                	<label class="control-label col-sm-4"> Password<span class="require">*</span></label>
                                    <div class="col-sm-8">
                                    	<input type="password" name="password" required  class="form-control inputForm"  placeholder="Password"/>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                	<label class="control-label col-sm-4"></label>
                                	<div class="col-sm-8 pull-right" style="margin-top:10px; float:right">
                                    <input type="submit" name="login" value="Login" class="btn btn-success" />
                                    </div>
                                    
                                </div>
                                <?php echo form_close();?>
                            </div>
                            <div class="modal-footer" style="border:none;">
                            	
                            </div>
                        </div>
                    </div>
                </div>            