<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Blog</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>Blog</span></div>
      </div>
    </div>
  </div>
</div>

<div class="listpgWraper">
  <div class="container"> 
    
    <!-- Blog start -->
    <div class="row">
      <div class="col-md-8"> 
        <!-- Blog List start -->
        <div class="blogWraper">
          <ul class="blogList">
          	<?php foreach($eventgallery->result() as $eventsg):?>
            <li>
              <div class="row">
                <div class="col-md-2">
                  <div class="postimg"><img src="<?php echo base_url('asset/uploads/event/'.$eventsg->image);?>" alt="<?php echo $eventsg->events_name;?>" />
                  </div>
                </div>
                <div class="col-md-10">
                  <div class="post-header">
                    <h4><a href="<?php echo base_url("events/details/".$eventsg->slug);?>"><?php echo $eventsg->events_name;?></a></h4>
                  </div>
                  <p>
                  	<?php 
						$strtg = strip_tags($eventsg->events_details);
						$strlen = strlen($strtg);
						if($strlen > 300){
							 $stringCutnat = substr($strlen, 0, 300);
                			 $detailsStr = substr($stringCutnat, 0, strrpos($stringCutnat, ' ')).'.....'; 
						}
						echo $strtg;
					?>
                  </p>
                 <a href="<?php echo base_url("events/details/".$eventsg->slug);?>" class="readmore">Read More</a> </div>
              </div>
            </li>
            <?php endforeach;?>
            
            
          </ul>
        </div>
        
        <!-- Pagination -->
        <div class="pagiWrap">
          <div class="row">
            <div class="col-md-4 col-sm-6">
              <div class="showreslt">Showing 1-10</div>
            </div>
            <div class="col-md-8 col-sm-6 text-right">
              <ul class="pagination">
                <?php echo $paginationdata;?>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4"> 
        <!-- Side Bar -->
        <div class="sidebar"> 
          <!-- Search -->
          <div class="widget">
            <h5 class="widget-title">Search</h5>
            <div class="search">
              <form>
                <input type="text" class="form-control" placeholder="Search">
                <button type="submit" class="btn"><i class="fa fa-search"></i></button>
              </form>
            </div>
          </div>
          <!-- Categories -->
          <div class="widget">
            <h5 class="widget-title">Categories</h5>
            <ul class="categories">
              <li><a href="#.">Popular posts</a></li>
              <li><a href="#.">Productivity</a></li>
              <li><a href="#.">Resumes</a></li>
              <li><a href="#.">Women</a></li>
              <li><a href="#.">Top Companies</a></li>
              <li><a href="#.">Popular posts</a></li>
              <li><a href="#.">Productivity</a></li>
              <li><a href="#.">Resumes</a></li>
            </ul>
          </div>
          <!-- Recent Posts -->
          <div class="widget">
            <h5 class="widget-title">Recent Posts</h5>
            <ul class="papu-post">
              <li>
                <div class="media-left"> <a href="#."><img src="images/blog/1.jpg" alt="Blog Title"></a> </div>
                <div class="media-body"> <a class="media-heading" href="#">Integer vel magna urna. Vestibulum id nisi</a> <span>Dec 18, 2016</span> </div>
              </li>
              <li>
                <div class="media-left"> <a href="#."><img src="images/blog/2.jpg" alt="Blog Title"></a> </div>
                <div class="media-body"> <a class="media-heading" href="#">Integer vel magna urna. Vestibulum id nisi</a> <span>Dec 18, 2016</span> </div>
              </li>
              <li>
                <div class="media-left"> <a href="#."><img src="images/blog/3.jpg" alt="Blog Title"></a> </div>
                <div class="media-body"> <a class="media-heading" href="#">Integer vel magna urna. Vestibulum id nisi</a> <span>Dec 18, 2016</span> </div>
              </li>
              <li>
                <div class="media-left"> <a href="#."><img src="images/blog/4.jpg" alt="Blog Title"></a> </div>
                <div class="media-body"> <a class="media-heading" href="#">Integer vel magna urna. Vestibulum id nisi</a> <span>Dec 18, 2016</span> </div>
              </li>
            </ul>
          </div>
          <!-- Archives Posts -->
          <div class="widget">
            <h5 class="widget-title">Archives</h5>
            <ul class="archive">
              <li><a href="#.">June 2015<span>10</span></a></li>
              <li><a href="#.">May 2015<span>21</span></a></li>
              <li><a href="#.">April2015 <span>58</span></a></li>
              <li><a href="#.">March 2015 <span>25</span></a></li>
            </ul>
          </div>
          <!-- Photos -->
          <div class="widget">
            <h5 class="widget-title">Photos Streem</h5>
            <ul class="photo-steam">
              <li><a href="#."><img src="images/blog/1.jpg" alt=""></a></li>
              <li><a href="#."><img src="images/blog/2.jpg" alt=""></a></li>
              <li><a href="#."><img src="images/blog/3.jpg" alt=""></a></li>
              <li><a href="#."><img src="images/blog/4.jpg" alt=""></a></li>
              <li><a href="#."><img src="images/blog/4.jpg" alt=""></a></li>
              <li><a href="#."><img src="images/blog/3.jpg" alt=""></a></li>
              <li><a href="#."><img src="images/blog/2.jpg" alt=""></a></li>
              <li><a href="#."><img src="images/blog/1.jpg" alt=""></a></li>
            </ul>
          </div>
          <!-- Tags -->
          <div class="widget">
            <h5 class="widget-title">Tags</h5>
            <ul class="tags">
              <li><a href="#.">Amazing </a></li>
              <li><a href="#.">Envato </a></li>
              <li><a href="#.">Themes </a></li>
              <li><a href="#.">Responsiveness </a></li>
              <li><a href="#.">Developer </a></li>
              <li><a href="#.">Mobile </a></li>
              <li><a href="#.">IOS </a></li>
              <li><a href="#.">Design </a></li>
              <li><a href="#.">Jobs </a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>