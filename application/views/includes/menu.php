<ul class="meganizr mzr-slide mzr-responsive">
               <li class="col0 "><a href="index.html">হোম</a></li>
               
               <?php 
			   	foreach($menu->result() as $fmenu){
					$menu_name=$fmenu->menu_name;
					$slug=$fmenu->slug;
					$strMenu=$fmenu->page_structure;
					$allignment=$fmenu->allignment;
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
					
					elseif($strMenu=='news' || $strMenu=='career' || $strMenu=='notice'){
							$url=base_url($strMenu);
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
					$query_scat=$this->db->query("select * from menu where root_id='".$m_id."' and sroot_id=0 and status=1 order by m_id asc");
				?>
               <li class="col1 mzr-drop">
                  <a href="<?php echo $url;?>" target="<?php echo $targetf;?>"><?php echo $menu_name;?></a>
                  <div class="mzr-content drop-two-columns">
                     <div class="one-col">
                        <ul class="mzr-links">
                           <li><a href="#">বাংলাদেশকে জানুন</a></li>
                           <li><a href="#">বঙ্গভবন</a></li>
                           <li><a href="#">প্রধানমন্ত্রীর কার্যালয়</a></li>
                           <li><a href="#">জাতীয় সংসদ</a></li>
                           <li><a href="#">মন্ত্রিপরিষদ বিভাগ</a></li>
                           <li><a href="#">বিচার ব্যবস্থা</a></li>
                        </ul>
                     </div>
                     <div class="one-col">
                        <ul class="mzr-links">
                           <li><a href="#">অধিদপ্তরসমূহ ও অন্যান্য অফিস</a></li>
                           <li><a href="#">সাংবিধানিক প্রতিষ্ঠানসমূহ</a></li>
                           <li><a href="#">বাংলাদেশের পরিসংখ্যান</a></li>
                           <li><a href="#">বাংলাদেশের পর্যটন</a></li>
                           <li><a href="#">বাংলাদেশ কোড</a></li>
                           <li><a href="#">জাতীয় বাজেট</a></li>
                        </ul>
                     </div>
                  </div>
               </li>
               
             <?php
				}
			  ?>  
            </ul>