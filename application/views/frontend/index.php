<link rel="stylesheet" href="<?php echo base_url();?>assets/marque/libs/style.css">
<script src="<?php echo base_url('assets/js/jssor.slider-22.2.16.min.js');?>" type="text/javascript"></script>
<script type="text/javascript">
        jssor_1_slider_init = function() {

            var jssor_1_options = {
              $AutoPlay: true,
              $Idle: 0,
              $AutoPlaySteps: 4,
              $SlideDuration: 2500,
              $SlideEasing: $Jease$.$Linear,
              $PauseOnHover: 4,
              $SlideWidth: 140,
              $Cols: 7
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*responsive code begin*/
            /*remove responsive code if you don't want the slider scales while window resizing*/
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 1200);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*responsive code end*/
        };
		
		
		$(document).on('click', '.browse', function(){
		  var file = $(this).parent().parent().parent().find('.file');
		  file.trigger('click');
		});
		$(document).on('change', '.file', function(){
		  $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
		});
    </script>

<div class="carousel slide carousel-fade" data-ride="carousel">

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active" 
        style="background: url(<?php echo base_url();?>assets/bg_slider/img/1.jpg) no-repeat center center fixed; background-size: cover;"></div>
        <div class="item"
        style="background: url(<?php echo base_url();?>assets/bg_slider/img/2.jpg) no-repeat center center fixed; background-size: cover;"></div>
        <div class="item"
        style="background: url(<?php echo base_url();?>assets/bg_slider/img/3.jpg) no-repeat center center fixed; background-size: cover;"></div>
        <div class="item"
        style="background: url(<?php echo base_url();?>assets/bg_slider/img/4.jpg) no-repeat center center fixed; background-size: cover;"></div>
        <div class="item"
        style="background: url(<?php echo base_url();?>assets/bg_slider/img/5.jpg) no-repeat center center fixed; background-size: cover;"></div>
    </div>
</div>

<div class="searchwrap">
  
  <div class="row">
        	
        
    		<div class="jobseakerArea">
                <div class="title" style="float:left">
                 <div class="TickerNews" id="T1">
                        <div class="ti_wrapper"  style="float:left; width:100%">
                            <div class="ti_slide">
                                <div class="ti_content">
                                    <div class="ti_news">
                                    <a href="#"><span>&raquo;&raquo;</span> JOIN THE NUMBER 1 NETWORK OF BANGLADESHI PROFESSIONALS &  LET THE EMPLOYERS FIND YOU!</a></div>
                                    <div class="ti_news"><a href="#"><span>&raquo;&raquo;</span> GOT TALENT? BE WHERE ALL THE TALENTS ARE... CREATE ACCOUNT AND UPLOAD YOUR CV, IT ONLY TAKES A FEW SECONDS!</a></div>
                                    <div class="ti_news"><a href="#"><span>&raquo;&raquo;</span> JOIN THE NUMBER 1 NETWORK OF BANGLADESHI PROFESSIONALS &  LET THE EMPLOYERS FIND YOU!</a></div>
                                    <div class="ti_news"><a href="#"><span>&raquo;&raquo;</span> JOIN THE NUMBER 1 NETWORK OF BANGLADESHI PROFESSIONALS &  LET THE EMPLOYERS FIND YOU!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
			<div class="col-sm-8 col-sm-offset-2" style="float:left;margin-top:200px;">
                  	<div class="col-sm-3">
                    	<h3 style="line-height:50px">Live jobs<br /><?php echo $livejobs->num_rows();?></h3>
                    </div>
                    	<div class="col-sm-3">
                    	<h3 style="line-height:50px">New jobs<br /><?php echo $newjobs->num_rows();?></h3>
                    </div>
                    	<div class="col-sm-3">
                    	<h3 style="line-height:50px">Companies<br /><?php echo $totalemp->num_rows();?></h3>
                    </div>
                    	<div class="col-sm-3">
                    	<h3 style="line-height:50px">Total CVs<br /><?php echo $totalcv->num_rows();?></h3>
                    </div>
                  </div>
			
            <div class="jobseakerFormArea">
                <div class="col-sm-12 searchbar">
                  <div style="width:50%; height:auto; margin:2% auto; ">
                  	<?php echo form_open('searchjobs');?>
                    <input type="text" name="keywords" class="form-control" placeholder="Search Jobs By Keywords" />
                    <button type="submit" class="btn pull-right">
                    <i class="fa fa-search"></i>
                    </button>
                    <?php echo form_close();?>
                  </div>
                 
                </div>
            </div>
        </div>
    
  		
   
  </div>
  
</div>



<div class="section" style="margin:0; padding:0;">
  <div class="container" style="margin-top:10px; background:#fafafa"> 
  	<div class="col-md-5 col-lg-5 col-sm-12" style="margin:0; padding:0;">
    	<div class="topjobseekerArea">
            <div class="titleTop">
              <h3>Star Jobseekers</h3>
            </div>
            <ul class="jobseekerList">
              
              <?php
			  if($starjobseekers->num_rows()  > 0){
             	 foreach($starjobseekers->result() as $jobs){
				
			  ?>
              
              <li data-toggle="tooltip" data-placement="bottom" title="" data-html="true"
              data-original-title="<?php echo $jobs->fullname;?>"><a href="#">
                <img src="<?php echo base_url();?>assets/images/default.jpg" alt="<?php echo $jobs->fullname;?>" style="border-radius:50%;" />
                <h5 style="font-size:11px;"><?php echo $jobs->fullname;?></h5>
              </a></li>
             <?php
             	}
			 }
			 ?> 
              
              
              <!--employer-->
            </ul>
      </div>
    </div>
    <div class="col-md-5 col-lg-5 col-sm-12" style="margin:0; padding:0;">
    	<div class="topEmployerArea">
            <div class="titleTop">
              <h3>Top Employers</h3>
            </div>
            <ul class="employerList">
             <!-- <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Logic NS <br> IT <br> Korea"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/employers/partex.png" alt="Your alt text here" style="width:100%; height:116px"/></a>
              </li>-->
             
             
              <?php
			  if($topemployers->num_rows()  > 0){
             	 foreach($topemployers->result() as $temp){		
				 		
			  ?>
              
              <li data-toggle="tooltip" data-placement="bottom" title="" data-html="true" style="height:125px;"
              data-original-title="<?php echo $temp->company_name;?>"><a href="#">
                <img src="<?php echo base_url('asset/uploads/employers/'.$temp->logo);?>" alt="<?php echo $temp->company_name;?>" style="width:100%; height:auto; max-height:100px" />
                <h5 style="font-size:11px;"><?php echo $temp->company_name;?></h5>
              </a></li>
             <?php
             	}
			 }
			 ?> 
             
            </ul>
        </div>
    </div>
    <div class="col-md-2 col-lg-2 col-sm-12" style="margin:0; padding:0;">
    	<img src="<?php echo base_url('assets/images/ad/airtel-120X45.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/gi-ns-120X45-2492015.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/amazon-120X45.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/genpact-ns-120X45-1722017.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/atos-14092016.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/gen-120X45-732017.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        
    </div>
  </div>
</div>
<div class="section" style="margin:0; padding:0">
  
  <div class="container" style="margin-top:10px; background:#fafafa"> 
     <div class="col-md-10 col-lg-10 col-sm-12" style="margin:0; padding:0;">
     	<div class="titleTop">
      <h3>Browse All Jobs</h3>
    </div>
  	  <div class="topsearchwrap">
  		<div class="panel userbtns">
                <div class="panel-heading" style="width:100%;">
                	<div class="col-sm-5" style="margin:0; padding:0">
                    	<span style="width:20%; float:left; margin-top:7px;">Jobs By </span>
                        <ul class="nav nav-tabs" style="width:80%; float:left">
                            <li class="active"><a href="#tab1warning" data-toggle="tab">Function</a></li>
                            <li><a href="#tab2warning" data-toggle="tab">Industry</a></li>
                            <li><a href="#tab3warning" data-toggle="tab">Division</a></li>
                        </ul>
                    </div>
                    
                </div>
                <div class="panel-body">
                    <div class="tab-content" style="width:100%; float:left; margin-top:20px;">
                        <div class="tab-pane fade in active" id="tab1warning">
                         <h5 style="background:none; padding:0; margin:0; text-align:left; font-size:17px; color:#0066CC; margin:0 0 10px 5px; 
                         text-transform:capitalize">Browse Functional Categories</h5>
                        	<ul class="row catelist">
                             <?php foreach($functionalCategory->result() as $fRow):
							 	$jobCOunt = $this->db->query("SELECT COUNT(job_id) as totalCount FROM jobpost WHERE job_category='".$fRow->sub_cat_slug."' AND hot_jobs!=1");
								$rowD = $jobCOunt->row_array();
							 ?>
                              <li class="col-md-4 col-sm-4"><a href="<?php echo base_url('joblist/'.$fRow->sub_cat_slug);?>">
							  <?php echo $fRow->sub_cat_name;?><span> (<?php echo $rowD['totalCount'];?>)</span></a></li>
                              <?php endforeach;?>
                            </ul>
                        	 
                        </div>
                        <div class="tab-pane fade" id="tab2warning">
                        	<h5 style="background:none; padding:0; margin:0; text-align:left; font-size:17px; color:#0066CC; margin:0 0 10px 5px; text-transform:capitalize">Browse Industrial Categories</h5>
                        	<ul class="row catelist">
                             <?php foreach($industrialCategory->result() as $fRowI):
							 	$jobCOuntI = $this->db->query("SELECT COUNT(job_id) as totalCount FROM jobpost WHERE job_category='".$fRowI->sub_cat_slug."'");
								$rowDI = $jobCOuntI->row_array();
							 ?>
                              <li class="col-md-4 col-sm-4"><a href="<?php echo base_url('joblist/'.$fRowI->sub_cat_slug);?>">
							  <?php echo $fRowI->sub_cat_name;?><span> (<?php echo $rowDI['totalCount'];?>)</span></a></li>
                              <?php endforeach;?>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="tab3warning">
                        	<h5 style="background:none; padding:0; margin:0; text-align:left; font-size:17px; color:#0066CC; margin:0 0 10px 5px; text-transform:capitalize">Search By Division</h5>
                                <ul class="row catelist">
                             <?php foreach($divisionCategory->result() as $fRowD):
							 	$jobCOuntD = $this->db->query("SELECT COUNT(job_id) as totalCount FROM jobpost WHERE job_category='".$fRowD->sub_cat_slug."'");
								$rowDiv = $jobCOuntD->row_array();
							 ?>
                              <li class="col-md-4 col-sm-4"><a href="<?php echo base_url('joblist/'.$fRowD->sub_cat_slug);?>">
							  <?php echo $fRowD->sub_cat_name;?><span> (<?php echo $rowDiv['totalCount'];?>)</span></a></li>
                              <?php endforeach;?>
                            </ul>
                        
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div>
    <div class="col-md-2 col-lg-2 col-sm-12" style="margin:0; padding:0;">
        
            <ul class="specialJobs">
                 <?php foreach($specialCategory->result() as $sRow): ?>
                  <li><a href="<?php echo base_url('joblist/'.$sRow->sub_cat_slug);?>"><?php echo $sRow->sub_cat_name;?></a></li>
                  <?php endforeach;?>
            </ul>
        
    </div>
  </div>
</div>
<div class="section" style="margin:0; padding:0">
  <div class="container" style="margin-top:10px; background:#fafafa"> 
    <div class="col-md-10 col-lg-10 col-sm-12" style="margin:0; padding:0;">
        <div class="titleTop" style="margin-top:20px;">
          <h3 style="margin:0; padding:0">Hot Jobs</h3>
        </div>
        
        <ul class="jobslist">
        <?php foreach($hotjobs->result() as $hrow):
			$multipleJObs = $this->db->query("SELECT * FROM jobpost WHERE emp_id='".$hrow->emp_id."' ORDER BY job_id DESC LIMIT 2");?>
			<li class="col-md-4" style="margin:0; padding:0">
            <div class="jobint">
              <div class="row">
                <div class="col-md-3 col-sm-3"><img src="<?php echo base_url('asset/uploads/employers/'.$hrow->logo);?>" alt="<?php echo $hrow->company_name;?>"/></div>
                <div class="col-md-9 col-sm-9">
                  <h4><a href="#"><?php echo $hrow->company_name;?></a></h4>
                  <?php foreach($multipleJObs->result() as $hjrow):?>
                 	 <div class="jobloc"><a href="#" style=" color:#333;">&raquo; <?php echo $hjrow->job_title;?></a></div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </li>
		<?php endforeach; ?>
          
         </ul>
        <!--<div class="viewallbtn"><a href="job-listing.html">View All Hot Jobs</a></div>-->
    </div>
    
    <div class="col-md-2 col-lg-2 col-sm-12" style="margin:0; padding:0;">
    	<img src="<?php echo base_url('assets/images/ad/airtel-120X45.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/gi-ns-120X45-2492015.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/amazon-120X45.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/genpact-ns-120X45-1722017.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/atos-14092016.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/gen-120X45-732017.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
         <img src="<?php echo base_url('assets/images/ad/atos-14092016.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/gen-120X45-732017.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/airtel-120X45.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/gi-ns-120X45-2492015.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/amazon-120X45.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/genpact-ns-120X45-1722017.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/atos-14092016.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/gen-120X45-732017.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
         <img src="<?php echo base_url('assets/images/ad/atos-14092016.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/gen-120X45-732017.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/airtel-120X45.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/gi-ns-120X45-2492015.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/amazon-120X45.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/genpact-ns-120X45-1722017.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/genpact-ns-120X45-1722017.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
    </div>
    
    
  </div>
</div>

<div class="section" style="margin:0; padding:0">
  <div class="container" style="margin-top:10px; background:#fafafa">
  	<div class="col-md-12 col-lg-12 col-sm-12" style="margin:0; padding:0;">
    	<div class="col-md-10 col-lg-10 col-sm-12" style="margin:0; padding:0;">
    		<div class="topjobseekerArea">
            <div class="titleTop" style="margin-top:10px;">
              <h3>Star Jobseekers</h3>
            </div>
            <ul class="employerList">
               <?php
			  if($starjobseekers->num_rows()  > 0){
             	 foreach($starjobseekers->result() as $jobs){
				
			  ?>
              
              <li data-toggle="tooltip" data-placement="bottom" title="" data-html="true"
              data-original-title="<?php echo $jobs->fullname;?>"><a href="#">
                <img src="<?php echo base_url();?>assets/images/default.jpg" alt="<?php echo $jobs->fullname;?>" style="border-radius:50%;" />
                <h5 style="font-size:11px;"><?php echo $jobs->fullname;?></h5>
              </a></li>
             <?php
             	}
			 }
			 ?> 
            </ul>
        </div>
        </div>
        <div class="col-md-2 col-lg-2 col-sm-12" style="margin:0; padding:0;">
    	<img src="<?php echo base_url('assets/images/ad/airtel-120X45.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/gi-ns-120X45-2492015.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/amazon-120X45.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/genpact-ns-120X45-1722017.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/atos-14092016.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/gen-120X45-732017.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
    </div>
    </div>
    
  </div>
</div>


<div class="section" style="margin:0; padding:0">
  <div class="container" style="margin-top:10px; background:#fafafa">
  	
    <div class="col-md-12 col-lg-12 col-sm-12" style="margin:0; padding:0;">
    	<div class="col-md-10 col-lg-10 col-sm-12" style="margin:0; padding:0;">

             <div class="titleTop" style="margin-top:10px;">
              <h3>My Network</h3>
              <div style="width:100%; font-size:20px; line-height:28px; text-align:center">
              Create Your Network of Job Seekers, Employees and Employers!<br /> Be Inspired and Get in Touch with People in your Field!</div>
            </div>
            <div class="row">
              <div class="col-sm-3" style="margin:0; padding:0">
             	 <div style="margin:5px; float:left;background:#fff; padding:10px;border-bottom:1px dotted #ccc">
                  <div style="width:70%; text-align:center; margin:auto">
                  <a href="company-detail.html"><img src="<?php echo base_url();?>assets/images/candidates/01.jpg" alt="Company Name" 
                  style="border:1px solid #333; border-radius:10%; margin-bottom:10px" /></a></div>
                  <h4 style="text-align:center">Mohamamd Wasim</h4>
                  <h6 style="text-align:center; font-weight:normal;">Sr. Software Developer</h6>
                  <h6 style="text-align:center; font-weight:normal;">E-soft Ltd</h6>
                  <h6 style="text-align:center; font-weight:normal;">Kawran Bazar, Dhaka</h6>
                   
                </div>
              </div>
              <div class="col-sm-3" style="margin:0; padding:0">
             	 <div style="margin:5px; float:left;background:#fff; padding:10px;border-bottom:1px dotted #ccc">
                  <div style="width:70%; text-align:center; margin:auto">
                  <a href="company-detail.html"><img src="<?php echo base_url();?>assets/images/candidates/10.jpg" alt="Company Name" 
                  style="border:1px solid #333; border-radius:10%; margin-bottom:10px" /></a></div>
                  <h4 style="text-align:center">Zahid Hasan</h4>
                  <h6 style="text-align:center; font-weight:normal;">Web Developer</h6>
                  <h6 style="text-align:center; font-weight:normal;">Quantam Cloud Ltd</h6>
                  <h6 style="text-align:center; font-weight:normal;">Mohamamdpur, Dhaka</h6>
                   
                </div>
              </div>
              <div class="col-sm-3" style="margin:0; padding:0">
             	 <div style="margin:5px; float:left;background:#fff; padding:10px;border-bottom:1px dotted #ccc">
                  <div style="width:70%; text-align:center; margin:auto">
                  <a href="company-detail.html"><img src="<?php echo base_url();?>assets/images/candidates/08.jpg" alt="Company Name" 
                  style="border:1px solid #333; border-radius:10%; margin-bottom:10px" /></a></div>
                  <h4 style="text-align:center">Yaseen Arafat</h4>
                  <h6 style="text-align:center; font-weight:normal;">Sr. Marketing Executive</h6>
                  <h6 style="text-align:center; font-weight:normal;">Devine IT</h6>
                  <h6 style="text-align:center; font-weight:normal;">Uttara, Dhaka</h6>
                   
                </div>
              </div>
              <div class="col-sm-3" style="margin:0; padding:0">
             	 <div style="margin:5px; float:left;background:#fff; padding:10px;border-bottom:1px dotted #ccc">
                  <div style="width:70%; text-align:center; margin:auto">
                  <a href="company-detail.html"><img src="<?php echo base_url();?>assets/images/candidates/02.jpg" alt="Company Name" 
                  style="border:1px solid #333; border-radius:10%; margin-bottom:10px" /></a></div>
                  <h4 style="text-align:center">Jannatul Ferdous</h4>
                  <h6 style="text-align:center; font-weight:normal;">Sr. Consultant</h6>
                  <h6 style="text-align:center; font-weight:normal;">CMSN Pety Ltd.</h6>
                  <h6 style="text-align:center; font-weight:normal;">Sydney, Australlia</h6>
                   
                </div>
              </div>
            </div>
        </div>    
            <div class="col-md-2 col-lg-2 col-sm-12" style="margin:0; padding:0;">
    	<img src="<?php echo base_url('assets/images/ad/airtel-120X45.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/gi-ns-120X45-2492015.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/amazon-120X45.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/genpact-ns-120X45-1722017.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/atos-14092016.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
         <img src="<?php echo base_url('assets/images/ad/atos-14092016.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />	
    </div>
        </div>
  </div>
</div>
<div class="videowraper section" style="height:250px;">
  <div class="container"> 
    <!-- title start -->
    <div class="titleTop">
      <h3>Our Measseges</h3>
    </div>
    <!-- title end -->
    
    <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum congue posuere lacus, id tincidunt nisi porta sit amet. Suspendisse et sapien varius, pellentesque dui non, semper orci.</p> </div>
</div>

<div class="section" style="margin:0; padding:0">
  <div class="container" style="margin-top:10px; background:#fafafa"> 
 	<div class="col-md-10 col-lg-10 col-sm-12" style="margin:0; padding:0;">
    <div class="titleTop">
      <h3>Success Stories</h3>
    </div>
    <ul class="testimonialsList">
    <?php foreach($successstory->result() as $succst):?>
     <li class="item active">
        <div class="testimg"><img src="<?php echo base_url('asset/uploads/success_story/'.$succst->image);?>" alt="Your alt text here" /></div>
        <div class="clientname"><?php echo $succst->success_story_name;?></div>
        <p><?php echo $succst->success_story_details;?></p>
      </li>

    <?php endforeach;?>
    </ul>
    </div>
    <div class="col-md-2 col-lg-2 col-sm-12" style="margin:0; padding:0;">
    	<img src="<?php echo base_url('assets/images/ad/airtel-120X45.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/genpact-ns-120X45-1722017.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/atos-14092016.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/gen-120X45-732017.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
    </div>
  </div>
</div>

<div class="section" style="margin:0; padding:0">
  <div class="container" style="margin-top:10px; background:#fafafa">
  	<div class="col-md-12 col-lg-12 col-sm-12" style="margin:0; padding:0;">
    	<div class="col-md-10 col-lg-10 col-sm-12" style="margin:0; padding:0;">
    		<div class="topEmployerArea">
            <div class="titleTop">
              <h3 style="padding:10px;">See Who's Hiring on jobstarbd.com</h3>
            </div>
            <ul class="employerList">
              <!--employer-->
             <!-- <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Logic NS <br> IT <br> Korea"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/employers/partex.png" alt="Your alt text here" style="width:100%; height:116px"/></a>
              </li>-->
              
             <?php
			  if($topemployers_more->num_rows()  > 0){
             	 foreach($topemployers_more->result() as $temp){		
				 		
			  ?>
              
              <li data-toggle="tooltip" data-placement="bottom" title="" data-html="true" style="height:125px;"
              data-original-title="<?php echo $temp->company_name;?>"><a href="#">
                <img src="<?php echo base_url('asset/uploads/employers/'.$temp->logo);?>" alt="<?php echo $temp->company_name;?>" style="width:100%; height:auto; max-height:100px" />
                <h5 style="font-size:11px;"><?php echo $temp->company_name;?></h5>
              </a></li>
             <?php
             	}
			 }
			 ?> 
             
            </ul>
        </div>
        </div>
        <div class="col-md-2 col-lg-2 col-sm-12" style="margin:0; padding:0;">
    	<img src="<?php echo base_url('assets/images/ad/airtel-120X45.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/gi-ns-120X45-2492015.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/amazon-120X45.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/genpact-ns-120X45-1722017.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/atos-14092016.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/gen-120X45-732017.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
    </div>
    </div>
    
  </div>
</div>


<div class="section" style="margin:0; padding:0">
  <div class="container" style="margin-top:10px; background:#fafafa">
  	<div class="col-md-6 col-lg-6 col-sm-12" style="margin:0; padding:0;">
    	<div class="topjobseekerArea" style="background:#efefef; margin-top:10px;">
            <div class="titleTop">
              <h3>Events</h3>
            </div>

            <?php foreach($hevents->result() as $eventh):?>
              <div class="row" style="background:#fff; padding:10px;border-bottom:1px dotted #ccc">
              <div class="col-sm-3"><a href="<?php echo base_url("events/details/".$eventh->slug);?>">
              	<img src="<?php echo base_url('asset/uploads/event/'.$eventh->image);?>" alt="Company Name" />
              </a></div>
              <div class="col-sm-9">
              	<h5 style="font-size:14px; line-height:16px; font-weight:bold;"><a href="<?php echo base_url("events/details/".$eventh->slug);?>" style="color:#333;">
				<?php echo $eventh->events_name;?></a></h5>
                <p>
                	<?php 
					$strTagE = strip_tags( $eventh->events_details);
					if(strlen($strTagE) > 150){
						$strCutE = substr($strTagE, 0, 150);
						$displayDetailsE = substr($strCutE, 0, strrpos($strCutE, ' ')).'.....'; 
					}			
					echo $displayDetailsE;		
					?>
                </p>
              </div>
              </div>
            <?php endforeach;?>
              <div class="row" style="float:right"><a href="<?php echo base_url("events");?>" style="padding:5px 0; float:left;">More Events...</a></div>
        </div>
    </div>
    <div class="col-md-6 col-lg-6 col-sm-12" style="margin:0; padding:0;">
    	<div class="topEmployerArea" style="background:#f5f5f5; margin-top:10px;">
            <div class="titleTop">
              <h3>HR News</h3>
            </div>
            <?php foreach($hrnews->result() as $newsh):?>
              <div class="row" style="background:#fff; padding:10px;border-bottom:1px dotted #ccc">
              <div class="col-sm-3"><a href="<?php echo base_url("news/details/".$newsh->slug);?>">
              	<img src="<?php echo base_url('asset/uploads/news/'.$newsh->image);?>" alt="<?php echo $newsh->news_title;?>" />
              </a></div>
              <div class="col-sm-9">
              	<h5 style="font-size:14px; line-height:16px; font-weight:bold;">
                <a href="<?php echo base_url("news/details/".$newsh->slug);?>" style="color:#333"><?php echo $newsh->news_title;?></a></h5>
                <p>
                	<?php 
					$strTag = strip_tags( $newsh->short_description);
					if(strlen($strTag) > 150){
						$strCut = substr($strTag, 0, 150);
						$displayDetails = substr($strCut, 0, strrpos($strCut, ' ')).'.....'; 
					}			
					echo $displayDetails;		
					?>
                </p>
              </div>
              </div>
            <?php endforeach;?>
            <div class="row" style="float:right"><a href="<?php echo base_url("news");?>" style="padding:5px 0; float:left;">More News...</a></div>
        </div>
    </div>
  </div>
</div>
<div class="section" style="margin:0; padding:0">
  <div class="container" style="background:#fafafa">
<div class="appwraper">
 
    <div class="row">
      <div class="col-md-5 col-sm-6"> 
        <!--app image Start-->
        <div class="appimg"><img src="<?php echo base_url();?>assets/images/app-mobile.png" alt="Your alt text here" /></div>
        <!--app image end--> 
      </div>
      <div class="col-md-7 col-sm-6"> 
        <!--app info Start-->
        <div class="titleTop">
          <div class="subtitle">Step Forword Now</div>
          <h3>The Jobee APP</h3>
        </div>
        <div class="subtitle2">A world of oppertunity in your hand</div>
        <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum congue posuere lacus, id tincidunt nisi porta sit amet. Suspendisse et sapien varius, pellentesque dui non, semper orci. Curabitur blandit, diam ut ornare ultricies.</p>
        <div class="appbtn">
          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6"><a href="#."><img src="<?php echo base_url();?>assets/images/apple-btn.png" alt="Your alt text here"></a></div>
            <div class="col-md-6 col-sm-6 col-xs-6"><a href="#."><img src="<?php echo base_url();?>assets/images/andriod-btn.png" alt="Your alt text here"></a></div>
          </div>
        </div>
        <!--app info end--> 
      </div>
    </div>
  </div>
</div>
</div>

<div class="section" style="margin:0; padding:0">
  <div class="container" style="background:#fafafa">
  	<div class="col-md-6 col-lg-6 col-sm-12" style="margin:0; padding:0;">
    	<div class="workshopArea">
            <div class="titleTop" style="float:left; text-align:left; padding:10px;">
              <h5><span style="color:#3063a2; text-transform:uppercase; text-align:left">
              <i class="fa fa-graduation-cap" aria-hidden="true"></i>&nbsp; Workshop Training</span></h5>
            </div>

              <!--<div class="row" style="padding:10px;border-bottom:1px dotted #ccc">
                  <div class="col-sm-12" style="margin:0; padding:0">
                    <a href="#">
                    <div class="col-sm-2" style="margin:0; padding:0"><img src="<?php echo base_url('assets/images/workshoptraining/tobacco48.png');?>" /></div>
                    <div class="col-sm-10" style="margin:0; padding:0"><h6 style="font-weight:normal;">How to Be An Efficient Commercial & Procurement Manager</h6>
                    <span style="font-size:11px; color:#999"><?php echo date('l , d F l Y');?></span></div>
                    </a>
                  </div>
              </div>-->
              
              
              <?php foreach($workshopList->result() as $crs):?>
              <div class="row" style="padding:10px;border-bottom:1px dotted #ccc">
                  <div class="col-sm-12" style="margin:0; padding:0">
                   <a href="#">
                    <div class="col-sm-2" style="margin:0; padding:0"><img src="<?php echo base_url('assets/images/workshop.jpg');?>" /></div>
                    <div class="col-sm-10" style="margin:0; padding:0"><h6 style="font-weight:normal;"><?php echo $crs->comp_name;?></h6>
                    <span style="font-size:11px; color:#999"><?php echo $crs->c_starts.' - '.$crs->app_deadline;?></span></div>
                    </a>
                  </div>
              </div>
          <?php endforeach;?>   
             
             
              
        </div>
    </div>
    <div class="col-md-6 col-lg-6 col-sm-12" style="margin:0; padding:0;">
    	<div class="workshopArea">
            <div class="titleTop" style="float:left; text-align:left; padding:10px;">
              <h5><span style="color:#3063a2; text-transform:uppercase; text-align:left">
              <i class="fa fa-certificate" aria-hidden="true"></i> &nbsp; Certificate Coursees</span></h5>
            </div>

		<?php foreach($courseList->result() as $crs):?>
              <div class="row" style="padding:10px;border-bottom:1px dotted #ccc">
                  <div class="col-sm-12" style="margin:0; padding:0">
                   <a href="#">
                    <div class="col-sm-2" style="margin:0; padding:0"><img src="<?php echo base_url('assets/images/courses.png');?>" /></div>
                    <div class="col-sm-10" style="margin:0; padding:0"><h6 style="font-weight:normal;"><?php echo $crs->comp_name;?></h6>
                    <span style="font-size:11px; color:#999"><?php echo $crs->c_starts.' - '.$crs->app_deadline;?></span></div>
                    </a>
                  </div>
              </div>
          <?php endforeach;?>   
             
             
              
              
        </div>
    </div>
  </div>
</div>
<div class="videowraper section" style="height:250px;">
  <div class="container"> 
    <!-- title start -->
    <div class="titleTop">
      <h3>Our <span>Measseges</span></h3>
    </div>
    <!-- title end -->
    
    <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum congue posuere lacus, id tincidunt nisi porta sit amet. Suspendisse et sapien varius, pellentesque dui non, semper orci.</p> </div>
</div>
<div class="section" style="margin:0; padding:0;background:#fafafa">
    	 <div class="titleTop">
            <h3>Our <span>Partners</span></h3></div>
            <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1200px;height:140px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position:absolute;top:0px;left:0px;background-color:rgba(0,0,0,0.7);">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1200px;height:140px;overflow:hidden;">
            <div>
                <img data-u="image" src="<?php echo base_url('assets/images/employers/huwai.png');?>" />
            </div>
            <div>
                <img data-u="image" src="<?php echo base_url('assets/images/employers/brac.png');?>" />
            </div>
            <div>
                <img data-u="image" src="<?php echo base_url('assets/images/employers/navana.png');?>" />
            </div>
            <div>
                <img data-u="image" src="<?php echo base_url('assets/images/employers/agricul_bank.png');?>" />
            </div>
            <div>
                <img data-u="image" src="<?php echo base_url('assets/images/employers/partex.png');?>" />
            </div>
            <div>
                <img data-u="image" src="<?php echo base_url('assets/images/employers/emplogo12.jpg');?>" />
            </div>
            <div>
                <img data-u="image" src="<?php echo base_url('assets/images/employers/develpalw.png');?>" />
            </div>
            <div>
                <img data-u="image" src="<?php echo base_url('assets/images/employers/baximco.png');?>" />
            </div>
            <div>
                <img data-u="image" src="<?php echo base_url('assets/images/employers/eqim.jpg');?>" />
            </div>
            <div>
                <img data-u="image" src="<?php echo base_url('assets/images/employers/develpalw.png');?>" />
            </div>
            <div>
                <img data-u="image" src="<?php echo base_url('assets/images/employers/prangr.png');?>" />
            </div>
            <div>
                <img data-u="image" src="<?php echo base_url('assets/images/employers/usbangla.png');?>" />
            </div>
            
        </div>
    </div>
</div>
 <script type="text/javascript">jssor_1_slider_init();</script>
 
 <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="<?php echo base_url();?>assets/marque/libs/jquery.tickerNews.min.js"></script>
<script type="text/javascript">
	$(function(){
		var timer = !1;
		_Ticker = $("#T1").newsTicker();
		_Ticker.on("mouseenter",function(){
			var __self = this;
			timer = setTimeout(function(){
				__self.pauseTicker();
			},200);
		});
		_Ticker.on("mouseleave",function(){
			clearTimeout(timer);
			if(!timer) return !1;
			this.startTicker();
		});
	});
</script>