<div class="row padding-home">
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats div-rounded">
								<div class="card-body">
									
									<div class="row align-items-center">
										<div class="col-12">
											<div class="col-12 keypl-background-web-profile"></div>
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
											<h6>{{Auth::user()->email}}</h6>
										</div>
										<div class="col-12">
											<div class="row align-items-center">
												<div class="col-icon">
													<div class="icon-big text-center">
														<i class="fa fa-id-card profile-icon-color"></i>
													</div>
												</div>
												<div class="col col-stats ml-3 ml-sm-0">
													<div class="numbers">
														<p class="card-category">Mis Keypls</p>
														<h6>{{$data['cards']}}</h6>
													</div>
												</div>
											</div>
								
										</div>
										<div class="col-12">
											<div class="row align-items-center">
												<div class="col-icon">
													<div class="icon-big text-center">
														<i class="fa fa-qrcode profile-icon-color"></i>
													</div>
												</div>
												<div class="col col-stats ml-3 ml-sm-0">
													<div class="numbers">
														<p class="card-category">Vistas QR</p>
														<h6>{{$data['qr_views']}}</h6>
													</div>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="row align-items-center">
												<div class="col-icon">
													<div class="icon-big text-center">
														<i class="fa fa-link profile-icon-color"></i>
													</div>
												</div>
												<div class="col col-stats ml-3 ml-sm-0">
													<div class="numbers">
														<p class="card-category">Visitas links</p>
														<h6>{{$data['link_views']}}</h6>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-9">
							@include('home.items.content-keypls')
						</div>
					</div>
		