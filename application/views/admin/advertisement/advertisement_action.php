<?php
if($advertisementUpdate->num_rows()>0){
	foreach($advertisementUpdate->result() as $advertisementData);
	$m_id=$advertisementData->m_id;
	$advertisementTitle=$advertisementData->advertisement_name;
	$details=$advertisementData->advertisement_details;
	$newstitle='Edit advertisement';
}
else{
	$m_id='';
	$advertisementTitle=set_value('advertisement_name');
	$details=set_value('details');
	$newstitle='Add New advertisement';
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
							<li>advertisement Information</li>
						</ul>

						<ul class="breadcrumb-elements">
							<div class="heading-btn-group">
								<a href="<?php echo base_url('admin/advertisement_list');?>" class="btn btn-link btn-float has-text">
                                <i class="glyphicon glyphicon-list"></i><span>advertisement List</span></a>
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
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Event Name<span class="required">*</span></label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="advertisement_name" required class="form-control col-md-7 col-xs-12" 
                                                placeholder='advertisement Name' value="<?php echo $advertisementTitle; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='advertisement Name'">
                                             <?php echo form_error('advertisement_name', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                            <br /><br />
                                            <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Event Photo</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control" type="file" name="ad_photo">
                                            </div>
                                        </div>
                                            <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Event Details<span class="required">*</span>
                                            </label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <textarea type="text" name="details" class="form-control col-md-7 col-xs-12 ckeditor"><?php echo $details; ?></textarea>
                                            </div>
                                        </div>
                                        
                                      	  <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Upcomming Event<span class="required">*</span>
                                            </label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="checkbox" name="upcomming" value="1" style="margin-top:10px; cursor:pointer" />
                                            </div>
                                        </div>
                                        
                                    	  <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Latest Event<span class="required">*</span>
                                            </label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="checkbox" name="latest" value="1" style="margin-top:10px; cursor:pointer" />
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
                                        <input type="hidden" name="m_id" value="<?php echo $m_id; ?>">
                                            <input type="reset" class="btn btn-primary" value="Reset">
                                            <input type="submit" name="registration" class="btn btn-success" value="Submit">
                                        </div>
                                    </div>
                               <?php echo form_close();?>
					</div>
