<!DOCTYPE html>
<html lang="en" ng-app='wasimApp'>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $title;?></title>
<link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.ico">
<link href="<?php echo base_url();?>assets/css/owl.carousel.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/font-awesome.css" rel="stylesheet">
<script src="<?php echo base_url('assets/angular.1.6.1.min.js');?>"></script>
<script src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script> 
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script> 

<link href="<?php echo base_url();?>assets/css/main.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/dashboard.css" rel="stylesheet">
<link href="<?php echo base_url('assets/lightbox/custombox.min.css');?>" rel="stylesheet">

<script src="<?php echo base_url('assets/lightbox/custombox.min.js');?>"></script>
<script src="<?php echo base_url('assets/lightbox/custombox.legacy.min.js');?>"></script>

<link rel="stylesheet" href="<?php echo base_url();?>assets/bg_slider/css/style.css">

<script>
$(window).scroll(function () { 
	if ($(this).scrollTop()) {
		$(".custom-header").addClass("fixed-header");
		$('#back-to-top').fadeIn();
	} else {
		$(".custom-header").removeClass("fixed-header");
		$('#back-to-top').fadeOut();
	}
	
});


$(document).ready(function(){
        $('#back-to-top').click(function () {
            $('#back-to-top').tooltip('hide');
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
        
        $('#back-to-top').tooltip('show');

});
</script>
<style>
.back-to-top {
    cursor: pointer;
    position: fixed;
    bottom: 20px;
    right: 20px;
    display:none;
}

</style>


</head>
<body>