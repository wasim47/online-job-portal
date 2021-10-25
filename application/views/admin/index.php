<?php $this->load->view('includes/admin_tophead.php');?>
<body class="login-container bg-slate-800">

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-health">

				<!-- Content area -->
				<div class="content pb-20">

                     <?php echo form_open('admin/userLogin', array('class'=>'form-validate')); ?>
						<div class="panel panel-body login-form">
							<div class="text-center">
								<div class="icon-object border-slate-300 text-slate-300"><img src="<?php echo base_url('assets/images/logo.png');?>" style="width:100%; height:auto; padding:10px" /></div>
								<h5 class="content-group">Login with your account inforamtion</h5>
							</div>

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
								<button type="submit" class="btn bg-blue btn-block">Login <i class="icon-arrow-right14 position-right"></i></button>
							</div>

							
							
							<!--<div class="content-divider text-muted form-group"><span>New institute Registration Here</span></div>
							<a href="login_registration.html" class="btn btn-default btn-block content-group">Sign up</a>-->
							<span class="help-block text-center no-margin">Design & Develop By <a href="http://dot3bd.com" target="_blank">dot3bd.com</a></span>
						</div>
					 <?php echo form_open();?>
					<!-- /form with validation -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>