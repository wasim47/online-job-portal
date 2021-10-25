<?php
	$c_id=$update['cid'];
	$company_name=$update['company_name'];
	$alt_company_name=$update['alt_company_name'];
	$contact_person=$update['contact_person'];
	$p_designation=$update['p_designation'];
	$p_email=$update['p_email'];
	$p_contact=$update['p_contact'];
	$industryType=$update['industryType'];
	$com_address =$update['com_address'];
	$country =$update['country'];
	$city =$update['city'];
	$area =$update['area'];
	$billing_address =$update['billing_address'];
	$com_contact=$update['com_contact'];
	$com_email=$update['com_email'];
	$website=$update['website'];
	$business_details=$update['business_details'];
	$user_name=$update['user_name'];
	$password=$update['password'];
	$logo = $update['logo'];
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
       
         <?php echo form_open('employers/myprofile_action/?action='.base64_encode("editprofile"));?>
         <div class="col-sm-12">
        	<h3 style="border-bottom:1px solid #ccc; padding:10px 0;"> Edit Profile</h3>
              <div class="col-sm-9 col-sm-offset-1">
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="event-name">Company Name<span class="required">*</span></label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" name="company_name" required class="form-control inputForm" 
                        placeholder='Company Name' value="<?php echo $company_name; ?>"  onFocus="this.placeholder=''" 
                        onBlur="this.placeholder='Company Name'">
                        <?php echo form_error('company_name', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                     </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="event-name">Alternet Company Name</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" name="alt_company_name" class="form-control inputForm" 
                        placeholder='Alternet Company Name' value="<?php echo $alt_company_name; ?>"  onFocus="this.placeholder=''" 
                        onBlur="this.placeholder='Alternet Company Name'">
                     </div>
                    </div>
                    
                   <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="event-name">Contact Person</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" name="contact_person"   class="form-control inputForm" 
                        placeholder='Contact Person' value="<?php echo $contact_person; ?>"  onFocus="this.placeholder=''" 
                        onBlur="this.placeholder='Contact Person'">
                     </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="event-name">Designation</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" name="p_designation"   class="form-control inputForm" 
                        placeholder='Designation' value="<?php echo $p_designation; ?>"  onFocus="this.placeholder=''" 
                        onBlur="this.placeholder='Designation'">
                     </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="event-name">Person Contact</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" name="p_contact" class="form-control inputForm" 
                        placeholder='Person Contact' value="<?php echo $p_contact; ?>"  onFocus="this.placeholder=''" 
                        onBlur="this.placeholder='Person Contact'">
                     </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="event-name">Person Email</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" name="p_email" class="form-control inputForm" 
                        placeholder='Person Email' value="<?php echo $p_email; ?>"  onFocus="this.placeholder=''" 
                        onBlur="this.placeholder='Person Email'">
                     </div>
                    </div>
                    
                     <div class="form-group">
                    <label class="control-label col-md-4 col-sm-4" for="first-name">Industry Type</label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <textarea name="industryType" class="form-control inputForm ckeditor"><?php echo $industryType; ?></textarea>
                    </div>
                </div>
                
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="first-name">Company Address</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <textarea name="com_address" class="form-control inputForm"><?php echo $com_address; ?></textarea>
                        </div>
                    </div>                                             
                        
                        
                     <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="first-name">Billing Address</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <textarea name="billing_address" class="form-control inputForm"><?php echo $billing_address; ?></textarea>
                        </div>
                    </div>
                       
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="event-name">Country</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" name="country" class="form-control inputForm" 
                        placeholder='Country' value="<?php echo $country; ?>"  onFocus="this.placeholder=''" 
                        onBlur="this.placeholder='Country'">
                     </div>
                    </div>
                   
                   
                  <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="event-name">City</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" name="city" class="form-control inputForm" 
                        placeholder='CIty' value="<?php echo $city; ?>"  onFocus="this.placeholder=''" 
                        onBlur="this.placeholder='City'">
                     </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="event-name">area</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" name="area" class="form-control inputForm" 
                        placeholder='Area' value="<?php echo $area; ?>"  onFocus="this.placeholder=''" 
                        onBlur="this.placeholder='Area'">
                     </div>
                    </div>
                
                    
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="event-name">Company Contact</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" name="com_contact" class="form-control inputForm" 
                        placeholder='Company Contact' value="<?php echo $com_contact; ?>"  onFocus="this.placeholder=''" 
                        onBlur="this.placeholder='Company Contact'">
                     </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="event-name">Company Email</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" name="com_email" class="form-control inputForm" 
                        placeholder='Company Email' value="<?php echo $com_email; ?>"  onFocus="this.placeholder=''" 
                        onBlur="this.placeholder='Company Email'">
                     </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="event-name">Website</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" name="website" class="form-control inputForm" 
                        placeholder='Website' value="<?php echo $website; ?>"  onFocus="this.placeholder=''" 
                        onBlur="this.placeholder='Website'">
                     </div>
                    </div>
                
                
                     
                <div class="form-group">
                    <label class="control-label col-md-4 col-sm-4" for="first-name">Business Details</label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <textarea name="business_details" class="form-control inputForm"><?php echo $business_details; ?></textarea>
                    </div>
                </div>
                 
                 <div class="form-group">
                    <label class="control-label col-md-4 col-sm-4" for="first-name">Username</label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                         <input type="text" name="user_name" class="form-control inputForm" 
                        placeholder='Username' value="<?php echo $user_name; ?>"  onFocus="this.placeholder=''" 
                        onBlur="this.placeholder='Username'">
                    </div>
                </div>
                 
                  <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="event-name">Logo</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="file" name="logo" class="form-control" style="width:60%; float:left;">
                        <img src="<?php echo base_url('asset/uploads/employers/'.$logo);?>" style="width:100px; height:auto; float:right" />
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
