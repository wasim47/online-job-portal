<?php
	$c_id='';
	$company_name=set_value('company_name');
	$alt_company_name=set_value('alt_company_name');
	$contact_person=set_value('contact_person');
	$p_designation=set_value('p_designation');
	$p_email=set_value('p_email');
	$p_contact=set_value('p_contact');
	$industryType=set_value('industryType');
	$com_address =set_value('com_address');
	$country =set_value('country');
	$city =set_value('city');
	$area =set_value('area');
	$billing_address =set_value('billing_address');
	$com_contact=set_value('com_contact');
	$com_email=set_value('com_email');
	$website=set_value('website');
	$business_details=set_value('business_details');
	$user_name=set_value('user_name');
	$password=set_value('password');
	$logo='';
	$newstitle='Add New employers';
?>
<style>
.required{
	color:#f00;
}
</style>
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Employers Account</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="<?php echo base_url();?>">Home</a> / <span><?php echo $branchmark;?></span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->

    <div class="row">
    	
        <?php echo form_open_multipart('', 'class="form-horizontal form-label-left"');
			echo $this->session->flashdata('successMsg');
		?>
           <div class="container" style="background:#fff; box-shadow:#ccc 0px 0px 10px 0px; padding:20px; margin-top:5px">
               <div class="panel-body">
                        

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Company Name<span class="required">*</span></label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" name="company_name" required class="form-control col-md-7 col-xs-12" 
                        placeholder='Company Name' value="<?php echo $company_name; ?>"  onFocus="this.placeholder=''" 
                        onBlur="this.placeholder='Company Name'">
                        <?php echo form_error('company_name', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                     </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Alternet Company Name</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" name="alt_company_name" class="form-control col-md-7 col-xs-12" 
                        placeholder='Alternet Company Name' value="<?php echo $alt_company_name; ?>"  onFocus="this.placeholder=''" 
                        onBlur="this.placeholder='Alternet Company Name'">
                     </div>
                    </div>
                    
                   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Contact Person</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" name="contact_person"   class="form-control col-md-7 col-xs-12" 
                        placeholder='Contact Person' value="<?php echo $contact_person; ?>"  onFocus="this.placeholder=''" 
                        onBlur="this.placeholder='Contact Person'">
                     </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Designation</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" name="p_designation"   class="form-control col-md-7 col-xs-12" 
                        placeholder='Designation' value="<?php echo $p_designation; ?>"  onFocus="this.placeholder=''" 
                        onBlur="this.placeholder='Designation'">
                     </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Person Contact</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" name="p_contact" class="form-control col-md-7 col-xs-12" 
                        placeholder='Person Contact' value="<?php echo $p_contact; ?>"  onFocus="this.placeholder=''" 
                        onBlur="this.placeholder='Person Contact'">
                     </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Person Email</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" name="p_email" class="form-control col-md-7 col-xs-12" 
                        placeholder='Person Email' value="<?php echo $p_email; ?>"  onFocus="this.placeholder=''" 
                        onBlur="this.placeholder='Person Email'">
                     </div>
                    </div>
                    
                     <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Industry Type</label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <textarea name="industryType" class="form-control col-md-7 col-xs-12 ckeditor"><?php echo $industryType; ?></textarea>
                    </div>
                </div>
                
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Company Address</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <textarea name="com_address" class="form-control col-md-7 col-xs-12"><?php echo $com_address; ?></textarea>
                        </div>
                    </div>                                             
                        
                        
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Billing Address</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <textarea name="billing_address" class="form-control col-md-7 col-xs-12"><?php echo $billing_address; ?></textarea>
                        </div>
                    </div>
                       
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Country</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" name="linkedin" class="form-control col-md-7 col-xs-12" 
                        placeholder='Linked In ID' value="<?php echo $country; ?>"  onFocus="this.placeholder=''" 
                        onBlur="this.placeholder='Linked In ID'">
                     </div>
                    </div>
                   
                   
                  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">City</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" name="linkedin" class="form-control col-md-7 col-xs-12" 
                        placeholder='Linked In ID' value="<?php echo $city; ?>"  onFocus="this.placeholder=''" 
                        onBlur="this.placeholder='Linked In ID'">
                     </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">area</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" name="linkedin" class="form-control col-md-7 col-xs-12" 
                        placeholder='Linked In ID' value="<?php echo $area; ?>"  onFocus="this.placeholder=''" 
                        onBlur="this.placeholder='Linked In ID'">
                     </div>
                    </div>
                
                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Company Contact</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" name="com_contact" class="form-control col-md-7 col-xs-12" 
                        placeholder='Company Contact' value="<?php echo $com_contact; ?>"  onFocus="this.placeholder=''" 
                        onBlur="this.placeholder='Company Contact'">
                     </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Company Email</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" name="com_email" class="form-control col-md-7 col-xs-12" 
                        placeholder='Company Email' value="<?php echo $com_email; ?>"  onFocus="this.placeholder=''" 
                        onBlur="this.placeholder='Company Email'">
                     </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Website</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" name="website" class="form-control col-md-7 col-xs-12" 
                        placeholder='Website' value="<?php echo $website; ?>"  onFocus="this.placeholder=''" 
                        onBlur="this.placeholder='Website'">
                     </div>
                    </div>
                
                
                     
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Business Details</label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <textarea name="business_details" class="form-control col-md-7 col-xs-12"><?php echo $business_details; ?></textarea>
                    </div>
                </div>
                 
                 <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Username</label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                         <input type="text" name="user_name" class="form-control col-md-7 col-xs-12" 
                        placeholder='Username' value="<?php echo $user_name; ?>"  onFocus="this.placeholder=''" 
                        onBlur="this.placeholder='Username'">
                    </div>
                </div>
                 
                 <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Password</label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                         <input type="text" name="password" class="form-control col-md-7 col-xs-12" 
                        placeholder='Password' value="<?php echo $password; ?>"  onFocus="this.placeholder=''" 
                        onBlur="this.placeholder='Password'">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Confirm Password</label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                         <input type="text" name="Confirm password" class="form-control col-md-7 col-xs-12" 
                        placeholder='Confirm Password' onFocus="this.placeholder=''" 
                        onBlur="this.placeholder='Password'">
                    </div>
                </div>
                
                  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Logo</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="file" name="logo" class="form-control col-md-7 col-xs-12">
                     </div>
                    </div>
                
                  
                    </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <input type="reset" class="btn btn-primary" value="Reset">
                    <input type="submit" name="registration" class="btn btn-success" value="Submit">
                </div>
            </div>
           </div>
            
           
       <?php echo form_close();?>
    
    </div>
  </div>
</div>

