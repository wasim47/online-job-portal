<?php include('tophead.php');
include('class.banglaDate.php');
$bn = new BanglaDate(time());
$bn->set_time(time(), 0);
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!--<div id="preloader">
  <div id="status"></div>
</div>-->

<!--<div class="switcher" style="left:-50px;"> <a id="switch-panel" class="hide-panel"> <i class="ion-gear-a"></i> </a>
  <div id="switcher">
    <ul class="colors-list">
      <li><a href="#" class="red" id="custom-red"></a></li>
      <li><a href="#" class="green" id="custom-green"></a></li>
      <li><a href="#" class="purple" id="custom-purple"></a></li>
      <li><a href="#" class="blue" id="custom-blue"></a></li>
    </ul>
  </div>
</div>-->

<div class="health"> 
  <!-- header toolbar start -->
  <div class="header-toolbar">
    <div class="container">
      <div class="row">
        <div class="col-md-16 text-uppercase">
          <div class="row">
            <div class="col-sm-8 col-xs-16">
              <ul id="inline-popups" class="list-inline">
              <?php
               $mainmenu = $this->db->query("SELECT * FROM menu WHERE root_id = 0 AND status = 1 AND menu_type='Top Menu' ORDER BY m_id DESC");
				foreach($mainmenu->result() as $fmenu){
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
			  ?>
                <li class="hidden-xs"><a href="<?php echo $url;?>" target="<?php echo $targetf;?>"><?php echo $menu_name;?></a></li>
                <?php } ?>
                
                <li><a class="open-popup-link" href="#log-in" data-effect="mfp-zoom-in">log in</a></li>
                <li><a class="open-popup-link" href="#create-account" data-effect="mfp-zoom-in">create account</a></li>
                
                
              </ul>
            </div>
            <div class="col-xs-16 col-sm-8">
              <div class="row">
                <div id="weather" class="col-xs-16 col-sm-8 col-lg-9"></div>
                <?php /*?><div class="col-sm-12 col-lg-12 pull-right">
                	<?php 
					   echo $heading_date.' &nbsp;  | &nbsp;'.$bn->get_date1().' &nbsp; | &nbsp; ';
                       include('hijri_date.php'); ?>
                </div><?php */?>
                <div id="time-date" class="col-xs-16 col-sm-8 col-lg-7"></div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- header toolbar end --> 
  
  <!-- sticky header start -->
  <div class="sticky-header"> 
    <!-- header start -->
    <div class="container header">
      <div class="row">
        <div class="col-sm-5 col-md-5 wow fadeInUpLeft animated"><a class="navbar-brand" href="index-2.html">globalnews</a></div>
        <div class="col-sm-11 col-md-11 hidden-xs text-right"><img src="<?php echo base_url();?>assets/images/ads/468-60-ad.gif" width="468" height="60" alt=""/></div>
      </div>
    </div>
    <!-- header end --> 
    <!-- nav and search start -->
    <div class="nav-search-outer"> 
      <!-- nav start -->
      
      <nav class="navbar navbar-inverse" role="navigation">
        <div class="container">
          <div class="row">
            <div class="col-sm-16"> <a href="javascript:;" class="toggle-search pull-right"><span class="ion-ios7-search"></span></a>
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
              </div>
              <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav text-uppercase main-nav ">
                  <li class="active"><a href="<?php echo  base_url();?>">প্রথম পাতা</a></li>
					<?php foreach($newscategory->result() as $ncat):
							$subQuery=$this->db->query("select * from sub_category where cat_id='".$ncat->cat_slug."'");
							if($subQuery->num_rows()>0){
								$class='class="dropdown-toggle" data-toggle="dropdown"';
								$span='<span class="ion-ios7-arrow-down nav-icn"></span>';
								$urlcat = 'javascript:void(0)';
								$dropdown = 'class="dropdown"';
							}
							else{
								$class='';	
								$span='';
								$dropdown='';
								$urlcat = base_url('news/'.$ncat->cat_slug);
							}
							?>
                            
                          <li <?php echo $dropdown;?>> 
                          <a href="<?php echo $urlcat;?>" <?php echo $class;?>> <?php echo $ncat->cat_name.' '.$span;?></a>
                           <?php if($subQuery->num_rows()>0){ ?>
                            <ul class="dropdown-menu text-capitalize" role="menu">
                            <?php  foreach($subQuery->result() as $scat):?>
                              <li><a href="<?php echo base_url(); ?>index/news_gallery/<?php echo $scat->sub_cat_slug; ?>">
                              <span class="ion-ios7-arrow-right nav-sub-icn"></span><?php echo $scat->sub_cat_name;?></a></li>
                              <?php endforeach;?>
                           </ul>
                            <?php 
							}
							?>
                          </li>
                  		<?php endforeach;?>
                  
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- nav end --> 
        <!-- search start -->
        
        <div class="search-container ">
          <div class="container">
            <form action="#" method="" role="search">
              <input id="search-bar" placeholder="Type & Hit Enter.." autocomplete="off">
            </form>
          </div>
        </div>
        <!-- search end --> 
      </nav>
      <!--nav end--> 
    </div>
    <!-- nav and search end--> 
  </div>
