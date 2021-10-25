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
                        
                
                  <div class="col-sm-7 col-sm-offset-1">
          
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" name="fullname" required placeholder="Full Name" class="form-control inputForm" />
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" name="phone" required  placeholder="Phone Number" class="form-control inputForm" />
                    </div>
                </div>
                
                
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="email" name="email" required placeholder="E-mail Address" class="form-control inputForm" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" name="username" required placeholder="User Name" class="form-control inputForm" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="password" name="password" required  class="form-control inputForm"  placeholder="Password"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="password" required name="confirmpassword" class="form-control inputForm"  placeholder="Re-type Password"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                            <input type="file" name="cv[]" class="file">
                            <div class="input-group col-xs-12" style="width:80%;" >
                              <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
                              <input type="text" class="form-control input-xs inputForm" disabled placeholder="Upload Your CV">
                              <span class="input-group-btn">
                                <button class="browse btn btn-warning input-xs" type="button"><i class="glyphicon glyphicon-search"></i> Browse</button>
                              </span>
                          </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12" style="margin-top:10px;">
                        <input type="checkbox" required name="agree"/>
                        <label style="font-size:11px;">I Agree to the jobstarbd.com <a href="#">Terms & Conditions.</a></label>

                    </div>
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

