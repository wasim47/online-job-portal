<script type="text/JavaScript">
function openPage1(pid,tablename,colid)
{
	var b = window.confirm('Are you sure, you want to Delete This ?');
	if(b==true){
		$.ajax({
			   type: "GET",
			   url: '<?php echo base_url()?>agninet_admin/deleteData/'+tablename+'/'+colid,
			   data: "deleteId="+pid,
			   success: function() {
				  alert("Successfully saved");
				  window.location.reload(true);
				},
				error: function() {
				  alert("There was an error. Try again please!");
				}
		 });
	}
	else{
	 return;
	}
	 
}
</script>
<script type="text/javascript">
checked = false;
function checkedAll() {
if (checked == false){checked = true}else{checked = false}
	for (var i = 0; i < document.getElementById('form_check').elements.length; i++){
	  document.getElementById('form_check').elements[i].checked = checked;
	}
}
function approve(){
	var summeCode=document.getElementsByName("summe_code[]");
	var j=0;
	var data= new Array();
	
	for(var i=0; i < summeCode.length; i++){
		if(summeCode[i].checked)
		{
			data[j]=summeCode[i].value;
			j++;
			
		}
		
	}
	if(data=="")
	{
		alert("Please check one or more!");
		return false;
	}
	else{
			var hrefdata ="<?php echo base_url();?>agninet_admin/approved?approve_val="+data;
			window.location.href=hrefdata;
	}
	
}

function deapprove(){
	var summeCode=document.getElementsByName("summe_code[]");
	var j=0;
	var data= new Array();
	
	for(var i=0; i < summeCode.length; i++){
		if(summeCode[i].checked)
		{
			data[j]=summeCode[i].value;
			j++;
			
		}
		
	}
	if(data=="")
	{
		alert("Please check one or more!");
		return false;
	}
	else{
			var hrefdata ="<?php echo base_url();?>agninet_admin/deapproved?deapprove_val="+data;
			window.location.href=hrefdata;
	}
	
}

function deletedata(){
	var summeCode=document.getElementsByName("summe_code[]");
	var j=0;
	var data= new Array();
	
	for(var i=0; i < summeCode.length; i++){
		if(summeCode[i].checked)
		{
			data[j]=summeCode[i].value;
			j++;
			
		}
		
	}
	if(data=="")
	{
		alert("Please check one or more!");
		return false;
	}
	else{
		var b = window.confirm('Are you sure, you want to delete this ?');
		if(b==true){
			var hrefdata ="<?php echo base_url();?>member/delete?brid="+data;
			window.location.href=hrefdata;
			}
			else{
			 return;
			 }
	}
	
}
</script>
<div class="right_col" role="main">
                <div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3>Contact Information Details</h3>
                        </div>
                        
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">




    





                        <div class="col-md-12 col-sm-12 col-xs-12">
                        <?php echo form_open('', 'name="formUserSearch" id="form_check"');?>
                            <div class="x_panel">
                                <div class="x_title">
                                    <?php if($contact_info_list->num_rows() < 1 && $contact_info_list->num_rows() == 0){?>
                                    <h2 style="float:right">
                                    <a href="<?php echo base_url('nafisa_administrator/contact_info_registration');?>" class="btn btn-primary">New  Entry</a>
                                    </h2>
                                    <?php } ?>
                                    <div class="clearfix"></div>
                                    
                                   
                                </div>
                                <div class="x_content">
                                <div style="width:100%"><?php echo $this->session->flashdata('successMsg');?></div>
                                <div class="container">
                                  <table class="table table-striped" width="100%">
                                    <thead>
                                      <tr>
                                        <th width="7%">SI</th>
                                        <th width="20%">Headline</th>
                                        <th width="15%">Latitude</th>
                                        <th width="22%">Longtitude</th>
                                        <th width="15%">Email</th>
                                        <th width="21%">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?php
									$i=0;
                                    foreach($contact_info_list->result() as $contact_info):
										$contact_infoId=$contact_info->id;
										$email=$contact_info->email;
										$active=$contact_info->active;
										$lan=$contact_info->lan;
										$lat=$contact_info->lat;
									$i++;
									
									?>
                                      <tr>
                                        <td><?php echo $i;?></td>
                                        <td align="left">Contact Address</td>
                                        <td align="left"><?php echo $email; ?></td>
                                        <td align="left"><?php echo $lan; ?></td>
                                        <td align="left"><?php echo $lat; ?></td>
                                        <td width="21%" align="left"> 
                                       	   <a href="<?php echo base_url('nafisa_administrator/contact_info_registration/'.$contact_infoId);?>" class="btn btn-default btn-sm">
       										   <span class="glyphicon glyphicon-edit"></span> Edit</a> 
                                           <?php if($contact_info_list->num_rows() > 0  && $contact_info_list->num_rows()< 2){?>
                                         	  <a href="javascript:void();" onclick="openPage1('<?php echo $contact_infoId;?>','contact_info','id');" class="btn btn-default btn-sm">
       										   <span class="glyphicon glyphicon-remove-circle"></span> Remove                                            </a>  
                                           <?php } ?>                                      
                                         </td>
                                      </tr>
                                    <?php
                                    endforeach;
									?>  
                                    </tbody>
                                  </table>
                                </div>
                                </div>
                            </div>
                       <?php echo form_close();?>  
                        </div>
                    </div>

                   

                </div>
               