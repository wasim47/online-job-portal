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


</script>
<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					

					<div class="breadcrumb-line breadcrumb-line-component" style="margin-top:10px; margin-bottom:10px;">
						<ul class="breadcrumb" style="font-size:20px;">
							<li> Message List</li>
                          <li>Total Message = <?php echo $messages_list->num_rows();?></li>
						</ul>

						<ul class="breadcrumb-elements">
							<div class="heading-btn-group">
								<a href="<?php echo base_url('admin/messages_registration');?>" class="btn btn-link btn-float has-text">
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
                                        <th width="2%">SI</th>
                                        <th width="33%">Message Title</th>
                                        <th width="9%">Photo</th>
                                        <th width="34%">Message Content</th>
                                        <th width="12%">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?php
									$i=0;
                                    foreach($messages_list->result() as $messagesData):
									$a_id=$messagesData->a_id;
									$msg_title=$messagesData->msg_title;
									$msg_content=$messagesData->msg_content;
									$photo=$messagesData->photo;
									$i++;
									?>
                                      <tr>
                                        <td><?php echo $i;?></td>
                                        <td><?php echo $msg_title; ?></td>
                                        <td><img src="<?php echo base_url('asset/uploads/messages/'.$photo); ?>" style="width:100px; height:auto" /></td>
                                        <td>
                                        <?php  
											$cmessage = strip_tags($msg_content);
											if (strlen($cmessage) > 600) {
												$stringCut = substr($cmessage, 0, 600);
												$cmessage = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
											}
											echo $cmessage;
										?>
                                        </td>
                                       
                                        <td> 
                                        
                                        <ul class="icons-list">
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu9"></i></a>
												<ul class="dropdown-menu dropdown-menu-right">
													<li><a href="<?php echo base_url('admin/messages_registration/'.$a_id);?>" style="color:#EDBB0E">
                                                    <i class="glyphicon glyphicon-edit"></i> Edit Information</a></li>
													<li><a href="javascript:void();" onClick="openPage1('<?php echo $a_id;?>','messages','a_id');" style="color:#ff0000">
                                                    <i class="glyphicon glyphicon-trash"></i> Delete</a></li>
												</ul>
											</li>
										</ul>		
                                        
                                            </td>
                                      </tr>
                                    <?php
                                    endforeach;
									?>  
                                      
                                    </tbody>
                                  </table>
                        
                        
                      <?php echo form_close();?>
					</div>
