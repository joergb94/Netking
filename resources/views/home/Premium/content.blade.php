					
					<div class="row">
						
							<div class="jumbotron text-center col-12 padding-home">
								<img src='{{(Auth::user()->image)?Auth::user()->path.Auth::user()->image:asset("img/profile.jpg")}}' alt="image profile" class="img-my-keypls">
								<h1>welcome {{$account->name}} {{$account->last_name}}</h1>
								<div class="form-group col-12 col-sm-6  mx-auto d-block">
									<div class="inner-addon right-addon">
									<i class="glyphicon glyphicon-search"><i class="fas fa-search"></i></i>
									<input type="text" class="form-control search-query" id="search" placeholder="Search" />
									</div>
								</div>
							</div>
					
						<div class="col-12">
							@include('home.items.content-keypls')
						</div>
					</div>
		
