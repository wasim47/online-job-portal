<script src="<?php echo base_url('assets/js/jssor.slider-22.2.16.min.js');?>" type="text/javascript"></script>
<script type="text/javascript">
        jssor_1_slider_init = function() {

            var jssor_1_options = {
              $AutoPlay: true,
              $Idle: 0,
              $AutoPlaySteps: 4,
              $SlideDuration: 2500,
              $SlideEasing: $Jease$.$Linear,
              $PauseOnHover: 4,
              $SlideWidth: 140,
              $Cols: 7
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*responsive code begin*/
            /*remove responsive code if you don't want the slider scales while window resizing*/
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 809);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*responsive code end*/
        };
		
		
		$(document).on('click', '.browse', function(){
		  var file = $(this).parent().parent().parent().find('.file');
		  file.trigger('click');
		});
		$(document).on('change', '.file', function(){
		  $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
		});
    </script>
<style>
.inputForm{
	width:80%;
	margin-bottom:5px;
	border:1px solid #ccc;
	border-radius:0px;
}
.inputForm:focus{
	border:none;
	box-shadow:#0194e8 0 0 1px 1px;
	transition: 0.3s ease-in;
	-moz-transition: 0.3s ease-in;
	-webkit-transition: 0.3s ease-in;
	-ms-transition: 0.3s ease-in;
}

.inputFormE{
	width:80%;
	margin-bottom:5px;
	border:1px solid #ccc;
	border-radius:0px;
}
.inputFormE:focus{
	border:none;
	box-shadow:#f88c13 0 0 1px 1px;
	transition: 0.3s ease-in;
	-moz-transition: 0.3s ease-in;
	-webkit-transition: 0.3s ease-in;
	-ms-transition: 0.3s ease-in;
}
.file {
  visibility: hidden;
  position: absolute;
}
.require{
	color:#f00;
}


</style>
<div class="searchwrap">
  
  <div class="row">
  		<!--<div  class="marque">
            <marquee direction="right"><h3>Join the number 1 network of Bangladeshi Professionals & Let the employers find you.</h3></marquee>
        </div>-->
    <div class="col-md-6 col-lg-6 col-sm-12" style="margin:0; padding:0">
    	<div class="row">
        	
        
    		<div class="jobseakerArea">
            <div class="jobseakerTopBar"><h2 style="color:#fff; text-align:center; text-shadow:1px 1px #999; padding:0; margin:0">Job Seekers Zone</h2></div>
        	<div class="bottom-menuJ">
                <ul>
                	<li><a href="javascript:void();" data-toggle="modal" data-target="#loginModal">Login</a></li>
                    <li><a href="javascript:void();" data-toggle="modal" data-target="#regModal">Registration</a></li>
                    <li><a href="#">My jobstarbd <span class="arrow">&#9660;</span></a>
                    	<div class="sub-bottommenuJ">
                        <div class="col-sm-6" style="margin:0; padding:0;">
                      	  <ul style="margin:0; padding:0;">
                        	<li><a href="#">Edit/View My Account</a></li>
                            <li><a href="#">Enhance/ Upgrade CV</a></li>
                            <li><a href="#">Become A Star Job Seeker</a></li>
                            <li><a href="#">Search & Apply For Jobs</a></li>
                            <li><a href="#">My Jobs</a></li>  
                            <li><a href="#">Creat Job Alert</a></li>
                        </ul>
                        </div>
                        <div class="col-sm-6" style="margin:0; padding:0;">
                      	  <ul style="margin:0; padding:0;">
                            <li><a href="#">Upload Your Video</a></li>
                            <li><a href="#">My Network</a></li>
                            <li><a href="#">Notifications</a></li>
                            <li><a href="#">Messages</a></li>                            
                            <li><a href="#">Report a Problem</a></li>
                          
                        </ul>
                        </div>
                        </div>
                    </li>
                    
                </ul>
                
                <div id="regModal" class="modal fade" role="dialog">
                	<div class="modal-dialog">
                    	<div class="modal-content">
                            <div class="modal-header" style="background:#0194e8">
                                <button type="button" class="btn btn-danger btn-xs pull-right" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title" style="width:50%; float:left; color:#fff">Job Seeker Registration</h4>
                            </div>
                            <div class="modal-body">
                            	<?php echo form_open();?>
                            	<div class="col-sm-10">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="text" name="fname" required placeholder="Full Name" class="form-control inputForm" />
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="text" name="contact" required  placeholder="Phone Number" class="form-control inputForm" />
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="email" name="email" required placeholder="E-mail Address" class="form-control inputForm" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="text" name="username" required placeholder="User Name" class="form-control inputForm" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="password" name="password" required  class="form-control inputForm"  placeholder="Password"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="password" required name="confirmpassword" class="form-control inputForm"  placeholder="Re-type Password"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                    <input type="file" name="img[]" class="file">
                                                    <div class="input-group col-xs-12" style="width:80%;" >
                                                      <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
                                                      <input type="text" class="form-control input-xs inputForm" disabled placeholder="Upload Your CV">
                                                      <span class="input-group-btn">
                                                        <button class="browse btn btn-warning input-xs" type="button"><i class="glyphicon glyphicon-search"></i> Browse</button>
                                                      </span>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12" style="margin-top:10px;">
                                                <input type="checkbox" required name="agree"/>
                                                <label>I Agree to the jobstarbd.com <a href="#">Terms & Conditions.</a></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4"></label>
                                            <div class="col-sm-8 pull-right" style="margin-top:10px; float:right">
                                            <button type="submit" class="btn btn-success btn-submit">Submit</button></div>
                                        </div>
                                     </div>
                                        <?php echo form_close();?>
                            </div>
                            <div class="modal-footer" style="border:none;">
                            	
                            </div>
                        </div>
                    </div>
                </div>
                <div id="loginModal" class="modal fade" role="dialog">
                	<div class="modal-dialog">
                    	<div class="modal-content">
                            <div class="modal-header" style="background:#0194e8">
                                <button type="button" class="btn btn-danger btn-xs pull-right" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title" style="width:50%; float:left; color:#fff">Job Seeker Login</h4>
                            </div>
                            <div class="modal-body">
                            	<?php echo form_open();?>                            	
                                <div class="form-group">
                                	<label class="control-label col-sm-4"> Username Or Email<span class="require">*</span></label>
                                    <div class="col-sm-8">
                                    	<input type="email" name="email" required placeholder="Email Address" class="form-control inputForm" />
                                    </div>
                                </div>
                                <div class="form-group">
                                	<label class="control-label col-sm-4"> Password<span class="require">*</span></label>
                                    <div class="col-sm-8">
                                    	<input type="password" name="password" required  class="form-control inputForm"  placeholder="Password"/>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                	<label class="control-label col-sm-4"></label>
                                	<div class="col-sm-8 pull-right" style="margin-top:10px; float:right">
                                    <button type="submit" class="btn btn-success btn-submit">Login</button></div>
                                </div>
                                <?php echo form_close();?>
                            </div>
                            <div class="modal-footer" style="border:none;">
                            	
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="jobseakerFormArea">
                <div class="col-sm-12 searchbar">
                  <div style="width:60%; height:auto; float:right;">
                    <input type="text" class="form-control" placeholder="Search Jobs By Keywords" style="float:left; width:78%" />
                    <input type="submit" class="btn pull-right" value="Search" style="float:left; padding:8px; font-size:18px; width:22%; text-transform:capitalize">
                  </div>
                 
                </div>
            </div>
        </div>
        </div>
    </div>
    
    
    
    
    
    <div class="col-md-6 col-lg-6 col-sm-12" style="margin:0; padding:0">
    	<div class="row">
        	
        
    		<div class="employerArea">
            <div class="employerTopBar"><h2 style="color:#fff; text-align:center; text-shadow:1px 1px #999; padding:0; margin:0">Employers Zone</h2></div>
        	<div class="bottom-menuE">
                <ul>
                	<li><a href="javascript:void();" data-toggle="modal" data-target="#eloginModal">Login</a></li>
                    <li><a href="javascript:void();" data-toggle="modal" data-target="#eregModal">Registration</a></li>
                    <li><a href="#">My jobstarbd <span class="arrow">&#9660;</span></a>
                        <div class="sub-bottommenuE">
                      	  <ul style="margin:0; padding:0;">
                        	<li><a href="#">Browse CVs</a></li>
                            <li><a href="#">Access CV Bank</a></li>
                            <li><a href="#">Receive Star Job Seeker CVs</a></li>
                            <li><a href="#">Post Jobs</a></li>
                            <li><a href="#">Services & Packages</a></li>
                        </ul>
                        </div>
                    </li>
                    
                </ul>
                
                 <div id="eregModal" class="modal fade" role="dialog">
                	<div class="modal-dialog">
                    	<div class="modal-content">
                            <div class="modal-header" style="background:#f88c13">
                                <button type="button" class="btn btn-danger btn-xs pull-right" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title" style="width:50%; float:left; color:#fff">Employers Registration</h4>
                            </div>
                            <div class="modal-body">
                            	<?php echo form_open();?>
                            	<div class="form-group">
                                	<label class="control-label col-sm-4"> Company Name <span class="require">*</span></label>
                                    <div class="col-sm-8">
                                    	<input type="text" name="fname" required placeholder="Company Name" class="form-control inputFormE" />
                                    </div>
                                </div>
                                <div class="form-group">
                                	<label class="control-label col-sm-4"> Alt. Company Name</label>
                                    <div class="col-sm-8">
                                    	<input type="text" name="lname" placeholder="Alternative Company Name" class="form-control inputFormE" />
                                    </div>
                                </div>
                                <div class="form-group">
                                	<label class="control-label col-sm-4"> Telephone<span class="require">*</span></label>
                                    <div class="col-sm-8">
                                    	<input type="text" name="contact" required  placeholder="Telephone No." class="form-control inputFormE" />
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                	<label class="control-label col-sm-4"> Business Type<span class="require">*</span></label>
                                    <div class="col-sm-8">
                                    	<select name="btype" class="form-control inputFormE" required  placeholder="Gender">
                                        	<option value="Advertising Agency">Advertising Agency</option>
                                            <option value="Airline">Airline</option>
                                            <option value="Beverage">Beverage</option>
                                            <option value="Chamber">Chamber</option>
                                            <option value="Coffee Shop">Coffee Shop</option>
                                            <option value="E-commerce">E-commerce</option>
                                            <option value="Fast Food Shop">Fast Food Shop</option>
                                            <option value="Garments Accessories">Garments Accessories</option>
                                            <option value="Interior Design">Interior Design</option>
                                            <option value="IT Enabled Service">IT Enabled Service</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                	<label class="control-label col-sm-4"> Email<span class="require">*</span></label>
                                    <div class="col-sm-8">
                                    	<input type="email" name="email" required placeholder="Email Address" class="form-control inputFormE" />
                                    </div>
                                </div>
                                <div class="form-group">
                                	<label class="control-label col-sm-4"> Username <span class="require">*</span></label>
                                    <div class="col-sm-8">
                                    	<input type="text" name="username" required placeholder="Login User Name" class="form-control inputFormE" />
                                    </div>
                                </div>
                                <div class="form-group">
                                	<label class="control-label col-sm-4"> Password<span class="require">*</span></label>
                                    <div class="col-sm-8">
                                    	<input type="password" name="password" required  class="form-control inputFormE"  placeholder="Password"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                	<label class="control-label col-sm-4"> Re-type Password<span class="require">*</span></label>
                                    <div class="col-sm-8">
                                    	<input type="password" required name="confirmpassword" class="form-control inputFormE"  placeholder="Re-type Password"/>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                	<label class="control-label col-sm-4"></label>
                                	<div class="col-sm-8 pull-right" style="margin-top:10px; float:right">
                                    <button type="submit" class="btn btn-success btn-submit">Submit</button></div>
                                </div>
                                <?php echo form_close();?>
                            </div>
                            <div class="modal-footer" style="border:none;">
                            	
                            </div>
                        </div>
                    </div>
                </div>
                 <div id="eloginModal" class="modal fade" role="dialog">
                	<div class="modal-dialog">
                    	<div class="modal-content">
                            <div class="modal-header" style="background:#f88c13">
                                <button type="button" class="btn btn-danger btn-xs pull-right" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title" style="width:50%; float:left; color:#fff">Employers Login</h4>
                            </div>
                            <div class="modal-body">
                            	<?php echo form_open();?>                            	
                                <div class="form-group">
                                	<label class="control-label col-sm-4"> Username Or Email<span class="require">*</span></label>
                                    <div class="col-sm-8">
                                    	<input type="email" name="email" required placeholder="Email Address" class="form-control inputFormE" />
                                    </div>
                                </div>
                                <div class="form-group">
                                	<label class="control-label col-sm-4"> Password<span class="require">*</span></label>
                                    <div class="col-sm-8">
                                    	<input type="password" name="password" required  class="form-control inputFormE"  placeholder="Password"/>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                	<label class="control-label col-sm-4"></label>
                                	<div class="col-sm-8 pull-right" style="margin-top:10px; float:right">
                                    <button type="submit" class="btn btn-success btn-submit">Login</button></div>
                                </div>
                                <?php echo form_close();?>
                            </div>
                            <div class="modal-footer" style="border:none;">
                            	
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="jobseakerFormArea">
                <div class="col-sm-12 searchbar">
                  <div style="width:60%; height:auto; float:right;">
                    <input type="text" class="form-control" placeholder="Search CVs by Keywords" style="float:left; width:78%" />
                    <input type="submit" class="btn pull-right" value="Browse" 
                    style="float:left; padding:8px; font-size:18px; width:22%; text-transform:capitalize; background:#fe8700">
                  </div>
                 
                </div>
            </div>
        </div>
        </div>
    </div>
    
    
    
    <?php /*?>
    
    <div class="col-md-6 col-lg-6 col-sm-12">
        <div class="employerArea">
            <div class="employerTopBar"><h2 class="text-center"  style="color:#fff; text-shadow:1px 1px #999; padding:0; margin:0">Employers</h2></div>
            <div class="jobseakerFormArea">
                <h3>Find Your Required Skill</h3>
                <div class="col-sm-10 col-sm-offset-1 searchbar">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter your job title" />
                  </div>
                  <div class="form-group">
                    <select class="form-control" style="padding:7px;">
                      <option>Organization Type</option>
                      <option>Marketing</option>
                      <option>Teaching & Education </option>
                    </select>
                  </div>
                  <div class="form-group">
                    <select class="form-control" style="padding:7px;">
                      <option>Location</option>
                      <option>Dhaka</option>
                      <option>Chittagong</option>
                      <option>Rajshahi</option>
                      <option>Khulna</option>
                      <option>Sylhet</option>
                    </select>
                  </div>
                  
                  <div class="form-group">
                    <input type="submit" class="btnEm pull-right" value="Find CVs">
                  </div>
                </div>
                <!--<div class="getstarted"><a href="#."><i class="fa fa-user" aria-hidden="true"></i> Get Started Now</a></div>-->
            </div>
        </div>
    </div><?php */?>
    
    
  		<!--<div  class="marque">
            <marquee direction="left"><h3>Join the number 1 network of Bangladeshi Professionals & Let the employers find you.</h3></marquee>
        </div>-->
  </div>
  
</div>



<?php /*?><div class="section howitwrap">
  <div class="container"> 
    <!-- title start -->
    <div class="titleTop">
      <h3>How It <span>Works?</span></h3>
    </div>
    <!-- title end -->
    <ul class="howlist row">
      <!--step 1-->
      <li class="col-md-4 col-sm-4">
        <div class="iconcircle"><i class="fa fa-user" aria-hidden="true"></i></div>
        <h4>Create An Account</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidid ut labore et dolore magna aliqua.</p>
      </li>
      <!--step 1 end--> 
      
      <!--step 2-->
      <li class="col-md-4 col-sm-4">
        <div class="iconcircle"><i class="fa fa-black-tie" aria-hidden="true"></i></div>
        <h4>Search Desired Job</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidid ut labore et dolore magna aliqua.</p>
      </li>
      <!--step 2 end--> 
      
      <!--step 3-->
      <li class="col-md-4 col-sm-4">
        <div class="iconcircle"><i class="fa fa-file-text" aria-hidden="true"></i></div>
        <h4>Send Your Resume</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidid ut labore et dolore magna aliqua.</p>
      </li>
      <!--step 3 end-->
    </ul>
  </div>
</div><?php */?>
<div class="section greybg" style="margin:0; padding:0;">
  <div class="container" style="margin-top:10px; background:#fafafa"> 
  	<div class="col-md-5 col-lg-5 col-sm-12" style="margin:0; padding:0;">
    	<div class="topjobseekerArea">
            <div class="titleTop">
              <h3>Top <span style="color:#00A2FF">Job Seekers</span></h3>
            </div>
            <ul class="jobseekerList">
              <!--employer-->
              <li data-toggle="tooltip" data-placement="bottom" title="" data-html="true"
              data-original-title="Mohamamd Wasim <br> Software Developer <br> Mirpur Dhaka"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/candidates/01.jpg" alt="Your alt text here" style="border-radius:50%;" />
                  <h5 style="font-size:11px;">Mohamamd Wasim</h5>
              </a>
              </li>
              <li data-toggle="tooltip" data-placement="bottom" title="" data-html="true"
              data-original-title="Foysal Ahmed <br> Software Developer <br> Natunbazar Dhaka"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/candidates/05.jpg" alt="Your alt text here" style="border-radius:50%;" />
                  <h5 style="font-size:11px;">Foysal Ahmed</h5>
              </a>
              </li>
              <li data-toggle="tooltip" data-placement="bottom" title="" data-html="true"
              data-original-title="Tushar Khan <br> Software Developer <br> Mirpur Dhaka"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/candidates/02.jpg" alt="Your alt text here" style="border-radius:50%;" />
                  <h5 style="font-size:11px;">Tushar Khan</h5>
              </a>
              </li>
              <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Ashfaqur Rahman <br> Software Developer <br> Mirpur Dhaka"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/candidates/03.jpg" alt="Your alt text here" style="border-radius:50%;" />
                  <h5 style="font-size:11px;">Ashfaqur Rahman</h5>
              </a>
              </li>
              <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Mehedi Hasan <br> Software Developer <br> Mirpur Dhaka"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/candidates/04.jpg" alt="Your alt text here" style="border-radius:50%;" />
                  <h5 style="font-size:11px;">Mehedi Hasan</h5>
              </a>
              </li>
              <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Faruk Hasan <br> Software Developer <br> Mirpur Dhaka"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/candidates/06.jpg" alt="Your alt text here" style="border-radius:50%;" />
                  <h5 style="font-size:11px;">Faruk Hasan</h5>
              </a>
              </li>
              <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Ibrahim Khalil <br> Software Developer <br> Mirpur Dhaka"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/candidates/07.jpg" alt="Your alt text here" style="border-radius:50%;" />
                  <h5 style="font-size:11px;">Ibrahim Khalil</h5>
              </a>
              </li>
              <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Zulkarnain <br> Software Developer <br> Mirpur Dhaka"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/candidates/09.jpg" alt="Your alt text here" style="border-radius:50%;" />
                  <h5 style="font-size:11px;">Zulkarnain</h5>
              </a>
              </li>
              <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Yusuf Sagar <br> Software Developer <br> Mirpur Dhaka"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/candidates/08.jpg" alt="Your alt text here" style="border-radius:50%;" />
                  <h5 style="font-size:11px;">Yusuf Sagar</h5>
              </a>
              </li>
              
              
              <!--employer-->
            </ul>
        </div>
    </div>
    <div class="col-md-5 col-lg-5 col-sm-12" style="margin:0; padding:0;">
    	<div class="topEmployerArea">
            <div class="titleTop">
              <h3>Top <span style="color:#65BE6A">Employers</span></h3>
            </div>
            <ul class="employerList">
              <!--employer-->
              <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Logic NS <br> IT <br> Korea"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/employers/partex.png" alt="Your alt text here" style="width:100%; height:116px"/></a>
              </li>
              
              <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Logic NS <br> IT <br> Korea"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/employers/navana.png" alt="Your alt text here" style="width:100%; height:116px"/></a>
              </li>
              <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Logic NS <br> IT <br> Korea"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/employers/brac.png" alt="Your alt text here" style="width:100%; height:116px"/></a>
              </li>
              <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Logic NS <br> IT <br> Korea"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/employers/prangr.png" alt="Your alt text here" style="width:100%; height:116px"/></a>
              </li>
              <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Logic NS <br> IT <br> Korea"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/employers/baximco.png" alt="Your alt text here" style="width:100%; height:116px"/></a>
              </li>
              <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Logic NS <br> IT <br> Korea"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/employers/eqim.jpg" alt="Your alt text here" style="width:100%; height:116px"/></a>
              </li>
              <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Logic NS <br> IT <br> Korea"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/employers/huwai.png" alt="Your alt text here" style="width:100%; height:116px"/></a>
              </li>
              <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Logic NS <br> IT <br> Korea"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/employers/agricul_bank.png" alt="Your alt text here" style="width:100%; height:116px"/></a>
              </li>
              <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Logic NS <br> IT <br> Korea"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/employers/develpalw.png" alt="Your alt text here" style="width:100%; height:116px"/></a>
              </li>
            </ul>
        </div>
    </div>
    <div class="col-md-2 col-lg-2 col-sm-12" style="margin:0; padding:0;">
    	<img src="<?php echo base_url('assets/images/ad/airtel-120X45.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/gi-ns-120X45-2492015.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/amazon-120X45.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/genpact-ns-120X45-1722017.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/atos-14092016.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/gen-120X45-732017.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        
    </div>
  </div>
</div>
<div class="section" style="margin:0; padding:0">
  
  <div class="container" style="margin-top:10px; background:#fafafa"> 
     <div class="col-md-10 col-lg-10 col-sm-12" style="margin:0; padding:0;">
     	<div class="titleTop">
      <h3 style="color:#333; font-size:30px; text-align:left; padding:5px;">Jobs By</h3>
    </div>
  	  <div class="topsearchwrap">
  		<div class="panel userbtns">
                <div class="panel-heading" style="width:100%;">
                	<div class="col-sm-4" style="margin:0; padding:0">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1warning" data-toggle="tab">Functional</a></li>
                            <li><a href="#tab2warning" data-toggle="tab">Industry</a></li>
                            <li><a href="#tab3warning" data-toggle="tab">Division</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-8" style="margin:0; padding:0">
                        <ul class="specialJobs" style="float:right; text-align:right">
                            <li><a href="#">Gov. Jobs</a></li>
                            <li><a href="#">New Jobs</a></li>
                            <li><a href="#">Deadline Tomorrow</a></li>
                            <li><a href="#">Internships</a></li>
                            <li><a href="#">Freelance Jobs</a></li>
                            <li><a href="#">Tution</a></li>
                            <li><a href="#">Overseas Jobs</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="tab-content" style="width:100%; float:left; margin-top:20px;">
                        <div class="tab-pane fade in active" id="tab1warning">
                         <h5 style="background:none; padding:0; margin:0; text-align:left; font-size:17px; color:#0066CC; margin:0 0 10px 5px; text-transform:capitalize"
                         >Browse Functional Categories</h5>
                        	<ul class="row catelist">
                             <?php foreach($functionalCategory->result() as $fRow):
							 	$jobCOunt = $this->db->query("SELECT COUNT(job_id) as totalCount FROM jobpost WHERE job_category='".$fRow->sub_cat_slug."'");
								$rowD = $jobCOunt->row_array();
							 ?>
                              <li class="col-md-4 col-sm-4"><a href="<?php echo base_url('joblist/'.$fRow->sub_cat_slug);?>">
							  <?php echo $fRow->sub_cat_name;?><span> (<?php echo $rowD['totalCount'];?>)</span></a></li>
                              <?php endforeach;?>
                            </ul>
                        	 
                        </div>
                        <div class="tab-pane fade" id="tab2warning">
                        	<h5 style="background:none; padding:0; margin:0; text-align:left; font-size:17px; color:#0066CC; margin:0 0 10px 5px; text-transform:capitalize">Browse Industrial Categories</h5>
                        	<ul class="row catelist">
                              <li class="col-md-4 col-sm-4"><a href="#.">Marketing <span>(174)</span></a></li>
                              <li class="col-md-4 col-sm-4"><a href="#.">Teaching &amp; Education <span>(174)</span></a></li>
                              <li class="col-md-4 col-sm-4"><a href="#.">Writing <span>(174)</span></a></li>
                              <li class="col-md-4 col-sm-4"><a href="#.">Telemarketing <span>(174)</span></a></li>
                              <li class="col-md-4 col-sm-4"><a href="#.">Administration <span>(174)</span></a></li>
                              <li class="col-md-4 col-sm-4"><a href="#.">Clerical &amp; Front Office <span>(174)</span></a></li>
                              <li class="col-md-4 col-sm-4"><a href="#.">SEO <span>(174)</span></a></li>
                              <li class="col-md-4 col-sm-4"><a href="#.">Engineering <span>(174)</span></a></li>
                              <li class="col-md-4 col-sm-4"><a href="#.">Software & Web <span>(174)</span></a></li>
                              <li class="col-md-4 col-sm-4"><a href="#.">Sales & BD <span>(174)</span></a></li>
                              <li class="col-md-4 col-sm-4"><a href="#.">Customer Service <span>(174)</span></a></li>
                              <li class="col-md-4 col-sm-4"><a href="#.">Creative Design <span>(174)</span></a></li>
                              <li class="col-md-4 col-sm-4"><a href="#.">Accounts & Finance <span>(174)</span></a></li>
                              <li class="col-md-4 col-sm-4"><a href="#.">Web Design <span>(174)</span></a></li>
                              <li class="col-md-4 col-sm-4"><a href="#.">Software & Web <span>(174)</span></a></li>
                              <li class="col-md-4 col-sm-4"><a href="#.">Sales & BD <span>(174)</span></a></li>
                              <li class="col-md-4 col-sm-4"><a href="#.">Customer Service <span>(174)</span></a></li>
                              <li class="col-md-4 col-sm-4"><a href="#.">Creative Design <span>(174)</span></a></li>
                              <li class="col-md-4 col-sm-4"><a href="#.">Accounts & Finance <span>(174)</span></a></li>
                              <li class="col-md-4 col-sm-4"><a href="#.">Web Design <span>(174)</span></a></li>
                              <li class="col-md-4 col-sm-4"><a href="#.">Creative Design <span>(174)</span></a></li>
                              <li class="col-md-4 col-sm-4"><a href="#.">Accounts & Finance <span>(174)</span></a></li>
                              <li class="col-md-4 col-sm-4"><a href="#.">Web Design <span>(174)</span></a></li>
                               <li class="col-md-4 col-sm-4"><a href="#.">Web Design <span>(174)</span></a></li>
                              <li class="col-md-4 col-sm-4"><a href="#.">SEO <span>(174)</span></a></li>
                              <li class="col-md-4 col-sm-4"><a href="#.">Engineering <span>(174)</span></a></li>
                              <li class="col-md-4 col-sm-4"><a href="#.">Software & Web <span>(174)</span></a></li>
                              <li class="col-md-4 col-sm-4"><a href="#.">Sales & BD <span>(174)</span></a></li>
                              <li class="col-md-4 col-sm-4"><a href="#.">Customer Service <span>(174)</span></a></li>
                              <li class="col-md-4 col-sm-4"><a href="#.">Creative Design <span>(174)</span></a></li>
                              <li class="col-md-4 col-sm-4"><a href="#.">Accounts & Finance <span>(174)</span></a></li>
                              <li class="col-md-4 col-sm-4"><a href="#.">Web Design <span>(174)</span></a></li>
                              <li class="col-md-4 col-sm-4"><a href="#.">Software & Web <span>(174)</span></a></li>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="tab3warning">
                        	<h5 style="background:none; padding:0; margin:0; text-align:left; font-size:17px; color:#0066CC; margin:0 0 10px 5px; text-transform:capitalize">Search By Division</h5>
                                <ul class="row catelist">
                                  <li class="col-md-3 col-sm-3 col-xs-4"><a href="#.">Dhaka</a></li>
                                  <li class="col-md-3 col-sm-3 col-xs-4"><a href="#.">Barisal</a></li>
                                  <li class="col-md-3 col-sm-3 col-xs-4"><a href="#.">Chittagong</a></li>
                                  <li class="col-md-3 col-sm-3 col-xs-4"><a href="#.">Khulna</a></li>
                                  <li class="col-md-3 col-sm-3 col-xs-4"><a href="#.">Rajshahi</a></li>
                                  <li class="col-md-3 col-sm-3 col-xs-4"><a href="#.">Sylhet</a></li>
                                  <li class="col-md-3 col-sm-3 col-xs-4"><a href="#.">Rangpur</a></li>
                                  <li class="col-md-3 col-sm-3 col-xs-4"><a href="#.">Mymensingh</a></li>
                                </ul>
                        
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div>
    <div class="col-md-2 col-lg-2 col-sm-12" style="margin:0; padding:0;">
    	<img src="<?php echo base_url('assets/images/ad/airtel-120X45.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/gi-ns-120X45-2492015.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/amazon-120X45.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/genpact-ns-120X45-1722017.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/atos-14092016.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/genpact-ns-120X45-1722017.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        
        
    </div>
  </div>
</div>
<div class="section" style="margin:0; padding:0">
  <div class="container" style="margin-top:10px; background:#fafafa"> 
    <div class="col-md-10 col-lg-10 col-sm-12" style="margin:0; padding:0;">
        <div class="titleTop" style="margin-top:20px;">
          <h3 style="margin:0; padding:0">Hot <span>Jobs</span></h3>
        </div>
        <?php /*?><ul class="jobslist">
          <li class="col-md-4" style="margin:0; padding:0">
            <div class="jobint">
              <div class="row">
                <div class="col-md-3 col-sm-3"><img src="<?php echo base_url();?>assets/images/employers/emplogo1.jpg" alt="Company Name"/></div>
                <div class="col-md-9 col-sm-9">
                  <h4><a href="#">Technical Database Engineer</a></h4>
                  <div class="company"><a href="#.">Datebase Management Company</a></div>
                  <div class="jobloc">Experience   - <span>01 to 05 years</span></div>
                  <div class="jobloc">Location   - <span>Dhaka, Bangladesh</span></div>
                  <!--<a href="#." class="applybtn">Apply Now</a>-->
                </div>
                <!--<div class="col-md-3 col-sm-3"><a href="#." class="applybtn">Apply Now</a></div>-->
              </div>
            </div>
          </li>
          <li class="col-md-4" style="margin:0; padding:0">
            <div class="jobint">
              <div class="row">
                <div class="col-md-3 col-sm-3"><img src="<?php echo base_url();?>assets/images/employers/emplogo1.jpg" alt="Company Name"/></div>
                <div class="col-md-9 col-sm-9">
                  <h4><a href="#">Technical Database Engineer</a></h4>
                  <div class="company"><a href="#.">Datebase Management Company</a></div>
                  <div class="jobloc">Experience   - <span>01 to 05 years</span></div>
                  <div class="jobloc">Location   - <span>Dhaka, Bangladesh</span></div>
                  <!--<a href="#." class="applybtn">Apply Now</a>-->
                </div>
                <!--<div class="col-md-3 col-sm-3"><a href="#." class="applybtn">Apply Now</a></div>-->
              </div>
            </div>
          </li>
          <li class="col-md-4" style="margin:0; padding:0">
            <div class="jobint">
              <div class="row">
                <div class="col-md-3 col-sm-3"><img src="<?php echo base_url();?>assets/images/employers/emplogo1.jpg" alt="Company Name"/></div>
                <div class="col-md-9 col-sm-9">
                  <h4><a href="#">Technical Database Engineer</a></h4>
                  <div class="company"><a href="#.">Datebase Management Company</a></div>
                  <div class="jobloc">Experience   - <span>01 to 05 years</span></div>
                  <div class="jobloc">Location   - <span>Dhaka, Bangladesh</span></div>
                  <!--<a href="#." class="applybtn">Apply Now</a>-->
                </div>
                <!--<div class="col-md-3 col-sm-3"><a href="#." class="applybtn">Apply Now</a></div>-->
              </div>
            </div>
          </li>
          <li class="col-md-4" style="margin:0; padding:0">
            <div class="jobint">
              <div class="row">
                <div class="col-md-3 col-sm-3"><img src="<?php echo base_url();?>assets/images/employers/emplogo1.jpg" alt="Company Name"/></div>
                <div class="col-md-9 col-sm-9">
                  <h4><a href="#">Technical Database Engineer</a></h4>
                  <div class="company"><a href="#.">Datebase Management Company</a></div>
                  <div class="jobloc">Experience   - <span>01 to 05 years</span></div>
                  <div class="jobloc">Location   - <span>Dhaka, Bangladesh</span></div>
                  <!--<a href="#." class="applybtn">Apply Now</a>-->
                </div>
                <!--<div class="col-md-3 col-sm-3"><a href="#." class="applybtn">Apply Now</a></div>-->
              </div>
            </div>
          </li>
          <li class="col-md-4" style="margin:0; padding:0">
            <div class="jobint">
              <div class="row">
                <div class="col-md-3 col-sm-3"><img src="<?php echo base_url();?>assets/images/employers/emplogo1.jpg" alt="Company Name"/></div>
                <div class="col-md-9 col-sm-9">
                  <h4><a href="#">Technical Database Engineer</a></h4>
                  <div class="company"><a href="#.">Datebase Management Company</a></div>
                  <div class="jobloc">Experience   - <span>01 to 05 years</span></div>
                  <div class="jobloc">Location   - <span>Dhaka, Bangladesh</span></div>
                  <!--<a href="#." class="applybtn">Apply Now</a>-->
                </div>
                <!--<div class="col-md-3 col-sm-3"><a href="#." class="applybtn">Apply Now</a></div>-->
              </div>
            </div>
          </li>
          <li class="col-md-4" style="margin:0; padding:0">
            <div class="jobint">
              <div class="row">
                <div class="col-md-3 col-sm-3"><img src="<?php echo base_url();?>assets/images/employers/emplogo1.jpg" alt="Company Name"/></div>
                <div class="col-md-9 col-sm-9">
                  <h4><a href="#">Technical Database Engineer</a></h4>
                  <div class="company"><a href="#.">Datebase Management Company</a></div>
                  <div class="jobloc">Experience   - <span>01 to 05 years</span></div>
                  <div class="jobloc">Location   - <span>Dhaka, Bangladesh</span></div>
                  <!--<a href="#." class="applybtn">Apply Now</a>-->
                </div>
                <!--<div class="col-md-3 col-sm-3"><a href="#." class="applybtn">Apply Now</a></div>-->
              </div>
            </div>
          </li>
          <li class="col-md-4" style="margin:0; padding:0">
            <div class="jobint">
              <div class="row">
                <div class="col-md-3 col-sm-3"><img src="<?php echo base_url();?>assets/images/employers/emplogo1.jpg" alt="Company Name"/></div>
                <div class="col-md-9 col-sm-9">
                  <h4><a href="#">Technical Database Engineer</a></h4>
                  <div class="company"><a href="#.">Datebase Management Company</a></div>
                  <div class="jobloc">Experience   - <span>01 to 05 years</span></div>
                  <div class="jobloc">Location   - <span>Dhaka, Bangladesh</span></div>
                  <!--<a href="#." class="applybtn">Apply Now</a>-->
                </div>
                <!--<div class="col-md-3 col-sm-3"><a href="#." class="applybtn">Apply Now</a></div>-->
              </div>
            </div>
          </li>
          <li class="col-md-4" style="margin:0; padding:0">
            <div class="jobint">
              <div class="row">
                <div class="col-md-3 col-sm-3"><img src="<?php echo base_url();?>assets/images/employers/emplogo1.jpg" alt="Company Name"/></div>
                <div class="col-md-9 col-sm-9">
                  <h4><a href="#">Technical Database Engineer</a></h4>
                  <div class="company"><a href="#.">Datebase Management Company</a></div>
                  <div class="jobloc">Experience   - <span>01 to 05 years</span></div>
                  <div class="jobloc">Location   - <span>Dhaka, Bangladesh</span></div>
                  <!--<a href="#." class="applybtn">Apply Now</a>-->
                </div>
                <!--<div class="col-md-3 col-sm-3"><a href="#." class="applybtn">Apply Now</a></div>-->
              </div>
            </div>
          </li>
          <li class="col-md-4" style="margin:0; padding:0">
            <div class="jobint">
              <div class="row">
                <div class="col-md-3 col-sm-3"><img src="<?php echo base_url();?>assets/images/employers/emplogo1.jpg" alt="Company Name"/></div>
                <div class="col-md-9 col-sm-9">
                  <h4><a href="#">Technical Database Engineer</a></h4>
                  <div class="company"><a href="#.">Datebase Management Company</a></div>
                  <div class="jobloc">Experience   - <span>01 to 05 years</span></div>
                  <div class="jobloc">Location   - <span>Dhaka, Bangladesh</span></div>
                  <!--<a href="#." class="applybtn">Apply Now</a>-->
                </div>
                <!--<div class="col-md-3 col-sm-3"><a href="#." class="applybtn">Apply Now</a></div>-->
              </div>
            </div>
          </li>
          <li class="col-md-4" style="margin:0; padding:0">
            <div class="jobint">
              <div class="row">
                <div class="col-md-3 col-sm-3"><img src="<?php echo base_url();?>assets/images/employers/emplogo1.jpg" alt="Company Name"/></div>
                <div class="col-md-9 col-sm-9">
                  <h4><a href="#">Technical Database Engineer</a></h4>
                  <div class="company"><a href="#.">Datebase Management Company</a></div>
                  <div class="jobloc">Experience   - <span>01 to 05 years</span></div>
                  <div class="jobloc">Location   - <span>Dhaka, Bangladesh</span></div>
                  <!--<a href="#." class="applybtn">Apply Now</a>-->
                </div>
                <!--<div class="col-md-3 col-sm-3"><a href="#." class="applybtn">Apply Now</a></div>-->
              </div>
            </div>
          </li>
          <li class="col-md-4" style="margin:0; padding:0">
            <div class="jobint">
              <div class="row">
                <div class="col-md-3 col-sm-3"><img src="<?php echo base_url();?>assets/images/employers/emplogo1.jpg" alt="Company Name"/></div>
                <div class="col-md-9 col-sm-9">
                  <h4><a href="#">Technical Database Engineer</a></h4>
                  <div class="company"><a href="#.">Datebase Management Company</a></div>
                  <div class="jobloc">Experience   - <span>01 to 05 years</span></div>
                  <div class="jobloc">Location   - <span>Dhaka, Bangladesh</span></div>
                  <!--<a href="#." class="applybtn">Apply Now</a>-->
                </div>
                <!--<div class="col-md-3 col-sm-3"><a href="#." class="applybtn">Apply Now</a></div>-->
              </div>
            </div>
          </li>
          <li class="col-md-4" style="margin:0; padding:0">
            <div class="jobint">
              <div class="row">
                <div class="col-md-3 col-sm-3"><img src="<?php echo base_url();?>assets/images/employers/emplogo1.jpg" alt="Company Name"/></div>
                <div class="col-md-9 col-sm-9">
                  <h4><a href="#">Technical Database Engineer</a></h4>
                  <div class="company"><a href="#.">Datebase Management Company</a></div>
                  <div class="jobloc">Experience   - <span>01 to 05 years</span></div>
                  <div class="jobloc">Location   - <span>Dhaka, Bangladesh</span></div>
                  <!--<a href="#." class="applybtn">Apply Now</a>-->
                </div>
                <!--<div class="col-md-3 col-sm-3"><a href="#." class="applybtn">Apply Now</a></div>-->
              </div>
            </div>
          </li>
          <li class="col-md-4" style="margin:0; padding:0">
            <div class="jobint">
              <div class="row">
                <div class="col-md-3 col-sm-3"><img src="<?php echo base_url();?>assets/images/employers/emplogo1.jpg" alt="Company Name"/></div>
                <div class="col-md-9 col-sm-9">
                  <h4><a href="#">Technical Database Engineer</a></h4>
                  <div class="company"><a href="#.">Datebase Management Company</a></div>
                  <div class="jobloc">Experience   - <span>01 to 05 years</span></div>
                  <div class="jobloc">Location   - <span>Dhaka, Bangladesh</span></div>
                  <!--<a href="#." class="applybtn">Apply Now</a>-->
                </div>
                <!--<div class="col-md-3 col-sm-3"><a href="#." class="applybtn">Apply Now</a></div>-->
              </div>
            </div>
          </li>
          <li class="col-md-4" style="margin:0; padding:0">
            <div class="jobint">
              <div class="row">
                <div class="col-md-3 col-sm-3"><img src="<?php echo base_url();?>assets/images/employers/emplogo1.jpg" alt="Company Name"/></div>
                <div class="col-md-9 col-sm-9">
                  <h4><a href="#">Technical Database Engineer</a></h4>
                  <div class="company"><a href="#.">Datebase Management Company</a></div>
                  <div class="jobloc">Experience   - <span>01 to 05 years</span></div>
                  <div class="jobloc">Location   - <span>Dhaka, Bangladesh</span></div>
                  <!--<a href="#." class="applybtn">Apply Now</a>-->
                </div>
                <!--<div class="col-md-3 col-sm-3"><a href="#." class="applybtn">Apply Now</a></div>-->
              </div>
            </div>
          </li>
          <li class="col-md-4" style="margin:0; padding:0">
            <div class="jobint">
              <div class="row">
                <div class="col-md-3 col-sm-3"><img src="<?php echo base_url();?>assets/images/employers/emplogo1.jpg" alt="Company Name"/></div>
                <div class="col-md-9 col-sm-9">
                  <h4><a href="#">Technical Database Engineer</a></h4>
                  <div class="company"><a href="#.">Datebase Management Company</a></div>
                  <div class="jobloc">Experience   - <span>01 to 05 years</span></div>
                  <div class="jobloc">Location   - <span>Dhaka, Bangladesh</span></div>
                  <!--<a href="#." class="applybtn">Apply Now</a>-->
                </div>
                <!--<div class="col-md-3 col-sm-3"><a href="#." class="applybtn">Apply Now</a></div>-->
              </div>
            </div>
          </li>
          <li class="col-md-4" style="margin:0; padding:0">
            <div class="jobint">
              <div class="row">
                <div class="col-md-3 col-sm-3"><img src="<?php echo base_url();?>assets/images/employers/emplogo1.jpg" alt="Company Name"/></div>
                <div class="col-md-9 col-sm-9">
                  <h4><a href="#">Technical Database Engineer</a></h4>
                  <div class="company"><a href="#.">Datebase Management Company</a></div>
                  <div class="jobloc">Experience   - <span>01 to 05 years</span></div>
                  <div class="jobloc">Location   - <span>Dhaka, Bangladesh</span></div>
                  <!--<a href="#." class="applybtn">Apply Now</a>-->
                </div>
                <!--<div class="col-md-3 col-sm-3"><a href="#." class="applybtn">Apply Now</a></div>-->
              </div>
            </div>
          </li>
          <li class="col-md-4" style="margin:0; padding:0">
            <div class="jobint">
              <div class="row">
                <div class="col-md-3 col-sm-3"><img src="<?php echo base_url();?>assets/images/employers/emplogo1.jpg" alt="Company Name"/></div>
                <div class="col-md-9 col-sm-9">
                  <h4><a href="#">Technical Database Engineer</a></h4>
                  <div class="company"><a href="#.">Datebase Management Company</a></div>
                  <div class="jobloc">Experience   - <span>01 to 05 years</span></div>
                  <div class="jobloc">Location   - <span>Dhaka, Bangladesh</span></div>
                  <!--<a href="#." class="applybtn">Apply Now</a>-->
                </div>
                <!--<div class="col-md-3 col-sm-3"><a href="#." class="applybtn">Apply Now</a></div>-->
              </div>
            </div>
          </li>
          <li class="col-md-4" style="margin:0; padding:0">
            <div class="jobint">
              <div class="row">
                <div class="col-md-3 col-sm-3"><img src="<?php echo base_url();?>assets/images/employers/emplogo1.jpg" alt="Company Name"/></div>
                <div class="col-md-9 col-sm-9">
                  <h4><a href="#">Technical Database Engineer</a></h4>
                  <div class="company"><a href="#.">Datebase Management Company</a></div>
                  <div class="jobloc">Experience   - <span>01 to 05 years</span></div>
                  <div class="jobloc">Location   - <span>Dhaka, Bangladesh</span></div>
                  <!--<a href="#." class="applybtn">Apply Now</a>-->
                </div>
                <!--<div class="col-md-3 col-sm-3"><a href="#." class="applybtn">Apply Now</a></div>-->
              </div>
            </div>
          </li>
          <li class="col-md-4" style="margin:0; padding:0">
            <div class="jobint">
              <div class="row">
                <div class="col-md-3 col-sm-3"><img src="<?php echo base_url();?>assets/images/employers/emplogo1.jpg" alt="Company Name"/></div>
                <div class="col-md-9 col-sm-9">
                  <h4><a href="#">Technical Database Engineer</a></h4>
                  <div class="company"><a href="#.">Datebase Management Company</a></div>
                  <div class="jobloc">Experience   - <span>01 to 05 years</span></div>
                  <div class="jobloc">Location   - <span>Dhaka, Bangladesh</span></div>
                  <!--<a href="#." class="applybtn">Apply Now</a>-->
                </div>
                <!--<div class="col-md-3 col-sm-3"><a href="#." class="applybtn">Apply Now</a></div>-->
              </div>
            </div>
          </li>
          <li class="col-md-4" style="margin:0; padding:0">
            <div class="jobint">
              <div class="row">
                <div class="col-md-3 col-sm-3"><img src="<?php echo base_url();?>assets/images/employers/emplogo1.jpg" alt="Company Name"/></div>
                <div class="col-md-9 col-sm-9">
                  <h4><a href="#">Technical Database Engineer</a></h4>
                  <div class="company"><a href="#.">Datebase Management Company</a></div>
                  <div class="jobloc">Experience   - <span>01 to 05 years</span></div>
                  <div class="jobloc">Location   - <span>Dhaka, Bangladesh</span></div>
                  <!--<a href="#." class="applybtn">Apply Now</a>-->
                </div>
                <!--<div class="col-md-3 col-sm-3"><a href="#." class="applybtn">Apply Now</a></div>-->
              </div>
            </div>
          </li>
          <li class="col-md-4" style="margin:0; padding:0">
            <div class="jobint">
              <div class="row">
                <div class="col-md-3 col-sm-3"><img src="<?php echo base_url();?>assets/images/employers/emplogo1.jpg" alt="Company Name"/></div>
                <div class="col-md-9 col-sm-9">
                  <h4><a href="#">Technical Database Engineer</a></h4>
                  <div class="company"><a href="#.">Datebase Management Company</a></div>
                  <div class="jobloc">Experience   - <span>01 to 05 years</span></div>
                  <div class="jobloc">Location   - <span>Dhaka, Bangladesh</span></div>
                  <!--<a href="#." class="applybtn">Apply Now</a>-->
                </div>
                <!--<div class="col-md-3 col-sm-3"><a href="#." class="applybtn">Apply Now</a></div>-->
              </div>
            </div>
          </li>
          <li class="col-md-4" style="margin:0; padding:0">
            <div class="jobint">
              <div class="row">
                <div class="col-md-3 col-sm-3"><img src="<?php echo base_url();?>assets/images/employers/emplogo1.jpg" alt="Company Name"/></div>
                <div class="col-md-9 col-sm-9">
                  <h4><a href="#">Technical Database Engineer</a></h4>
                  <div class="company"><a href="#.">Datebase Management Company</a></div>
                  <div class="jobloc">Experience   - <span>01 to 05 years</span></div>
                  <div class="jobloc">Location   - <span>Dhaka, Bangladesh</span></div>
                  <!--<a href="#." class="applybtn">Apply Now</a>-->
                </div>
                <!--<div class="col-md-3 col-sm-3"><a href="#." class="applybtn">Apply Now</a></div>-->
              </div>
            </div>
          </li>
          <li class="col-md-4" style="margin:0; padding:0">
            <div class="jobint">
              <div class="row">
                <div class="col-md-3 col-sm-3"><img src="<?php echo base_url();?>assets/images/employers/emplogo1.jpg" alt="Company Name"/></div>
                <div class="col-md-9 col-sm-9">
                  <h4><a href="#">Technical Database Engineer</a></h4>
                  <div class="company"><a href="#.">Datebase Management Company</a></div>
                  <div class="jobloc">Experience   - <span>01 to 05 years</span></div>
                  <div class="jobloc">Location   - <span>Dhaka, Bangladesh</span></div>
                  <!--<a href="#." class="applybtn">Apply Now</a>-->
                </div>
                <!--<div class="col-md-3 col-sm-3"><a href="#." class="applybtn">Apply Now</a></div>-->
              </div>
            </div>
          </li>
          <li class="col-md-4" style="margin:0; padding:0">
            <div class="jobint">
              <div class="row">
                <div class="col-md-3 col-sm-3"><img src="<?php echo base_url();?>assets/images/employers/emplogo1.jpg" alt="Company Name"/></div>
                <div class="col-md-9 col-sm-9">
                  <h4><a href="#">Technical Database Engineer</a></h4>
                  <div class="company"><a href="#.">Datebase Management Company</a></div>
                  <div class="jobloc">Experience   - <span>01 to 05 years</span></div>
                  <div class="jobloc">Location   - <span>Dhaka, Bangladesh</span></div>
                  <!--<a href="#." class="applybtn">Apply Now</a>-->
                </div>
                <!--<div class="col-md-3 col-sm-3"><a href="#." class="applybtn">Apply Now</a></div>-->
              </div>
            </div>
          </li>
          <li class="col-md-4" style="margin:0; padding:0">
            <div class="jobint">
              <div class="row">
                <div class="col-md-3 col-sm-3"><img src="<?php echo base_url();?>assets/images/employers/emplogo1.jpg" alt="Company Name"/></div>
                <div class="col-md-9 col-sm-9">
                  <h4><a href="#">Technical Database Engineer</a></h4>
                  <div class="company"><a href="#.">Datebase Management Company</a></div>
                  <div class="jobloc">Experience   - <span>01 to 05 years</span></div>
                  <div class="jobloc">Location   - <span>Dhaka, Bangladesh</span></div>
                  <!--<a href="#." class="applybtn">Apply Now</a>-->
                </div>
                <!--<div class="col-md-3 col-sm-3"><a href="#." class="applybtn">Apply Now</a></div>-->
              </div>
            </div>
          </li>
          <li class="col-md-4" style="margin:0; padding:0">
            <div class="jobint">
              <div class="row">
                <div class="col-md-3 col-sm-3"><img src="<?php echo base_url();?>assets/images/employers/emplogo1.jpg" alt="Company Name"/></div>
                <div class="col-md-9 col-sm-9">
                  <h4><a href="#">Technical Database Engineer</a></h4>
                  <div class="company"><a href="#.">Datebase Management Company</a></div>
                  <div class="jobloc">Experience   - <span>01 to 05 years</span></div>
                  <div class="jobloc">Location   - <span>Dhaka, Bangladesh</span></div>
                  <!--<a href="#." class="applybtn">Apply Now</a>-->
                </div>
                <!--<div class="col-md-3 col-sm-3"><a href="#." class="applybtn">Apply Now</a></div>-->
              </div>
            </div>
          </li>
          <li class="col-md-4" style="margin:0; padding:0">
            <div class="jobint">
              <div class="row">
                <div class="col-md-3 col-sm-3"><img src="<?php echo base_url();?>assets/images/employers/emplogo1.jpg" alt="Company Name"/></div>
                <div class="col-md-9 col-sm-9">
                  <h4><a href="#">Technical Database Engineer</a></h4>
                  <div class="company"><a href="#.">Datebase Management Company</a></div>
                  <div class="jobloc">Experience   - <span>01 to 05 years</span></div>
                  <div class="jobloc">Location   - <span>Dhaka, Bangladesh</span></div>
                  <!--<a href="#." class="applybtn">Apply Now</a>-->
                </div>
                <!--<div class="col-md-3 col-sm-3"><a href="#." class="applybtn">Apply Now</a></div>-->
              </div>
            </div>
          </li>
          <li class="col-md-4" style="margin:0; padding:0">
            <div class="jobint">
              <div class="row">
                <div class="col-md-3 col-sm-3"><img src="<?php echo base_url();?>assets/images/employers/emplogo1.jpg" alt="Company Name"/></div>
                <div class="col-md-9 col-sm-9">
                  <h4><a href="#">Technical Database Engineer</a></h4>
                  <div class="company"><a href="#.">Datebase Management Company</a></div>
                  <div class="jobloc">Experience   - <span>01 to 05 years</span></div>
                  <div class="jobloc">Location   - <span>Dhaka, Bangladesh</span></div>
                  <!--<a href="#." class="applybtn">Apply Now</a>-->
                </div>
                <!--<div class="col-md-3 col-sm-3"><a href="#." class="applybtn">Apply Now</a></div>-->
              </div>
            </div>
          </li>
          <li class="col-md-4" style="margin:0; padding:0">
            <div class="jobint">
              <div class="row">
                <div class="col-md-3 col-sm-3"><img src="<?php echo base_url();?>assets/images/employers/emplogo1.jpg" alt="Company Name"/></div>
                <div class="col-md-9 col-sm-9">
                  <h4><a href="#">Technical Database Engineer</a></h4>
                  <div class="company"><a href="#.">Datebase Management Company</a></div>
                  <div class="jobloc">Experience   - <span>01 to 05 years</span></div>
                  <div class="jobloc">Location   - <span>Dhaka, Bangladesh</span></div>
                  <!--<a href="#." class="applybtn">Apply Now</a>-->
                </div>
                <!--<div class="col-md-3 col-sm-3"><a href="#." class="applybtn">Apply Now</a></div>-->
              </div>
            </div>
          </li>
          <li class="col-md-4" style="margin:0; padding:0">
            <div class="jobint">
              <div class="row">
                <div class="col-md-3 col-sm-3"><img src="<?php echo base_url();?>assets/images/employers/emplogo1.jpg" alt="Company Name"/></div>
                <div class="col-md-9 col-sm-9">
                  <h4><a href="#">Technical Database Engineer</a></h4>
                  <div class="company"><a href="#.">Datebase Management Company</a></div>
                  <div class="jobloc">Experience   - <span>01 to 05 years</span></div>
                  <div class="jobloc">Location   - <span>Dhaka, Bangladesh</span></div>
                  <!--<a href="#." class="applybtn">Apply Now</a>-->
                </div>
                <!--<div class="col-md-3 col-sm-3"><a href="#." class="applybtn">Apply Now</a></div>-->
              </div>
            </div>
          </li>
          <!--Job end-->
        </ul><?php */?>
        <ul class="jobslist">
        <?php foreach($hotjobs->result() as $hrow):
			$multipleJObs = $this->db->query("SELECT * FROM jobpost WHERE emp_id='".$hrow->emp_id."' ORDER BY job_id DESC LIMIT 2");?>
			<li class="col-md-4" style="margin:0; padding:0">
            <div class="jobint">
              <div class="row">
                <div class="col-md-3 col-sm-3"><img src="<?php echo base_url('asset/uploads/employers/'.$hrow->logo);?>" alt="<?php echo $hrow->company_name;?>"/></div>
                <div class="col-md-9 col-sm-9">
                  <h4><a href="#"><?php echo $hrow->company_name;?></a></h4>
                  <?php foreach($multipleJObs->result() as $hjrow):?>
                 	 <div class="jobloc"><a href="#" style=" color:#333;">&raquo; <?php echo $hjrow->job_title;?></a></div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </li>
		<?php endforeach; ?>
          
         </ul>
        <div class="viewallbtn"><a href="job-listing.html">View All Hot Jobs</a></div>
    </div>
    
    <div class="col-md-2 col-lg-2 col-sm-12" style="margin:0; padding:0;">
    	<img src="<?php echo base_url('assets/images/ad/airtel-120X45.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/gi-ns-120X45-2492015.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/amazon-120X45.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/genpact-ns-120X45-1722017.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/atos-14092016.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/gen-120X45-732017.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
         <img src="<?php echo base_url('assets/images/ad/atos-14092016.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/gen-120X45-732017.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/airtel-120X45.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/gi-ns-120X45-2492015.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/amazon-120X45.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/genpact-ns-120X45-1722017.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/atos-14092016.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/gen-120X45-732017.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
         <img src="<?php echo base_url('assets/images/ad/atos-14092016.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/gen-120X45-732017.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/airtel-120X45.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/gi-ns-120X45-2492015.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/amazon-120X45.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/genpact-ns-120X45-1722017.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/genpact-ns-120X45-1722017.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
    </div>
    
    
  </div>
</div>
<?php /*?><div class="section" style="margin:0; padding:0">
  <div class="container" style="margin-top:10px; background:#fafafa"> 
	<div class="col-md-10 col-lg-10 col-sm-12" style="margin:0; padding:0;">
        <div class="titleTop" style="margin-top:20px;">
          <h3 style="margin:0; padding:0">Top <span>Employers Jobs</span></h3>
        </div>
        <ul class="jobslist">
          <!--Job start-->
          <li class="col-md-4" style="margin:0; padding:0">
            <div class="jobint">
              <div class="row">
                <div class="col-md-3 col-sm-3"><img src="<?php echo base_url();?>assets/images/employers/emplogo1.jpg" alt="Company Name"/></div>
                <div class="col-md-9 col-sm-9">
                  <h4><a href="#">Copotronic InfoSystem Ltd</a></h4>
                  <div class="company1"><a href="#.">&raquo; Technical Engineer (01)</a></div>
                  <div class="company1"><a href="#.">&raquo; Business Development Manager (05)</a></div>
                  <div class="company1"><a href="#.">&raquo; Software Engineer (02)</a></div>
                </div>
                <div style="float:right; text-align:right;"><a href="#." style="font-size:11px; position:absolute; bottom:0">View More</a></div>
              </div>
            </div>
          </li>
          <li class="col-md-4" style="margin:0; padding:0">
            <div class="jobint">
              <div class="row">
                <div class="col-md-3 col-sm-3"><img src="<?php echo base_url();?>assets/images/employers/emplogo1.jpg" alt="Company Name"/></div>
                <div class="col-md-9 col-sm-9">
                  <h4><a href="#">Doctorsbd</a></h4>
                  <div class="company1"><a href="#.">&raquo; Cardialogoy Speliast (01)</a></div>
                  <div class="company1"><a href="#.">&raquo; Gynocology (03)</a></div>
                  <div class="company1"><a href="#.">&raquo; Medical Officer (02)</a></div>
                </div>
                <div style="float:right; text-align:right;"><a href="#." style="font-size:11px;">View More</a></div>
              </div>
            </div>
          </li>
          <li class="col-md-4" style="margin:0; padding:0">
            <div class="jobint">
              <div class="row">
                <div class="col-md-3 col-sm-3"><img src="<?php echo base_url();?>assets/images/employers/emplogo1.jpg" alt="Company Name"/></div>
                <div class="col-md-9 col-sm-9">
                  <h4><a href="#">E-soft Ltd</a></h4>
                  <div class="company1"><a href="#.">&raquo; Technical Engineer (01)</a></div>
                  <div class="company1"><a href="#.">&raquo; Business Development Manager (05)</a></div>
                  <div class="company1"><a href="#.">&raquo; Software Engineer (02)</a></div>
                </div>
                <div style="float:right; text-align:right;"><a href="#." style="font-size:11px;">View More</a></div>
              </div>
            </div>
          </li>
          <li class="col-md-4" style="margin:0; padding:0">
            <div class="jobint">
              <div class="row">
                <div class="col-md-3 col-sm-3"><img src="<?php echo base_url();?>assets/images/employers/emplogo1.jpg" alt="Company Name"/></div>
                <div class="col-md-9 col-sm-9">
                  <h4><a href="#">Ecra Soft LTD</a></h4>
                  <div class="company1"><a href="#.">&raquo; Executive & Sr. Executive (03)</a></div>
                  <div class="company1"><a href="#.">&raquo; Business Development Manager (05)</a></div>
                  <div class="company1"><a href="#.">&raquo; Software Engineer (02)</a></div>
                </div>
                <div style="float:right; text-align:right;"><a href="#." style="font-size:11px;">View More</a></div>
              </div>
            </div>
          </li>
          <li class="col-md-4" style="margin:0; padding:0">
            <div class="jobint">
              <div class="row">
                <div class="col-md-3 col-sm-3"><img src="<?php echo base_url();?>assets/images/employers/emplogo1.jpg" alt="Company Name"/></div>
                <div class="col-md-9 col-sm-9">
                  <h4><a href="#">Winuxsoft LTD</a></h4>
                  <div class="company1"><a href="#.">&raquo; Technical Engineer (01)</a></div>
                  <div class="company1"><a href="#.">&raquo; Executive & Sr. Executive (03)</a></div>
                  <div class="company1"><a href="#.">&raquo; Software Engineer (02)</a></div>
                </div>
                <div style="float:right; text-align:right;"><a href="#." style="font-size:11px;">View More</a></div>
              </div>
            </div>
          </li>
          <li class="col-md-4" style="margin:0; padding:0">
            <div class="jobint">
              <div class="row">
                <div class="col-md-3 col-sm-3"><img src="<?php echo base_url();?>assets/images/employers/emplogo1.jpg" alt="Company Name"/></div>
                <div class="col-md-9 col-sm-9">
                  <h4><a href="#">PRAN - RFL Group</a></h4>
                  <div class="company1"><a href="#.">&raquo; Technical Engineer (01)</a></div>
                  <div class="company1"><a href="#.">&raquo; Business Development Manager (05)</a></div>
                  <div class="company1"><a href="#.">&raquo; Software Engineer (02)</a></div>
                </div>
                <div style="float:right; text-align:right;"><a href="#." style="font-size:11px;">View More</a></div>
              </div>
            </div>
          </li>
          <li class="col-md-4" style="margin:0; padding:0">
            <div class="jobint">
              <div class="row">
                <div class="col-md-3 col-sm-3"><img src="<?php echo base_url();?>assets/images/employers/emplogo1.jpg" alt="Company Name"/></div>
                <div class="col-md-9 col-sm-9">
                  <h4><a href="#">All Time Bangladesh</a></h4>
                  <div class="company1"><a href="#.">&raquo; Executive & Sr. Executive (03)</a></div>
                  <div class="company1"><a href="#.">&raquo; Business Development Manager (05)</a></div>
                  <div class="company1"><a href="#.">&raquo; Software Engineer (02)</a></div>
                </div>
                <div style="float:right; text-align:right;"><a href="#." style="font-size:11px;">View More</a></div>
              </div>
            </div>
          </li>
          <li class="col-md-4" style="margin:0; padding:0">
            <div class="jobint">
              <div class="row">
                <div class="col-md-3 col-sm-3"><img src="<?php echo base_url();?>assets/images/employers/emplogo1.jpg" alt="Company Name"/></div>
                <div class="col-md-9 col-sm-9">
                  <h4><a href="#">B H Khan School & College</a></h4>
                  <div class="company1"><a href="#.">&raquo; Technical Engineer (01)</a></div>
                  <div class="company1"><a href="#.">&raquo; Business Development Manager (05)</a></div>
                  <div class="company1"><a href="#.">&raquo; Software Engineer (02)</a></div>
                </div>
                <div style="float:right; text-align:right;"><a href="#." style="font-size:11px;">View More</a></div>
              </div>
            </div>
          </li>
          <li class="col-md-4" style="margin:0; padding:0">
            <div class="jobint">
              <div class="row">
                <div class="col-md-3 col-sm-3"><img src="<?php echo base_url();?>assets/images/employers/emplogo1.jpg" alt="Company Name"/></div>
                <div class="col-md-9 col-sm-9">
                  <h4><a href="#">Prome Agro Foods Ltd</a></h4>
                  <div class="company1"><a href="#.">&raquo; Technical Engineer (01)</a></div>
                  <div class="company1"><a href="#.">&raquo; Executive & Sr. Executive (03)</a></div>
                  <div class="company1"><a href="#.">&raquo; Business Development Manager (05)</a></div>
                </div>
                <div style="float:right; text-align:right;"><a href="#." style="font-size:11px;">View More</a></div>
              </div>
            </div>
          </li>
          <!--Job end-->
        </ul>
        <div class="viewallbtn"><a href="job-listing.html">View All Jobs</a></div>
    </div>
    
    <div class="col-md-2 col-lg-2 col-sm-12" style="margin:0; padding:0;">
    	<img src="<?php echo base_url('assets/images/ad/airtel-120X45.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/gi-ns-120X45-2492015.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/amazon-120X45.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/genpact-ns-120X45-1722017.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/atos-14092016.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/gen-120X45-732017.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
         <img src="<?php echo base_url('assets/images/ad/atos-14092016.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/gen-120X45-732017.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
    </div>
    
    
  </div>
</div><?php */?>
<div class="section" style="margin:0; padding:0">
  <div class="container" style="margin-top:10px; background:#fafafa">
  	<div class="col-md-12 col-lg-12 col-sm-12" style="margin:0; padding:0;">
    	<div class="col-md-10 col-lg-10 col-sm-12" style="margin:0; padding:0;">
    		<div class="topjobseekerArea">
            <div class="titleTop" style="margin-top:10px;">
              <h3>Star <span style="color:#00A2FF">Job Seekers</span></h3>
            </div>
            <ul class="employerList">
              <li data-toggle="tooltip" data-placement="bottom" title="" data-html="true"
              data-original-title="Mohamamd Wasim <br> Software Developer <br> Mirpur Dhaka"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/candidates/01.jpg" alt="Your alt text here" style="border-radius:50%;" />
                  <h5 style="font-size:11px;">Mohamamd Wasim</h5>
              </a>
              </li>
              <li data-toggle="tooltip" data-placement="bottom" title="" data-html="true"
              data-original-title="Foysal Ahmed <br> Software Developer <br> Natunbazar Dhaka"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/candidates/05.jpg" alt="Your alt text here" style="border-radius:50%;" />
                  <h5 style="font-size:11px;">Foysal Ahmed</h5>
              </a>
              </li>
              <li data-toggle="tooltip" data-placement="bottom" title="" data-html="true"
              data-original-title="Tushar Khan <br> Software Developer <br> Mirpur Dhaka"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/candidates/02.jpg" alt="Your alt text here" style="border-radius:50%;" />
                  <h5 style="font-size:11px;">Tushar Khan</h5>
              </a>
              </li>
              <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Ashfaqur Rahman <br> Software Developer <br> Mirpur Dhaka"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/candidates/03.jpg" alt="Your alt text here" style="border-radius:50%;" />
                  <h5 style="font-size:11px;">Ashfaqur Rahman</h5>
              </a>
              </li>
              <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Mehedi Hasan <br> Software Developer <br> Mirpur Dhaka"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/candidates/04.jpg" alt="Your alt text here" style="border-radius:50%;" />
                  <h5 style="font-size:11px;">Mehedi Hasan</h5>
              </a>
              </li>
              <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Faruk Hasan <br> Software Developer <br> Mirpur Dhaka"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/candidates/06.jpg" alt="Your alt text here" style="border-radius:50%;" />
                  <h5 style="font-size:11px;">Faruk Hasan</h5>
              </a>
              </li>
              <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Ibrahim Khalil <br> Software Developer <br> Mirpur Dhaka"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/candidates/07.jpg" alt="Your alt text here" style="border-radius:50%;" />
                  <h5 style="font-size:11px;">Ibrahim Khalil</h5>
              </a>
              </li>
              <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Zulkarnain <br> Software Developer <br> Mirpur Dhaka"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/candidates/09.jpg" alt="Your alt text here" style="border-radius:50%;" />
                  <h5 style="font-size:11px;">Zulkarnain</h5>
              </a>
              </li>
              <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Yusuf Sagar <br> Software Developer <br> Mirpur Dhaka"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/candidates/08.jpg" alt="Your alt text here" style="border-radius:50%;" />
                  <h5 style="font-size:11px;">Yusuf Sagar</h5>
              </a>
              </li>
              
              <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Yusuf Sagar <br> Software Developer <br> Mirpur Dhaka"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/candidates/10.jpg" alt="Your alt text here" style="border-radius:50%;" />
                  <h5 style="font-size:11px;">Yusuf Sagar</h5>
              </a>
              </li>
              
              
              <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Yusuf Sagar <br> Software Developer <br> Mirpur Dhaka"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/candidates/08.jpg" alt="Your alt text here" style="border-radius:50%;" />
                  <h5 style="font-size:11px;">Yusuf Sagar</h5>
              </a>
              </li>
              
              <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Yusuf Sagar <br> Software Developer <br> Mirpur Dhaka"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/candidates/02.jpg" alt="Your alt text here" style="border-radius:50%;" />
                  <h5 style="font-size:11px;">Yusuf Sagar</h5>
              </a>
              </li>
              <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Yusuf Sagar <br> Software Developer <br> Mirpur Dhaka"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/candidates/01.jpg" alt="Your alt text here" style="border-radius:50%;" />
                  <h5 style="font-size:11px;">Yusuf Sagar</h5>
              </a>
              </li>
              <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Yusuf Sagar <br> Software Developer <br> Mirpur Dhaka"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/candidates/03.jpg" alt="Your alt text here" style="border-radius:50%;" />
                  <h5 style="font-size:11px;">Yusuf Sagar</h5>
              </a>
              </li>
              <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Yusuf Sagar <br> Software Developer <br> Mirpur Dhaka"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/candidates/03.jpg" alt="Your alt text here" style="border-radius:50%;" />
                  <h5 style="font-size:11px;">Yusuf Sagar</h5>
              </a>
              </li>
              <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Yusuf Sagar <br> Software Developer <br> Mirpur Dhaka"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/candidates/08.jpg" alt="Your alt text here" style="border-radius:50%;" />
                  <h5 style="font-size:11px;">Yusuf Sagar</h5>
              </a>
              </li>
              <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Zulkarnain <br> Software Developer <br> Mirpur Dhaka"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/candidates/09.jpg" alt="Your alt text here" style="border-radius:50%;" />
                  <h5 style="font-size:11px;">Zulkarnain</h5>
              </a>
              </li>
              <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Yusuf Sagar <br> Software Developer <br> Mirpur Dhaka"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/candidates/03.jpg" alt="Your alt text here" style="border-radius:50%;" />
                  <h5 style="font-size:11px;">Yusuf Sagar</h5>
              </a>
              </li>
            </ul>
        </div>
        </div>
        <div class="col-md-2 col-lg-2 col-sm-12" style="margin:0; padding:0;">
    	<img src="<?php echo base_url('assets/images/ad/airtel-120X45.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/gi-ns-120X45-2492015.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/amazon-120X45.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/genpact-ns-120X45-1722017.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/atos-14092016.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/gen-120X45-732017.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
    </div>
    </div>
    
  </div>
</div>
<div class="section" style="margin:0; padding:0">
  <div class="container" style="margin-top:10px; background:#fafafa">
  	
    <div class="col-md-12 col-lg-12 col-sm-12" style="margin:0; padding:0;">
    	<div class="col-md-10 col-lg-10 col-sm-12" style="margin:0; padding:0;">
            <div class="titleTop">
              <h3 style="font-size:25px; line-height:35px; margin-top:5px;">Create Your Network of Job Seekers, Employees and Employers!<br /> Be Inspired and Get in Touch with People in your Field!</h3>
            </div>
            <div class="row">
              <div class="col-sm-3" style="margin:0; padding:0">
             	 <div style="margin:5px; float:left;background:#fff; padding:10px;border-bottom:1px dotted #ccc">
                  <div style="width:70%; text-align:center; margin:auto">
                  <a href="company-detail.html"><img src="<?php echo base_url();?>assets/images/candidates/01.jpg" alt="Company Name" 
                  style="border:1px solid #333; border-radius:10%; margin-bottom:10px" /></a></div>
                  <h4 style="text-align:center">Mohamamd Wasim</h4>
                  <h6 style="text-align:center; font-weight:normal;">Sr. Software Developer</h6>
                  <h6 style="text-align:center; font-weight:normal;">E-soft Ltd</h6>
                  <h6 style="text-align:center; font-weight:normal;">Kawran Bazar, Dhaka</h6>
                   
                </div>
              </div>
              <div class="col-sm-3" style="margin:0; padding:0">
             	 <div style="margin:5px; float:left;background:#fff; padding:10px;border-bottom:1px dotted #ccc">
                  <div style="width:70%; text-align:center; margin:auto">
                  <a href="company-detail.html"><img src="<?php echo base_url();?>assets/images/candidates/10.jpg" alt="Company Name" 
                  style="border:1px solid #333; border-radius:10%; margin-bottom:10px" /></a></div>
                  <h4 style="text-align:center">Zahid Hasan</h4>
                  <h6 style="text-align:center; font-weight:normal;">Web Developer</h6>
                  <h6 style="text-align:center; font-weight:normal;">Quantam Cloud Ltd</h6>
                  <h6 style="text-align:center; font-weight:normal;">Mohamamdpur, Dhaka</h6>
                   
                </div>
              </div>
              <div class="col-sm-3" style="margin:0; padding:0">
             	 <div style="margin:5px; float:left;background:#fff; padding:10px;border-bottom:1px dotted #ccc">
                  <div style="width:70%; text-align:center; margin:auto">
                  <a href="company-detail.html"><img src="<?php echo base_url();?>assets/images/candidates/08.jpg" alt="Company Name" 
                  style="border:1px solid #333; border-radius:10%; margin-bottom:10px" /></a></div>
                  <h4 style="text-align:center">Yaseen Arafat</h4>
                  <h6 style="text-align:center; font-weight:normal;">Sr. Marketing Executive</h6>
                  <h6 style="text-align:center; font-weight:normal;">Devine IT</h6>
                  <h6 style="text-align:center; font-weight:normal;">Uttara, Dhaka</h6>
                   
                </div>
              </div>
              <div class="col-sm-3" style="margin:0; padding:0">
             	 <div style="margin:5px; float:left;background:#fff; padding:10px;border-bottom:1px dotted #ccc">
                  <div style="width:70%; text-align:center; margin:auto">
                  <a href="company-detail.html"><img src="<?php echo base_url();?>assets/images/candidates/02.jpg" alt="Company Name" 
                  style="border:1px solid #333; border-radius:10%; margin-bottom:10px" /></a></div>
                  <h4 style="text-align:center">Jannatul Ferdous</h4>
                  <h6 style="text-align:center; font-weight:normal;">Sr. Consultant</h6>
                  <h6 style="text-align:center; font-weight:normal;">CMSN Pety Ltd.</h6>
                  <h6 style="text-align:center; font-weight:normal;">Sydney, Australlia</h6>
                   
                </div>
              </div>
            </div>
        </div>    
            <div class="col-md-2 col-lg-2 col-sm-12" style="margin:0; padding:0;">
    	<img src="<?php echo base_url('assets/images/ad/airtel-120X45.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/gi-ns-120X45-2492015.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/amazon-120X45.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/genpact-ns-120X45-1722017.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/atos-14092016.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
    </div>
        </div>
  </div>
</div>
<div class="videowraper section" style="height:250px;">
  <div class="container"> 
    <!-- title start -->
    <div class="titleTop">
      <h3>Our <span>Measseges</span></h3>
    </div>
    <!-- title end -->
    
    <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum congue posuere lacus, id tincidunt nisi porta sit amet. Suspendisse et sapien varius, pellentesque dui non, semper orci.</p> </div>
</div>
<div class="section" style="margin:0; padding:0">
  <div class="container" style="margin-top:10px; background:#fafafa"> 
 	<div class="col-md-10 col-lg-10 col-sm-12" style="margin:0; padding:0;">
    <div class="titleTop">
      <h3>Success <span>Stories</span></h3>
    </div>
    <ul class="testimonialsList">
    
     <li class="item active">
        <div class="testimg"><img src="<?php echo base_url();?>assets/images/userimg.jpg" alt="Your alt text here" /></div>
        <div class="clientname">Mohamad Wasim</div>
        <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum viverra id nunc at finibus. Etiam sollicitudin faucibus cursus. 
        Proin luctus cursus nulla sed iaculis. Quisque vestibulum augue nec aliquet aliquet."</p>
        <div class="clientinfo">CEO - Gates Inc</div>
      </li>

      <li class="item">
        <div class="testimg"><img src="<?php echo base_url();?>assets/images/coment-avatar-3.jpg" alt="Your alt text here" /></div>
        <div class="clientname">Garry Miller Jr</div>
        <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum viverra id nunc at finibus. Etiam sollicitudin faucibus cursus. 
        Proin luctus cursus nulla sed iaculis. Quisque vestibulum augue nec aliquet aliquet."</p>
        <div class="clientinfo">CEO - Gates Inc</div>
      </li>

      <li class="item">
        <div class="testimg"><img src="<?php echo base_url();?>assets/images/news-3.jpg" alt="Your alt text here" /></div>
        <div class="clientname">John Gaurge</div>
        <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum viverra id nunc at finibus. Etiam sollicitudin faucibus cursus. Proin luctus cursus nulla sed iaculis. Quisque vestibulum augue nec aliquet aliquet."</p>
        <div class="clientinfo">CEO - Gates Inc</div>
      </li>
      <!--user 2 end-->
    </ul>
    </div>
    <div class="col-md-2 col-lg-2 col-sm-12" style="margin:0; padding:0;">
    	<img src="<?php echo base_url('assets/images/ad/airtel-120X45.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/genpact-ns-120X45-1722017.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/atos-14092016.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/gen-120X45-732017.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
    </div>
  </div>
</div>

<div class="section" style="margin:0; padding:0">
  <div class="container" style="margin-top:10px; background:#fafafa">
  	<div class="col-md-12 col-lg-12 col-sm-12" style="margin:0; padding:0;">
    	<div class="col-md-10 col-lg-10 col-sm-12" style="margin:0; padding:0;">
    		<div class="topEmployerArea">
            <div class="titleTop">
              <h3 style="padding:10px;">See Who's Hiring on jobstarbd.com</h3>
            </div>
            <ul class="employerList">
              <!--employer-->
              <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Logic NS <br> IT <br> Korea"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/employers/partex.png" alt="Your alt text here" style="width:100%; height:116px"/></a>
              </li>
              
              <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Logic NS <br> IT <br> Korea"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/employers/navana.png" alt="Your alt text here" style="width:100%; height:116px"/></a>
              </li>
              <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Logic NS <br> IT <br> Korea"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/employers/brac.png" alt="Your alt text here" style="width:100%; height:116px"/></a>
              </li>
              <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Logic NS <br> IT <br> Korea"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/employers/prangr.png" alt="Your alt text here" style="width:100%; height:116px"/></a>
              </li>
              <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Logic NS <br> IT <br> Korea"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/employers/baximco.png" alt="Your alt text here" style="width:100%; height:116px"/></a>
              </li>
              <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Logic NS <br> IT <br> Korea"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/employers/eqim.jpg" alt="Your alt text here" style="width:100%; height:116px"/></a>
              </li>
              <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Logic NS <br> IT <br> Korea"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/employers/huwai.png" alt="Your alt text here" style="width:100%; height:116px"/></a>
              </li>
              <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Logic NS <br> IT <br> Korea"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/employers/agricul_bank.png" alt="Your alt text here" style="width:100%; height:116px"/></a>
              </li>
              <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Logic NS <br> IT <br> Korea"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/employers/emplogo8.jpg" alt="Your alt text here" style="width:100%; height:116px"/></a>
              </li>
              <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Logic NS <br> IT <br> Korea"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/employers/emplogo15.jpg" alt="Your alt text here" style="width:100%; height:116px"/></a>
              </li>
              <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Logic NS <br> IT <br> Korea"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/employers/brac.png" alt="Your alt text here" style="width:100%; height:116px"/></a>
              </li>
              <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Logic NS <br> IT <br> Korea"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/employers/navana.png" alt="Your alt text here" style="width:100%; height:116px"/></a>
              </li>
              <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Logic NS <br> IT <br> Korea"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/employers/prangr.png" alt="Your alt text here" style="width:100%; height:116px"/></a>
              </li>
              <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Logic NS <br> IT <br> Korea"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/employers/emplogo5.jpg" alt="Your alt text here" style="width:100%; height:116px"/></a>
              </li>
              <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Logic NS <br> IT <br> Korea"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/employers/partex.png" alt="Your alt text here" style="width:100%; height:116px"/></a>
              </li>
              <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Logic NS <br> IT <br> Korea"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/employers/emplogo6.jpg" alt="Your alt text here" style="width:100%; height:116px"/></a>
              </li>
              <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Logic NS <br> IT <br> Korea"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/employers/emplogo11.jpg" alt="Your alt text here" style="width:100%; height:116px"/></a>
              </li>
              <li data-toggle="tooltip" data-placement="top" title="" data-html="true"
              data-original-title="Logic NS <br> IT <br> Korea"><a href="#">
                  <img src="<?php echo base_url();?>assets/images/employers/emplogo8.jpg" alt="Your alt text here" style="width:100%; height:116px"/></a>
              </li>
            </ul>
        </div>
        </div>
        <div class="col-md-2 col-lg-2 col-sm-12" style="margin:0; padding:0;">
    	<img src="<?php echo base_url('assets/images/ad/airtel-120X45.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/gi-ns-120X45-2492015.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/amazon-120X45.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/genpact-ns-120X45-1722017.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/atos-14092016.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
        <img src="<?php echo base_url('assets/images/ad/gen-120X45-732017.gif');?>"  style="width:100%; height:auto; margin:0 0 3px 5px;" />
    </div>
    </div>
    
  </div>
</div>


<div class="section" style="margin:0; padding:0">
  <div class="container" style="margin-top:10px; background:#fafafa">
  	<div class="col-md-6 col-lg-6 col-sm-12" style="margin:0; padding:0;">
    	<div class="topjobseekerArea" style="background:#efefef; margin-top:10px;">
            <div class="titleTop">
              <h3><span style="color:#00A2FF">Events</span></h3>
            </div>

            <?php foreach($hevents->result() as $eventh):?>
              <div class="row" style="background:#fff; padding:10px;border-bottom:1px dotted #ccc">
              <div class="col-sm-3"><a href="<?php echo base_url("events/details/".$eventh->slug);?>">
              	<img src="<?php echo base_url('asset/uploads/event/'.$eventh->image);?>" alt="Company Name" />
              </a></div>
              <div class="col-sm-9">
              	<h5 style="font-size:14px; line-height:16px; font-weight:bold;"><a href="<?php echo base_url("events/details/".$eventh->slug);?>" style="color:#333;">
				<?php echo $eventh->events_name;?></a></h5>
                <p>
                	<?php 
					$strTagE = strip_tags( $eventh->events_details);
					if(strlen($strTagE) > 150){
						$strCutE = substr($strTagE, 0, 150);
						$displayDetailsE = substr($strCutE, 0, strrpos($strCutE, ' ')).'.....'; 
					}			
					echo $displayDetailsE;		
					?>
                </p>
              </div>
              </div>
            <?php endforeach;?>
              <div class="row" style="float:right"><a href="<?php echo base_url("events");?>" style="padding:5px 0; float:left;">More Events...</a></div>
        </div>
    </div>
    <div class="col-md-6 col-lg-6 col-sm-12" style="margin:0; padding:0;">
    	<div class="topEmployerArea" style="background:#f5f5f5; margin-top:10px;">
            <div class="titleTop">
              <h3>HR <span style="color:#65BE6A">News</span></h3>
            </div>
            <?php foreach($hrnews->result() as $newsh):?>
              <div class="row" style="background:#fff; padding:10px;border-bottom:1px dotted #ccc">
              <div class="col-sm-3"><a href="<?php echo base_url("news/details/".$newsh->slug);?>">
              	<img src="<?php echo base_url('asset/uploads/news/'.$newsh->image);?>" alt="<?php echo $newsh->news_title;?>" />
              </a></div>
              <div class="col-sm-9">
              	<h5 style="font-size:14px; line-height:16px; font-weight:bold;">
                <a href="<?php echo base_url("news/details/".$newsh->slug);?>" style="color:#333"><?php echo $newsh->news_title;?></a></h5>
                <p>
                	<?php 
					$strTag = strip_tags( $newsh->short_description);
					if(strlen($strTag) > 150){
						$strCut = substr($strTag, 0, 150);
						$displayDetails = substr($strCut, 0, strrpos($strCut, ' ')).'.....'; 
					}			
					echo $displayDetails;		
					?>
                </p>
              </div>
              </div>
            <?php endforeach;?>
            <div class="row" style="float:right"><a href="<?php echo base_url("news");?>" style="padding:5px 0; float:left;">More News...</a></div>
        </div>
    </div>
  </div>
</div>
<div class="section" style="margin:0; padding:0">
  <div class="container" style="background:#fafafa">
<div class="appwraper">
 
    <div class="row">
      <div class="col-md-5 col-sm-6"> 
        <!--app image Start-->
        <div class="appimg"><img src="<?php echo base_url();?>assets/images/app-mobile.png" alt="Your alt text here" /></div>
        <!--app image end--> 
      </div>
      <div class="col-md-7 col-sm-6"> 
        <!--app info Start-->
        <div class="titleTop">
          <div class="subtitle">Step Forword Now</div>
          <h3>The Jobee APP</h3>
        </div>
        <div class="subtitle2">A world of oppertunity in your hand</div>
        <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum congue posuere lacus, id tincidunt nisi porta sit amet. Suspendisse et sapien varius, pellentesque dui non, semper orci. Curabitur blandit, diam ut ornare ultricies.</p>
        <div class="appbtn">
          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6"><a href="#."><img src="<?php echo base_url();?>assets/images/apple-btn.png" alt="Your alt text here"></a></div>
            <div class="col-md-6 col-sm-6 col-xs-6"><a href="#."><img src="<?php echo base_url();?>assets/images/andriod-btn.png" alt="Your alt text here"></a></div>
          </div>
        </div>
        <!--app info end--> 
      </div>
    </div>
  </div>
</div>
</div>

<div class="section" style="margin:0; padding:0">
  <div class="container" style="background:#fafafa">
  	<div class="col-md-6 col-lg-6 col-sm-12" style="margin:0; padding:0;">
    	<div class="workshopArea">
            <div class="titleTop" style="float:left; text-align:left; padding:10px;">
              <h5><span style="color:#3063a2; text-transform:uppercase; text-align:left">
              <i class="fa fa-graduation-cap" aria-hidden="true"></i>&nbsp; Workshop Training</span></h5>
            </div>

              <div class="row" style="padding:10px;border-bottom:1px dotted #ccc">
                  <div class="col-sm-12" style="margin:0; padding:0">
                    <a href="#">
                    <div class="col-sm-2" style="margin:0; padding:0"><img src="<?php echo base_url('assets/images/workshoptraining/tobacco48.png');?>" /></div>
                    <div class="col-sm-10" style="margin:0; padding:0"><h6 style="font-weight:normal;">How to Be An Efficient Commercial & Procurement Manager</h6>
                    <span style="font-size:11px; color:#999"><?php echo date('l , d F l Y');?></span></div>
                    </a>
                  </div>
              </div>
              <div class="row" style="padding:10px;border-bottom:1px dotted #ccc">
                  <div class="col-sm-12" style="margin:0; padding:0">
                    <a href="#"><div class="col-sm-2" style="margin:0; padding:0"><img src="<?php echo base_url('assets/images/workshoptraining/wavefound48.jpg');?>" /></div>
                    <div class="col-sm-10" style="margin:0; padding:0"><h6 style="font-weight:normal;">Seminar for Hackathon 2017 at United International University</h6>
                    <span style="font-size:11px; color:#999"><?php echo date('l , d F l Y');?></span></div>
                    </a>
                  </div>
              </div>
              
              <div class="row" style="padding:10px;border-bottom:1px dotted #ccc">
                  <div class="col-sm-12" style="margin:0; padding:0">
                    <a href="#">
                    <div class="col-sm-2" style="margin:0; padding:0"><img src="<?php echo base_url('assets/images/workshoptraining/wpi48.png');?>" /></div>
                    <div class="col-sm-10" style="margin:0; padding:0"><h6 style="font-weight:normal;">How to Be An Efficient Commercial & Procurement Manager</h6>
                    <span style="font-size:11px; color:#999"><?php echo date('l , d F l Y');?></span></div>
                    </a>
                  </div>
              </div>
              <div class="row" style="padding:10px;border-bottom:1px dotted #ccc">
                  <div class="col-sm-12" style="margin:0; padding:0">
                    <a href="#">
                    <div class="col-sm-2" style="margin:0; padding:0"><img src="<?php echo base_url('assets/images/workshoptraining/tritech48.jpg');?>" /></div>
                    <div class="col-sm-10" style="margin:0; padding:0"><h6 style="font-weight:normal;">Microsoft Excel Formulas & Functions in Depth</h6>
                    <span style="font-size:11px; color:#999"><?php echo date('l , d F l Y');?></span></div>
                    </a>
                  </div>
              </div>
              <div class="row" style="padding:10px;border-bottom:1px dotted #ccc">
                  <div class="col-sm-12" style="margin:0; padding:0">
                   <a href="#">
                    <div class="col-sm-2" style="margin:0; padding:0"><img src="<?php echo base_url('assets/images/workshoptraining/tobacco48.png');?>" /></div>
                    <div class="col-sm-10" style="margin:0; padding:0"><h6 style="font-weight:normal;">Web Development and Freelancing</h6>
                    <span style="font-size:11px; color:#999"><?php echo date('l , d F l Y');?></span></div>
                    </a>
                  </div>
              </div>
              <div class="row" style="padding:10px;border-bottom:1px dotted #ccc">
                  <div class="col-sm-12" style="margin:0; padding:0">
                   <a href="#">
                    <div class="col-sm-2" style="margin:0; padding:0"><img src="<?php echo base_url('assets/images/workshoptraining/tmgroup48.jpg');?>" /></div>
                    <div class="col-sm-10" style="margin:0; padding:0"><h6 style="font-weight:normal;">Project Proposal for Fund Raising</h6>
                    <span style="font-size:11px; color:#999"><?php echo date('l , d F l Y');?></span></div>
                    </a>
                  </div>
              </div>
              
        </div>
    </div>
    <div class="col-md-6 col-lg-6 col-sm-12" style="margin:0; padding:0;">
    	<div class="workshopArea">
            <div class="titleTop" style="float:left; text-align:left; padding:10px;">
              <h5><span style="color:#3063a2; text-transform:uppercase; text-align:left">
              <i class="fa fa-certificate" aria-hidden="true"></i> &nbsp; Certificate Coursees</span></h5>
            </div>

              <div class="row" style="padding:10px;border-bottom:1px dotted #ccc">
                  <div class="col-sm-12" style="margin:0; padding:0">
                   <a href="#">
                    <div class="col-sm-2" style="margin:0; padding:0"><img src="<?php echo base_url('assets/images/workshoptraining/trustbank48.jpg');?>" /></div>
                    <div class="col-sm-10" style="margin:0; padding:0"><h6 style="font-weight:normal;">Bangladesh Vat & Tax Paying System - Training</h6>
                    <span style="font-size:11px; color:#999"><?php echo date('l , d F l Y');?></span></div>
                    </a>
                  </div>
              </div>
              <div class="row" style="padding:10px;border-bottom:1px dotted #ccc">
                  <div class="col-sm-12" style="margin:0; padding:0">
                    <a href="#">
                    <div class="col-sm-2" style="margin:0; padding:0"><img src="<?php echo base_url('assets/images/workshoptraining/timesuni48.jpg');?>" /></div>
                    <div class="col-sm-10" style="margin:0; padding:0"><h6 style="font-weight:normal;">Software Development Life Cycle - SDLC</h6>
                    <span style="font-size:11px; color:#999"><?php echo date('l , d F l Y');?></span></div>
                    </a>
                  </div>
              </div>
              
              <div class="row" style="padding:10px;border-bottom:1px dotted #ccc">
                  <div class="col-sm-12" style="margin:0; padding:0">
                    <a href="#">
                    <div class="col-sm-2" style="margin:0; padding:0"><img src="<?php echo base_url('assets/images/workshoptraining/worldvision48.jpg');?>" /></div>
                    <div class="col-sm-10" style="margin:0; padding:0"><h6 style="font-weight:normal;">Web Design & Development with PHP</h6>
                    <span style="font-size:11px; color:#999"><?php echo date('l , d F l Y');?></span></div>
                    </a>
                  </div>
              </div>
              <div class="row" style="padding:10px;border-bottom:1px dotted #ccc">
                  <div class="col-sm-12" style="margin:0; padding:0">
                   <a href="#">
                    <div class="col-sm-2" style="margin:0; padding:0"><img src="<?php echo base_url('assets/images/workshoptraining/tritech48.jpg');?>" /></div>
                    <div class="col-sm-10" style="margin:0; padding:0"><h6 style="font-weight:normal;">How to Be An Efficient Commercial & Procurement Manager</h6>
                    <span style="font-size:11px; color:#999"><?php echo date('l , d F l Y');?></span></div>
                    </a>
                  </div>
              </div>
              <div class="row" style="padding:10px;border-bottom:1px dotted #ccc">
                  <div class="col-sm-12" style="margin:0; padding:0">
                    <a href="#">
                    <div class="col-sm-2" style="margin:0; padding:0"><img src="<?php echo base_url('assets/images/workshoptraining/tobacco48.png');?>" /></div>
                    <div class="col-sm-10" style="margin:0; padding:0"><h6 style="font-weight:normal;">Export- Import Guideline with Commercial, Marketing, Costing & Documentation Procedure</h6>
                    <span style="font-size:11px; color:#999"><?php echo date('l , d F l Y');?></span></div>
                    </a>
                  </div>
              </div>
              <div class="row" style="padding:10px;border-bottom:1px dotted #ccc">
                  <div class="col-sm-12" style="margin:0; padding:0">
                   <a href="#">
                    <div class="col-sm-2" style="margin:0; padding:0"><img src="<?php echo base_url('assets/images/workshoptraining/tmgroup48.jpg');?>" /></div>
                    <div class="col-sm-10" style="margin:0; padding:0"><h6 style="font-weight:normal;">How to Be An Efficient Commercial & Procurement Manager</h6>
                    <span style="font-size:11px; color:#999"><?php echo date('l , d F l Y');?></span></div>
                    </a>
                    
                  </div>
              </div>
              
        </div>
    </div>
  </div>
</div>
<div class="videowraper section" style="height:250px;">
  <div class="container"> 
    <!-- title start -->
    <div class="titleTop">
      <h3>Our <span>Measseges</span></h3>
    </div>
    <!-- title end -->
    
    <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum congue posuere lacus, id tincidunt nisi porta sit amet. Suspendisse et sapien varius, pellentesque dui non, semper orci.</p> </div>
</div>
<div class="section" style="margin:0; padding:0;background:#fafafa">
    	 <div class="titleTop">
            <h3>Our <span>Partners</span></h3></div>
            <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1200px;height:140px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position:absolute;top:0px;left:0px;background-color:rgba(0,0,0,0.7);">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1200px;height:140px;overflow:hidden;">
            <div>
                <img data-u="image" src="<?php echo base_url('assets/images/employers/huwai.png');?>" />
            </div>
            <div>
                <img data-u="image" src="<?php echo base_url('assets/images/employers/brac.png');?>" />
            </div>
            <div>
                <img data-u="image" src="<?php echo base_url('assets/images/employers/navana.png');?>" />
            </div>
            <div>
                <img data-u="image" src="<?php echo base_url('assets/images/employers/agricul_bank.png');?>" />
            </div>
            <div>
                <img data-u="image" src="<?php echo base_url('assets/images/employers/partex.png');?>" />
            </div>
            <div>
                <img data-u="image" src="<?php echo base_url('assets/images/employers/emplogo12.jpg');?>" />
            </div>
            <div>
                <img data-u="image" src="<?php echo base_url('assets/images/employers/develpalw.png');?>" />
            </div>
            <div>
                <img data-u="image" src="<?php echo base_url('assets/images/employers/baximco.png');?>" />
            </div>
            <div>
                <img data-u="image" src="<?php echo base_url('assets/images/employers/eqim.jpg');?>" />
            </div>
            <div>
                <img data-u="image" src="<?php echo base_url('assets/images/employers/develpalw.png');?>" />
            </div>
            <div>
                <img data-u="image" src="<?php echo base_url('assets/images/employers/prangr.png');?>" />
            </div>
            <div>
                <img data-u="image" src="<?php echo base_url('assets/images/employers/usbangla.png');?>" />
            </div>
            
        </div>
    </div>
</div>
 <script type="text/javascript">jssor_1_slider_init();</script>