<div class="main-header" data-background-color="purple">
			<!-- Logo Header -->
			<div class="logo-header">
				
				<a href="#" class="logo">
					<div class="col-sm-12 text-center">
						<h1 class="text-white">
							<strong>Keypl's</strong>
						</h1>
					</div>
					
				</a>
				@guest
				@else
					<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon">
							<i class="fa fa-bars"></i>
						</span>
					</button>
					<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
					<div class="navbar-minimize">
						<button class="btn btn-minimize btn-rounded">
							<i class="fa fa-bars"></i>
						</button>
					</div>
				@endguest
				
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg">
                @guest
                <div class="container-fluid">
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
					@if (Route::has('login'))
                        <li class="nav-item dropdown hidden-caret">
							<a class="nav-link ropdown-toggle profile-pic" aria-expanded="false" href="{{ route('login') }}">{{ __('Login') }} </a>
						</li>
					@endif
					@if (Route::has('register'))
                        <li class="nav-item dropdown hidden-caret">
							<a class="nav-link ropdown-toggle profile-pic" aria-expanded="false"  href="{{ route('register') }}">{{ __('Register') }}</a>
						</li>
					@endif
					</ul>
				</div>
                @else
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</form>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						@forelse($dm['data_menu'] as $menu)
                    @if ($menu->id == 4)
						
					@else
					<li id="menu{{ $menu->id }}" class="nav-item">
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
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="{{(Auth::user()->image)?Auth::user()->path.Auth::user()->image:"https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png"}}" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<li>
									<div class="user-box">
										<div class="avatar-lg"><img src="{{(Auth::user()->image)?Auth::user()->path.Auth::user()->image:"https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png"}}" alt="image profile" class="avatar-img rounded"></div>
										<div class="u-text">
											<h4>{{Auth::user()->name}}</h4>
											<p class="text-muted">{{Auth::user()->email}}</p><a href="/profile" class="btn btn-rounded btn-danger btn-sm">View Profile</a>
										</div>
									</div>
								</li>
								<li>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" id="logoutUs" href="" onclick="logout()">{{ __(' Logout') }}</a>
									<form id="logout-form-d" action="{{ route('logout') }}" method="POST" style="display: none;">
										@csrf
									</form>
								</li>
							</ul>
						</li>
						
					</ul>
				</div>
                @endguest
			</nav>
			<!-- End Navbar -->
		</div>