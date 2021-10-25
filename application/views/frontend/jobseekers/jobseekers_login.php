<style>
.required{
	color:#f00;
}
</style>
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Jobseekers Account</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="<?php echo base_url();?>">Home</a> / <span><?php echo $branchmark;?></span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->

    <div class="row">
    	
        <?php echo form_open_multipart('', 'class="form-horizontal form-label-left"');
			echo $this->session->flashdata('msg');
		?>
        <div class="container" style="background:#fff; box-shadow:#ccc 0px 0px 10px 0px; padding:20px; margin-top:20px">	
        <div class="panel-body" style="margin:10% 0;">
		  <div class="col-sm-5 col-sm-offset-3 login-form">
							

							 <!--has-feedback has-feedback-left-->
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Username" name="username" required="required">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group">
								<input type="password" class="form-control" placeholder="Password" name="password" required="required">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<div class="form-group login-options">
								<div class="row">
									<div class="col-sm-6">
										<label class="checkbox-inline">
											<input type="checkbox" class="styled" checked="checked">
											Remember
										</label>
									</div>

									<div class="col-sm-6 text-right">
										<a href="login_password_recover.html">Forgot password?</a>
									</div>
								</div>
							</div>

							<div class="form-group">
                                <input type="submit" name="login" value="Login" class="btn btn-success" />
							</div>

							
							
							
						</div>
       </div>
       </div>
 	 <?php echo form_open();?>
    
    </div>
  </div>
</div>

