<?php
	$c_id=$update['id'];
	$username=$update['username'];
	$phone=$update['phone'];
	$email=$update['email'];
	$web=$update['web'];
	$expected_salary=$update['expected_salary'];
	$skills=$update['skills'];
	$linkedin=$update['linkedin'];
	$github=$update['github'];
	$coverlatter=$update['coverlatter'];
	$about_your_self=$update['about_your_self'];
	$career_summery =$update['career_summery'];
?>
<style>
.required{
	color:#f00;
}
</style>
<div class="container" style="background:#fff; box-shadow:#ccc 0px 0px 10px 0px; padding:20px; margin:30px auto">	
<div class="row">
<div class="col-md-3"><?php include('left_menu.php');?></div>

   
      <div class="col-md-9 col-sm-12">
       
         <?php echo form_open('jobseekers/myprofile_action/?action='.base64_encode("editprofile"));?>
         <div class="col-sm-12">
        	<h3 style="border-bottom:1px solid #ccc; padding:10px 0;"> Edit Profile</h3>
              <div class="col-sm-7 col-sm-offset-1">
                <div class="form-group">
                    <label class="control-label col-sm-4" for="event-name">User Name<span class="required">*</span></label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                    <input type="text" name="username" required class="form-control inputForm" 
                    placeholder='User Name' value="<?php echo $username; ?>"  onFocus="this.placeholder=''" 
                    onBlur="this.placeholder='User Name'">
                    <?php echo form_error('username', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                 </div>
                </div>
                
              
                
                <div class="form-group">
                    <label class="control-label col-sm-4" for="event-name">Phone</label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                    <input type="text" name="phone" class="form-control inputForm" 
                    placeholder='Phone' value="<?php echo $phone; ?>"  onFocus="this.placeholder=''" 
                    onBlur="this.placeholder='Phone'">
                 </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="event-name">Email</label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                    <input type="text" name="email" class="form-control inputForm" 
                    placeholder='Email' value="<?php echo $email; ?>"  onFocus="this.placeholder=''" 
                    onBlur="this.placeholder='Email'">
                 </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="event-name">Website</label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                    <input type="text" name="web" class="form-control inputForm" 
                    placeholder='Website' value="<?php echo $web; ?>"  onFocus="this.placeholder=''" 
                    onBlur="this.placeholder='Website'">
                 </div>
                </div>
             <div class="form-group">
                <label class="control-label col-sm-4" for="first-name">Skills</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <textarea name="skills" class="form-control inputForm ckeditor"><?php echo $skills; ?></textarea>
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-sm-4" for="first-name">Expected Salary</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <input type="text" name="expected_salary" class="form-control inputForm" value="<?php echo $expected_salary; ?>">
                </div>
            </div>                                             
                
                
                
            <div class="form-group">
                <label class="control-label col-sm-4" for="event-name">Linked In ID</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                <input type="text" name="linkedin" class="form-control inputForm" 
                placeholder='Linked In ID' value="<?php echo $linkedin; ?>"  onFocus="this.placeholder=''" 
                onBlur="this.placeholder='Linked In ID'">
             </div>
            </div>
           
           
           <div class="form-group">
                <label class="control-label col-sm-4" for="event-name">Github URL</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                <input type="text" name="github" class="form-control inputForm" 
                placeholder='Github URL' value="<?php echo $github; ?>"  onFocus="this.placeholder=''" 
                onBlur="this.placeholder='Github URL'">
             </div>
            </div>
            
                 
            <div class="form-group">
                <label class="control-label col-sm-4" for="first-name">Cover Latter</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <textarea name="comp_add" class="form-control inputForm ckeditor"><?php echo $coverlatter; ?></textarea>
                </div>
            </div>
             
             <div class="form-group">
                <label class="control-label col-sm-4" for="first-name">Career Summery</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <textarea name="career_summery" class="form-control inputForm ckeditor"><?php echo $career_summery; ?></textarea>
                </div>
            </div>
             
             <div class="form-group">
                <label class="control-label col-sm-4" for="first-name">About Your Self</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <textarea name="about_your_self" class="form-control inputForm ckeditor"><?php echo $about_your_self; ?></textarea>
                </div>
            </div>
              <div class="form-group">
                    <label class="control-label col-sm-4" for="event-name">Update CV</label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                    <input type="file" name="cv_upload" class="form-control inputForm">
                 </div>
                </div>
            <div class="form-group">
                                            <label class="control-label col-sm-4"></label>
                                            <div class="col-sm-8 pull-right" style="margin-top:10px; float:right">
                                            <button type="submit" class="btn btn-success btn-submit">Submit</button></div>
                                        </div>
              
                </div>
             </div>
        <?php echo form_close();?>
         
      </div>
      </div>
      </div>
    
    
  </div>
</div>
