<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					

					<div class="breadcrumb-line breadcrumb-line-component" style="margin-top:10px; margin-bottom:10px;">
						<ul class="breadcrumb" style="font-size:20px;">
							<li>Password Change</li>
						</ul>

						
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Page length options -->
					<div class="panel panel-flat">
						    <?php echo form_open_multipart('', 'class="form-horizontal form-label-left"');
							
								echo $this->session->flashdata('globalMsg');
							?>
                                  <div id="registration_form">	
                                  	  <div class="panel-group">
                                        <div class="panel panel-default">
                                        <div class="panel-body">
                                        <div class="form-group">
                                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Old Password</label>
                                        <div class="col-sm-6">
                                          <input type="text" class="form-control" name="oldpassword" 
                                          value="<?php echo set_value('oldpassword'); ?>" id="disabledinput" placeholder="Old Password" />
                                        </div>
                                        <div class="col-sm-3">
                                            <?php echo form_error('oldpassword','<p class="label label-danger">','</p>'); ?>
                                        </div>
                                    </div>
                                        <div class="form-group">
                                            <label for="focusedinput" class="col-sm-3 control-label">Password</label>
                                            <div class="col-sm-6">
                                              <input type="password" class="form-control" style="margin:10px 0" name="password" value="<?php echo set_value('password'); ?>"  
                                              placeholder="xxxxx">
                                            </div>
                                            <div class="col-sm-3">
                                                <?php echo form_error('password','<p class="label label-danger">','</p>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <label for="focusedinput" class="col-sm-3 control-label">Confirm Password</label>
                                        <div class="col-sm-6">
                                          <input type="password" class="form-control" style="margin:0px 0 10px 0"  name="confirmpassword" 
                                          value="<?php echo set_value('confirmpassword'); ?>" placeholder="xxxxx">
                                        </div>
                                        <div class="col-sm-3">
                                            <?php echo form_error('confirmpassword','<p class="label label-danger">','</p>'); ?>
                                        </div>
                                    </div>
                                        <div class="form-group">
                                        
                                            <input type="submit" name="changePassword" value="Change" class='btn btn-success' />
                                        </div>
                                        
                            			</div>
                            		  </div>
                            	</div>
                               <?php echo form_close();?>
					</div>
