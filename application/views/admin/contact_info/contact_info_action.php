<?php
if($contact_infoUpdate->num_rows()>0){
	foreach($contact_infoUpdate->result() as $contact_info);
			$contact_infoId=$contact_info->id;
			$email=$contact_info->email;
			$address=$contact_info->address;
			$lat=$contact_info->lat;
			$lan=$contact_info->lan;
			$image=$contact_info->image;
}
else{
			$contact_infoId='';
			$email=set_value('email');
			$address=set_value('address');
			$lat=set_value('lat');
			$lan=set_value('lan');
			$image='';
	}
?>

<div class="right_col" role="main">

                    <div class="page-title">
                        <div class="title_left">
                            <h3>Contact Information Registration Details</h3>
                        </div>
                        
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">




    





                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                
                                <div class="x_content">
                                <?php echo form_open_multipart('', 'class="form-horizontal form-label-left"');?>
                                   <div id="registration_form">	
                                  	  <div class="panel-group" id="accordion">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                 <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                 <h4 class="panel-title">
                                                   Contact Information </h4>
                                                 </a>
                                            </div>
                                            
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                            	 
                                                <div class="panel-body">
                                 
                                
                                 
                             
                               
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"> Contact Address : </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                    <textarea name="address" class="form-control ckeditor" placeholder="Contact Address"><?php echo $address;?></textarea>
                                    </div>
                              </div>
                                <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Map Photo: </label>
                                        <div class="col-md-5 col-sm-5 col-xs-12">
                                        <input name="d_photo" id="d_photo" type="file"/>
                                        <?php if($image!=""){?>
                                        <img src="<?php echo base_url('asset/uploads/contact_info/'.$image);?>" style="width:200px; height:auto" />
                                        <?php } ?>
                                        </div>
                                  </div>
                              <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"> Lattitude Value: </label>
                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                    <input name="lat" id="lat" class="form-control col-md-7 col-xs-12" type="text" 
                                    value="<?php echo $lat; ?>" placeholder="Lattitude Value"/>
                                    </div>
                              </div>
                                   <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"> Longitude Value: </label>
                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                    <input name="lan" id="lan" class="form-control col-md-7 col-xs-12" type="text" 
                                    value="<?php echo $lan; ?>" placeholder="Longitude Value"/>
                                    </div>
                              </div>
                              
                                  
                                  <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">User Query To mail: </label>
                                        <div class="col-md-5 col-sm-5 col-xs-12">
                                        <input name="email" id="email" class="form-control col-md-7 col-xs-12"  type="email" 
                                        value="<?php echo $email; ?>" placeholder="Email Address"/>
                                        <?php echo form_error('email', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
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
                                           <input type="hidden" name="id" value="<?php echo $contact_infoId; ?>">
                                            <input type="reset" class="btn btn-primary" value="Reset">
                                            <input type="submit" name="registration" class="btn btn-success" value="Submit">
                                        </div>
                                    </div>
                               <?php echo form_close();?>
                                </div>
                            </div>
                        </div>
                    </div>
               