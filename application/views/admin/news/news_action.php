<?php
if($newsUpdate->num_rows()>0){
	foreach($newsUpdate->result() as $newsData);
			$news_id=$newsData->news_id;
			$news_title=$newsData->news_title;
			$post=$newsData->post;
			$short_description=$newsData->short_description;
			$status=$newsData->status;
			$keyword=$newsData->key_word;
			$meta_desc=$newsData->seo_details;
			$newstitle='News Edit';
}
else{
			$news_id='';
			$news_title='';
			$post='';
			$short_description='';
			$status='';
			$keyword='';
			$meta_desc='';
			$newstitle='Add News';
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
							<li>News Information</li>
						</ul>

						<ul class="breadcrumb-elements">
							<div class="heading-btn-group">
								<a href="<?php echo base_url('admin/news_list');?>" class="btn btn-link btn-float has-text">
                                <i class="glyphicon glyphicon-list"></i><span>News List</span></a>
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
                                                 <h4 class="panel-title"><?php echo $newstitle;?></h4>
                                                 </a>
                                            </div>
                                            
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                
                                        
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">News Title<span class="required">*</span>
                                            </label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="newsTitle" required class="form-control col-md-7 col-xs-12" 
                                                placeholder='News Title' value="<?php echo $news_title; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='News Title'">
                                             <?php echo form_error('newsTitle', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Post By<span class="required">*</span>
                                            </label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="post_by" required class="form-control col-md-7 col-xs-12" 
                                                placeholder='Post By' value="<?php echo $post; ?>"  onFocus="this.placeholder=''" 
                                                onBlur="this.placeholder='Post By'">
                                             <?php echo form_error('post_by', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                            Short Description<span class="required">*</span>
                                            </label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <textarea name="short_desc" class="form-control ckeditor"><?php echo $short_description;?></textarea>
                                             <?php echo form_error('short_desc', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                            Status<span class="required">*</span>
                                            </label>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <select name="status" class="form-control">
                                                	<option value="1">Enable</option>
                                                    <option value="0">Disable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Image</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input class="form-control" type="file" name="logo">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                            Meta Keywords<span class="required">*</span>
                                            </label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input name="keyword" class="form-control" value="<?php echo $keyword;?>">
                                             <?php echo form_error('short_desc', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                            Meta Description<span class="required">*</span>
                                            </label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <textarea name="meta_desc" class="form-control ckeditor"><?php echo $short_description;?></textarea>
                                            </div>
                                        </div>
                                        
                                           </div>
                                            </div>
                                        </div>
                                        
                               	     </div>
                                   </div> 
                                    
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-3">
                                        <input type="hidden" name="news_id" value="<?php echo $news_id; ?>">
                                            <input type="reset" class="btn btn-primary" value="Reset">
                                            <input type="submit" name="registration" class="btn btn-success" value="Submit">
                                        </div>
                                    </div>
                               <?php echo form_close();?>
					</div>
