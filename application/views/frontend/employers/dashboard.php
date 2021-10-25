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

.panel-body h6{
	font-size:13px;
	color:#666;
}
</style>
<div class="container" style="margin-top:50px">
<div class="row">
<div class="col-md-3"><?php include('left_menu.php');?></div>

   
   
    
   

      <div class="col-md-9 col-sm-12" >
         <div>
            <div class="top-button button-group">
               <a href="<?php echo base_url('employers/myprofile/?pages='.base64_encode("updateprofile"));?>" class="btn btn-default view-stats" id="stats">
               <i class="glyphicon glyphicon-stats icon-padding"></i> Edit Profile
               </a>
               <a href="<?php echo base_url('employers/postjobs');?>" class="btn btn-default edit-resume-btn" id="resume">
               <i class="glyphicon glyphicon-edit icon-plus"></i> Post Jobs
               </a>
            </div>
         </div>
      </div>
     
     
      <div class="col-md-9 col-sm-12">
       
         <div class="my-stats">
            <div class="panel">
               <div style="background-color: #d9d9d9; color: #333;" class="panel-heading"><i class="glyphicon glyphicon-list-alt icon-padding"></i> Company Details
               </div>
               <div class="panel-body">
                  <div class="col-sm-12">
              <div class="col-sm-10 col-sm-offset-1">
                   
                    <div class="form-group col-md-12 col-sm-12" style="width:100%; margin:5px;">
                        <div class="col-md-6 col-sm-6"><h6>Company Name</h6></div>
                        <div class="col-md-6 col-sm-6 col-xs-12"><h6><?php echo $company_name; ?></h6></div>
                    </div>
                    
                    <div class="form-group col-md-12 col-sm-12" style="width:100%; margin:5px;">
                        <div class="col-md-6 col-sm-6"><h6>Alternet Company Name</h6></div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <h6><?php echo $alt_company_name; ?></h6>
                     </div>
                    </div>
                    
                   <div class="form-group col-md-12 col-sm-12" style="width:100%; margin:5px;">
                        <div class="col-md-6 col-sm-6"><h6>Contact Person</h6></div> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <h6><?php echo $contact_person; ?></h6>
                     </div>
                    </div>
                    <div class="form-group col-md-12 col-sm-12" style="width:100%; margin:5px;">
                        <div class="col-md-6 col-sm-6"><h6>Designation</h6></div> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                       <h6><?php echo $p_designation; ?></h6>
                     </div>
                    </div>
                    
                    <div class="form-group col-md-12 col-sm-12" style="width:100%; margin:5px;">
                        <div class="col-md-6 col-sm-6"><h6>Person Contact</h6></div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                       <h6><?php echo $p_contact; ?></h6>
                     </div>
                    </div>
                    <div class="form-group col-md-12 col-sm-12" style="width:100%; margin:5px;">
                        <div class="col-md-6 col-sm-6"><h6>Person Email</h6></div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <h6><?php echo $p_email; ?></h6>
                     </div>
                    </div>
                    
                     <div class="form-group col-md-12 col-sm-12" style="width:100%; margin:5px;">
                    <div class="col-md-6 col-sm-6"><h6>Industry Type</h6></div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <h6><?php echo $industryType; ?></h6>
                    </div>
                </div>
                
                    <div class="form-group col-md-12 col-sm-12" style="width:100%; margin:5px;">
                        <div class="col-md-6 col-sm-6"><h6>Company Address</h6></div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <h6><?php echo $com_address; ?></h6>
                        </div>
                    </div>                                             
                        
                        
                     <div class="form-group col-md-12 col-sm-12" style="width:100%; margin:5px;">
                        <div class="col-md-6 col-sm-6"><h6>Billing Address</h6></div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <h6><?php echo $billing_address; ?></h6>
                        </div>
                    </div>
                       
                    <div class="form-group col-md-12 col-sm-12" style="width:100%; margin:5px;">
                        <div class="col-md-6 col-sm-6"><h6>Country</h6></div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <h6><?php echo $country; ?></h6>
                     </div>
                    </div>
                   
                   
                  <div class="form-group col-md-12 col-sm-12" style="width:100%; margin:5px;">
                        <div class="col-md-6 col-sm-6"><h6>City</h6></div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                       <h6> <?php echo $city; ?></h6>
                     </div>
                    </div>
                    
                    <div class="form-group col-md-12 col-sm-12" style="width:100%; margin:5px;">
                        <div class="col-md-6 col-sm-6"><h6>area</h6></div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <h6><?php echo $area; ?></h6>
                     </div>
                    </div>
                
                    
                    <div class="form-group col-md-12 col-sm-12" style="width:100%; margin:5px;">
                        <div class="col-md-6 col-sm-6"><h6>Company Contact</h6></div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <h6><?php echo $com_contact; ?></h6>
                     </div>
                    </div>
                    <div class="form-group col-md-12 col-sm-12" style="width:100%; margin:5px;">
                        <div class="col-md-6 col-sm-6"><h6>Company Email</h6></div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <h6><?php echo $com_email; ?></h6>
                     </div>
                    </div>
                    <div class="form-group col-md-12 col-sm-12" style="width:100%; margin:5px;">
                        <div class="col-md-6 col-sm-6"><h6>Website</h6></div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                       <h6> <?php echo $website; ?></h6>
                     </div>
                    </div>
                
                
                     
                <div class="form-group col-md-12 col-sm-12" style="width:100%; margin:5px;">
                    <div class="col-md-6 col-sm-6"><h6>Business Details</h6></div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <h6><?php echo $business_details; ?></h6>
                    </div>
                </div>
                 
                 <div class="form-group col-md-12 col-sm-12" style="width:100%; margin:5px;">
                    <div class="col-md-6 col-sm-6">Username</div><div class="col-md-6 col-sm-6 col-xs-12">
                         <h6><?php echo $user_name; ?></h6>
                    </div>
                </div>
                 
               
                
                  <div class="form-group col-md-12 col-sm-12" style="width:100%; margin:5px;">
                        <div class="col-md-12 col-sm-12"><h6>Logo</h6></div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        <img src="<?php echo base_url('asset/uploads/employers/'.$logo);?>" style="width:100%; height:auto" />
                     </div>
                    </div>
            
              
                </div>
             </div>                
               </div>
            </div>
         </div>
         
         <!-- end resume --> 
      </div>
      </div>
      <!-- end of col-md-9 -->
      </div>
    
    
  </div>
</div>
