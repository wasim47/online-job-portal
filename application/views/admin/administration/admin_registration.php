<?php
if($adminUpdate->num_rows()>0){
	foreach($adminUpdate->result() as $adminData);
	$user_id=$adminData->id;
	$username=$adminData->username;
	$userUrl=$adminData->urlname;
	$photo=$adminData->photo;
	$contactno=$adminData->contactno;
	$admin_type=$adminData->admin_type;
	$admin_access=$adminData->admin_access;
	$email=$adminData->email;
	$password=$adminData->pass_hints;
	
	if($admin_type == 'SubAdmin'){
			$style='';
		}
		else{
			$style='style="display:none"';		
		}
	$userAccess=explode(',',$adminData->admin_access);
}
else{
	$user_id='';
	$userUrl='';
	$photo='';
	$username=set_value('username');
	$contactno='';
	$admin_type='';
	$admin_access='';
	$email=set_value('email');
	$password=set_value('password');
	$userAccess='';
	$style='style="display:none"';
	}
	
	
?>
<style>
.required{
	color:#f00;
}
</style>
<script>
function userAccess(){
		var userType = document.getElementById('userRoll').value;
		if(userType=='SubAdmin'){
			document.getElementById('user_access').style.display='block';
		}
		else{
			document.getElementById('user_access').style.display='none';	
		}
	}
</script>


<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					

					<div class="breadcrumb-line breadcrumb-line-component" style="margin-top:10px; margin-bottom:10px;">
						<ul class="breadcrumb" style="font-size:20px;">
							<li>Admin Information</li>
						</ul>

						<ul class="breadcrumb-elements">
							<div class="heading-btn-group">
								<a href="<?php echo base_url('admin/administration_list');?>" class="btn btn-link btn-float has-text">
                                <i class="glyphicon glyphicon-list"></i><span>Admin List</span></a>
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
                                  	  <div class="panel-group">
                                        <div class="panel panel-default">
                                      	  <div class="panel-body">
                                            <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Admin Name<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="username" class="input-sm validate[required] form-control"
                                                placeholder='Admin Name' value="<?php echo $username; ?>"  onFocus="this.placeholder=''" onBlur="this.placeholder='Admin Name'">
                                             <?php //echo form_error('username', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                        </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Username<span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" name="userUrl" class="input-sm validate[required] form-control" 
                                                    placeholder='Username' value="<?php echo $userUrl; ?>" onFocus="this.placeholder=''" onBlur="this.placeholder='Username'">
                                                 <?php //echo form_error('userid', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">User Photo <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="file" name="userphoto"  class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Contact No.<span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" name="contactno"  class="input-sm validate[required] form-control"
                                                    placeholder='Contact No' value="<?php echo $contactno; ?>"  onFocus="this.placeholder=''" onBlur="this.placeholder='Contact No'">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" >Admin Type<span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select name="admintype"   class="form-control" id="userRoll" onChange="userAccess();">
                                                        <option value="<?php $admin_type;?>"><?php echo $admin_type;?></option>
                                                        <?php
															$admininfo=$this->Index_model->getAllItemTable('admin_users','userid',
															$userid,'admin_type','Super Admin','id','desc');
															if($admininfo->num_rows() == 0){
															?>
															<option value="Super Admin">Super Admin</option>
															<?php
															}															
														?>
                                                        <option value="SubAdmin">Sub Admin</option>
                                                    </select>
                                                </div>
                                            </div>                  
                                            <?php if($adminUpdate->num_rows()>0){?>       
                                            <div class="form-group" id="user_access" <?php echo $style;?>>
                                                <label for="focusedinput" class="col-sm-3 control-label">User Access</label>
                                                <div class="col-sm-3">
                                                  <input type="checkbox" name="userAccess[]" value="eseba" <?php if(in_array('eseba',$userAccess)){echo "checked";}?>> 
                                                  &nbsp;&nbsp;Eseba<br>
                                                  
                                                  <input type="checkbox" name="userAccess[]" value="student" <?php if(in_array('student',$userAccess)){echo "checked";}?>> 
                                                  &nbsp;&nbsp;Student Registratoin<br>
                                                  <input type="checkbox" name="userAccess[]" value="idcard" <?php if(in_array('idcard',$userAccess)){echo "checked";}?>>
                                                   &nbsp;&nbsp;Student ID Card<br>
                                                  <input type="checkbox" name="userAccess[]" value="attendance" <?php if(in_array('attendance',$userAccess)){echo "checked";}?>>
                                                   &nbsp;&nbsp;Attendance<br>
                                        		  <input type="checkbox" name="userAccess[]" value="teacher" <?php if(in_array('teacher',$userAccess)){echo "checked";}?>>
                                                   &nbsp;&nbsp;Teacher<br>
                                                  <input type="checkbox" name="userAccess[]" value="setting" <?php if(in_array('setting',$userAccess)){echo "checked";}?>>
                                                   &nbsp;&nbsp;Setting<br>
                                                  <input type="checkbox" name="userAccess[]" value="result" <?php if(in_array('result',$userAccess)){echo "checked";}?>>
                                                   &nbsp;&nbsp;Result<br>
                                                  <input type="checkbox" name="userAccess[]" value="accounts" <?php if(in_array('accounts',$userAccess)){echo "checked";}?>> 
                                                  &nbsp;&nbsp;Accounts<br>
                                                  <input type="checkbox" name="userAccess[]" value="routine" <?php if(in_array('routine',$userAccess)){echo "checked";}?>>
                                                   &nbsp;&nbsp;Routine<br>
                                                </div>
                                                <div class="col-sm-3">
                                                  <input type="checkbox" name="userAccess[]" value="vahicle" <?php if(in_array('vahicle',$userAccess)){echo "checked";}?>>
                                                   &nbsp;&nbsp;Vahicle Informaiton<br>
                                                  <input type="checkbox" name="userAccess[]" value="academicmessage" <?php if(in_array('academicmessage',$userAccess)){echo "checked";}?>> 
                                                  &nbsp;&nbsp;Academic Message<br>
                                                  <input type="checkbox" name="userAccess[]" value="academiccalender" <?php if(in_array('academiccalender',$userAccess)){echo "checked";}?>> 
                                                  &nbsp;&nbsp;Academic Calender<br>
                                                  <input type="checkbox" name="userAccess[]" value="map" <?php if(in_array('map',$userAccess)){echo "checked";}?>>
                                                   &nbsp;&nbsp;Google Map<br />
                                                  <input type="checkbox" name="userAccess[]" value="banner" <?php if(in_array('banner',$userAccess)){echo "checked";}?>>
                                                   &nbsp;&nbsp;Banner<br>
                                                  <input type="checkbox" name="userAccess[]" value="menu" <?php if(in_array('menu',$userAccess)){echo "checked";}?>> 
                                                  &nbsp;&nbsp;Menu<br>
                                        		  <input type="checkbox" name="userAccess[]" value="content" <?php if(in_array('content',$userAccess)){echo "checked";}?>>
                                                   &nbsp;&nbsp;Content<br />
                                                  <input type="checkbox" name="userAccess[]" value="notice" <?php if(in_array('notice',$userAccess)){echo "checked";}?>>
                                                   &nbsp;&nbsp;Notice<br />
                                                </div>
                                                <div class="col-sm-3">
                                                  
                                                  <input type="checkbox" name="userAccess[]" value="news" <?php if(in_array('news',$userAccess)){echo "checked";}?>> 
                                                  &nbsp;&nbsp;News<br />
                                                  <input type="checkbox" name="userAccess[]" value="events" <?php if(in_array('events',$userAccess)){echo "checked";}?>>
                                                   &nbsp;&nbsp;Events<br />
                                                  <input type="checkbox" name="userAccess[]" value="photo" <?php if(in_array('photo',$userAccess)){echo "checked";}?>>
                                                   &nbsp;&nbsp;Photo Gallery<br>
                                                  <input type="checkbox" name="userAccess[]" value="video" <?php if(in_array('video',$userAccess)){echo "checked";}?>>
                                                   &nbsp;&nbsp;Video Gallery<br>
                                                  
                                                </div>
                                                <div class="col-sm-3">
                                                <p class="label label-danger" id="error_name"></p>
                                                </div>
                                                </div>
                                            <?php }
                                            else{
                                            ?>
                                            <div class="form-group" id="user_access" style="display:none">
                                                <label for="focusedinput" class="col-sm-3 control-label">User Access</label>
                                                	
                                                <div class="col-sm-3">
                                                  <input type="checkbox" name="userAccess[]" value="eseba"> &nbsp;&nbsp;Eseba<br>
                                                  <input type="checkbox" name="userAccess[]" value="student"> &nbsp;&nbsp;Student Registratoin<br>
                                                  <input type="checkbox" name="userAccess[]" value="idcard"> &nbsp;&nbsp;Student ID Card<br>
                                                  <input type="checkbox" name="userAccess[]" value="attendance"> &nbsp;&nbsp;Attendance<br>
                                        		  <input type="checkbox" name="userAccess[]" value="teacher"> &nbsp;&nbsp;Teacher<br>
                                                  <input type="checkbox" name="userAccess[]" value="setting"> &nbsp;&nbsp;Setting<br>
                                                  <input type="checkbox" name="userAccess[]" value="result"> &nbsp;&nbsp;Result<br>
                                                  <input type="checkbox" name="userAccess[]" value="accounts"> &nbsp;&nbsp;Accounts<br>
                                                  <input type="checkbox" name="userAccess[]" value="routine"> &nbsp;&nbsp;Routine<br>
                                                </div>
                                                <div class="col-sm-3">
                                                  <input type="checkbox" name="userAccess[]" value="vahicle"> &nbsp;&nbsp;Vahicle Informaiton<br>
                                                  <input type="checkbox" name="userAccess[]" value="academicmessage"> &nbsp;&nbsp;Academic Message<br>
                                                  <input type="checkbox" name="userAccess[]" value="academiccalender"> &nbsp;&nbsp;Academic Calender<br>
                                                  <input type="checkbox" name="userAccess[]" value="map"> &nbsp;&nbsp;Google Map<br />
                                                  <input type="checkbox" name="userAccess[]" value="banner"> &nbsp;&nbsp;Banner<br>
                                                  <input type="checkbox" name="userAccess[]" value="menu"> &nbsp;&nbsp;Menu<br>
                                        		  <input type="checkbox" name="userAccess[]" value="content"> &nbsp;&nbsp;Content<br />
                                                  <input type="checkbox" name="userAccess[]" value="notice"> &nbsp;&nbsp;Notice<br />
                                                </div>
                                                <div class="col-sm-3">
                                                  
                                                  <input type="checkbox" name="userAccess[]" value="news"> &nbsp;&nbsp;News<br />
                                                  <input type="checkbox" name="userAccess[]" value="events"> &nbsp;&nbsp;Events<br />
                                                  <input type="checkbox" name="userAccess[]" value="photo"> &nbsp;&nbsp;Photo Gallery<br>
                                                  <input type="checkbox" name="userAccess[]" value="video"> &nbsp;&nbsp;Video Gallery<br>
                                                  
                                                </div>
                                                <div class="col-sm-3">
                                                    <p class="label label-danger" id="error_name"></p>
                                                </div>
                                            </div>
                                            <?php }?>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Email<span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="email" name="email" class="input-sm validate[required] form-control"
                                                    placeholder='Login Email' onFocus="this.placeholder=''" value="<?php echo $email; ?>" onBlur="this.placeholder='Login Email'">
                                                     <?php //echo form_error('email', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Password<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="password" name="password" class="input-sm validate[required] form-control" 
                                    placeholder='Password' onFocus="this.placeholder=''" onBlur="this.placeholder='Password'" value="<?php echo $password; ?>">
                                    <?php //echo form_error('password', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                </div>
                            </div>
                                            <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Confirm Password<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="password" name="confirmpassword" class="input-sm validate[required] form-control" 
                                    placeholder='Confirm Password' onFocus="this.placeholder=''" onBlur="this.placeholder='Confirm Password'" value="<?php echo $password; ?>">
                                    <?php //echo form_error('confirmpassword', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                </div>
                            </div>
                                             <div class="ln_solid"></div>
                                            <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                             <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                             <input type="hidden" name="stillimg" value="<?php echo $photo; ?>">
                                                <input type="reset" class="btn btn-primary" value="Reset">
                                                <input type="submit" name="registration" class="btn btn-success" value="Submit">
                                            </div>
                                        </div>
                            			</div>
                            			</div>
                            		  </div>
                            	</div>
                               <?php echo form_close();?>
					</div>
