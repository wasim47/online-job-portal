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
    
  
    <div class="row">
      
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
        
        <?php /*?><div class="pagiWrap">
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
        </div><?php */?>
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

