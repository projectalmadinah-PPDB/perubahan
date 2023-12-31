<aside class="sidebar" style="padding-top: 3.5rem!important">
	<div class="scrollbar-inner sidebar-wrapper" style="padding-top: 0px!important">
		<div class="user">
			<div class="photo">
				<img src="https://images.unsplash.com/photo-1511367461989-f85a21fda167?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8cHJvZmlsZXxlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=500&q=60">
			</div>
			<div class="info">
				{{-- collapse profile --}}
				<a href="#profileUser" data-toggle="collapse" aria-expanded="true" class="">
					<span>
						{{ Auth::user()->name }}
						<span class="user-level">{{ Auth::user()->role }}</span>
						<span class="caret"></span>
					</span>
				</a>
				<div class="clearfix"></div>

				<div 
					class="collapse in" id="profileUser" aria-expanded="true">
					<ul class="nav">
						<li>
							<a href="{{ route('admin.setting.profile.index') }}">
								<span class="link-collapse">My Profile</span>
							</a>
						</li>
						<li>
							<a  
                                href="{{ Route::is('admin.setting.profile.index') ? '' : route('admin.setting.profile.index') }}" 
                                @if (Route::is('admin.setting.profile.index')) role="button" 
								data-bs-toggle="modal" data-bs-target="#exampleModal" @endif>
                                <span class="link-collapse">Edit Profile</span>
                            </a>
						</li>
					</ul>
				</div>
				{{-- end collapse profile --}}
			</div>
		</div>
		<ul class="nav">
			<li class="nav-item {{ Route::is('admin.admin.dashboard') ? 'active' : '' }}">
				<a href="{{ route('admin.admin.dashboard') }}" class="py-1 px-3">
					<i class="bi bi-bar-chart"></i>
					<p>Dashboard</p>
				</a>
			</li>

			<h1 class="mb-0 fw-bolder text-body-tertiary text-uppercase ps-3" style="font-size: 10px">Utama</h1>

			<li class="nav-item {{ Route::is('admin.pendaftar.*') ? 'active' : '' }}">
				<a href="{{ route('admin.pendaftar.index') }}" class="py-1 px-3">
					<i class="bi bi-database"></i>
					<p>Pendaftar</p>
				</a>
			</li>
			<li class="nav-item {{ Route::is('admin.peserta.*') ? 'active' : '' }}">
				<a href="{{ route('admin.peserta.index') }}" class="py-1 px-3">
					<i class="bi bi-receipt-cutoff"></i>
					<p>Peserta</p>
				</a>
			</li>
			<li class="nav-item {{ Route::is('admin.wawancara.*') ? 'active' : '' }}">
				<a href="{{ route('admin.wawancara.index') }}" class="py-1 px-3">
					<i class="bi bi-broadcast"></i>
					<p>Wawancara</p>
				</a>
			</li>
			<li class="nav-item {{ Route::is('admin.lolos.*') ? 'active' : '' }}">
				<a href="{{ route('admin.lolos.index') }}" class="py-1 px-3">
					<i class="bi bi-reply-all"></i>
					<p>Lolos</p>
				</a>
			</li>
			<li class="nav-item {{ Route::is('admin.payment.*') ? 'active' : '' }}">
				<a href="{{route('admin.payment.index')}}" class="py-1 px-3">
					<i class="bi bi-credit-card"></i>
					<p>Pembayaran</p>
				</a>
			</li>
			<li class="nav-item {{ Route::is('admin.document.*') ? 'active' : '' }}">
				<a href="{{ route('admin.document.index') }}" class="py-1 px-3">
					<i class="bi bi-file-earmark-person-fill"></i>
					<p>Dokumen</p>
				</a>
			</li>

			<h1 class="mb-0 fw-bolder text-body-tertiary text-uppercase ps-3" style="font-size: 10px">Master</h1>
			
			<li class="nav-item
			{{ (Route::is('admin.users.*') || Route::is('admin.users.*')) ? 'active' : '' }}
			 ">
				<a href="#collapseUsers" data-toggle="collapse" aria-expanded="true" class="py-1 px-3">
					<i class="bi bi-people"></i>
					<p>Pengguna</p>
					<i class="bi bi-caret-down-fill position-absolute end-0" style="font-size: 11px"></i>
				</a>
			</li>

			<style>.child-nav:hover {background: #fafafa;}</style>

			{{-- collapse users --}}
			<div class="collapse in" id="collapseUsers">
				<ul class=" list-group list-group-flush">
					<li class="py-1 ps-3 child-nav">
						<a href="{{ route('admin.users.index') }}" class="nav-link link-secondary fw-bold">
							<i class="bi bi-caret-right-fill" style="font-size: 11px"></i>
							<span class="ms-2 link-collapse">Admin</span>
						</a>
					</li>
					<li class="py-1 ps-3 child-nav">
						<a href="{{ route('admin.users.users') }}" class="nav-link link-secondary fw-bold">
							<i class="bi bi-caret-right-fill" style="font-size: 11px"></i>
							<span class="ms-2 link-collapse">User</span>
						</a>
					</li>
					{{-- <li class="py-1 ps-3 child-nav">
						<a href="" class="nav-link link-secondary fw-bold">
							<i class="bi bi-caret-right-fill" style="font-size: 11px"></i>
							<span class="ms-2 link-collapse">Peserta</span>
						</a>
					</li> --}}
				</ul>
			</div>
			{{-- end collapse users --}}

			
			<li class="nav-item
      {{ (Route::is('admin.article.*') || Route::is('admin.category.*')) ? 'active' : '' }}
			 ">
				<a href="#collapseArticles" data-toggle="collapse" aria-expanded="true" class="py-1 px-3">
					<i class="bi bi-people"></i>
					<p>Artikel</p>
					<i class="bi bi-caret-down-fill position-absolute end-0" style="font-size: 11px"></i>
				</a>
			</li>

			{{-- collapse articles --}}
			<div class="collapse in" id="collapseArticles">
				<ul class=" list-group list-group-flush">
					<li class="py-1 ps-3 child-nav">
						<a href="{{ route('admin.article.index') }}" class="nav-link link-secondary fw-bold {{ Route::is('admin.article.index') ? 'text-primary' : '' }}">
							<i class="bi bi-caret-right-fill" style="font-size: 11px"></i>
							<span class="ms-2 link-collapse">Daftar Artikel</span>
						</a>
					</li>
					<li class="py-1 ps-3 child-nav">
						<a href="{{ route('admin.article.create') }}" class="nav-link link-secondary fw-bold" {{ Route::is('admin.article.create') ? 'text-primary' : '' }}>
							<i class="bi bi-caret-right-fill" style="font-size: 11px"></i>
							<span class="ms-2 link-collapse">Tambah Artikel</span>
						</a>
					</li>
					<li class="py-1 ps-3 child-nav">
						<a href="{{route('admin.category.index')}}" class="nav-link link-secondary fw-bold {{ Route::is('admin.category.*') ? 'text-primary' : '' }}" >
							<i class="bi bi-caret-right-fill" style="font-size: 11px"></i>
							<span class="ms-2 link-collapse">Kategori</span>
						</a>
					</li>
				</ul>
			</div>
			{{-- end collapse articles --}}

			<h1 class="mb-0 fw-bolder text-body-tertiary text-uppercase ps-3" style="font-size: 10px">Lain-Lain</h1>

			<li class="nav-item {{ Route::is('admin.generasi.*') ? 'active' : '' }}">
				<a href="{{ route('admin.generasi.index') }}" class="py-1 px-3">
					<i class="bi bi-person-fill-lock"></i>
					<p>Generasi</p>
				</a>
			</li>
			<li class="nav-item {{ Route::is('admin.question.*') ? 'active' : '' }}">
				<a href="{{ route('admin.question.index') }}" class="py-1 px-3">
					<i class="bi bi-question-octagon"></i>
					<p>Q&A</p>
				</a>
			</li>
			<li class="nav-item {{ Route::is('admin.pengumuman.*') ? 'active' : '' }}">
				<a href="{{ route('admin.pengumuman.index') }}" class="py-1 px-3">
					<i class="bi bi-clipboard-data"></i>
					<p>Pengumuman</p>
				</a>
			</li>
			<li class="nav-item {{ Route::is('admin.laporan.*') ? 'active' : '' }}">
				<a href="{{route('admin.laporan.index')}}" class="py-1 px-3">
					<i class="bi bi-credit-card"></i>
					<p>Laporan</p>
				</a>
			</li>

			<li class="nav-item
			 {{ Route::is('admin.setting.*') || Route::is('admin.settings.general') || Route::is('admin.section.index') ? 'active' : '' }}
			 ">
				<a href="#collapseSettings" data-toggle="collapse" aria-expanded="true" class="py-1 px-3">
					<i class="bi bi-people"></i>
					<p>Pengaturan</p>
					<i class="bi bi-caret-down-fill position-absolute end-0" style="font-size: 11px"></i>
				</a>
			</li>

			{{-- collapse settings --}}
			<div class="collapse in mb-5" id="collapseSettings">
				<ul class=" list-group list-group-flush">
					<li class="py-1 ps-3 child-nav">
						<a href="{{route('admin.setting.profile.index')}}" class="nav-link link-secondary fw-bold {{ Route::is('admin.setting.profile.index') ? 'text-primary' : '' }}">
							<i class="bi bi-caret-right-fill" style="font-size: 11px"></i>
							<span class="ms-2 link-collapse">Profile</span>
						</a>
					</li>
					<li class="py-1 ps-3 child-nav">
						<a href="{{route('admin.settings.general')}}" class="nav-link link-secondary fw-bold {{ Route::is('admin.settings.general') ? 'text-primary' : '' }}">
							<i class="bi bi-caret-right-fill" style="font-size: 11px"></i>
							<span class="ms-2 link-collapse">Pengaturan Umum</span>
						</a>
					</li>
					<li class="py-1 ps-3 child-nav">
						<a href="{{ route('admin.section.index') }}" class="nav-link link-secondary fw-bold {{ Route::is('admin.section.index') ? 'text-primary' : '' }}">
							<i class="bi bi-caret-right-fill" style="font-size: 11px"></i>
							<span class="ms-2 link-collapse">Halaman Home</span>
						</a>
					</li>
					<li class="py-1 ps-3 child-nav">
						<a href="{{route('admin.setting.notify.index')}}" class="nav-link link-secondary fw-bold {{ Route::is('admin.setting.notify.index') ? 'text-primary' : '' }}">
							<i class="bi bi-caret-right-fill" style="font-size: 11px"></i>
							<span class="ms-2 link-collapse">Notifikasi</span>
						</a>
					</li>
				</ul>
			</div>
			{{-- end collapse settings --}}

		</ul>
	</div>
</aside>