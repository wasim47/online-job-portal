<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
if($instituteUpdate->num_rows()>0){
	foreach($instituteUpdate->result() as $instituteData);
			$uni_id		=	$instituteData->uni_id;
			$einno		=	$instituteData->inst_code;
			$branchno	=	$instituteData->branchno;
			$noofstd	=	$instituteData->noofstd;
			$inst_type	=	$instituteData->inst_type;
			$class_type	=	$instituteData->class_type;						
			$name		=	$instituteData->name;
			$banglanam	=	$instituteData->banglanam;
			$subtitle	=	$instituteData->subtitle;
			$email		=	$instituteData->email;
			$contact	=	$instituteData->contact;
			$telephone	=	$instituteData->telephone;
			$fax		=	$instituteData->fax;					
			$logo		=	$instituteData->logo;	
			$street		=	$instituteData->street;
			$zipcode	=	$instituteData->zipcode;
			$details	=	$instituteData->institute_details;
			$address	=	$instituteData->address;
			$domainname	=	$instituteData->urlname;
			
			$division	=	$instituteData->division;
			$district	=	$instituteData->district;
			$thana		=	$instituteData->thana;
			
			$queryDiv = $this->db->query("SELECT * FROM divisions WHERE id='".$division."' ");
			$rowDiv = $queryDiv->row_array();
			$divisionname = $rowDiv['name'];
			
			$queryDis = $this->db->query("SELECT * FROM districts WHERE id='".$district."' ");
			$rowDis = $queryDis->row_array();
			$districtname = $rowDis['name'];
			
			$queryTh = $this->db->query("SELECT * FROM upazilas WHERE id='".$thana."' ");
			$rowTh = $queryTh->row_array();
			$thananame = $rowTh['name'];
		}
	else{
			$uni_id			=	'';
			$einno			=	set_value('einno');
			$branchno		=	set_value('branchno');
			$noofstd		=	set_value('noofstd');
			$inst_type		=	set_value('inst_type');
			$class_type		=	set_value('class_type');				
			$name			=	set_value('uniName');
			$banglanam		=	set_value('banglanam');
			$subtitle		=	set_value('subtitle');
			$email			=	set_value('email');
			$contact		=	set_value('contact');
			$telephone		=	set_value('telephone');
			$fax			=	set_value('fax');			
			$logo			=	set_value('logo');
			$street			=	set_value('street');
			$zipcode		=	set_value('zipcode');
			$details		=	set_value('details');
			$address 		= 	set_value('address');
			$domainname		=	set_value('domainname');
			
			$division		=	set_value('division');
			$divisionname	='';
			
			$district		=	set_value('district');
			$districtname	='';
			$thana			=	set_value('thana');
			$thananame	='';
			
	}
?>

<style>
.required{
	color:#f00;
}
</style>

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
	
	function getDistrict(strURL) {		
		var req = getXMLHTTP();
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
	
	
	
	function getLocation(strURL) {		
		var req = getXMLHTTP();
		if (req) {
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('locationdiv').innerHTML=req.responseText;
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

<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					

					<div class="breadcrumb-line breadcrumb-line-component" style="margin-top:10px; margin-bottom:10px;">
						<ul class="breadcrumb" style="font-size:20px;">
							<li>Institute Information</li>
						</ul>

						<ul class="breadcrumb-elements">
							<div class="heading-btn-group">
								<a href="<?php echo base_url('ims_administrator/institute_list');?>" class="btn btn-link btn-float has-text">
                                <i class="glyphicon glyphicon-list"></i><span>institute List</span></a>
							</div>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Page length options -->
					<div class="panel panel-flat">
						 <?php echo form_open_multipart('', 'class="form-horizontal form-label-left"');
						 echo $this->session->flashdata('successMsg');
						 	?>
                             <div id="registration_form">	
                                  	  <div class="panel-group" id="accordion">
                                        <div class="panel panel-default">
                                                <div class="panel-body">
                                                
                                        
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Institute Name<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="institute_name" required class="form-control col-md-7 col-xs-12" 
                                                placeholder='Institute Name' value="<?php echo $name; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Institute Name'">
                                             <?php echo form_error('institute_name', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">বাংলা নাম<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="banglanam" required class="form-control col-md-7 col-xs-12" 
                                                placeholder='????? ???' value="<?php echo $banglanam; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='????? ???'">
                                             <?php echo form_error('subtitle', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Sub Title<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="subtitle" required class="form-control col-md-7 col-xs-12" 
                                                placeholder='Sub Title' value="<?php echo $subtitle; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Sub Title'">
                                             <?php echo form_error('subtitle', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Institute Type<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select name="inst_type" class="form-control" style="width:30%;">
                                                	<option value="<?php echo $inst_type;?>"><?php echo $inst_type;?></option>
                                                    <option value="Government">Government</option>
                                                    <option value="Non Government">Non Government</option>
                                                    <option value="Coaching Center">Coaching Center</option>
                                                </select>
                                             <?php echo form_error('inst_type', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3">Class Type<span class="required">*</span>
                                            </label></label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            <?php $ctypear=explode(',',$class_type);?>
                                                <span style="margin-right:10px;">
                                                <input type="checkbox" name="class_type[]" value="Primary" 
												<?php if(in_array('Primary',$ctypear)){?> checked="checked" <?php } ?> /> 
                                                <label>Primary </label> </span>
                                                <span style="margin-right:10px;">
                                                <input type="checkbox" name="class_type[]" value="Higher"  
												<?php if(in_array('Higher',$ctypear)){?> checked="checked" <?php } ?>/> 
                                                <label> Higher </label> </span>
                                                <span style="margin-right:10px;">
                                                <input type="checkbox" name="class_type[]" value="Bachelor"  
												<?php if(in_array('Bachelor',$ctypear)){?> checked="checked" <?php } ?>/> 
                                                <label>Bachelor  </label></span>
                                                <span style="margin-right:10px;">
                                                <input type="checkbox" name="class_type[]" value="Honors"  
												<?php if(in_array('Honors',$ctypear)){?> checked="checked" <?php } ?>/> 
                                                <label>Honors  </label></span>
                                                <span style="margin-right:10px;">
                                                <input type="checkbox" name="class_type[]" value="Masters"  
												<?php if(in_array('Masters',$ctypear)){?> checked="checked" <?php } ?>/> 
                                                <label>Masters  </label></span>
                                                <span style="margin-right:10px;">
                                                <input type="checkbox" name="class_type[]" value="Coaching Center"  
												<?php if(in_array('Coaching Center',$ctypear)){?> checked="checked" <?php } ?>/> 
                                                <label>Coaching Center </label></span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No. of  Student</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="noofstd" class="form-control col-md-7 col-xs-12" style="width:30%;"
                                                placeholder='No. of  Student' value="<?php echo $noofstd; ?>" 
                                                onFocus="this.placeholder=''" onBlur="this.placeholder='No. of  Student'">
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No. of Branch<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="branchno" class="form-control col-md-7 col-xs-12"  style="width:30"
                                                placeholder='No. of Branch' value="<?php echo $branchno; ?>" 
                                                onFocus="this.placeholder=''" onBlur="this.placeholder='No. of Branch'">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">EIN No.</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" class="form-control" name="einno"  style="width:30%;" maxlength="10" 
                                                value="<?php echo $einno;?>" placeholder='EIN No.'>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Logo</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control" type="file" name="logo" style="width:60%">
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="email" name="email" class="form-control col-md-7 col-xs-12"  style="width:60%"
                                                placeholder='Email' value="<?php echo $email; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Email'">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Contact<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="contact" required class="form-control col-md-7" style="width:60%"
                                                placeholder='Contact' value="<?php echo $contact; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Contact'">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Telephone</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="telephone" class="form-control col-md-7 col-xs-12"  
                                                style="width:60%"
                                                placeholder='Telephone' value="<?php echo $telephone; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Telephone'">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Fax</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="fax" class="form-control col-md-7 col-xs-12"  style="width:60%"
                                                placeholder='Fax' value="<?php echo $fax; ?>"  onFocus="this.placeholder=''" onBlur="this.placeholder='Fax'">
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Division</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select name="division" id="division" class="form-control" style="width:30%"
                                                   onChange="getDistrict('<?php echo base_url();?>ims_administrator/ajaxData?div_id='+this.value);">
                                                   
                                                    <option value="<?php echo $division;?>"><?php echo $divisionname;?></option>
                                                    <?php
                                                    foreach($division_list->result() as $row){
                                                    $div_name=$row->name;
                                                    $id=$row->id;
                                                    ?>
                                                        <option value="<?php echo $id; ?>"><?php echo $div_name; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                               </select>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">District</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div id="citydiv">
                                                      <select name="city" id="city" class="form-control"  style="width:30%">
                                                        <option value="<?php echo $district;?>"><?php echo $districtname;?></option>
                                                    </select>
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Thana</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div id="locationdiv">
                                                       <select name="thana" id="thana" class="form-control"  style="width:30%">
                                                         <option value="<?php echo $thana;?>"><?php echo $thananame;?></option>
                                                       </select>
                                   
                                                    </div>
                                                </div>
                                            </div>
                                      
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Street</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="street" class="form-control col-md-7 col-xs-12"  style="width:30%"
                                                placeholder='Street' value="<?php echo $street; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Street'">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Zipcode</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="zipcode" class="form-control col-md-7 col-xs-12"  style="width:30%"
                                                placeholder='Zipcode' value="<?php echo $zipcode; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Zipcode'">
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Full Address</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <textarea type="text" name="address" class="form-control ckeditor" style="width:60%">
												<?php echo $address; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Institute Details
                                            </label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <textarea type="text" name="details" class="form-control ckeditor" style="width:60%">
												<?php echo $details; ?></textarea>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        
                                                        
                                                        
                                                        
                                                </div>
                                        </div>
                                        
                               	     </div>
                                   </div> 
                                    
                             <div class="ln_solid"></div>
                             <div class="form-group" style="margin-bottom:5px;">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <input type="hidden" name="uni_id" value="<?php echo $uni_id; ?>">
                                        <input type="hidden" name="stillImage" value="<?php echo $logo; ?>">
                                            <input type="reset" class="btn btn-primary" value="Reset">
                                            <input type="submit" name="registration" class="btn btn-success" value="Submit">
                                        </div>
                                    </div>
                         <?php echo form_close();?>
					</div>
