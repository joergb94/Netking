    <div class="col-12" id="index_table">
							<div class="card card-stats div-rounded">
								<div class="card-body">
									
									<div class="row align-items-center">
										<div class="col-12">
                      
											<div class="col-12 keypl-background-web-profile">
                      
                      </div>
											<div class="profile-header-container">   
												<div class="profile-header-img">
													<img class="img-circle rounded-circle"src='{{(Auth::user()->image)?Auth::user()->path.Auth::user()->image:asset("img/profile.jpg")}}' />
													<!-- badge -->
													<div class="rank-label-container">
														<span class="label label-default rank-label">{{Auth::user()->nickname}}</span>
													</div>
												</div>
											</div> 
										</div>
										<div class="col-12 text-center">
											<br>
											<h6>{{Auth::user()->name}} {{Auth::user()->last_name}}</h6>
										</div>
										<div class="col-12">
											<div class="row align-items-center">
												<div class="col-icon">
													<div class="icon-big text-center">
														<i class="fas fa-envelope profile-icon-color"></i>
													</div>
												</div>
												<div class="col col-stats ml-3 ml-sm-0">
													<div class="numbers">
                            <h6>{{Auth::user()->email}}</h6>
													</div>
												</div>
											</div>
								
										</div>
										<div class="col-12">
											<div class="row align-items-center">
												<div class="col-icon">
													<div class="icon-big text-center">
														<i class="fas fa-phone profile-icon-color"></i>
													</div>
												</div>
												<div class="col col-stats ml-3 ml-sm-0">
													<div class="numbers">
														<h6>{{Auth::user()->phone}}</h6>
													</div>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="row align-items-center">
												<div class="col-icon">
													<div class="icon-big text-center">
														<i class="fas fa-map-marker-alt profile-icon-color"></i>
													</div>
												</div>
												<div class="col col-stats ml-3 ml-sm-0">
													<div class="numbers">
														<h6>{{Auth::user()->street}}</h6>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

    </div>
    