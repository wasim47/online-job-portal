<?php
if($latest_updateUpdate->num_rows()>0){
	foreach($latest_updateUpdate->result() as $latest_updateData);
	$latest_update_id=$latest_updateData->latest_update_id;
	$latest_updateTitle=$latest_updateData->latest_update_headline;
	$details=$latest_updateData->latest_update_details;
	$image=$latest_updateData->image;
	$ndate=$latest_updateData->ndate;
	$update_type=$latest_updateData->update_type;
}
else{
	$latest_update_id='';
	$update_type='';
	$latest_updateTitle=set_value('latest_update_headline');
	$details=set_value('details');
	$ndate=set_value('ndate');
	$image='';
	}
?>
<script>
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
	}
	
	function getCity(strURL) {		
		
		var req = getXMLHTTP();
		//alert(req);
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('citydiv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
</script>
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
							<li>latest_update Information</li>
						</ul>

						<ul class="breadcrumb-elements">
							<div class="heading-btn-group">
								<a href="<?php echo base_url('admin/subject_list');?>" class="btn btn-link btn-float has-text">
                                <i class="glyphicon glyphicon-list"></i><span>latest_update List</span></a>
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
                                                 <h4 class="panel-title">
                                                   Update Information </h4>
                                                 </a>
                                            </div>
                                            
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                
                                                update_type
                                        	<div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Update Title<span class="required">*</span></label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <select name="update_type" class="form-control">
                                                	<option value="<?php echo $update_type;?>"><?php echo ucfirst($update_type);?></option>
                                                    <option value="jobseeker">Job Seeker</option>
                                                    <option value="employers">Employers</option>
                                                </select>
                                             <?php echo form_error('update_type', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                           </div>
                                            <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Update Title<span class="required">*</span></label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="latest_update_headline" required class="form-control col-md-7 col-xs-12" 
                                                placeholder='Update Name' value="<?php echo $latest_updateTitle; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Update Name'">
                                             <?php echo form_error('latest_update_headline', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                           </div>
                                            <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Update Date</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="ndate" class="form-control" 
                                                placeholder='Update Date' value="<?php echo $ndate; ?>"  onFocus="this.placeholder=''" onBlur="this.placeholder='Update Date'">
                                             <?php echo form_error('ndate', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                           </div>
                                            
                                            <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Photo</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control" type="file" name="ad_photo">
                                            </div>
                                        </div>
                                            <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Update Details<span class="required">*</span>
                                            </label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <textarea type="text" name="details" class="form-control col-md-7 col-xs-12 ckeditor"><?php echo $details; ?></textarea>
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
                                            <input type="hidden" name="latest_update_id" value="<?php echo $latest_update_id; ?>">
                                            <input type="hidden" name="latest_update_stillimg" value="<?php echo $image; ?>">
                                            <input type="reset" class="btn btn-primary" value="Reset">
                                            <input type="submit" name="registration" class="btn btn-success" value="Submit">
                                        </div>
                                    </div>
                               <?php echo form_close();?>
					</div>
