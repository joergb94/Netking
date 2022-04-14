
	<nav class="navbar navbar-expand-sm fixed-bottom bg-keypl-nav nav-keypls-01" data-background-color="purple">
	
	

		
		<ul class="list-group list-group-horizontal ml-md-auto align-items-center">
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
						
							<li id="menu{{ $menu->id }}" class="nav-link ropdown-toggle profile-pic">
								<a href="{{ $menu->link }}" class="nav-link nav-jeypls">
									<i style="color:red;"
										class="{{ $menu->icon }}"></i>{{ $menu->name }}</a>
							</li>
					
						@empty
							<li class="nav-item active">
								Sin Accessos
							</li>
						@endforelse
					@endguest
					</ul>
	
	</nav>
