<div class="mobile-menu-left-overlay"></div>
 <nav class="side-menu hidden-sm hidden-xs">
                       <ul>
                          <li>
                             <a href="javascript:void();" class="close">&times</a>
                          </li>
                          <li>
                              <a href="<?php echo base_url('jobseekers/dashboard');?>" class='active'  >
                             <i class="fa fa-home"></i>Dashboard
                             </a>
                          </li>
                          <li class="titleD">My PROFILE</li>
                          <li>
                             <a href="#masterview.asp " class=''>
                             <i class="fa fa-file"></i>  View Resume

                             </a>
                          </li>
                          <li>
                             <a href="<?php echo base_url('jobseekers/myprofile/?pages='.base64_encode("updateprofile"));?>" ><i class="fa fa-edit"></i>  Edit Profile</a>
                          </li>
                          <!--<li>
                             <a href="#file_upload.asp" id="file" data-toggle="tooltip"   data-placement="auto"  title="" class=''>
                             <i class="fa fa-upload"></i>  Upload Resume

                             </a>
                          </li>-->
                          
                          <li>
                             <a href="#del_resume.asp" onclick="ga('send', 'event', 'DeleteResume', 'click', '/mybdjobs/welcome.asp', 1);"  class=''>
                             <i class="fa fa-trash"></i> Delete Account
                             </a>
                          </li>
                          <li class="titleD">My Jobs</li>
                          <li>
                          <a href="#apply_position.asp" onclick="ga('send', 'event', 'DeleteResume', 'click', '/mybdjobs/welcome.asp', 1);"  class=''>
                          <i class="fa fa-apps"></i>
                          Online Application</a></li>
                          <li><a href="#resume_Email.asp" onclick="ga('send', 'event', 'EmailedResume', 'click', '/mybdjobs/welcome.asp', 1);"  class=''>
                          <i class="icon-emailed-resume"></i>
                          Emailed Resume</a></li>
                          
                          
                          
                          <!-- employer activity -->
                          
                          <li class="titleD">My Activities</li>
                          
                          <li>
                             <a href="#resume_view.asp" onclick="ga('send', 'event', 'EmployerMessage', 'click', '/mybdjobs/welcome.asp', 1);" class=''>
                             <i class="icon-view-resume"></i> Becoame a star jobseeker
                             </a>
                          </li>
                          
                          <li>
                            <a href="#Emp_Message.asp" onclick="ga('send', 'event', 'EmployerMessage', 'click', '/mybdjobs/welcome.asp', 1);" class=''>
                             <i class="icon-message"></i> My Network
                             </a>
                          </li>
                         
                          <li>
                             <a href="#emp_invited.asp" class=''>
                            <i class="icon-job-offer"></i> Messages
                             </a>
                          </li>
                        
   							
  							
<!--                            <li class="titleD">Assessment<span class="badge pull-right">New</span></li>
-->                               
                          
                          <!-- end employer activity -->
                          
                          
                        
                          <li class="divider"></li>
                         
                        
                         
                        <li><a href="<?php echo base_url('jobseekers/myprofile/?pages='.base64_encode("changepassword"));?>"><i class="icon-switching"></i> Change Password</a></li>
                        <li><a href="<?php echo base_url('jobseekers/logout');?>" class=''><i class="icon-sign-out"></i> Sign Out</a></li>
                       
                       </ul>
                    </nav>