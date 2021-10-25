<div class="footerWrap">
  <div class="container">
    <div class="row"> 
      
      
      
       <?php
               $mainmenu = $this->db->query("SELECT * FROM menu WHERE root_id = 0 AND status = 1 AND menu_type='Footer Menu' ORDER BY m_id ASC LIMIT 4");
			   if($mainmenu->num_rows() > 0){
				foreach($mainmenu->result() as $fmenu):
				$menu_name=$fmenu->menu_name;
				$slug=$fmenu->slug;
				$strMenu=$fmenu->page_structure;
				$external_link=$fmenu->external_link;
				$m_id=$fmenu->m_id;
				$targetf=$fmenu->target;
				
				if($strMenu=='url'){
					if($targetf=='_blank'){
							$url=$external_link;
						 }
						 else{
							$url=$external_link.'/'.$slug;
						 }
				}
				elseif($strMenu=='gallery'){
					if($slug=='photo-gallery'){
						$url=base_url('gallery/photo_gallery');
					}
					elseif($slug=='video-gallery'){
						$url=base_url('gallery/video_gallery');
					}
					else{
						$url=base_url();
					}
					
				}
				else{
					$url=base_url($strMenu.'/'.$slug);
				}
				$query_scat=$this->db->query("SELECT * FROM menu WHERE root_id='".$m_id."' AND sroot_id=0 AND status=1 AND menu_type='Footer Menu' ORDER BY squence ASC");
			   ?>
               <div class="col-md-2 col-sm-6">
                    <h5><?php echo $menu_name;?></h5>

                   
                      <?php if($query_scat->num_rows() > 0){?>
                 	   <ul class="quicklinks">                       
                        	 <?php 
							 $count = 0;
							 foreach($query_scat->result() as $srow){ 
								$slugs=$srow->slug;
								$strMenus=$srow->page_structure;
								$external_links=$srow->external_link;
								$m_ids=$srow->m_id;
								$targets=$srow->target;
							 $count++;
							 
							 
							 if($strMenus=='url'){
								if($targets=='_blank'){
										$urls=$external_links;
									 }
									 else{
										$urls=$external_links.'/'.$slugs;
									 }
							}
							elseif($strMenus=='gallery'){
								if($slugs=='photo-gallery'){
									$urls=base_url('gallery/photo_gallery');
								}
								elseif($slugs=='video-gallery'){
									$urls=base_url('gallery/video_gallery');
								}
								else{
									$urls=base_url();
								}
								
							}
							else{
								 $urls=base_url('content/'.$slug.'/'.$slugs);
							}
							 ?>
                                  <li><a href="<?php echo $urls;?>" target="<?php echo $targets;?>"><?php echo $srow->menu_name;?></a></li>
                              <?php 
							  }
							  ?>
                	</ul>
                     <?php } ?>
                  </div>
                           
               <?php 
					endforeach;
				}
				?>
     
      <div class="col-md-3 col-sm-12">
         <a href="<?php echo base_url();?>" style="padding:0; margin:0;">
         <img src="<?php echo base_url();?>assets/images/logo.png" alt="jobstarbd"  style="background:#fff; padding:10px;"/></a>
         
        <p style="margin-top:25px;">
       <!-- Address: House - 27 (2nd Floor), <br />
        Road - 2, Shekhertek,<br />
        Ring Road, Mohammadpur, <br />
        Dhaka - 1207.<br /><br />
		Phone: +8801754148844<br />-->
        E-mail: jobstarbd@gmail.com<br />
        Web: www.jobstarbd.com<br />
        Webmail: <a href="https://sg2plcpnl0233.prod.sin2.secureserver.net:2096/login/">info@jobstarbd.com</a><br />
        </p>
        
        <!-- Social Icons -->
        <div class="social"> 
        <a href="#." target="_blank"> <i class="fa fa-facebook-square" aria-hidden="true"></i></a> 
        <a href="#." target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a> 
        <a href="#." target="_blank"><i class="fa fa-youtube-square" aria-hidden="true"></i></a> 
        </div>
        <!-- Social Icons end --> 
      </div>
    </div>
  </div>
  <div class="row">
    	<div class="copyright">
  <div class="container">
    <div class="bttxt">&copy; 2017 Jobstarbd.com. All Rights Reserved. <a href="#">Terms of Use</a> - <a href="#">Privacy Statement</a><br />
    Reproduction of material from any jobstarbd.com pages without written permission is strictly prohibited.<br />
    Design & Development by: <a href="http://jobstarbd.com" target="_blank">www.jobstarbd.com</a>
    </div>
  </div>
</div>
    </div>
</div>
<!--Footer end--> 

<div class="row" style="height:50px;">&nbsp;</div>
<!-- Bootstrap's JavaScript --> 
<!-- Owl carousel --> 

<!--<script src="<?php echo base_url();?>assets/bg_slider/js/index.js"></script>
    
<script src="<?php echo base_url();?>assets/js/owl.carousel.js"></script> 

<script src="<?php echo base_url();?>assets/js/script.js"></script>
<script>
var app = angular.module('wasimApp',[]);
	app.controller('myCont',function($scope,$interval){
		$scope.theTime = new Date().toLocaleTimeString();
		  $interval(function () {
			  $scope.theTime = new Date().toLocaleTimeString();
		  }, 1000);
	});
</script>-->

<a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left">
<span class="glyphicon glyphicon-chevron-up"></span></a>
</body>
</html>