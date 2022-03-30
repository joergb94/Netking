				<div class="bg-search-keypls col-12 text-center">
						<img src='{{(Auth::user()->image)?Auth::user()->path.Auth::user()->image:asset("img/profile.jpg")}}' alt="image profile" class="img-my-keypls">
						<h1>What key do you need {{Auth::user()->name}}?</h1>
						
						<div class="form-group col-6 mx-auto d-block">
							<div class="inner-addon right-addon">
							<i class="glyphicon glyphicon-search"><i class="fas fa-search"></i></i>
							<input type="text" class="form-control search-query" id="search" placeholder="Search" />
							</div>
						</div>
						<br>
					</div>