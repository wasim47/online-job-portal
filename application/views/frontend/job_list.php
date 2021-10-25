<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Job Listing</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="<?php echo base_url();?>">Home</a> / <a href="<?php echo base_url();?>">Job List</a> /  <span><?php echo $branchmark;?></span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->

<div class="listpgWraper">
  <div class="container"> 
    
    <!-- Page Title start -->
    <?php /*?><div class="pageSearch">
      <div class="row">
        <div class="col-md-3">
        <a href="javascript:void();" data-toggle="modal" data-target="#regModal" class="btn"><i class="fa fa-file-text" aria-hidden="true"></i> Upload Your Resume</a>
        
        <div id="regModal" class="modal fade" role="dialog">
                	<div class="modal-dialog">
                    	<div class="modal-content">
                            <div class="modal-header" style="background:#0194e8">
                                <button type="button" class="btn btn-danger btn-xs pull-right" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title" style="width:50%; float:left; color:#fff">Job Seeker Registration</h4>
                            </div>
                            <div class="modal-body">
                            	<?php echo form_open();?>
                            	<div class="col-sm-10">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="text" name="fname" required placeholder="Full Name" class="form-control inputForm" />
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="text" name="contact" required  placeholder="Phone Number" class="form-control inputForm" />
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="email" name="email" required placeholder="E-mail Address" class="form-control inputForm" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="text" name="username" required placeholder="User Name" class="form-control inputForm" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="password" name="password" required  class="form-control inputForm"  placeholder="Password"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="password" required name="confirmpassword" class="form-control inputForm"  placeholder="Re-type Password"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                    <input type="file" name="img[]" class="file">
                                                    <div class="input-group col-xs-12" style="width:80%;" >
                                                      <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
                                                      <input type="text" class="form-control input-xs inputForm" disabled placeholder="Upload Your CV">
                                                      <span class="input-group-btn">
                                                        <button class="browse btn btn-warning input-xs" type="button"><i class="glyphicon glyphicon-search"></i> Browse</button>
                                                      </span>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12" style="margin-top:10px;">
                                                <input type="checkbox" required name="agree"/>
                                                <label>I Agree to the jobstarbd.com <a href="#">Terms & Conditions.</a></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4"></label>
                                            <div class="col-sm-8 pull-right" style="margin-top:10px; float:right">
                                            <button type="submit" class="btn btn-success btn-submit">Submit</button></div>
                                        </div>
                                     </div>
                                        <?php echo form_close();?>
                            </div>
                            <div class="modal-footer" style="border:none;">
                            	
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        
        <div class="col-md-9">
          <div class="searchform">
            <div class="row">
              <div class="col-md-4 col-sm-3">
                <input type="text" class="form-control" placeholder="Job Title" />
              </div>
              <div class="col-md-2 col-sm-2">
                <select class="form-control">
                  <option>Industry</option>
                </select>
              </div>
              <div class="col-md-2 col-sm-2">
                <select class="form-control">
                  <option>City</option>
                </select>
              </div>
              <div class="col-md-3 col-sm-3">
                <select class="form-control">
                  <option>Min. Salary</option>
                </select>
              </div>
              <div class="col-md-1 col-sm-2">
                <button class="btn" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><?php */?>
    <!-- Page Title end --> 
    
    <!-- Search Result and sidebar start -->
    <div class="row">
      <?php /*?><div class="col-md-3 col-sm-6"> 
        <!-- Side Bar start -->
        <div class="sidebar"> 
          <!-- Jobs By Title -->
          <div class="widget">
            <h4 class="widget-title">Jobs By Title</h4>
            <ul class="optionlist">
              <li>
                <input type="checkbox" name="checkname" id="webdesigner" />
                <label for="webdesigner"></label>
                Web Designer <span>12</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="3dgraphic" />
                <label for="3dgraphic"></label>
                3D Graphic Designer <span>33</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="graphic" />
                <label for="graphic"></label>
                Graphic Designer <span>33</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="electronicTech" />
                <label for="electronicTech"></label>
                Electronics Technician <span>33</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="webgraphic" />
                <label for="webgraphic"></label>
                Web / Graphic Designer <span>33</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="brandmanager" />
                <label for="brandmanager"></label>
                Brand Manager <span>33</span> </li>
            </ul>
            <!-- title end --> 
            <a href="#.">View More</a> </div>
          
          <!-- Jobs By City -->
          <div class="widget">
            <h4 class="widget-title">Jobs By City</h4>
            <ul class="optionlist">
              <li>
                <input type="checkbox" name="checkname" id="newyork" />
                <label for="newyork"></label>
                New York <span>12</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="losangles" />
                <label for="losangles"></label>
                Los Angeles <span>33</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="chicago" />
                <label for="chicago"></label>
                Chicago <span>33</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="houston" />
                <label for="houston"></label>
                Houston <span>12</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="sandiego" />
                <label for="sandiego"></label>
                San Diego <span>555</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="sanjose" />
                <label for="sanjose"></label>
                San Jose <span>44</span> </li>
            </ul>
            <a href="#.">View More</a> </div>
          <!-- Jobs By City end--> 
          
          <!-- Jobs By Experience -->
          <div class="widget">
            <h4 class="widget-title">Jobs By Experience</h4>
            <ul class="optionlist">
              <li>
                <input type="checkbox" name="checkname" id="permanent" />
                <label for="permanent"></label>
                Full Time/Permanent <span>12</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="contract" />
                <label for="contract"></label>
                Contract <span>33</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="parttime" />
                <label for="parttime"></label>
                Part Time <span>33</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="internship" />
                <label for="internship"></label>
                Internship <span>33</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="freelance" />
                <label for="freelance"></label>
                Freelance <span>33</span> </li>
            </ul>
            <a href="#.">View More</a> </div>
          <!-- Jobs By Experience end --> 
          
          <!-- Jobs By Industry -->
          <div class="widget">
            <h4 class="widget-title">Jobs By Industry</h4>
            <ul class="optionlist">
              <li>
                <input type="checkbox" name="checkname" id="infotech" />
                <label for="infotech"></label>
                Information Technology <span>22</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="advertise" />
                <label for="advertise"></label>
                Advertising/PR <span>45</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="services" />
                <label for="services"></label>
                Services <span>44</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="health" />
                <label for="health"></label>
                Health & Fitness <span>88</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="mediacomm" />
                <label for="mediacomm"></label>
                Media/Communications <span>22</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="fashion" />
                <label for="fashion"></label>
                Fashion <span>11</span> </li>
            </ul>
            <a href="#.">View More</a> </div>
          <!-- Jobs By Industry end --> 
          
          <!-- Top Companies -->
          <div class="widget">
            <h4 class="widget-title">Top Companies</h4>
            <ul class="optionlist">
              <li>
                <input type="checkbox" name="checkname" id="Envato" />
                <label for="Envato"></label>
                Envato <span>12</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="Themefores" />
                <label for="Themefores"></label>
                Themefores <span>33</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="GraphicRiver" />
                <label for="GraphicRiver"></label>
                Graphic River <span>33</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="Codecanyon" />
                <label for="Codecanyon"></label>
                Codecanyon <span>33</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="AudioJungle" />
                <label for="AudioJungle"></label>
                Audio Jungle <span>33</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="Videohive" />
                <label for="Videohive"></label>
                Videohive <span>33</span> </li>
            </ul>
            <a href="#.">View More</a> </div>
          <!-- Top Companies end --> 
          
          <!-- Salary -->
          <div class="widget">
            <h4 class="widget-title">Salary Range</h4>
            <ul class="optionlist">
              <li>
                <input type="checkbox" name="checkname" id="price1" />
                <label for="price1"></label>
                0 to $100 <span>12</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="price2" />
                <label for="price2"></label>
                $100 to $199 <span>41</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="price3" />
                <label for="price3"></label>
                $199 to $499 <span>33</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="price4" />
                <label for="price4"></label>
                $499 to $999 <span>66</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="price5" />
                <label for="price5"></label>
                $999 to $4999 <span>159</span> </li>
              <li>
                <input type="checkbox" name="checkname" id="price6" />
                <label for="price6"></label>
                Above $4999 <span>865</span> </li>
            </ul>
            <a href="#.">View More</a> </div>
          <!-- Salary end --> 
          
          <!-- button -->
          <div class="searchnt">
            <button class="btn"><i class="fa fa-search" aria-hidden="true"></i> Search Jobs</button>
          </div>
          <!-- button end--> 
        </div>
        <!-- Side Bar end --> 
      </div><?php */?>
      
      <div class="col-md-1 col-sm-12" style="margin:0; padding:0;">
      	<div style="background:#404040; min-height:660px; color:#fff; text-align:center; padding:10px">Filtering</div>
      </div>
      <div class="col-md-9 col-sm-12" style="margin:0; padding:2px;"> 
      <?php if($joblist->num_rows() > 0){?>
        <ul class="searchList">          
          <?php 		  	
			foreach($joblist->result() as $jobl):
		  	$queryEmp = $this->db->query("SELECT * FROM employers WHERE cid='".$jobl->emp_id."'");
			$empRow = $queryEmp->row_array();
		  ?>
          <li>
            <div class="row">
              <div class="col-md-9 col-sm-9">
                <div class="jobinfo" style="line-height:20px;">
                  <div class="jotitle"><a href="<?php echo base_url('joblist/details/'.$jobl->slug);?>"><?php echo $jobl->job_title;?></a></div>
                  <div class="companyName"><a href="#"><?php echo $empRow['company_name'];?></a></div>
                  <div class="location">Vacancy: <?php echo $jobl->vacancy;?></span></div>
                  <div class="location">Location: <?php echo $jobl->location;?></span></div>
                  <div class="location">Experience: <?php echo $jobl->experience;?></span></div>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="col-md-3 col-sm-3">
                <h4 style="margin-top:50%; text-align:right">Deadline: <?php echo $jobl->deadline;?></h4>
              </div>
            </div>
          </li>
          <?php endforeach;?>
        </ul>
        
        <div class="pagiWrap">
          <div class="row">
            <!--<div class="col-md-4 col-sm-4">
              <div class="showreslt">Showing <?php echo $pageSl.' - '.$total_rows;?></div>
            </div>-->
            
            <div class="col-md-12 col-sm-12 text-right">
              <ul class="pagination">
                <?php echo $paginationdata;?>
              </ul>
            </div>
          </div>
        </div>
	<?php 
	}
	else{
		echo '<h1 style="text-align:center; color:#999; margin-top:10%">Job not found</h1>';
	}
	?>
      </div>
      <div class="col-md-2 col-sm-6" style="margin:0; padding:0 5px;"> 
        <img src="<?php echo base_url('assets/images/addver.gif');?>" style="width:100%; height:auto" />
        <img src="<?php echo base_url('assets/images/adver1.gif');?>" style="width:100%; height:auto" />
        
      </div>
    </div>
  </div>
</div>

