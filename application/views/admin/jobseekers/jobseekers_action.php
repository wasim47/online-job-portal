<?php
if($jobseekersUpdate->num_rows()>0){
	foreach($jobseekersUpdate->result() as $ctD);
	$c_id=$ctD->courses_id;
	$username=$ctD->username;
	$phone=$ctD->phone;
	$email=$ctD->email;
	$web=$ctD->web;
	$expected_salary=$ctD->expected_salary;
	$skills=$ctD->skills;
	$linkedin=$ctD->linkedin;
	$github=$ctD->github;
	$coverlatter=$ctD->coverlatter;
	$about_your_self=$ctD->about_your_self;
	$career_summery =$ctD->career_summery;
	$newstitle='Edit jobseekers';
}
else{
	$c_id='';
	$username=set_value('username');
	$phone=set_value('phone');
	$email=set_value('email');
	$web=set_value('web');
	$expected_salary=set_value('expected_salary');
	$skills=set_value('skills');
	$linkedin=set_value('linkedin');
	$github=set_value('github');
	$coverlatter=set_value('coverlatter');
	$about_your_self=set_value('about_your_self');
	$career_summery=set_value('career_summery');
	
	$newstitle='Add New jobseekers';
}
?>
<style>
.required{
	color:#f00;
}
</style>


<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					

					<div class="breadcrumb-line breadcrumb-line-component" style="margin-top:10px; margin-bottom:10px;">
						<ul class="breadcrumb" style="font-size:20px;">
							<li>jobseekers Information</li>
						</ul>

						<ul class="breadcrumb-elements">
							<div class="heading-btn-group">
								<a href="<?php echo base_url('admin/jobseekers_list');?>" class="btn btn-link btn-float has-text">
                                <i class="glyphicon glyphicon-list"></i><span>jobseekers List</span></a>
							</div>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Page length options -->
					<div class="panel panel-flat">
						    <?php echo form_open_multipart('', 'class="form-horizontal form-label-left"');?>
                                   <div id="registration_form">	
                                  	  <div class="panel-group" id="accordion">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                 <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                 <h4 class="panel-title"><?php echo $newstitle;?> </h4>
                                                 </a>
                                            </div>
                                            
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                
    
                                        	<div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">User Name<span class="required">*</span></label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="username" required class="form-control col-md-7 col-xs-12" 
                                                placeholder='User Name' value="<?php echo $username; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='User Name'">
                                             	<?php echo form_error('username', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                           	 </div>
                                            </div>
                                            
                                          
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Phone</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="phone" class="form-control col-md-7 col-xs-12" 
                                                placeholder='Phone' value="<?php echo $phone; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Phone'">
                                           	 </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Email</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="email" class="form-control col-md-7 col-xs-12" 
                                                placeholder='Email' value="<?php echo $email; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Email'">
                                           	 </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Website</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="web" class="form-control col-md-7 col-xs-12" 
                                                placeholder='Website' value="<?php echo $web; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Website'">
                                           	 </div>
                                            </div>
                                         <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Skills</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <textarea name="skills" class="form-control col-md-7 col-xs-12 ckeditor"><?php echo $skills; ?></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Expected Salary</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="expected_salary" class="form-control col-md-7 col-xs-12" value="<?php echo $expected_salary; ?>">
                                            </div>
                                        </div>                                             
                                            
                                            
                                            
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Linked In ID</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="text" name="linkedin" class="form-control col-md-7 col-xs-12" 
                                            placeholder='Linked In ID' value="<?php echo $linkedin; ?>"  onFocus="this.placeholder=''" 
                                            onBlur="this.placeholder='Linked In ID'">
                                         </div>
                                        </div>
                                       
                                       
                                       <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Github URL</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="text" name="github" class="form-control col-md-7 col-xs-12" 
                                            placeholder='Github URL' value="<?php echo $github; ?>"  onFocus="this.placeholder=''" 
                                            onBlur="this.placeholder='Github URL'">
                                         </div>
                                        </div>
                                        
                                             
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Cover Latter</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <textarea name="comp_add" class="form-control col-md-7 col-xs-12 ckeditor"><?php echo $coverlatter; ?></textarea>
                                            </div>
                                        </div>
                                         
                                         <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Career Summery</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <textarea name="career_summery" class="form-control col-md-7 col-xs-12 ckeditor"><?php echo $career_summery; ?></textarea>
                                            </div>
                                        </div>
                                         
                                         <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">About Your Self</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <textarea name="about_your_self" class="form-control col-md-7 col-xs-12 ckeditor"><?php echo $about_your_self; ?></textarea>
                                            </div>
                                        </div>
                                      	  <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Upload CV</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="file" name="cv_upload" class="form-control col-md-7 col-xs-12">
                                           	 </div>
                                            </div>
                                        
                                    	  
                                            </div>
                                            
                                        </div>
                                                        
                                                        
                                                        
                                                </div>
                                            </div>
                                        </div>
                                        
                               	     </div>
                                   </div> 
                                    
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <input type="hidden" name="c_id" value="<?php echo $c_id; ?>">
                                            <input type="reset" class="btn btn-primary" value="Reset">
                                            <input type="submit" name="registration" class="btn btn-success" value="Submit">
                                        </div>
                                    </div>
                               <?php echo form_close();?>
					</div>
