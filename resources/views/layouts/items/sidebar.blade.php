<div class="sidebar">
			
			<div class="sidebar-background"></div>
			<div class="sidebar-wrapper scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="{{(Auth::user()->image)?Auth::user()->path.Auth::user()->image:"https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png"}}" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a>
								<span>
									{{Auth::user()->name}}
									<span class="user-level">{{Auth::user()->email}}</span>
									
								</span>
							</a>
							<div class="clearfix"></div>
						</div>
					</div>
					<ul class="nav">
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
						
					</ul>
				</div>
			</div>
		</div>