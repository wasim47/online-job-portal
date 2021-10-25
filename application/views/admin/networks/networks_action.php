<?php
if($networksUpdate->num_rows()>0){
	foreach($networksUpdate->result() as $ctD);
	$c_id=$ctD->courses_id;
	$username=$ctD->username;
	$designation=$ctD->designation;	
	$comp_name=$ctD->comp_name;
	$comp_add=$ctD->comp_add;
	$phone=$ctD->phone;
	$email=$ctD->email;
	$web=$ctD->web;
	$details_text =$ctD->details_about;
	$newstitle='Edit Networks';
}
else{
	$c_id='';
	$username=set_value('username');
	$designation=set_value('designation');
	$comp_name=set_value('comp_name');
	$comp_add=set_value('comp_add');
	$phone=set_value('phone');
	$email=set_value('email');
	$web=set_value('web');
	$details_text=set_value('details_text');
	
	$newstitle='Add New Networks';
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
							<li>networks Information</li>
						</ul>

						<ul class="breadcrumb-elements">
							<div class="heading-btn-group">
								<a href="<?php echo base_url('admin/networks_list');?>" class="btn btn-link btn-float has-text">
                                <i class="glyphicon glyphicon-list"></i><span>networks List</span></a>
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
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Designation</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="designation" required class="form-control col-md-7 col-xs-12" 
                                                placeholder='Designation' value="<?php echo $designation; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Designation'">
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
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Company Name</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="comp_name" class="form-control col-md-7 col-xs-12" 
                                                placeholder='Company Name' value="<?php echo $comp_name; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Company Name'">
                                           	 </div>
                                            </div>
                                            
                                            <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Company Address</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <textarea type="text" name="comp_add" class="form-control col-md-7 col-xs-12"><?php echo $comp_add; ?></textarea>
                                            </div>
                                        </div>
                                         
                                         <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Details</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <textarea type="text" name="details_text" class="form-control col-md-7 col-xs-12 ckeditor"><?php echo $details_text; ?></textarea>
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
