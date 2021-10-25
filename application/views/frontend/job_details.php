<script>
function emailToFriend(){
   $("#LoadingImageE").show();
   $("#loaderHideE").hide();
   	  var messagesinfo = $("#messages").val();
	  var recemail = $("#receiver_email").val();
	  var jid = $("#jobid").val();
	  var joburl = $("#joburl").val();
	  var jobtitle = $("#jobtitle").val();
	  //alert(jid);
   	  var surl = '<?php echo base_url('jobseekers/emailtofrins');?>';
	  
      $.ajax({ 
        type: "POST", 
        dataType: "json",
        url: surl,  
		data:{jobid:jid,rmail:recemail,umessage:messagesinfo,jurl:joburl,jtitle:jobtitle},
        cache : false, 
        success: function(response) { 
          $("#LoadingImageE").hide();
		  $("#loaderHideE").show();
		  $('#modalcloseE').trigger('click');
		  
		  $("#userstatus").html(response.apply+". "+response.user);
		   $("#userstatus").css('color',response.color);
         // alert(response.apply); 
        }, 
        error: function (xhr, status) {  
          $("#LoadingImageE").hide();
		  $("#loaderHideE").show();
          alert('Unknown error ' + status); 
        }    
      });  
    }



 function updateAttend(){
   $("#LoadingImage").show();
   $("#loaderHide").hide();
   	  var coverlet = $("#cover_letter").val();
	  var expected_salary = $("#expected_salary").val();
	  var jid = $("#jobid").val();
	   var eid = $("#emplid").val();
	  //alert(jid);
   	  var surl = '<?php echo base_url('jobseekers/apply_jobs');?>';
	  
      $.ajax({ 
        type: "POST", 
        dataType: "json",
        url: surl,  
		data:{jobid:jid,exsalary:expected_salary,coverletter:coverlet,employeeid:eid},
        cache : false, 
        success: function(response) { 
          $("#LoadingImage").hide();
		  $("#loaderHide").show();
		  $('#modalclose').trigger('click');
		  
		   $("#userstatus").html(response.apply+". "+response.user);
		   $("#userstatus").css('display','inline');
		   $("#userstatus").css('color',response.color);
         // alert(response.apply); 
        }, 
        error: function (xhr, status) {  
          $("#LoadingImage").hide();
		  $("#loaderHide").show();
          alert('Unknown error ' + status); 
        }    
      });  
    }
</script>
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Job Detail</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>Job Name</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->

<div class="listpgWraper">
  <div class="container"> 
    
     <h2 id="userstatus" style="padding:10px; background:#fff; box-shadow:#ccc 0 0 2px 2px; display:none; margin-bottom:10px; width:100%; float:left"></h2>
     
    <div class="job-header">
      <div class="jobinfo">
        <div class="row" style="margin:0; padding:0;">
          <div class="col-md-8" style="margin:0; padding:0;">
            <h2><?php echo $jobdetails['job_title'];?></h2>
            <div class="ptext">Date Posted: <?php echo $jobdetails['date'];?></div>
            <div class="salary">Monthly Salary: <strong><?php echo $jobdetails['salary'];?></strong></div>
          </div>
          <div class="col-md-4" style="margin:0; padding:0;">
          	
            <div class="companyinfo">
              <div class="companylogo"><img src="<?php echo base_url('asset/uploads/employers/'.$empRow['logo']);?>" alt="<?php echo $empRow['company_name'];?>"></div>
              <div class="title"><a href="#."><?php echo $empRow['company_name'];?></a></div>
              <div class="ptext"><?php echo $empRow['city'].', '.$empRow['country'];?></div>
              <!--<div class="opening"><a href="#.">8 Current Jobs Openings</a></div>-->
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="jobButtons"> 
      
      <?php
      	if($this->session->userdata('jobseekersAccessId') && $this->session->userdata('jobseekersAccessId')!=""){
			
		}
		if($checkapplyjob > 0){
			echo '<a href="javascript:void();" class="btn" style="cursor:default"><i class="fa fa-paper-plane" aria-hidden="true"></i> Applied </a>';
		}
		else{
			echo '<a href="javascript:void();" data-toggle="modal" data-target="#applyModal" class="btn apply"><i class="fa fa-paper-plane" aria-hidden="true"></i> Apply Now </a>';
		}
	  ?>
      
      
      
      
      <a href="javascript:void();" data-toggle="modal" data-target="#emailModal" class="btn" style="background:#dc493c; color:#fff">
      <i class="fa fa-envelope" aria-hidden="true"></i> Email to Friend</a> 
      
    </div>
    
    
    <!-- Job Detail start -->
    <div class="row">
      <div class="col-md-7" style="margin:0; padding:0;"> 
      	<div style="margin-right:10px;">
            <div class="job-header">
              <div class="contentbox">
                <h3>Job Requirement</h3>
                <p><?php echo $jobdetails['requirement'];?></p>
                <h3>Skills</h3>
                <p><?php echo $jobdetails['responsibilities'];?></p>
                <h3>Benifits</h3>
                <p><?php echo $jobdetails['benifits'];?></p>
                <h3>Education</h3>
                <p><?php echo $jobdetails['education_qualification'];?></p>
                <h3>Experience</h3>
                <p><?php echo $jobdetails['experience'];?></p>
              </div>
            </div>
            <?php /*?><div class="relatedJobs">
              <h3>Related Jobs</h3>
              <ul class="searchList">
                <?php foreach($related_job->result() as $jobl):
                $queryEmp = $this->db->query("SELECT * FROM employers WHERE cid='".$jobl->emp_id."'");
                $empRow = $queryEmp->row_array();
              ?>
              <li>
                <div class="row">
                  <div class="col-md-9 col-sm-9">
                    <div class="jobinfo" style="line-height:20px;">
                      <h3><a href="<?php echo base_url('joblist/details/'.$jobl->slug);?>"><?php echo $jobl->job_title;?></a></h3>
                      <div class="companyName"><a href="#."><?php echo $empRow['company_name'];?></a></div>
                      <div class="location">Vacancy: <?php echo $jobl->vacancy;?></span></div>
                      <div class="location">Location: <?php echo $jobl->location;?></span></div>
                      <div class="location">Experience: <?php echo $jobl->experience;?></span></div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="col-md-3 col-sm-3">
                    <div class="listbtn"><a href="#." style="padding:8px; margin:0;">Apply</a></div>
                  </div>
                </div>
              </li>
              <?php endforeach;?>
               
              </ul>
            </div><?php */?>
        </div>
      </div>


      
      <div class="col-md-3" style="margin:0; padding:0;"> 
        <!-- Job Detail start -->
        <div class="job-header">
          <div class="jobdetail">
            <h3>Job Detail</h3>
            <ul class="jbdetail">
              <li class="row">
                <div class="col-md-6 col-xs-6">Location</div>
                <div class="col-md-6 col-xs-6"><span><?php echo $jobdetails['location'];?></span></div>
              </li>
              <li class="row">
                <div class="col-md-6 col-xs-6">Job Nature</div>
                <div class="col-md-6 col-xs-6"><span><?php echo $jobdetails['jobNatur'];?></span></div>
              </li>
              <li class="row">
                <div class="col-md-6 col-xs-6">Job Level</div>
                <div class="col-md-6 col-xs-6"><span><?php echo $jobdetails['jobLevel'];?></span></div>
              </li>
              <li class="row">
                <div class="col-md-6 col-xs-6">No. of Vacancy</div>
                <div class="col-md-6 col-xs-6"><span><?php echo $jobdetails['vacancy'];?></span></div>
              </li>
              <li class="row">
                <div class="col-md-6 col-xs-6">Age Range</div>
                <div class="col-md-6 col-xs-6"><span><?php echo $jobdetails['ageRange'];?></span></div>
              </li>
              <li class="row">
                <div class="col-md-6 col-xs-6">Gender</div>
                <div class="col-md-6 col-xs-6"><span><?php echo $jobdetails['allow_gender'];?></span></div>
              </li>
              <li class="row">
                <div class="col-md-6 col-xs-6">Experience</div>
                <div class="col-md-6 col-xs-6"><span><?php echo $jobdetails['experience'];?></span></div>
              </li>
              <li class="row">
                <div class="col-md-6 col-xs-6">Application Deadline</div>
                <div class="col-md-6 col-xs-6"><span><?php echo $jobdetails['deadline'];?></span></div>
              </li>
            </ul>
          </div>
        </div>
     
        
        <!-- Google Map start -->
        <div class="job-header">
          <div class="jobdetail">
            <h3>Company Location</h3>
            <div class="gmap">
              <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d13276.272465119835!2d72.97962462269287!3d33.70718629417979!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1480401216309" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-2 col-sm-6" style="margin:0; padding:0 5px;"> 
        <img src="<?php echo base_url('assets/images/addver.gif');?>" style="width:100%; height:auto" />
        <img src="<?php echo base_url('assets/images/adver1.gif');?>" style="width:100%; height:auto" />
        
      </div>
    </div>
  </div>
</div>



<div id="applyModal" class="modal fade" role="dialog" style="top:10%; z-index:10000;">
                	<div class="modal-dialog">
                    	<div class="modal-content">
                            <div class="modal-header" style="background:#0194e8">
                                <button type="button" class="btn btn-danger btn-xs pull-right" id="modalclose" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title" style="width:50%; float:left; color:#fff">Job Seeker Registration</h4>
                            </div>
                            <div class="modal-body">
                            	<div class="col-sm-11">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <textarea name="cover_letter" rows="5" required id="cover_letter" placeholder="Cover Letter" class="form-control inputForm"></textarea>
                                            </div>
                                        </div>
                                        
                                       
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="text" required name="expected_salary" id="expected_salary" class="form-control inputForm"  
                                                placeholder="Expected Salary"/>
                                                <input type="hidden" name="jobid" id="jobid" value="<?php echo $jobdetails['job_id'];?>" />
                                                <input type="hidden" name="emplid" id="emplid" value="<?php echo $jobdetails['emp_id'];?>" />
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label class="control-label col-sm-4"></label>
                                            <div class="col-sm-8 pull-right" style="margin-top:10px; float:right">
                                            <span id="loaderHide">
                                            	<button type="button" onclick="updateAttend();" class="btn btn-success btn-submit">Submit</button>
                                            </span></div>
                                            <span id="LoadingImage" style="display:none;"><a href="javascript:void();" class="btn apply" style="background:#ccc">
                                            <i class="fa fa-paper-plane" aria-hidden="true"></i> 
      										<img src="<?php echo base_url('assets/images/ajax-loader.gif');?>" style="width:20px; height:auto" /></a></span>
                                        </div>
                                     </div>
                                
                                
                            </div>
                            <div class="modal-footer" style="border:none;">
                            	
                            </div>
                        </div>
                    </div>
                </div>
                
<div id="emailModal" class="modal fade" role="dialog" style="top:10%; z-index:10000;">
                	<div class="modal-dialog">
                    	<div class="modal-content">
                            <div class="modal-header" style="background:#0194e8">
                                <button type="button" class="btn btn-danger btn-xs pull-right" id="modalcloseE" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title" style="width:50%; float:left; color:#fff">Email to Friend</h4>
                            </div>
                            <div class="modal-body">
                            	<div class="col-sm-11">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <textarea name="messages" rows="5" required id="messages" placeholder="Messages" class="form-control inputForm"></textarea>
                                            </div>
                                        </div>
                                        
                                       
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="email" required name="receiver_email" id="receiver_email" class="form-control inputForm" 
                                                placeholder="Receiver Email Address"/>
                                                <input type="hidden" name="joburl" id="joburl" class="form-control" 
                                                value="<?php echo base_url('joblist/details/'.$jobdetails['slug']);?>" />
                                                <input type="hidden" name="jobid" id="jobid" class="form-control" value="<?php echo $jobdetails['job_id'];?>" />
                                                <input type="hidden" name="jobtitle" id="jobtitle" class="form-control" value="<?php echo $jobdetails['job_title'];?>" />
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label class="control-label col-sm-4"></label>
                                            <div class="col-sm-8 pull-right" style="margin-top:10px; float:right">
                                            <span id="loaderHideE">
                                            	<button type="button" onclick="emailToFriend();" class="btn btn-success btn-submit">Submit</button>
                                            </span>
                                            </div>
                                            <span id="LoadingImageE" style="display:none;"><a href="javascript:void();" class="btn apply" style="background:#ccc">
                                            <i class="fa fa-paper-plane" aria-hidden="true"></i> 
      										<img src="<?php echo base_url('assets/images/ajax-loader.gif');?>" style="width:20px; height:auto" /></a></span>
                                        </div>
                                     </div>
                                
                                
                            </div>
                            <div class="modal-footer" style="border:none;">
                            	
                            </div>
                        </div>
                    </div>
                </div>