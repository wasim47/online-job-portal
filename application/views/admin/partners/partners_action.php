<?php
if($partnersUpdate->num_rows()>0){
	foreach($partnersUpdate->result() as $partnersData);
	$link_id=$partnersData->link_id;
	$partnersTitle=$partnersData->headline;
	$link_url=$partnersData->link_url;
	$image=$partnersData->image;
	$menutitle='Edit Link';
}
else{
	$link_id='';
	$partnersTitle=set_value('headline');
	$link_url=set_value('link_url');
	$image='';
	$menutitle='New Link';
}
?>
<script>
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
	}
	
	function getMenu(strURL) {		
		
		var req = getXMLHTTP();
		//alert(req);
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('citydiv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
	


	function pageChange(){
		var pagestrval = document.getElementById('page_structure').value;
		if(pagestrval=='url'){
			document.getElementById('externalLink').style.display='inline';
		}
		else{
			document.getElementById('externalLink').style.display='none';
		}
	}

</script>
<style>
.required{
	color:#f00;
}
</style>


<div class="content-health">

				<!-- Page header -->
				<div class="page-header">
					

					<div class="breadcrumb-line breadcrumb-line-component" style="margin-top:10px; margin-bottom:10px;">
						<ul class="breadcrumb" style="font-size:20px;">
							<li>partners Information</li>
						</ul>

						<ul class="breadcrumb-elements">
							<div class="heading-btn-group">
								<a href="<?php echo base_url('admin/partners_list');?>" class="btn btn-link btn-float has-text">
                                <i class="glyphicon glyphicon-list"></i><span>partners List</span></a>
							</div>
						</ul>
					</div>
				</div>

				<div class="content">

					<div class="panel panel-flat">
						     <?php echo form_open_multipart('', 'class="form-horizontal form-label-left"');?>
                                   <div id="registration_form">	
                                  	  <div class="panel-group" id="accordion">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                 <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                 <h4 class="panel-title"><?php echo $menutitle;?></h4>
                                                 </a>
                                            </div>
                                            
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">partners Title<span class="required">*</span></label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="headline" required class="form-control col-md-7 col-xs-12" 
                                                placeholder='partners Name' value="<?php echo $partnersTitle; ?>"  onFocus="this.placeholder=''" onBlur="this.placeholder='partners Name'">
                                             <?php echo form_error('headline', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                            </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">URL<span class="required">*</span></label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="link_url" required class="form-control col-md-7 col-xs-12" 
                                                placeholder='URL' value="<?php echo $link_url; ?>"  onFocus="this.placeholder=''" onBlur="this.placeholder='URL'">
                                             <?php echo form_error('link_url', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                            </div>   
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event-name">Image</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="file" name="images">
                                            </div>
                                            </div>  
                                              </div>
                                            </div>
                                        </div>
                                        
                               	     </div>
                                   </div> 
                                    
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        	<input type="hidden" name="link_id" value="<?php echo $link_id; ?>">
                                            <input type="hidden" name="stillimg" value="<?php echo $image; ?>">
                                            <input type="reset" class="btn btn-primary" value="Reset">
                                            <input type="submit" name="registration" class="btn btn-success" value="Submit">
                                        </div>
                                    </div>
                               <?php echo form_close();?>
					</div>
