<script type="text/JavaScript">
function openPage1(pid,tablename,colid)
{
	var b = window.confirm('Are you sure, you want to Delete This ?');
	if(b==true){
		$.ajax({
			   type: "GET",
			   url: '<?php echo base_url()?>admin/deleteData/'+tablename+'/'+colid,
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


function update_sequence(id){
var updateid = document.getElementById("sequence"+id).value;
window.location.href='<?php echo base_url('admin/update_sequence');?>?sequence='+updateid+"&&id="+id;
}
</script>
<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					

					<div class="breadcrumb-line breadcrumb-line-component" style="margin-top:10px; margin-bottom:10px;">
						<ul class="breadcrumb" style="font-size:20px;">
							<li>Update List</li>
                            <li>Total Update = <?php echo $latest_update_list->num_rows();?></li>
						</ul>

						<ul class="breadcrumb-elements">
							<div class="heading-btn-group">
								<a href="<?php echo base_url('admin/latest_update_registration');?>" class="btn btn-link btn-float has-text">
                                <i class="glyphicon glyphicon-plus-sign"></i><span>Add New</span></a>
								
							</div>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Page length options -->
					<div class="panel panel-flat">
						

					  <?php echo form_open('','id="form_check"');?>
						<table class="table datatable-show-all" width="100%">
                                    <thead>
                                      <tr>
                                        <th width="6%">SI</th>
                                        <th width="11%">Date</th>
                                        <th width="27%">Update Type</th>
                                        <th width="29%">Update</th>
                                        <th width="27%" class="text-center">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?php
									$i=0;
                                    foreach($latest_update_list->result() as $latest_updateData):
									$latest_update_id=$latest_updateData->latest_update_id;
									$latest_updateTitle=$latest_updateData->latest_update_headline;
									$update_type=$latest_updateData->update_type;
									$ndate=$latest_updateData->ndate;
									$i++;
									?>
                                      <tr>
                                        <td><?php echo $i;?></td>
                                        <td><?php echo $ndate; ?></td>
                                        <td><?php echo ucfirst($update_type); ?></td>
                                        <td><?php echo $latest_updateTitle; ?></td>
                                        <td class="text-center">
										<ul class="icons-list">
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu9"></i></a>
												<ul class="dropdown-menu dropdown-menu-right">
													<li><a href="<?php echo base_url('admin/latest_update_registration/'.$latest_update_id);?>" style="color:#EDBB0E">
                                                    <i class="glyphicon glyphicon-edit"></i> Edit Information</a></li>
													<li><a href="javascript:void();" onclick="openPage1('<?php echo $latest_update_id;?>','latest_update','latest_update_id');" 
                                                    style="color:#ff0000">
                                                    <i class="glyphicon glyphicon-trash"></i> Delete</a></li>
												</ul>
											</li>
										</ul>                                        </td>
                                      </tr>
                                    <?php
                                    endforeach;
									?>  
                                    </tbody>
                                  </table>
                      <?php echo form_close();?>
					</div>
