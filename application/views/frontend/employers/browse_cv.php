<script>
 function searchCv(){
   $("#LoadingImage").show();
   $("#loaderHide").hide();
   	  var exp_to = $("#exp_to").val();
	  var exp_from = $("#exp_from").val();
	  var keywords = $("#keywords").val();
	  //alert(exp_to);
   	  var surl = '<?php echo base_url('employers/browse_cv_ajax');?>';
	  
      $.ajax({ 
        type: "POST", 
        url: surl,  
		data:{'exp_from':exp_from,'exp_to':exp_to,'keywords':keywords},
        success: function(response) { 
			$("#LoadingImage").hide();
			$("#loaderHide").hide();
			$("#userstatus").html(response);
			$("#searchform").css('display','none');
		  	
        }, 
        error: function () {
			$("#LoadingImage").hide();
			$("#loaderHide").hide();
			
          	alert('Unknown error '); 
        }    
      });  
    }
</script>
<div class="container" style="margin-top:10px">
<div class="row">
<div class="col-md-3"><?php include('left_menu.php');?></div>

   
   
    
   

      <div class="col-md-9 col-sm-9" style="background:#fff">
         <div class="pageSearch">
     		 <div class="row" id="searchform">
        
        <div class="col-md-11 col-md-offset-1" style="margin-top:25%; margin-bottom:25%">
          <div class="searchform">
            <div class="row">
              
               <div class="col-md-12 col-sm-12">
                <input type="text" class="form-control" name="keywords" id="keywords" placeholder="Skill keyword with comma separeted" style="margin:1%;" />
              </div>
               <div class="col-md-12 col-sm-12">
                    <div class="col-md-4 col-sm-4" style="margin:0; padding:5px">
                        <input type="text" name="exp_from" id="exp_from" class="form-control" placeholder="From" />
                      </div>
                      <div class="col-md-1 col-sm-1" style="margin:0; padding:15px 0; text-align:center">To</div>
                      <div class="col-md-4 col-sm-4" style="margin:0; padding:5px 0">
                        <input type="text" name="exp_to" id="exp_to" class="form-control" placeholder="To"  />
                      </div>
                 
                  <div class="col-md-2 col-sm-2" style="margin:0; padding:5px 0">
                    <span id="loaderHide">
                    <button class="btn" type="button" onclick="searchCv();"><i class="fa fa-search" aria-hidden="true"></i></button></span>
                    <span id="LoadingImage" style="display:none;"><a href="javascript:void();" class="btn apply" style="background:#ccc">
                                            <i class="fa fa-paper-plane" aria-hidden="true"></i> 
      										<img src="<?php echo base_url('assets/images/ajax-loader.gif');?>" style="width:20px; height:auto" /></a></span>
                  </div>
                  
               </div>
               
            </div>
          </div>
        </div>
        
      </div>
      		 <div id="userstatus"></div>
    	</div>
      </div>
     
    
  </div>
</div>
