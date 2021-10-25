<?php
if($photoalbumUpdate->num_rows()>0){
	foreach($photoalbumUpdate->result() as $photoalbumData);
	$b_id=$photoalbumData->b_id;
	$image=$photoalbumData->image;
	$photoalbumTitle=$photoalbumData->album_name;
}
else{
	$b_id='';
	$photoalbumTitle=set_value('photoalbum_name');
	$image='';
	}
	
?>
<div class="right_col" role="main">
                <div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3>Photo gallery</h3>
                        </div>
                        
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">




    





                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>New Album</h2>
                                    
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                <?php echo form_open_multipart('', 'class="form-horizontal form-label-left"');?>
                                   <div id="registration_form">	
                                  	  <div class="panel-group" id="accordion">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                 <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                 <h4 class="panel-title">
                                                   Album Information </h4>
                                                 </a>
                                            </div>
                                            
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                        			    
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Album Name<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="photoalbum_name" required class="form-control col-md-7 col-xs-12" 
                                                placeholder='photoalbum Name' value="<?php echo $photoalbumTitle; ?>"  onFocus="this.placeholder=''" onBlur="this.placeholder='photoalbum Name'">
                                             <?php echo form_error('photoalbum_name', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Album Photo</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control" type="file" name="photoalbumPhoto">
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
                                        <input type="hidden" name="b_id" value="<?php echo $b_id; ?>">
                                        <input type="hidden" name="stillimg" value="<?php echo $image; ?>">
                                        <input type="reset" class="btn btn-primary" value="Reset">
                                        <input type="submit" name="registration" class="btn btn-success" value="Submit">
                                        </div>
                                    </div>
                               <?php echo form_close();?>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
               