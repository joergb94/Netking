
					<div class="page-header">
						<h4 class="page-title">Dashboard</h4>
						<div class="btn-group btn-group-page-header ml-auto">
							<button type="button" class="btn btn-light btn-round btn-page-header-dropdown dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-ellipsis-h"></i>
							</button>
							<div class="dropdown-menu">
								<div class="arrow"></div>
								<a class="dropdown-item" href="#">Action</a>
								<a class="dropdown-item" href="#">Another action</a>
								<a class="dropdown-item" href="#">Something else here</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Separated link</a>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6 col-md-4">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-primary bubble-shadow-small">
												<i class="fa fa-id-card"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">Mis Keypls</p>
												<h4 class="card-title">{{$data['cards']}}</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-4">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-info bubble-shadow-small">
												<i class="fa fa-qrcode"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">Vistas QR</p>
												<h4 class="card-title">{{$data['qr_views']}}</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-4">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-success bubble-shadow-small">
												<i class="fa fa-link"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">Visitas links</p>
												<h4 class="card-title">{{$data['link_views']}}</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<di class="col-sm-6">
							<div class="card">
								<div class="card-header">
									<h2>Views On Keylps</h2>
								</div>
								<div class="card-body">
									<div class="col-12">
										<canvas id="chart"></canvas>
									</div>
								</div>
							</div>
						</di>
						<di class="col-sm-6">
							<div class="card">
								<div class="card-header">
									<h2>Network Socials</h2>
								</div>
								<div class="card-body">
									<div class="col-12">
										<canvas id="chart-social"></canvas>
									</div>
								</div>
							</div>
						</di>
						<div class="col-sm-12">
							<div id="index_table">
								<div class="row">
									<!--table section-->
									<div class="col">
									<div class="col-sm-12">
											<div class="row">
											@forelse($data['keypls'] as $Card)
											<div class="col-sm-3">
												<div class="card"  id="Card{{$Card->id}}" >
 
													<div class="card-body text-center container-btn">
														<img src="{{(isset($Card->img))? $Card->img:asset('img/profile.jpg')}}" alt="{{ $Card->title }}"  width="100px" height="100px">
														<h4>{{ $Card->title }}</h4>
														{{ $Card->subtitle }}
													</div> 
													<div class="card-footer text-center">
														@include('Cards.items.buttons', ['Card' => $Card])
													</div>
												</div>
											</div>
											@empty
											<div class="col-sm-12">
												<div class="card text-center">
													<br>
													<h1 class="text-warning">
													No Keypls
													</h1>
													<br>
												</div>
											</div>
											@endforelse
											</div>
									</div>
									</div>
									<!--pagination section-->
									<div class="col-sm-12">
									<div class="row">
										<div class="col-7">
										<div class="float-left">
											{!! $data['keypls']->total() !!} {{ trans_choice('Keypl|Keypls', $data['keypls']->total()) }}
										</div>
										</div>
										<!--col-->
										<div class="col-5">
										<div class="float-right">
											{!! $data['keypls']->render() !!}
										</div>
										</div>
										<!--col-->
									</div>
									<!--row-->
									</div>
								</div>
							</div>
						</div>
					</div>
		
