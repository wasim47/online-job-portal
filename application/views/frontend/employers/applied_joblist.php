<div class="container" style="margin-top:50px">
<div class="row">
<div class="col-md-3"><?php include('left_menu.php');?></div>

   
   
    
   

      <div class="col-md-9 col-sm-9" style="background:#fff">
         <table class="table datatable-show-all" width="100%">
									<thead>
                                        <tr>
                                          <th width="2%">SI</th>
                                          <th width="22%">Job Title</th>
                                          <th width="21%">Jobseekers</th>
                                          <th width="14%">Exp. Salary</th>
                                          <th width="27%">Cover</th>
                                          <th width="14%">Time</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                         <?php
										$i=0;
										foreach($jobpostlist->result() as $jobpost):
											$id=$jobpost->ID;
											$cover_letter=$jobpost->cover_letter;
											$employer_ID=$jobpost->employer_ID;
											$job_ID=$jobpost->job_ID;
											$seeker_ID=$jobpost->seeker_ID;
											$cover_letter=$jobpost->cover_letter;
											$expected_salary=$jobpost->expected_salary;
											$dated=$jobpost->dated;
											
											$queryCat = $this->db->query("SELECT * FROM jobpost WHERE job_id='".$job_ID."'");
											$crow = $queryCat->row_array();
											
											$queryJS = $this->db->query("SELECT * FROM  jobseekers WHERE id='".$seeker_ID."'");
											$jrow = $queryJS->row_array();
											
											//$headline=$jobpost->job_title;
											//$category=$jobpost->job_category;
											//$active=$jobpost->status;
											/*if($active==1){
												$status = '<span class="label label-success">Active</span>';
											}
											else{
												$status = '<span class="label label-default">Inactive</span>';
											}
											
											$queryCat = $this->db->query("SELECT * FROM category WHERE sub_cat_slug='".$category."'");
											$crow = $queryCat->row_array();*/
										$i++;
										?>
										  
                                        <tr>
											<td><?php echo $i;?></td>
											<td><?php echo $crow['job_title']; ?></td>
                                            <td><?php echo $jrow['fullname']; ?></td>
											<td><?php echo $expected_salary; ?></td>	
                                            <td><?php echo $cover_letter; ?></td>	
                                            <td><?php echo $dated; ?></td>											 
                                             
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
