<?php
if($messagesUpdate->num_rows()>0){
	foreach($messagesUpdate->result() as $chdata);
	$a_id=$chdata->a_id;
	$photo=$chdata->photo;
	$msg_title=$chdata->msg_title;
	$msg_content=$chdata->msg_content;
}
else{
	$a_id='';
	$msg_title=set_value('msg_title');
	$photo='';
	$msg_content=set_value('msg_content');
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
							<li> Messages</li>
					  </ul>

						<ul class="breadcrumb-elements">
							<div class="heading-btn-group">
								<a href="<?php echo base_url('admin/messages_list');?>" class="btn btn-link btn-float has-text">
                                <i class="glyphicon glyphicon-list"></i><span>Messages List</span></a>
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
                                                   Message  Information </h4>
                                                 </a>
                                            </div>
                                            
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                        
                                       <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Message Title<span class="required">*</span>
                                            </label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="msg_title" class="form-control col-md-7 col-xs-12" value="<?php echo $msg_title; ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Photo<span class="required">*</span>
                                            </label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                               <input type="file" name="photo" />
                                               <?php if($photo!=""){?>
                                               <img src="<?php echo base_url('asset/uploads/messages/'.$photo);?>" 
                                               style="width:100px; height:100px; border:2px solid #ccc;"/>
                                               <?php } ?>
                                            </div>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Message Content<span class="required">*</span>
                                            </label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <textarea type="text" name="msg_content" class="form-control col-md-7 col-xs-12 ckeditor"><?php echo $msg_content; ?></textarea>
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
                                        	<input type="hidden" name="a_id" value="<?php echo $a_id; ?>">
                                            <input type="hidden" name="stillimg" value="<?php echo $photo; ?>">
                                            <input type="reset" class="btn btn-primary" value="Reset">
                                            <input type="submit" name="registration" class="btn btn-success" value="Submit">
                                        </div>
                                    </div>
                               <?php echo form_close();?>
					</div>
