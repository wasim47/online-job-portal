<?php
if($contentUpdate->num_rows()>0){
	foreach($contentUpdate->result() as $contentData);
	$a_id=$contentData->a_id;
	$expl=explode('-',$contentData->menu_title);
	$menu_title=ucfirst(implode('-',$expl));
	$contentTitle=$contentData->headline;
	$details=$contentData->details;
	$image=$contentData->image;
	$menutitle='Edit Content';
}
else{
	$a_id='';
	$contentTitle=set_value('headline');
	$menu_title='Menu';
	$details=set_value('details');
	$image='';
	$menutitle='New Content';
	}
?>

<style>
.required{
	color:#f00;
}
</style>


<div class="content-health">

				<!-- Page header -->
				<div class="page-header">
					

					<div class="breadcrumb-line breadcrumb-line-component" style="margin-top:10px; margin-bottom:10px;">
						<ul class="breadcrumb" style="font-size:20px;">
							<li>Content Information</li>
						</ul>

						<ul class="breadcrumb-elements">
							<div class="heading-btn-group">
								<a href="<?php echo base_url('admin/content_list');?>" class="btn btn-link btn-float has-text">
                                <i class="glyphicon glyphicon-list"></i><span>Content List</span></a>
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
                                                 <h4 class="panel-title"><?php echo $menutitle;?></h4>
                                                 </a>
                                            </div>
                                            
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">content Headline<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select name="root_id" class="form-control" style="width:60%; margin-bottom:5px">
                                                	<option value="<?php echo $menu_title;?>"><?php echo $menu_title;?></option>
                                                    <?php foreach($root_menu->result() as $rootmenu):
															echo '<option value="'.$rootmenu->slug.'">'.$rootmenu->menu_name.'</option>';
														endforeach;
													?>
                                                    
                                                </select>
                                             <?php echo form_error('root_id', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">content Headline<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="headline" required class="form-control col-md-7 col-xs-12" 
                                                placeholder='Headline' value="<?php echo $contentTitle; ?>"  onFocus="this.placeholder=''" onBlur="this.placeholder='Headline'">
                                             <?php echo form_error('headline', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Image<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                               <input type="file" name="contentphoto" />
                                            </div>
                                        </div>
                                      <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">content Details<span class="required">*</span>
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
                                    
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                       		 <input type="hidden" name="a_id" value="<?php echo $a_id; ?>">
                                              <input type="hidden" name="stillimg" value="<?php echo $image; ?>">
                                            <input type="reset" class="btn btn-primary" value="Reset">
                                            <input type="submit" name="registration" class="btn btn-success" value="Submit">
                                        </div>
                                    </div>
                               <?php echo form_close();?>
					</div>
