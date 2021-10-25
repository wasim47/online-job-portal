<div class="mobile-menu-left-overlay"></div>
<nav class="side-menu hidden-sm hidden-xs">
   <ul>
      <li>
         <a href="javascript:void();" class="close">&times</a>
      </li>
      <li>
          <a href="<?php echo base_url('employers/dashboard');?>" class='active'>
         <i class="fa fa-home"></i>Dashboard
         </a>
      </li>
      <li class="titleD">My PROFILE</li>
      <li>
         <a href="#masterview.asp " >
         <i class="fa fa-file"></i>  View Profile</a>
      </li>
      <li>
         <a href="#">
         <i class="fa fa-edit"></i>  Edit Profile
         </a>
      </li>
      
      <li>
         <a href="#">
         <i class="fa fa-trash"></i> Delete Account
         </a>
      </li>
      <li class="titleD">My Jobs</li>
      
      <li><a href="<?php echo base_url('employers/postjobs');?>"  >
      <i class="icon-emailed-resume"></i>
      Post Jobs</a></li>
      
      
      <li>
         <a href="<?php echo base_url('employers/joblist');?>" id="file" data-toggle="tooltip"   data-placement="auto"  title="" >
         <i class="fa fa-eye"></i>  View All Jobs

         </a>
      </li>
      
      <li><a href="<?php echo base_url('employers/joblist/?s='.base64_encode("pending"));?>"><i class="icon-emailed-resume"></i>Pending Jobs</a></li>
      <li><a href="<?php echo base_url('employers/joblist/?s='.base64_encode("approved"));?>"><i class="icon-emailed-resume"></i>Approved Jobs</a></li>        
      <li><a href="<?php echo base_url('employers/joblist/?s='.base64_encode("onlive"));?>"><i class="icon-emailed-resume"></i>On Live Jobs</a></li>      
      <li><a href="<?php echo base_url('employers/appliedjoblist');?>" ><i class="fa fa-apps"></i>Applied Jobs</a></li>
      
     <!-- <li><a href="#" >
      <i class="icon-emailed-resume"></i>
      Emailed Job</a></li>-->
      
      <li class="titleD">Others Activities</li>
      
      <li>
         <a href="<?php echo base_url('employers/browsecv');?>">
         <i class="icon-view-resume"></i> Browse CVs
         </a>
      </li>
      
      <li>
         <a href="<?php echo base_url('employers/browsecv');?>">
         <i class="icon-view-resume"></i> Access CV Bank
         </a>
      </li>
      
      
      
      <li>
         <a href="#resume_view.asp">
         <i class="icon-view-resume"></i> Receive Star Jobseekers CVs
         </a>
      </li>
      
      <li>
         <a href="#resume_view.asp">
         <i class="icon-view-resume"></i> Service & Packages
         </a>
      </li>
      
      <li>
        <a href="#Emp_Message.asp">
         <i class="icon-message"></i> Freelancers
         </a>
      </li>
     
      <li>
         <a href="#emp_invited.asp" >
        <i class="icon-job-offer"></i> Internship Seekers
         </a>
      </li>
    
         <li>
         <a href="#emp_invited.asp" >
        <i class="icon-job-offer"></i> My Netwoeks
         </a>
      </li>
    

    
      <li class="divider"></li>
     
       <li>
         <a href="<?php echo base_url('employers/myprofile/?pages='.base64_encode("changepassword"));?>" >
         <i class="icon-switching"></i> Change Password
         </a>
      </li>
      <li>
         <a href="<?php echo base_url('employers/logout');?>" >
         <i class="icon-sign-out"></i> Sign Out
         </a>
      </li>
     
    
   </ul>
</nav>