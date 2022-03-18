<div class="main-header" data-background-color="purple">
	<nav class="navbar navbar-expand-lg navbar-dark bg-keypl">
		<div class="logo-header">
				
				<a href="/" class="logo">
					<div class="col-12 col-10 text-center">
						<img class="img-fluid mx-auto d-block" src="{{asset('img/logo.png')}}" alt="">
					</div>
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
			</div>
	

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
				@guest
						@if (Route::has('login'))
							<li class="nav-link ropdown-toggle profile-pic">
								<a class="nav-link ropdown-toggle profile-pic" aria-expanded="false" href="{{ route('login') }}">{{ __('Login') }} </a>
							</li>
						@endif
						@if (Route::has('register'))
							<li class="nav-link ropdown-toggle profile-pic">
								<a class="nav-link ropdown-toggle profile-pic" aria-expanded="false"  href="{{ route('register') }}">{{ __('Register') }}</a>
							</li>
						@endif
		
				@else
						@forelse($dm['data_menu'] as $menu)
							@if ($menu->id == 4)
								
							@else
							<li id="menu{{ $menu->id }}" class="nav-link ropdown-toggle profile-pic">
								<a href="{{ $menu->link }}" class="nav-link">
									<i style="color:red;"
										class="{{ $menu->icon }}"></i>{{ $menu->name }}</a>
							</li>
							@endif
						@empty
							<li class="nav-item active">
								Sin Accessos
							</li>
						@endforelse
					
							<li class="nav-item dropdown hidden-caret d-sm-none d-md-block">
								<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
									<div class="avatar-sm">
										<img src='{{(Auth::user()->image)?Auth::user()->path.Auth::user()->image:asset("img/profile.jpg")}}' alt="..." class="avatar-img rounded-circle">
									</div>
								</a>
								<ul class="dropdown-menu list-group-flush animated fadeIn">
									<li class="list-group-item">
										<a href="/profile">
											<div class="user-box">
												<div class="avatar-lg"><img src='{{(Auth::user()->image)?Auth::user()->path.Auth::user()->image:asset("img/profile.jpg")}}' alt="image profile" class="avatar-img rounded"></div>
												<div class="u-text">
													<h4>{{Auth::user()->nickname}}</h4>
													<p class="text-dropdow-profile">{{Auth::user()->email}}</p>
												</div>
											</div>
										</a>
									</li>
									<li class="list-group-item text-center">
										<a class="dropdown-item" id="logoutUs" href="" onclick="logout()">{{ __(' Logout') }}</a>
										<form id="logout-form-d" action="{{ route('logout') }}" method="POST" style="display: none;">
											@csrf
										</form>
									</li>
								</ul>
							</li>
						</ul>
					
					@endguest
				
		</div>
	</nav>
</div>