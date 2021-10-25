<script type="text/javascript">

function openPage1(pid,tablename,colid)
{
	var b = window.confirm('Are you sure, you want to Delete This ?');
	if(b==true){
		$.ajax({
			   type: "GET",
			   url: '<?php echo base_url();?>admin/deleteData/'+tablename+'/'+colid,
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
			var hrefdata ="<?php echo base_url();?>admin/approve?approve_val="+data+"&tablename=admin_users"+"&id=id"+"&status=active";
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
			var hrefdata ="<?php echo base_url();?>admin/deapprove?approve_val="+data+"&tablename=admin_users"+"&id=id"+"&status=active";
			window.location.href=hrefdata;
	}
	
}

function deletedata(tablename){
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
			var hrefdata ='<?php echo base_url();?>admin/deleteAllData/'+tablename+'/id/'+data;
			window.location.href=hrefdata;
			}
			else{
			 return;
			 }
	}
	
}
</script>
<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					

					<div class="breadcrumb-line breadcrumb-line-component" style="margin-top:10px; margin-bottom:10px;">
						<ul class="breadcrumb" style="font-size:20px;">
							<li>Admin List</li>
                            <li>Total User = <?php echo $admin_list->num_rows();?></li>
						</ul>

						<ul class="breadcrumb-elements">
							<div class="heading-btn-group">
								<a href="<?php echo base_url('admin/administration_registration');?>" class="btn btn-link btn-float has-text">
                                <i class="glyphicon glyphicon-plus-sign"></i><span>Add New</span></a>
								<a href="javascript:void();" onclick="approve('admin_users');" class="btn btn-link btn-float has-text" style="color:#00CC00">
                                <i class="glyphicon glyphicon-record"></i> <span>Approved</span></a>
								<a href="javascript:void();" onclick="deapprove('admin_users');" class="btn btn-link btn-float has-text" style="color:#CC3300" >
                                <i class="glyphicon glyphicon-off"></i> <span>Disapproved</span></a>
							</div>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Page length options -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>

			                	</ul>
		                	</div>
						</div>

						<?php echo form_open('','id="form_check"');?>
                        <table class="table datatable-show-all" width="100%">
                                    <thead>
                                      <tr>
                                        <th>SI</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?php
									$i=0;
                                    foreach($admin_list->result() as $admin):
										$admin_id=$admin->id;
										$username=$admin->username;
										$email=$admin->email;
									$i++;
									?>
                                      <tr>
                                        <td><?php echo $i;?></td>
                                        <td><?php echo $username; ?></td>
                                        <td><?php echo $email; ?></td>
                                         <td> 
                                         	<a href="<?php echo base_url('admin/administration_registration/'.$admin_id);?>" class="btn btn-default btn-sm">
          										<span class="glyphicon glyphicon-edit"></span> Edit
                                            </a> 
                                            <a href="javascript:void();" onclick="openPage1('<?php echo $admin_id;?>','admin_users','id');" class="btn btn-default btn-sm">
          										<span class="glyphicon glyphicon-remove-circle"></span> Remove
                                            </a>
                                            </td>
                                      </tr>
                                    <?php
                                    endforeach;
									?>  
                                      
                                    </tbody>
                                  </table>
                        
                        
                      <?php echo form_close();?>
					</div>
