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
       
         <?php echo form_open('jobseekers/myprofile_action/?action='.base64_encode("changepassword"));
		 echo $this->session->flashdata('globalMsg');
		 ?>
         <div class="col-sm-12">
        	<h3 style="border-bottom:1px solid #ccc; padding:10px 0;"> Change Password</h3>
              <div class="col-sm-8 col-sm-offset-1">
               
                   <div class="form-group">
                       <label class="control-label col-md-4">Old Password</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control inputForm" name="oldpassword" 
                          value="<?php echo set_value('oldpassword'); ?>" id="disabledinput" placeholder="Old Password" />
                          <?php echo form_error('oldpassword','<p class="label label-danger">','</p>'); ?>
                        </div>
                       
                    </div>
                   <div class="form-group">
                        <label class="control-label col-md-4">Password</label>
                        <div class="col-sm-8">
                          <input type="password" class="form-control inputForm" name="password" value="<?php echo set_value('password'); ?>"  
                          placeholder="xxxxx">
                           <?php echo form_error('password','<p class="label label-danger">','</p>'); ?>
                        </div>
                    </div>
                   <div class="form-group">
                        <label for="focusedinput" class="control-label col-md-4">Confirm Password</label>
                        <div class="col-sm-8">
                          <input type="password" class="form-control inputForm" name="confirmpassword" 
                          value="<?php echo set_value('confirmpassword'); ?>" placeholder="xxxxx">
                          <?php echo form_error('confirmpassword','<p class="label label-danger">','</p>'); ?>
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
