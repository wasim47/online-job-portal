<div class="col-md-12 col-sm-12">
               	<?php if($totalcvrow->num_rows() > 0){?>
               	<table class="table datatable-show-all" width="100%">
									<thead>
                                        <tr>
                                          <th width="2%">SI</th>
                                          <th width="17%">Jobseekers Name</th>
                                          <th width="12%">Phone</th>
                                          <th width="17%">Email</th>
                                          <th width="20%">Skills</th>
                                          <th width="16%">Expected Salary</th>
                                          <th width="16%" class="text-center">CV</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                         <?php
											 
											$i=0;
											foreach($totalcvrow->result() as $jobpost):
												$id=$jobpost->id;
												$fullname=$jobpost->fullname;
												$phone=$jobpost->phone;
												$email=$jobpost->email;
												$career_summery=$jobpost->career_summery;
												$skills=$jobpost->skills;
												$expected_salary=$jobpost->expected_salary;
												$cv_upload=$jobpost->cv_upload;
												
											$i++;
											?>
											  
											<tr>
												<td><?php echo $i;?></td>
												<td><?php echo $fullname; ?></td>
												<td><?php echo $phone; ?></td>
												<td><?php echo $email; ?></td>
                                                <td><?php echo $skills; ?></td>	
                                                <td><?php echo $expected_salary; ?></td>												 
												 <td class="text-center">
												 <a href="<?php echo base_url('employers/downloadPdf/'.$cv_upload);?>" style="color:#009933">
																<i class="glyphicon glyphicon-download"></i> Download</a></td>
												 
											  </tr>
											 <?php
											endforeach;
											?>  
                                    </tbody>
                                </table>
				<?php 
				}
				else{
					echo '<h2 style="color:#f00; margin-top:20%; text-align:center">No Records Found</h2>';
				}
				?>
              </div>
