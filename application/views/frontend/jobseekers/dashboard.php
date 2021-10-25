<div class="container" style="background:#fff; box-shadow:#ccc 0px 0px 10px 0px; padding:20px; margin:30px auto">	
<div class="row">
<div class="col-md-3"><?php include('left_menu.php');?></div>

   
   
    
   

      <div class="col-md-9 col-sm-12" >
         <div>
            <div class="top-button button-group">
               <button class="btn btn-default view-stats" id="stats">
               <i class="glyphicon glyphicon-stats icon-padding"></i>My Stats
               </button>
               <a href="<?php echo base_url('jobseekers/myprofile/?pages='.base64_encode("updateprofile"));?>" class="btn btn-default edit-resume-btn" id="resume">
               <i class="glyphicon glyphicon-edit icon-padding"></i>Edit Resume
               </a>
            </div>
         </div>
      </div>
      <div class="col-md-9 col-sm-12">
       
         <div class="my-stats">
            <div class="panel">
               <div style="background-color: #d9d9d9; color: #333;" class="panel-heading panel-heading-01"><i class="glyphicon glyphicon-list-alt icon-padding"></i>My Stats
               </div>
               <div class="panel-body">
                  <div class="stats-tab">
                     <div class="btn-group action-btn" role="group" aria-label="...">
                        <a type="button" class="btn btn-default active" onclick="get_time('5/2/2017');">Last One Month</a>
                        <a type="button" class="btn btn-default " onclick="get_time('');">All Time</a>
                     </div>
                  </div>
                  <div id="alldiv" class="alldiv clearfix">
                     
                  </div>
                  <div id="lastdiv" class="lastdiv" style="display:none;">
                     
                  </div>
               </div>
            </div>
         </div>
         
      </div>
      </div>
      </div>
    
    
  </div>
</div>
