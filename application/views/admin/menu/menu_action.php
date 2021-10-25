<?php
if($menuUpdate->num_rows()>0){
	foreach($menuUpdate->result() as $menuData);
	$m_id=$menuData->m_id;
	$menuTitle=$menuData->menu_name;
	$page_structure=$menuData->page_structure;
	$external_link=$menuData->external_link;
	$target=$menuData->target;
	$menu_type=$menuData->menu_type;
	$details='';
	$data['rootId'] = $this->Index_model->getOneItemTable('menu','root_id',$menuData->root_id,'m_id','desc');
	$data['srootId'] = $this->Index_model->getOneItemTable('menu','sroot_id',$menuData->sroot_id,'m_id','desc');
	
	if($menuData->root_id!=0){
		$rootName = $data['rootId']['menu_name'];
		$rootId=$menuData->root_id;
	}
	else{
		$rootName = '';
		$rootId='';
	}
	
	if($menuData->sroot_id!=0){
		$srootName = $data['srootId']['menu_name'];
		$srootId=$menuData->sroot_id;
	}
	else{
		$srootName = '';
		$srootId='';
	}
	
	$menutitle='Edit Menu';
}
else{
	$m_id='';
	$menu_type='';
	$menuTitle=set_value('menu_name');
	$details=set_value('details');
	$page_structure='';
	$rootId='';
	$srootId='';
	$rootName='';
	$target='';
	$srootName='';
	$external_link='';
	$menutitle='Create New Menu';
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
							<li>Menu Information</li>
						</ul>

						<ul class="breadcrumb-elements">
							<div class="heading-btn-group">
								<a href="<?php echo base_url('admin/menu_list');?>" class="btn btn-link btn-float has-text">
                                <i class="glyphicon glyphicon-list"></i><span>Menu List</span></a>
							</div>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Page length options -->
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
                                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Menu Type</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                               <select name="menu_type" class="form-control">
                                                                    <option value="<?php echo $menu_type;?>"><?php echo $menu_type;?></option>
                                                                    <option value="Top Menu">Top Menu</option>
                                                                    <option value="Footer Menu">Footer Menu</option>
                                                               </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Menu Name</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input type="text" name="menu_name" required class="form-control col-md-7 col-xs-12" 
                                                placeholder='Menu Name' value="<?php echo $menuTitle; ?>"  onFocus="this.placeholder=''" onBlur="this.placeholder='Menu Name'">
                                             <?php echo form_error('menu_name', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Parent Menu</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <select name="root_id" class="form-control" style="width:60%; margin-bottom:5px" >
                                                	<option value="<?php echo $rootId;?>"><?php echo $rootName;?></option>
                                                    <?php foreach($root_menu->result() as $rootmenu):
															echo '<option value="'.$rootmenu->m_id.'">'.$rootmenu->menu_name.'</option>';
														endforeach;
													?>
                                                    
                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sub Parent Menu</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <div id="citydiv">
                                                            <select name="sroot_id" class="form-control" style="width:60%;">
                                                                <option value="<?php echo $srootId;?>"><?php echo $srootName;?></option>
                                                            </select>
                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Page Structure </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                 <select name="page_structure" id="page_structure" class="form-control" onchange="pageChange();" style="width:60%; margin-top:5px">
																	<?php if($page_structure!=""){?>
                                                                    <option value="<?php echo $page_structure;?>"><?php echo $page_structure;?></option>
                                                                    <?php } ?>
                                                                    <option value="content">Content</option>
                                                                    <option value="url">External Url</option>
                                                                    <option value="gallery">Picture/Video Gallery</option>
                                                                    <option value="news">News</option>
                                                                    <option value="career">Career</option>
                                                                    <option value="product_gallery">Product Gallery</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <?php 
														if($page_structure!=""){
															if($page_structure=="url") $displayurlarea = '';
															else $displayurlarea = ' style="display:none"';
														}
														else{
															 $displayurlarea = ' style="display:none"';
														}
														?>
                                                        <div id="externalLink" style="display:none">
                                                        <div class="form-group">
                                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">External URL</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                              <input type="text" name="externallink" class="form-control" placeholder="External Url" 
                                                                value="<?php echo $external_link;?>" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Target</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                               <select name="target" class="form-control">
                                                                    <option value="<?php echo $target;?>"><?php echo $target;?></option>
                                                                    <option value="_blank">New Window</option>
                                                                    <option value="_self">Same Window</option>
                                                               </select>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        
                                                        <?php /*?><div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Allignment </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                 <select name="allignment" id="allignment" class="form-control" style="width:60%; margin-top:5px">
																	<?php if($allignment!=""){?>
                                                                    <option value="<?php echo $allignment;?>"><?php echo $allignment;?></option>
                                                                    <?php } ?>
                                                                    <option value="left">Left</option>
                                                                    <option value="right">Right</option>
                                                                    <option value="center">Center</option>
                                                                </select>
                                                            </div>
                                                        </div><?php */?>      
                                              </div>
                                            </div>
                                        </div>
                                        
                               	     </div>
                                   </div> 
                                    
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <input type="hidden" name="m_id" value="<?php echo $m_id; ?>">
                                            <input type="reset" class="btn btn-primary" value="Reset">
                                            <input type="submit" name="registration" class="btn btn-success" value="Submit">
                                        </div>
                                    </div>
                               <?php echo form_close();?>
					</div>
