<div class="col-12" id="index_table">
		<div class="row">
			<div class="col-12 text-center">
						<h2>{{Auth::user()->name}} {{Auth::user()->last_name}}</h2>
						<img class="img-circle rounded-circle profile-img mx-auto d-block" src='{{(Auth::user()->image)?Auth::user()->path.Auth::user()->image:asset("img/profile.jpg")}}' />
			</div>
			<div class="col-12 Text-left">
				<br>
				<h3>CUENTA</h3>
			</div>
			<div class="col-12 style-profile" onclick="Profile.edit()">
				<div class="row">
					<div class="col-10">
						Categoria
					</div>
					<div class="col-2">
						<h2 class="float-right">
							<i class="fa fa-angle-right"></i>
						</h2>
					</div>
				</div>
			</div>
			<div class="col-12 style-profile" onclick="Profile.edit()">
				<div class="row">
					<div class="col-10">
						Correo
					</div>
					<div class="col-2">
						<h2 class="float-right">
							<i class="fa fa-angle-right"></i>
						</h2>
					</div>
				</div>
			</div>
			<div class="col-12 style-profile" onclick="Profile.edit()">
				<div class="row">
					<div class="col-10">
						Contraseña
					</div>
					<div class="col-2">
						<h2 class="float-right">
							<i class="fa fa-angle-right"></i>
						</h2>
					</div>
				</div>
			</div>
			<div class="col-12 style-profile" onclick="Profile.edit()">
				<div class="row">
					<div class="col-10">
						Nombre de la cuenta
					</div>
					<div class="col-2">
						<h2 class="float-right">
							<i class="fa fa-angle-right"></i>
						</h2>
					</div>
				</div>
			</div>
			<div class="col-12 style-profile" onclick="Profile.detail(1)">
				<div class="row">
					<div class="col-10">
						Restaurar comprar
					</div>
					<div class="col-2">
						<h2 class="float-right">
							<i class="fa fa-angle-right"></i>
						</h2>
					</div>
				</div>
			</div>
			<div class="col-12 Text-left">
				<br>
				<h3>NOTIFICACIONES</h3>
			</div>
			<div class="col-12 style-profile">
				<div class="row">
					<div class="col-10">
						Sonido
					</div>
					<div class="col-2">
						<h2 class="float-right">
							<i class="fa fa-angle-right"></i>
						</h2>
					</div>
				</div>
			</div>
			<div class="col-12 style-profile">
				<div class="row">
					<div class="col-10">
						Vibracion
					</div>
					<div class="col-2">
						<h2 class="float-right">
							<i class="fa fa-angle-right"></i>
						</h2>
					</div>
				</div>
			</div>
			
			<div class="col-12 Text-left">
				<br>
				<h3>ACERCA DE</h3>
			</div>
			<div class="col-12 style-profile">
				<div class="row">
					<div class="col-10">
						Ayuda
					</div>
					<div class="col-2">
						<h2 class="float-right">
							<i class="fa fa-angle-right"></i>
						</h2>
					</div>
				</div>
			</div>
			<div class="col-12 style-profile">
				<div class="row">
					<div class="col-10">
						Terminos y condicones
					</div>
					<div class="col-2">
						<h2 class="float-right">
							<i class="fa fa-angle-right"></i>
						</h2>
					</div>
				</div>
			</div>
			<div class="col-12 style-profile">
				<div class="row">
					<div class="col-10">
						Politia de privacidad
					</div>
					<div class="col-2">
						<h2 class="float-right">
							<i class="fa fa-angle-right"></i>
						</h2>
					</div>
				</div>
			</div>

			<div class="col-12 style-profile" onclick="logout()">
				<div class="row">
					<div class="col-10 text-danger">
						Politia de privacidad
					</div>
					<div class="col-2">
						<h2 class="text-danger float-right">
							<i class="fa fa-sign-out"></i>
						</h2>
					</div>
					<form id="logout-form-d" action="{{ route('logout') }}" method="POST" style="display: none;">
											@csrf
					</form>
				</div>
			</div>
	
		</div>
		</ul>
    </div>
    