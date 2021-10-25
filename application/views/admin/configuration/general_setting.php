<?php
if($adminUpdate->num_rows()>0){
	foreach($adminUpdate->result() as $adminData);
	$user_id=$adminData->id;
	$username=$adminData->username;
	$userid=$adminData->userid;
	$photo=$adminData->logo;
	$menu=$adminData->menu;
	$def_title=$adminData->def_title;
	$fContent=$adminData->fContent;
	$idcard=$adminData->idcard;
	$admin_access=$adminData->features;
	$eseba=$adminData->eseba;
	$userAccess=explode(',',$adminData->features);
}
else{
	$user_id='';
	$userid='';
	$photo='';
	$username=set_value('username');
	$admin_access='';
	$menu='';
	$idcard='';
	$userAccess='';
	$eseba='';
	$def_title='';
	$fContent='';
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
							<li>Configuration</li>
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
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Website Menu</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="radio" name="menu" value="default" style="width:20px; height:20px"  <?php if($menu=='default'){ ?> checked="checked" <?php } ?>/>
                                                <label style="font-size:15px;">Default Menu </label>
                                                <input type="radio" name="menu"  value="custom" style="width:20px; height:20px" <?php if($menu=='custom'){ ?> checked="checked" <?php } ?>/>
                                                <label style="font-size:15px;">Custom Menu </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Eseba</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="radio" name="eseba" value="default" style="width:20px; height:20px"  <?php if($eseba=='default'){ ?> checked="checked" <?php } ?>/>
                                                <label style="font-size:15px;">Default Menu </label>
                                                <input type="radio" name="eseba"  value="custom" style="width:20px; height:20px" <?php if($eseba=='custom'){ ?> checked="checked" <?php } ?>/>
                                                <label style="font-size:15px;">Custom Menu </label>
                                            </div>
                                        </div>
                                        <!--<div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">ID Card Design</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="radio" name="idcard" value="default" <?php if($idcard=='default'){ ?> checked="checked" <?php }?> style="width:20px; height:20px" />
                                                <label style="font-size:15px;">Default Design </label>
                                                <input type="radio" name="idcard"  value="custom" style="width:20px; height:20px" <?php if($idcard=='custom'){ ?> checked="checked" <?php } ?>/>
                                                <label style="font-size:15px;">Custom Design </label>
                                            </div>
                                        </div>-->
                                        
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Website Title</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="def_title" class="form-control" value="<?php echo $def_title;?>"/>
                                            </div>
                                        </div>  
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Footer Content</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="fContent" class="form-control" value="<?php echo $fContent;?>"/>
                                            </div>
                                        </div>    
                                                      
                                            <?php if($adminUpdate->num_rows()>0){?>       
                                            <div class="form-group">
                                                <label for="focusedinput" class="col-sm-3 control-label">Website Features</label>
                                                <div class="col-sm-3">
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
                                            <div class="form-group">
                                                <label for="focusedinput" class="col-sm-3 control-label">Website Features</label>
                                                	
                                                <div class="col-sm-3">
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
