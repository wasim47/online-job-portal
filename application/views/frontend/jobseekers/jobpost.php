<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	$job_id ='';
	$emp_id = '';
	$job_title = '';		
	$catType = '';
	$job_category = '';
	$publishedBy = '';
	$vacancy = '';
	$jobNatur = '';
	$jobLevel='';
	$ageRange='';
	$experience = '';
	$applyInstruction='';
	$requirement = '';
	$responsibilities = '';		
	$location ='';
	$salary = '';
	$benifits = '';
	$education_qualification = '';
	$allow_gender = '';
	$contactAddress = '';
	$deadline='';
	$applyOnline = '';
	$customEmail = '';
	$menutitle='Add New Job Post';
	$catname='';
	$scatname = '';
	$cvRewceivedOption='';
	$displayComName='';
	$displayComAddress='';
	$hot_jobs='';
?>
<style>
.required{
	color:#f00;
}
</style>
<script>
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		return xmlhttp;
	}
	
	function getCategory(strURL) {		
		var req = getXMLHTTP();
		if (req) {
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('citydiv').innerHTML=req.responseText;
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
	}
</script>
<style>
	.usermenu{
		margin:5px;
		padding:0;
		width:100%;
		float:left;
	}
	.usermenu h3{
		margin:5px;
		padding:10px;
	}
	.usermenu ul{
		margin:0;
		padding:0;
	}
	
	.usermenu ul li{
		display:block;
		float:left;
	}
	
	.usermenu ul li ul{
		display:none;
	}
	.usermenu ul li a{
		color:#292e7b;
		padding:10px;
		text-transform:uppercase;
		text-shadow:#eaeaea 1px 0px;
		border-bottom:1px dotted #7b80d2;
		float:left;
	}
	.usermenu ul li a:hover{
		color:#FFF;
		background:#292e7b;
		border-bottom:1px solid #ccc;
		float:left;
		text-decoration:none;
	}

	.usermenu ul li:hover ul{
		display:block;
		background:#fff;
	}
	
	.usermenu li ul li{
		clear:both;
		border-style:none;
		width:100%;
		float:left;
	}
	#exTab2 h3 {
	  color : white;
	  background-color: #428bca;
	  padding : 5px 15px;
	}
</style>
<script>
jQuery(document).ready(function(){
	jQuery("#invUs").click(function(){
		jQuery("#invitedUsers").show(200);
		jQuery("#profile_display").hide(200);
		jQuery("#newUserInfo").hide(200);
	});
	
	jQuery("#dashboardPro").click(function(){
		jQuery("#invitedUsers").hide(200);
		jQuery("#profile_display").show(200);
		jQuery("#newUserInfo").hide(200);
	});
	
	jQuery("#addnewUser").click(function(){
		jQuery("#invitedUsers").hide(200);
		jQuery("#profile_display").hide(200);
		jQuery("#newUserInfo").show(200);
	});

});


function changeStatus(id,staVal){	
	//alert(id);
		jQuery.ajax({
			url: "#",
			type: 'post',
			data: {invstd:id,stvalue:staVal,action:'status'},
			success:function(){
				alert('Updated');
				window.location.reload();
			}
		});
}





function deleteStdData(id,stdid,status){	
		//alert(status);
		var r = confirm("\t\t\t Are you Sure? \n Do you want to delete all information of this user ?\n If click ok than all information will be delete for this user.");
		if (r == true) {
			jQuery.ajax({
			url: "#",
			type: 'post',
			data: {invid:id,userid:stdid,action:status},
			success:function(){
				alert('Deleted');
				window.location.reload();
			}
		});

		} else {
			return true;
		} 			
	}



var password = document.getElementById("password")
var confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;

	
</script>
<!--<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading"><?php echo $branchmark;?></h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="<?php echo base_url();?>">Home</a> / <span><?php echo $branchmark;?></span></div>
      </div>
    </div>
  </div>
</div>-->
<!-- Page Title End -->
<div class="row">
	<div class="col-sm-12">
                <div class="usermenu">
                    <ul>
                        <li><a href="javascript:void()" id="dashboardPro" title="Home"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="#"><i class="fa fa-user"></i> Accounts Setting</a>
                        	<ul>
                                <li><a href="javascript:void()" id="invUs">Update Profile</a></li>
                       			<li><a href="javascript:void()" data-toggle="modal" data-target="#passwordModal">Change Password</a></li>
                                <li><a href="javascript:void()" id="invUs">Settings</a></li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="fa fa-users"></i> Job Seekers</a>
                        	<ul>
                                <li><a href="#">Browse CVs</a></li>
                                <li><a href="#">Access CV Bank</a></li>
                                <li><a href="#">Receive Star Job Seeker CVs</a></li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="fa fa-users"></i> Jobs</a>
                        	<ul>
                                <li><a href="#">Post a Jobs</a></li>
                                <li><a href="#">My Jobs</a></li>
                                <li><a href="#">Applyed Jobs</a></li>
                                <li><a href="#">Emailed Jobs</a></li>
                                <li><a href="#">Applicant List</a></li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="fa fa-users"></i> Others</a>
                        	<ul>
                                <li><a href="#">Services & Packages</a></li>
                                <li><a href="#">Freelancers</a></li>
                                <li><a href="#">Internship Seekers</a></li>
                                <li><a href="#">Tutors</a></li>
                                <li><a href="#">My Network</a></li>
                            </ul>
                        </li>
                        
                    </ul>
                </div>
            </div>
</div>
    <div class="row">
        <div class="panel-body">
		   
            <div class="panel panel-flat">
						    <?php echo form_open_multipart('', 'class="form-horizontal form-label-left"');
								echo $this->session->flashdata('successMsg');
							?>
                                 	  <div class="panel-group" id="accordion">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                 <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                 <h4 class="panel-title"><?php echo $menutitle;?></h4>
                                                 </a>
                                            </div>
                                            
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                        
                                      			  <fieldset style="border:1px solid #ccc; font-size:16px;">
                                       	<legend style=" border:none; font-size:16px; padding:5px; margin:15px;">Job Requirements</legend>
                                        	<div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                           <label class="control-label col-md-3 col-sm-3 col-xs-12">Category Type<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select name="catType" id="catType" class="form-control col-md-7 col-xs-12"  
                                                onChange="getCategory('<?php echo base_url();?>admin/ajaxData?cat_id='+this.value);"
                                                 required>
                                                <option value="<?php echo $job_category;?>"><?php echo $catname;?></option>
                                                <?php
                                                foreach($allcategory->result() as $row){
                                                $caegory_title=$row->cat_slug;
                                                $cat_name=$row->cat_name;
                                                ?>
                                                    <option value="<?php echo $caegory_title; ?>"><?php echo $cat_name; ?></option>
                                                <?php
                                                }
                                                ?>
                                                </select>
                                  			 <?php echo form_error('cat_id', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                        </div>
                                      		<div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                           <label class="control-label col-md-3 col-sm-3 col-xs-12">Category</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div id="citydiv">
                                                     <select name="job_category" id="job_category" class="form-control col-md-7 col-xs-12"> 
                                                                <option value="<?php echo $job_category;?>"><?php echo $scatname;?></option>
                                                     </select>
                                                </div>
                                            </div>
                                        </div>
                                            <div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Job Title<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="job_title" required class="form-control col-md-7 col-xs-12" 
                                                placeholder='Job Title' value="<?php echo $job_title; ?>"  onFocus="this.placeholder=''" onBlur="this.placeholder='Job Title'">
                                             <?php echo form_error('job_title', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                        </div>
                                            <div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">No. of Vacancies<span class="required">*</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="number" name="vacancy" required class="form-control col-md-7 col-xs-12" 
                                                    placeholder='No. of Vacancies' value="<?php echo $vacancy; ?>"  
                                                    onFocus="this.placeholder=''" onBlur="this.placeholder='No. of Vacancies'">
                                                 <?php echo form_error('vacancy', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Job Type<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            	<div  style="padding:5px;">
                                                <input type="radio" name="jobNatur" value="Full Time" <?php if($jobNatur=='Full Time'){?> checked="checked" <?php } ?> 
                                                style="width:17px; height:17px;">
                                                <label style="font-size:15px;">&nbsp;Full Time </label>
                                                <input type="radio" name="jobNatur" value="Part Time" style="width:17px; height:17px;" 
												<?php if($jobNatur=='Part Time'){?> checked="checked" <?php } ?>>
                                                <label style="font-size:15px;">&nbsp;Part Time </label>
                                                <input type="radio" name="jobNatur" value="Contractual" style="width:17px; height:17px;"
                                                <?php if($jobNatur=='Contractual'){?> checked="checked" <?php } ?>>
                                                <label style="font-size:15px;">&nbsp;Contractual </label> 
                                                <input type="radio" name="jobNatur" value="Internship" style="width:17px; height:17px;"
                                                <?php if($jobNatur=='Internship'){?> checked="checked" <?php } ?>>
                                                <label style="font-size:15px;">&nbsp;Internship </label> 
                                                </div>
                                            </div>
                                        </div>
                                            <div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Job Level<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            	<div  style="padding:5px;">
                                                <input type="radio" name="jobLevel" value="Entry Level Job" style="width:17px; height:17px;" 
												<?php if($jobLevel=='Entry Level Job'){?> checked="checked" <?php } ?>>
                                                <label style="font-size:15px;">&nbsp;Entry Level Job </label>
                                                <input type="radio" name="jobLevel" value="Mid/Managerial Level Job" style="width:17px; height:17px;"
                                                <?php if($jobLevel=='Mid/Managerial Level Job'){?> checked="checked" <?php } ?>>
                                                <label style="font-size:15px;">&nbsp;Mid/Managerial Level Job </label>
                                                <input type="radio" name="jobLevel" value="Top Level Job" style="width:17px; height:17px;"
                                                <?php if($jobLevel=='Top Level Job'){?> checked="checked" <?php } ?>>
                                                <label style="font-size:15px;">&nbsp;Top Level Job </label> 
                                                </div>
                                            </div>
                                        </div>
                                        	<div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            	<div  style="padding:5px;">
                                                <input type="radio" name="allow_gender" value="Male" style="width:17px; height:17px;"
                                                <?php if($allow_gender=='Male'){?> checked="checked" <?php } ?>>
                                                <label style="font-size:15px;">&nbsp;Male Only</label>
                                                <input type="radio" name="allow_gender" value="Female" style="width:17px; height:17px;"
                                                <?php if($allow_gender=='Female'){?> checked="checked" <?php } ?>>
                                                <label style="font-size:15px;">&nbsp;Female  Only</label>
                                                <input type="radio" name="allow_gender" value="Any" style="width:17px; height:17px;"
                                                <?php if($allow_gender=='Any'){?> checked="checked" <?php } ?>>
                                                <label style="font-size:15px;">&nbsp;Any </label> 
                                                </div>
                                            </div>
                                        </div>
                                        	<div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Age Range</label>
                                          	  <div class="col-md-6 col-sm-6 col-xs-12">
                                            	<div class="col-sm-6">
                                                	<label style="width:25%; float:left; text-align:right; margin:5px 5px 0 0;">From</label>
                                                	<select name="age_from"  class="form-control" style="width:70%; float:left;">
                                                    	<option value="Any">Any</option>
                                                        <?php 
														for($af=18;$af<=100;$af++){
															echo '<option value="'.$af.'">'.$af.'</option>';
														}
														?>
                                                    </select>
                                                 </div>
                                                 <div class="col-sm-6">
                                                 	<label style="width:15%; float:left; text-align:right; margin:5px 5px 0 0;">To</label>
                                                	<select name="age_to"  class="form-control" style="width:80%; float:left;">
                                                    	<option value="Any">Any</option>
                                                        <?php 
														for($af=18;$af<=100;$af++){
															echo '<option value="'.$af.'">'.$af.'</option>';
														}
														?>
                                                    </select>
                                                 </div>
                                                </div>
                                            </div>
                                            <div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Educational Qualification<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <textarea name="education_qualification" required class="form-control col-md-7 col-xs-12" rows="5" 
                                                placeholder='Educational Qualification'><?php echo $education_qualification; ?></textarea>
                                             <?php echo form_error('education_qualification', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                        </div>
                                        	<div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Job Description/Responsibility<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <textarea name="responsibilities" required class="form-control col-md-7 col-xs-12" rows="5" 
                                                placeholder='Job Description/Responsibility'><?php echo $responsibilities; ?></textarea>
                                             <?php echo form_error('responsibilities', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                        </div>
                                            <div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Additional Job Requirements<span class="required">*</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <textarea name="requirement" required class="form-control col-md-7 col-xs-12" rows="5" 
                                                    placeholder='Job Requirement'><?php echo $requirement; ?></textarea>
                                                 <?php echo form_error('requirement', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Total Years of Experience<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-sm-12">
                                                        <input type="radio" name="reqExp" value="1"/>
                                                        <label style="margin:5px 5px 0 0;">Experience Required :</label>
                                                        <input type="radio" name="reqExp" value="0"/>
                                                        <label style=" margin:5px 5px 0 0;">No Experience Required :</label>
                                                </div>
                                            	<div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:10px;">
                                                    <div class="col-sm-6">
                                                        <label style="width:25%; float:left; text-align:right; margin:5px 5px 0 0;">Min:</label>
                                                        <select name="minExp"  class="form-control" style="width:70%; float:left;">
                                                            <option value="Any">Any</option>
                                                            <?php 
                                                            for($af=1;$af<=50;$af++){
                                                                echo '<option value="'.$af.'">'.$af.'</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                     </div>
                                                    <div class="col-sm-6">
                                                        <label style="width:15%; float:left; text-align:right; margin:5px 5px 0 0;">Max:</label>
                                                        <select name="maxExp"  class="form-control" style="width:80%; float:left;">
                                                            <option value="Any">Any</option>
                                                            <?php 
                                                            for($af=0;$af<=50;$af++){
                                                                echo '<option value="'.$af.'">'.$af.'</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                     </div>
                                                </div>
                                             </div>
                                        </div>
                                            <div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Job Location<span class="required">*</span></label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" name="location" required class="form-control col-md-7 col-xs-12" 
                                                        placeholder='Job Location' value="<?php echo $location; ?>"  autocomplete='on' 
                                                        onFocus="this.placeholder=''" onBlur="this.placeholder='Job Location'">
                                                     <?php echo form_error('location', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                                    </div>
                                                </div>
                                            <div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Salary</label>
                                          	  <div class="col-md-6 col-sm-6 col-xs-12">
                                            	<div class="col-sm-4">
                                                	<label style="width:15%; float:left; text-align:right; margin:5px 5px 0 0;">Min</label>
                                                	<input type="currency" name="salaryMin" class="form-control" style="width:80%; float:left" />
                                                 </div>
                                                 <div class="col-sm-8">
                                                 	<label style="width:15%; float:left; text-align:right; margin:5px 5px 0 0;">Max</label>
                                                	<input type="currency" name="salaryMax" class="form-control"  style="width:40%; float:left" />
                                                    <label style="width:40%; float:left; text-align:right; margin:5px 5px 0 0;">Monthly in BDT</label>
                                                 </div>
                                                </div>
                                            </div>
                                       </fieldset> 
                                      			  <fieldset style="border:1px solid #ccc; font-size:16px; margin-top:30px;">
                                       	<legend style=" border:none; font-size:16px; padding:5px; margin:15px;">Job Post Instruction</legend>
                                        
                                        
                                        <div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Apply Instruction</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <textarea name="applyInstruction" class="form-control col-md-7 col-xs-12" rows="5" 
                                                placeholder='Apply Instruction'><?php echo $applyInstruction; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">How do you want to receive CV/Resume(s)?</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            	<div  style="border:1px solid #ccc; padding:10px;">
                                                    <input type="radio" name="cvRewceivedOption" value="Online CV/Resume" style="width:17px; height:17px;"
                                                    <?php if($cvRewceivedOption=='Online CV/Resume'){?> checked="checked" <?php } ?>>
                                                    <label style="font-size:15px;">&nbsp;Online CV/Resume </label><br />
                                                    <input type="radio" name="cvRewceivedOption" value="Email Attachment" style="width:17px; height:17px;"
                                                    <?php if($cvRewceivedOption=='Email Attachment'){?> checked="checked" <?php } ?>>
                                                    <label style="font-size:15px;">&nbsp;Email Attachment </label><br />
                                                    <input type="radio" name="cvRewceivedOption" value="Hard Copy" style="width:17px; height:17px;"
                                                    <?php if($cvRewceivedOption=='Hard Copy'){?> checked="checked" <?php } ?>>
                                                    <label style="font-size:15px;">&nbsp;Hard Copy </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Your Corporate Email</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="email" name="customEmail" class="form-control col-md-7 col-xs-12" 
                                                placeholder='Email' value="<?php echo $customEmail; ?>"  onFocus="this.placeholder=''" onBlur="this.placeholder='Email'">
                                             <?php echo form_error('customEmail', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Enclose Photograph with CV ? <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            	<div  style="border:1px solid #ccc; padding:10px;">
                                                    <input type="radio" name="cvRewceivedOption" value="Yes" style="width:17px; height:17px;"
                                                    <?php if($cvRewceivedOption=='Yes'){?> checked="checked" <?php } ?>>
                                                    <label style="font-size:15px;">&nbsp;Yes </label>
                                                    <input type="radio" name="cvRewceivedOption" value="No" style="width:17px; height:17px;"
                                                    <?php if($cvRewceivedOption=='No'){?> checked="checked" <?php } ?>>
                                                    <label style="font-size:15px;">&nbsp;No </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Application Deadline<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="date" name="deadline" required class="form-control col-md-7 col-xs-12" 
                                                placeholder='Deadline' value="<?php echo $deadline; ?>"  onFocus="this.placeholder=''" onBlur="this.placeholder='Deadline'">
                                             <?php echo form_error('deadline', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Billing Contact Address</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <textarea name="contactAddress" class="form-control col-md-7 col-xs-12" 
                                                placeholder='Contact Address'><?php echo $contactAddress; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">In this job do you want to display Company Address</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            	<div  style="border:1px solid #ccc; padding:10px;">
                                                    <input type="radio" name="displayComName" value="Yes" style="width:17px; height:17px;"
                                                    <?php if($displayComName=='displayComName'){?> checked="checked" <?php } ?>>
                                                    <label style="font-size:15px;">&nbsp;Yes </label>
                                                    <input type="radio" name="displayComName" value="No" style="width:17px; height:17px;"
                                                    <?php if($displayComName=='No'){?> checked="checked" <?php } ?>>
                                                    <label style="font-size:15px;">&nbsp;No </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">In this job do you want to display Company Name</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            	<div  style="border:1px solid #ccc; padding:10px;">
                                                    <input type="radio" name="displayComAddress" value="Yes" style="width:17px; height:17px;"
                                                    <?php if($displayComAddress=='Yes'){?> checked="checked" <?php } ?>>
                                                    <label style="font-size:15px;">&nbsp;Yes </label>
                                                    <input type="radio" name="displayComAddress" value="No" style="width:17px; height:17px;"
                                                    <?php if($displayComAddress=='No'){?> checked="checked" <?php } ?>>
                                                    <label style="font-size:15px;">&nbsp;No </label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Do you want to add as Hot Jobs ?</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            	<div  style="border:1px solid #ccc; padding:10px;">
                                                    <input type="radio" name="hot_jobs" value="Yes" style="width:17px; height:17px;"
                                                    <?php if($hot_jobs=='Yes'){?> checked="checked" <?php } ?>>
                                                    <label style="font-size:15px;">&nbsp;Yes </label>
                                                    <input type="radio" name="hot_jobs" value="No" style="width:17px; height:17px;"
                                                    <?php if($hot_jobs=='No'){?> checked="checked" <?php } ?>>
                                                    <label style="font-size:15px;">&nbsp;No </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Job Publish Status<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select name="status" class="form-control">
                                                    <option value="1">Ready to publish</option>
                                                    <option value="0">Publish later (drafted jobs)</option>
                                                </select>
                                            </div>
                                        </div>
                                       </fieldset> 
                                        
                                                        
                                                </div>
                                            </div>
                                        </div>
                                        
                               	     </div>
                                    
                                    <div class="ln_solid"></div>
                                    <div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                        <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-3">
                                            <input type="hidden" name="job_id" value="<?php echo $job_id; ?>">
                                            <!--<input type="reset" class="btn btn-primary" value="Reset">-->
                                            <input type="submit" name="registration" class="btn btn-success" value="Submit">
                                        </div>
                                    </div>
                               <?php echo form_close();?>
					</div>
       </div>
    </div>
  </div>
</div>

