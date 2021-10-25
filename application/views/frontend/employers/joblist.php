<div class="container" style="margin-top:50px">
<div class="row">
<div class="col-md-3"><?php include('left_menu.php');?></div>

   
   
    
   

      <div class="col-md-9 col-sm-9" style="background:#fff">
         <table class="table datatable-show-all" width="100%">
									<thead>
                                        <tr>
                                          <th width="2%">SI</th>
                                          <th width="26%">Job Category</th>
                                          <th width="46%">Job Title</th>
                                          <th width="9%">Status</th>
                                          <th width="15%" class="text-center">Actions</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                         <?php
										$i=0;
										foreach($jobpostlist->result() as $jobpost):
											$id=$jobpost->job_id;
											$headline=$jobpost->job_title;
											$category=$jobpost->job_category;
											$active=$jobpost->status;
											if($active==1){
												$status = '<span class="label label-success">Active</span>';
											}
											else{
												$status = '<span class="label label-default">Inactive</span>';
											}
											
											$queryCat = $this->db->query("SELECT * FROM category WHERE sub_cat_slug='".$category."'");
											$crow = $queryCat->row_array();
										$i++;
										?>
										  
                                        <tr>
											<td><?php echo $i;?></td>
											<td><?php echo $crow['sub_cat_name']; ?></td>
                                            <td><?php echo $headline; ?></td>
											<td><?php echo $status; ?></td>											 
                                             <td class="text-center">
                                             <a href="<?php echo base_url('admin/jobpost_action/'.$id);?>" style="color:#009933">
                                                            <i class="glyphicon glyphicon-edit"></i> Edit</a></td>
                                             
										  </tr>
                                         <?php
										endforeach;
										?>  
                                    </tbody>
                                </table>
      </div>
     
     
      
      </div>
      <!-- end of col-md-9 -->
      </div>
    
    
  </div>
</div>
