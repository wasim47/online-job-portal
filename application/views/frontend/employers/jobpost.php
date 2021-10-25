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
<div class="container" style="margin-top:50px">
<div class="row">
    <div class="col-md-3"><?php include('left_menu.php');?></div>
    <div class="col-md-9 col-sm-12" >
              <div class="row">
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
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">No. of Vacancies</label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="number" name="vacancy" class="form-control col-md-7 col-xs-12" 
                                                        placeholder='No. of Vacancies' value="<?php echo $vacancy; ?>"  
                                                        onFocus="this.placeholder=''" onBlur="this.placeholder='No. of Vacancies'">
                                                     <?php echo form_error('vacancy', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Job Type<span class="required">*</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div  style="padding:5px;">
                                                    <input type="checkbox" name="jobNatur" value="Full Time" <?php if($jobNatur=='Full Time'){?> checked="checked" <?php } ?> 
                                                    style="width:17px; height:17px;">
                                                    <label style="font-size:15px;">&nbsp;Full Time </label>
                                                    <input type="checkbox" name="jobNatur" value="Part Time" style="width:17px; height:17px;" 
                                                    <?php if($jobNatur=='Part Time'){?> checked="checked" <?php } ?>>
                                                    <label style="font-size:15px;">&nbsp;Part Time </label>
                                                    <input type="checkbox" name="jobNatur" value="Contractual" style="width:17px; height:17px;"
                                                    <?php if($jobNatur=='Contractual'){?> checked="checked" <?php } ?>>
                                                    <label style="font-size:15px;">&nbsp;Contractual </label> 
                                                    <input type="checkbox" name="jobNatur" value="Internship" style="width:17px; height:17px;"
                                                    <?php if($jobNatur=='Internship'){?> checked="checked" <?php } ?>>
                                                    <label style="font-size:15px;">&nbsp;Internship </label> 
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Job Level<span class="required">*</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div  style="padding:5px;">
                                                    <input type="checkbox" name="jobLevel" value="Entry Level Job" style="width:17px; height:17px;" 
                                                    <?php if($jobLevel=='Entry Level Job'){?> checked="checked" <?php } ?>>
                                                    <label style="font-size:15px;">&nbsp;Entry Level Job </label>
                                                    <input type="checkbox" name="jobLevel" value="Mid/Managerial Level Job" style="width:17px; height:17px;"
                                                    <?php if($jobLevel=='Mid/Managerial Level Job'){?> checked="checked" <?php } ?>>
                                                    <label style="font-size:15px;">&nbsp;Mid/Managerial Level Job </label>
                                                    <input type="checkbox" name="jobLevel" value="Top Level Job" style="width:17px; height:17px;"
                                                    <?php if($jobLevel=='Top Level Job'){?> checked="checked" <?php } ?>>
                                                    <label style="font-size:15px;">&nbsp;Top Level Job </label> 
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
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
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Job Description/Responsibility</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <textarea name="responsibilities" class="form-control col-md-7 col-xs-12" rows="5" 
                                                    placeholder='Job Description/Responsibility'><?php echo $responsibilities; ?></textarea>
                                                 <?php echo form_error('responsibilities', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                                </div>
                                            </div>
                                                <div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Additional Job Requirements</label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <textarea name="requirement" class="form-control col-md-7 col-xs-12" rows="5" 
                                                        placeholder='Job Requirement'><?php echo $requirement; ?></textarea>
                                                     <?php echo form_error('requirement', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group" style="margin:0; padding:0; margin-bottom:5px;">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Total Years of Experience</label>
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
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Job Location</label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input type="text" name="location" class="form-control col-md-7 col-xs-12" 
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

