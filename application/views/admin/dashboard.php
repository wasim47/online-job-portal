
			<!-- Main content -->
			<div class="content-health">

				<!-- Content area -->
				<div class="content">

					<!-- Main charts -->
					<div class="row">
						<div class="col-lg-12">

							<!-- Traffic sources -->
							<div class="panel panel-flat">
								<div class="panel-heading">
									<h4 class="panel-title">Short Summery</h4>
									
								</div>

								<div class="container-fluid">
									<div class="row">
                                    
                                    
                                    	<div class="col-lg-3">

                                            <!-- Members online -->
                                            <div class="panel" style="background:#26A69A; color:#fff">
                                                <div class="panel-body">
                                                    
        
                                                    <h1 class="no-margin"><?php echo $totalinst->num_rows();?></h1>
                                                    <h3 style="padding:0; margin:0">Total News</h3>
                                                    </div>
                                                <div class="container-fluid">
                                                    <div id="members-online"></div>
                                                </div>
                                            </div>
                                            <!-- /members online -->
        
                                        </div>

                                        <div class="col-lg-3">
        
                                            <!-- Current server load -->
                                            <div class="panel bg-grey-400">
                                                <div class="panel-body">
                                                    <h1 class="no-margin"><?php echo $totalstd->num_rows();?></h1>
                                                    <h3 style="padding:0; margin:0">Total Category</h3>
                                                    </div>
                                                <div id="server-load"></div>
                                            </div>
                                            <!-- /current server load -->
        
                                        </div>
        
                                        <div class="col-lg-3">
        
                                            <!-- Today's revenue -->
                                            <div class="panel bg-blue-400">
                                                <div class="panel-body">
                                                    
        
                                                    <h1 class="no-margin"><?php echo $totalphoto->num_rows();?></h1>
                                                    <h3 style="padding:0; margin:0">Total Photo</h3>
                                                    </div>
                                                <div id="today-revenue"></div>
                                            </div>
                                            <!-- /today's revenue -->
        
                                        </div>
                                
                                
										<div class="col-lg-3">
        
                                            <!-- Today's revenue -->
                                            <div class="panel bg-green-400" style="background:#BF0000">
                                                <div class="panel-body">
                                                    
        
                                                    <h1 class="no-margin"><?php echo $totalvideo->num_rows();?></h1>
                                                    <h3 style="padding:0; margin:0">Total Video</h3>
                                                    </div>
                                                <div id="today-revenue"></div>
                                            </div>
                                            <!-- /today's revenue -->
        
                                        </div>

										
									</div>
								</div>

								<div class="position-relative" id="traffic-sources" style="overflow:hidden"></div>
							</div>

						</div>
					</div>
                    
                  <!--  <div class="row">
                        <img src="<?php echo base_url('assets/images/imsimg.png');?>" style="width:100%; height:auto" />
                    </div>-->
                    
					<?php /*?><div class="row">
						<div class="col-lg-8">

							<div class="panel panel-flat">
								
								<div class="table-responsive">
									<table class="table text-nowrap">
										<thead>
                                        	<tr>
												<th>Today Attendence</th>
											</tr>
											<tr>
												<th>Class</th>
												<th class="col-md-2">Shift</th>
                                                <th class="col-md-2">Total Student</th>
												<th class="col-md-2">Present</th>
												<th class="col-md-2">Absant</th>
												<th class="col-md-2">Action</th>
											</tr>
										</thead>
										<tbody>
											
											<tr>
												<td><div class="media-left">
														<div class=""><a href="#" class="text-default text-semibold">Class One</a></div>
														<div class="text-muted text-size-small">
															<span class="status-mark border-danger position-left"></span>
															Time: 13:00 - 14:00
														</div>
													</div></td>
												<td><span class="text-muted">Mintlime</span></td>
												<td><span class="text-success-600">150</span></td>
												<td><span class="label bg-success-400">70</span></td>
												<td><span class="label bg-danger">50</span></td>
												<td class="text-center">
													<ul class="icons-list">
														<li class="dropdown">
															<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
															<ul class="dropdown-menu dropdown-menu-right">
																<li><a href="#"><i class="icon-file-stats"></i> View Statement</a></li>
																<li><a href="#"><i class="icon-file-text2"></i> Edit Statement</a></li>
																<li><a href="#"><i class="icon-file-locked"></i> Delete This Record</a></li>
																<li class="divider"></li>
																<li><a href="#"><i class="icon-gear"></i> Settings</a></li>
															</ul>
														</li>
													</ul>
												</td>
											</tr>
											<tr>
												<td><div class="media-left">
														<div class=""><a href="#" class="text-default text-semibold">Class Two</a></div>
														<div class="text-muted text-size-small">
															<span class="status-mark border-danger position-left"></span>
															Time: 13:00 - 14:00
														</div>
													</div></td>
												<td><span class="text-muted">Mintlime</span></td>
												<td><span class="text-success-600">70</span></td>
												<td><span class="label bg-success-400">30</span></td>
												<td><span class="label bg-danger">40</span></td>
												<td class="text-center">
													<ul class="icons-list">
														<li class="dropdown">
															<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
															<ul class="dropdown-menu dropdown-menu-right">
																<li><a href="#"><i class="icon-file-stats"></i> View Statement</a></li>
																<li><a href="#"><i class="icon-file-text2"></i> Edit Statement</a></li>
																<li><a href="#"><i class="icon-file-locked"></i> Delete This Record</a></li>
																<li class="divider"></li>
																<li><a href="#"><i class="icon-gear"></i> Settings</a></li>
															</ul>
														</li>
													</ul>
												</td>
											</tr>
                                            <tr>
												<td><div class="media-left">
														<div class=""><a href="#" class="text-default text-semibold">Class Three</a></div>
														<div class="text-muted text-size-small">
															<span class="status-mark border-danger position-left"></span>
															Time: 13:00 - 14:00
														</div>
													</div></td>
												<td><span class="text-muted">Mintlime</span></td>
												<td><span class="text-success-600">150</span></td>
												<td><span class="label bg-success-400">70</span></td>
												<td><span class="label bg-danger">50</span></td>
												<td class="text-center">
													<ul class="icons-list">
														<li class="dropdown">
															<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
															<ul class="dropdown-menu dropdown-menu-right">
																<li><a href="#"><i class="icon-file-stats"></i> View Statement</a></li>
																<li><a href="#"><i class="icon-file-text2"></i> Edit Statement</a></li>
																<li><a href="#"><i class="icon-file-locked"></i> Delete This Record</a></li>
																<li class="divider"></li>
																<li><a href="#"><i class="icon-gear"></i> Settings</a></li>
															</ul>
														</li>
													</ul>
												</td>
											</tr>
                                            <tr>
												<td><div class="media-left">
														<div class=""><a href="#" class="text-default text-semibold">Class Four</a></div>
														<div class="text-muted text-size-small">
															<span class="status-mark border-danger position-left"></span>
															Time: 13:00 - 14:00
														</div>
													</div></td>
												<td><span class="text-muted">Mintlime</span></td>
												<td><span class="text-success-600">150</span></td>
												<td><span class="label bg-success-400">70</span></td>
												<td><span class="label bg-danger">50</span></td>
												<td class="text-center">
													<ul class="icons-list">
														<li class="dropdown">
															<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
															<ul class="dropdown-menu dropdown-menu-right">
																<li><a href="#"><i class="icon-file-stats"></i> View Statement</a></li>
																<li><a href="#"><i class="icon-file-text2"></i> Edit Statement</a></li>
																<li><a href="#"><i class="icon-file-locked"></i> Delete This Record</a></li>
																<li class="divider"></li>
																<li><a href="#"><i class="icon-gear"></i> Settings</a></li>
															</ul>
														</li>
													</ul>
												</td>
											</tr>
                                            <tr>
												<td><div class="media-left">
														<div class=""><a href="#" class="text-default text-semibold">Class Five</a></div>
														<div class="text-muted text-size-small">
															<span class="status-mark border-danger position-left"></span>
															Time: 13:00 - 14:00
														</div>
													</div></td>
												<td><span class="text-muted">Mintlime</span></td>
												<td><span class="text-success-600">150</span></td>
												<td><span class="label bg-success-400">70</span></td>
												<td><span class="label bg-danger">50</span></td>
												<td class="text-center">
													<ul class="icons-list">
														<li class="dropdown">
															<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
															<ul class="dropdown-menu dropdown-menu-right">
																<li><a href="#"><i class="icon-file-stats"></i> View Statement</a></li>
																<li><a href="#"><i class="icon-file-text2"></i> Edit Statement</a></li>
																<li><a href="#"><i class="icon-file-locked"></i> Delete This Record</a></li>
																<li class="divider"></li>
																<li><a href="#"><i class="icon-gear"></i> Settings</a></li>
															</ul>
														</li>
													</ul>
												</td>
											</tr>
											
											

											<tr class="active border-double">
												<td colspan="6" align="right"><a href="#">View All Class record For today</a></td>
												<td class="text-right">
													<span class="progress-meter" id="yesterday-progress" data-progress="65"></span>
												</td>
											</tr>
										</tbody>
									</table>
                                    <table class="table text-nowrap">
										<thead>
                                        	<tr>
												<th>Yesterday Attendence</th>
											</tr>
											<tr>
												<th>Class</th>
												<th class="col-md-2">Shift</th>
                                                <th class="col-md-2">Total Student</th>
												<th class="col-md-2">Present</th>
												<th class="col-md-2">Absant</th>
												<th class="col-md-2">Action</th>
											</tr>
										</thead>
										<tbody>
											
											<tr>
												<td><div class="media-left">
														<div class=""><a href="#" class="text-default text-semibold">Class One</a></div>
														<div class="text-muted text-size-small">
															<span class="status-mark border-danger position-left"></span>
															Time: 13:00 - 14:00
														</div>
													</div></td>
												<td><span class="text-muted">Mintlime</span></td>
												<td><span class="text-success-600">150</span></td>
												<td><span class="label bg-success-400">70</span></td>
												<td><span class="label bg-danger">50</span></td>
												<td class="text-center">
													<ul class="icons-list">
														<li class="dropdown">
															<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
															<ul class="dropdown-menu dropdown-menu-right">
																<li><a href="#"><i class="icon-file-stats"></i> View Statement</a></li>
																<li><a href="#"><i class="icon-file-text2"></i> Edit Statement</a></li>
																<li><a href="#"><i class="icon-file-locked"></i> Delete This Record</a></li>
																<li class="divider"></li>
																<li><a href="#"><i class="icon-gear"></i> Settings</a></li>
															</ul>
														</li>
													</ul>
												</td>
											</tr>
											<tr>
												<td><div class="media-left">
														<div class=""><a href="#" class="text-default text-semibold">Class Two</a></div>
														<div class="text-muted text-size-small">
															<span class="status-mark border-danger position-left"></span>
															Time: 13:00 - 14:00
														</div>
													</div></td>
												<td><span class="text-muted">Mintlime</span></td>
												<td><span class="text-success-600">70</span></td>
												<td><span class="label bg-success-400">30</span></td>
												<td><span class="label bg-danger">40</span></td>
												<td class="text-center">
													<ul class="icons-list">
														<li class="dropdown">
															<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
															<ul class="dropdown-menu dropdown-menu-right">
																<li><a href="#"><i class="icon-file-stats"></i> View Statement</a></li>
																<li><a href="#"><i class="icon-file-text2"></i> Edit Statement</a></li>
																<li><a href="#"><i class="icon-file-locked"></i> Delete This Record</a></li>
																<li class="divider"></li>
																<li><a href="#"><i class="icon-gear"></i> Settings</a></li>
															</ul>
														</li>
													</ul>
												</td>
											</tr>
                                            <tr>
												<td><div class="media-left">
														<div class=""><a href="#" class="text-default text-semibold">Class Three</a></div>
														<div class="text-muted text-size-small">
															<span class="status-mark border-danger position-left"></span>
															Time: 13:00 - 14:00
														</div>
													</div></td>
												<td><span class="text-muted">Mintlime</span></td>
												<td><span class="text-success-600">150</span></td>
												<td><span class="label bg-success-400">70</span></td>
												<td><span class="label bg-danger">50</span></td>
												<td class="text-center">
													<ul class="icons-list">
														<li class="dropdown">
															<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
															<ul class="dropdown-menu dropdown-menu-right">
																<li><a href="#"><i class="icon-file-stats"></i> View Statement</a></li>
																<li><a href="#"><i class="icon-file-text2"></i> Edit Statement</a></li>
																<li><a href="#"><i class="icon-file-locked"></i> Delete This Record</a></li>
																<li class="divider"></li>
																<li><a href="#"><i class="icon-gear"></i> Settings</a></li>
															</ul>
														</li>
													</ul>
												</td>
											</tr>
                                            <tr>
												<td><div class="media-left">
														<div class=""><a href="#" class="text-default text-semibold">Class Four</a></div>
														<div class="text-muted text-size-small">
															<span class="status-mark border-danger position-left"></span>
															Time: 13:00 - 14:00
														</div>
													</div></td>
												<td><span class="text-muted">Mintlime</span></td>
												<td><span class="text-success-600">150</span></td>
												<td><span class="label bg-success-400">70</span></td>
												<td><span class="label bg-danger">50</span></td>
												<td class="text-center">
													<ul class="icons-list">
														<li class="dropdown">
															<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
															<ul class="dropdown-menu dropdown-menu-right">
																<li><a href="#"><i class="icon-file-stats"></i> View Statement</a></li>
																<li><a href="#"><i class="icon-file-text2"></i> Edit Statement</a></li>
																<li><a href="#"><i class="icon-file-locked"></i> Delete This Record</a></li>
																<li class="divider"></li>
																<li><a href="#"><i class="icon-gear"></i> Settings</a></li>
															</ul>
														</li>
													</ul>
												</td>
											</tr>
                                            <tr>
												<td><div class="media-left">
														<div class=""><a href="#" class="text-default text-semibold">Class Five</a></div>
														<div class="text-muted text-size-small">
															<span class="status-mark border-danger position-left"></span>
															Time: 13:00 - 14:00
														</div>
													</div></td>
												<td><span class="text-muted">Mintlime</span></td>
												<td><span class="text-success-600">150</span></td>
												<td><span class="label bg-success-400">70</span></td>
												<td><span class="label bg-danger">50</span></td>
												<td class="text-center">
													<ul class="icons-list">
														<li class="dropdown">
															<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
															<ul class="dropdown-menu dropdown-menu-right">
																<li><a href="#"><i class="icon-file-stats"></i> View Statement</a></li>
																<li><a href="#"><i class="icon-file-text2"></i> Edit Statement</a></li>
																<li><a href="#"><i class="icon-file-locked"></i> Delete This Record</a></li>
																<li class="divider"></li>
																<li><a href="#"><i class="icon-gear"></i> Settings</a></li>
															</ul>
														</li>
													</ul>
												</td>
											</tr>
											
											

											<tr class="active border-double">
												<td colspan="6" align="right"><a href="#">View All Class record For Yesterday</a></td>
												<td class="text-right">
													<span class="progress-meter" id="yesterday-progress" data-progress="65"></span>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>

						<div class="col-lg-4">

							
							<div class="panel panel-flat">
								<div class="panel-heading">
									<h6 class="panel-title">Financials Summery</h6>
									<div class="heading-elements">
										<span class="heading-text">Total Income</span>
									</div>
								</div>
								<div class="container-fluid">
									<div class="row text-center">
										<div class="col-md-4">
											<div class="content-group">
												<h6 class="text-semibold no-margin"><i class="icon-clipboard3 position-left text-slate"></i> 2,345</h6>
												<span class="text-muted text-size-small">This Week</span>
											</div>
										</div>

										<div class="col-md-4">
											<div class="content-group">
												<h6 class="text-semibold no-margin"><i class="icon-calendar3 position-left text-slate"></i> 3,568</h6>
												<span class="text-muted text-size-small">This Month</span>
											</div>
										</div>

										<div class="col-md-4">
											<div class="content-group">
												<h6 class="text-semibold no-margin"><i class="icon-comments position-left text-slate"></i> 32,693</h6>
												<span class="text-muted text-size-small">This Year</span>
											</div>
										</div>
									</div>
								</div>
                                
                                
                             	<div class="panel-heading">
									<h6 class="panel-title">&nbsp;</h6>
									<div class="heading-elements">
										<span class="heading-text">Total Cost</span>
									</div>
								</div>
								<div class="container-fluid">
									<div class="row text-center">
										<div class="col-md-4">
											<div class="content-group">
												<h6 class="text-semibold no-margin"><i class="icon-clipboard3 position-left text-slate"></i> 1,045</h6>
												<span class="text-muted text-size-small">This Week</span>
											</div>
										</div>

										<div class="col-md-4">
											<div class="content-group">
												<h6 class="text-semibold no-margin"><i class="icon-calendar3 position-left text-slate"></i> 2,068</h6>
												<span class="text-muted text-size-small">This Month</span>
											</div>
										</div>

										<div class="col-md-4">
											<div class="content-group">
												<h6 class="text-semibold no-margin"><i class="icon-comments position-left text-slate"></i> 12,393</h6>
												<span class="text-muted text-size-small">This Year</span>
											</div>
										</div>
									</div>
								</div>
                                
                                
                                
                                <div class="panel-heading">
									<h6 class="panel-title">&nbsp;</h6>
									<div class="heading-elements">
										<span class="heading-text">Total Benifite</span>
									</div>
								</div>
								<div class="container-fluid">
									<div class="row text-center">
										<div class="col-md-4">
											<div class="content-group">
												<h6 class="text-semibold no-margin"><i class="icon-clipboard3 position-left text-slate"></i> 1,015</h6>
												<span class="text-muted text-size-small">This Week</span>
											</div>
										</div>

										<div class="col-md-4">
											<div class="content-group">
												<h6 class="text-semibold no-margin"><i class="icon-calendar3 position-left text-slate"></i> 1,128</h6>
												<span class="text-muted text-size-small">This Month</span>
											</div>
										</div>

										<div class="col-md-4">
											<div class="content-group">
												<h6 class="text-semibold no-margin"><i class="icon-comments position-left text-slate"></i> 20,035</h6>
												<span class="text-muted text-size-small">This Year</span>
											</div>
										</div>
									</div>
								</div>

							</div>
							<!-- /my messages -->

						</div>
					</div><?php */?>
					
				</div>
				<!-- /content area -->


			</div>


		</div>

	</div>
    
    
