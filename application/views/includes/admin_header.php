<?php include('admin_tophead.php');?>
<meta charset="utf-8">
<body>
	<div class="navbar navbar-default header-highlight" style="background:#fff">
		<div class="navbar-header" style="width:100px; height:auto; background:#fff; border:0; padding:10px;">
			<a href="<?php echo base_url();?>" target="_blank">
            <img src="<?php echo base_url();?>assets/images/logo.png" alt="" style="width:100%; height:auto"></a>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>

				
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown language-switch">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?php echo base_url();?>asset/admin/images/flags/gb.png" class="position-left" alt="">
						Language
						<span class="caret"></span>
					</a>

					<ul class="dropdown-menu">
						<li><a class="deutsch"><img src="<?php echo base_url();?>asset/admin/images/flags/gb.png" alt=""> English</a></li>
						<li><a class="ukrainian"><img src="<?php echo base_url();?>asset/admin/images/flags/bd.png" alt=""> Bangla</a></li>
					</ul>
				</li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-bubbles4"></i>
						<span class="visible-xs-inline-block position-right">Messages</span>
						<!--<span class="badge bg-warning-400">2</span>-->
					</a>
					
				</li>

				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<!--<img src="<?php echo base_url();?>asset/admin/images/demo/users/face11.jpg" alt="">-->
                        <i class="icon-user"></i>
						<span><?php echo $this->session->userdata('userAccessName');?></span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="#"><i class="icon-user-plus"></i> My profile</a></li>
						<li><a href="#"><!--<span class="badge bg-teal-400 pull-right">58</span>--> <i class="icon-comment-discussion"></i> Messages</a></li>
						<li class="divider"></li>
						<li><a href="#"><i class="icon-cog5"></i> Account settings</a></li>
						<li><a href="<?php echo base_url('admin/logout');?>"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<div class="page-container">
		<div class="page-content">
			<div class="sidebar sidebar-main">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="#" class="media-left"><i class="icon-user"></i></a>
								<div class="media-body">
									<span class="media-heading text-semibold"><?php echo $this->session->userdata('userAccessName');?></span>
									
								</div>

								
							</div>
						</div>
					</div>
					<!-- /user menu -->


					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
                        	<ul class="navigation navigation-main navigation-accordion">
								<li class="active"><a href="javascript:void();"><i class="glyphicon glyphicon-globe"></i> <span>Administration</span></a></li>
								
								 <li>
                                        <a href="#"><i class="icon-user"></i> <span>Administration</span></a>
                                        <ul>
                                            <li><a href="<?php echo base_url('admin/administration_registration');?>"><i class="icon-user-plus"></i> Admin Registration</a></li>
                                            <li><a href="<?php echo base_url('admin/administration_list');?>"><i class="icon-list"></i> Admin List</a></li>
                                        </ul>
                                    </li>
                                 <!--<li>
                                        <a href="#"><i class="icon-sync"></i> <span>Configuration</span></a>
                                        <ul>
                                        	<li><a href="<?php echo base_url('admin/general');?>"><i class="icon-gear"></i> General Setting</a></li>
                                            <li><a href="<?php echo base_url('admin/passwordChange');?>"><i class="icon-alert"></i> Change Password</a></li>
                                            <li><a href="<?php echo base_url('admin/profileUpdate');?>"><i class="icon-profile"></i> Update Profile</a></li>
                                        </ul>
                                    </li>-->
                                
                          
                              
							</ul>
							<ul class="navigation navigation-main navigation-accordion">
								<li class="active"><a href="javascript:void();"><i class="glyphicon glyphicon-globe"></i> <span>Job Portal Mangement</span></a></li>
								
								
                                <li>
									<a href="#"><i class="icon-copy"></i> <span>Job Category</span></a>
									<ul>
										<li><a href="<?php echo base_url('admin/jobtype_action');?>">Job Type</a></li>
										<li><a href="<?php echo base_url('admin/jobtype_list');?>">Job Type List</a></li>
                                        <li><a href="<?php echo base_url('admin/category_action');?>">Add New Category</a></li>
										<li><a href="<?php echo base_url('admin/category_list');?>">Category List</a></li>
									</ul>
								</li>
                                
                                
                                <li>
									<a href="#"><i class="icon-copy"></i> <span>Job Post</span></a>
							        <ul>
										<li><a href="<?php echo base_url('admin/jobpost_action');?>">Add New Job </a> </li>
										<li><a href="<?php echo base_url('admin/jobpost_list');?>">Job List</a></li>
									</ul>
								</li>
                                
                          		<li>
									<a href="#"><i class="icon-stack2"></i> <span>Job Seekers</span></a>
									<ul>
										<li><a href="<?php echo base_url('admin/jobseekers_registration');?>">New Job Seekers</a></li>
										<li><a href="<?php echo base_url('admin/jobseekers_list');?>">Job Seekers List</a></li>
									</ul>
								</li>
                                <li>
									<a href="#"><i class="icon-stack2"></i> <span>Employers</span></a>
									<ul>
										<li><a href="<?php echo base_url('admin/employers_registration');?>">New Employers</a></li>
										<li><a href="<?php echo base_url('admin/employers_list');?>">Employers List</a></li>
									</ul>
								</li>
                                
                                <li>
									<a href="#"><i class="icon-droplet2"></i> <span>Success Story</span></a>
									<ul>
										<li><a href="<?php echo base_url('admin/success_story_registration');?>">Add New Story</a></li>
										<li><a href="<?php echo base_url('admin/success_story_list');?>">Success Story List</a></li>
									</ul>
								</li>
                                <li>
									<a href="#"><i class="icon-droplet2"></i> <span>Networks</span></a>
									<ul>
										<li><a href="<?php echo base_url('admin/networks_registration');?>">Add New Networks</a></li>
										<li><a href="<?php echo base_url('admin/networks_list');?>">Networks List</a></li>
									</ul>
								</li>
                                
                                <li>
									<a href="#"><i class="icon-droplet2"></i> <span>Workshop</span></a>
									<ul>
										<li><a href="<?php echo base_url('admin/workshop_registration');?>">Add New Workshop</a></li>
										<li><a href="<?php echo base_url('admin/workshop_list');?>">Workshop List</a></li>
									</ul>
								</li>
                                
                                <li>
									<a href="#"><i class="icon-droplet2"></i> <span>Certificate Training</span></a>
									<ul>
										<li><a href="<?php echo base_url('admin/courses_training_registration');?>">Add New Training</a></li>
										<li><a href="<?php echo base_url('admin/courses_training_list');?>">Training List</a></li>
									</ul>
								</li>
                                
                         		<li>
									<a href="#"><i class="icon-stack2"></i> <span>Our Partner</span></a>
									<ul>
										<li><a href="<?php echo base_url('admin/partners_registration');?>">New Partner</a></li>
										<li><a href="<?php echo base_url('admin/partners_list');?>">Partner List</a></li>
									</ul>
								</li>
                                
                                <li>
									<a href="#"><i class="icon-droplet2"></i> <span>Advertisement</span></a>
									<ul>
										<li><a href="<?php echo base_url('admin/advertisement_registration');?>">Add New Advertisement</a></li>
										<li><a href="<?php echo base_url('admin/advertisement_list');?>">Advertisement List</a></li>
									</ul>
								</li>
                              
							</ul>
                            <ul class="navigation navigation-main navigation-accordion">
								<li class="active"><a href="javascript:void();"><i class="glyphicon glyphicon-globe"></i> <span>Website Mangement</span></a></li>
								<li>
									<a href="#"><i class="icon-stack2"></i> <span>Menu</span></a>
									<ul>
										<li><a href="<?php echo base_url('admin/menu_registration');?>">Add New Menu</a></li>
										<li><a href="<?php echo base_url('admin/menu_list');?>">Menu List</a></li>
									</ul>
								</li>
                                <li>
									<a href="#"><i class="icon-stack2"></i> <span>Content</span></a>
									<ul>
										<li><a href="<?php echo base_url('admin/content_registration');?>">Add New Content</a></li>
										<li><a href="<?php echo base_url('admin/content_list');?>">Content List</a></li>
									</ul>
								</li>
								
                                <li>
									<a href="#"><i class="icon-droplet2"></i> <span>HR News</span></a>
									<ul>
										<li><a href="<?php echo base_url('admin/news_registration');?>">Add New News</a></li>
										<li><a href="<?php echo base_url('admin/news_list');?>">News List</a></li>
									</ul>
								</li>
                                
                                <li>
									<a href="#"><i class="icon-droplet2"></i> <span>Events</span></a>
									<ul>
										<li><a href="<?php echo base_url('admin/events_registration');?>">Add New Events</a></li>
										<li><a href="<?php echo base_url('admin/events_list');?>">Events List</a></li>
									</ul>
								</li>
                                
                                <li>
									<a href="#"><i class="icon-droplet2"></i> <span>Updates</span></a>
									<ul>
										<li><a href="<?php echo base_url('admin/latest_update_registration');?>">Add New Updates</a></li>
										<li><a href="<?php echo base_url('admin/latest_update_list');?>">Updates List</a></li>
									</ul>
								</li>
                                <li>
									<a href="#"><i class="icon-droplet2"></i> <span>Messages</span></a>
									<ul>
										<li><a href="<?php echo base_url('admin/messages_registration');?>">Add New Messages</a></li>
										<li><a href="<?php echo base_url('admin/messages_list');?>">Messages List</a></li>
									</ul>
								</li>
                          
                                <li>
									<a href="#"><i class="icon-stack"></i> <span>Photo Gallery</span></a>
									<ul>
										<li><a href="<?php echo base_url('admin/photogallery_registration');?>">New Photo Gallery</a></li>
										<li><a href="<?php echo base_url('admin/photogallery_list');?>">Photo Gallery List</a></li>
									</ul>
								</li>
                                <li>
									<a href="#"><i class="icon-stack2"></i> <span>Video Gallery</span></a>
									<ul>
										<li><a href="<?php echo base_url('admin/video_registration');?>">New Video</a></li>
										<li><a href="<?php echo base_url('admin/video_list');?>">Video List</a></li>
									</ul>
								</li>
                                
								
							</ul>
					  </div>
				  </div>
					<!-- /main navigation -->

				</div>
			</div>