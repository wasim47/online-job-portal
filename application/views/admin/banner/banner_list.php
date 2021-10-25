<script type="text/JavaScript">
function openPage1(pid,tablename,colid)
{
	var b = window.confirm('Are you sure, you want to Delete This ?');
	if(b==true){
		$.ajax({
			   type: "GET",
			   url: '<?php echo base_url()?>nafisa_administrator/deleteData/'+tablename+'/'+colid,
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
			var hrefdata ="<?php echo base_url();?>nafisa_administrator/approve?approve_val="+data+"&tablename=banner"+"&id=b_id"+"&status=status";
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
			var hrefdata ="<?php echo base_url();?>nafisa_administrator/deapprove?approve_val="+data+"&tablename=banner"+"&id=b_id"+"&status=status";
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
			var hrefdata ='<?php echo base_url()?>nafisa_administrator/deleteAllData/'+tablename+'/b_id/'+data;
			window.location.href=hrefdata;
			}
			else{
			 return;
			 }
	}
	
}

function update_sequence(id){
var updateid = document.getElementById("sequence"+id).value;
window.location.href='<?php echo base_url('nafisa_administrator/sequenceManage');?>?sequence='+updateid+"&&id="+id+"&&tid=b_id&&tbl=banner";
}
</script>
<div class="right_col" role="main">
                <div class="">

                    
                    <div class="clearfix"></div>
                    <div class="row">




    





                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2 style="float:left">Total banner (<?php echo $banner_list->num_rows();?>)</h2>
                                     <h2 style="float:right">
                                    <a href="<?php echo base_url('nafisa_administrator/banner_registration');?>" class="btn btn-primary  btn-sm">New Banner</a>
                                    <input type="button" class="btn btn-success btn-sm" onclick="approve();" value="Approve"/>
                                    <input type="button" class="btn btn-warning btn-sm" onclick="deapprove();" value="Disapprove" />
                                    <input type="button" class="btn btn-danger btn-sm" onclick="deletedata('banner');" value="Delete" />
                                    </h2>
                                    <div class="clearfix"></div>
                                   
                                </div>
                                 <?php echo form_open('', 'name="formUserSearch" id="form_check"');?>
                                <div class="x_content">
                                <div style="width:100%"><?php echo $this->session->flashdata('successMsg');?></div>
                                <div class="container">
                                  <table class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th>SI</th>
                                        <th width="7%"><input name="checkbox" onclick='checkedAll();' type="checkbox" /></th>
                                        <th>banner</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?php
									$i=0;
                                    foreach($banner_list->result() as $bannerData):
									$b_id=$bannerData->b_id;
									$bannerTitle=$bannerData->banner_name;
									$status=$bannerData->status;
									$sequence=$bannerData->sequence;
									if($status==1){
										$status = '<span class="btn btn-success btn-xs"><i class="fa fa-check"></i></span>';
									}
									else{
										$status = '<span class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></span>';
									}
									$i++;
									?>
                                      <tr>
                                        <td><?php echo $i;?></td>
                                        <td><input type="checkbox"  name="summe_code[]" id="summe_code<?php echo $i; ?>" value="<?php echo $b_id;?>" /></td>
                                        <td><?php echo $bannerTitle; ?></td>
                                        <td>
											<input type="text" name="sequence" id="sequence<?php echo $b_id;?>" value="<?php echo $sequence;?>" class="form-control" style="width:30%; float:left;" />
                    <input type="button" name="update" id="update" value="Save" class="btn btn-success" onclick="update_sequence(<?php echo $b_id;?>);" />                                        </td>
                     					<td><?php echo $status; ?></td>
                                         <td> 
                                         	<a href="<?php echo base_url('nafisa_administrator/banner_registration/'.$b_id);?>" class="btn btn-default btn-sm">
          										<span class="glyphicon glyphicon-edit"></span> Edit
                                            </a> 
                                            <a href="javascript:void();" onclick="openPage1('<?php echo $b_id;?>','banner','b_id');" class="btn btn-default btn-sm">
          										<span class="glyphicon glyphicon-remove-circle"></span> Remove
                                            </a>
                                            </td>
                                      </tr>
                                    <?php
                                    endforeach;
									?>  
                                      
                                    </tbody>
                                  </table>
                                </div>
                                </div>
                                <?php echo form_close();?>
                            </div>
                        </div>
                    </div>


                </div>
               