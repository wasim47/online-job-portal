<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Blog Detail</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>Post Name</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->

<div class="listpgWraper">
  <div class="container"> 
    
    <!-- Blog start -->
    <div class="row">
      <div class="col-md-8"> 
        <!-- Blog List start -->
        <div class="blogWraper">
          <div class="blogList blogdetailbox">
            <div class="postimg"><img src="<?php echo base_url('asset/uploads/news/'.$news_details['image']);?>" alt="<?php echo $news_details['news_title'];?>" /></div>
            <div class="post-header margin-top30">
              <h4><?php echo $news_details['news_title'];?></h4>
            </div>
            <p><?php echo $news_details['short_description'];?></p>
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
        </div>
      </div>
    </div>
  </div>
</div>