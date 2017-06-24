<div class="site-sidebar">
	<div class="custom-scroll custom-scroll-light">
		<ul class="sidebar-menu">
			<li class="menu-title">Main</li>
			<li>
				<a href="{{ route('admin.dashboard') }}" class="waves-effect waves-light">
					<span class="s-icon"><i class="ti-anchor"></i></span>
					<span class="s-text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="{{ route('admin.dispatcher.index') }}" class="waves-effect waves-light">
					<span class="s-icon"><i class="ti-target"></i></span>
					<span class="s-text">Dispatcher</span>
				</a>
			</li>
			
			<li class="menu-title">Members</li>
			<li class="with-sub">
				<a href="#" class="waves-effect  waves-light">
					<span class="s-caret"><i class="fa fa-angle-down"></i></span>
					<span class="s-icon"><i class="ti-crown"></i></span>
					<span class="s-text">Users</span>
				</a>
				<ul>
					<li><a href="{{ route('admin.user.index') }}">List Users</a></li>
					<li><a href="{{ route('admin.user.create') }}">Add New User</a></li>
				</ul>
			</li>
			<li class="with-sub">
				<a href="#" class="waves-effect  waves-light">
					<span class="s-caret"><i class="fa fa-angle-down"></i></span>
					<span class="s-icon"><i class="ti-car"></i></span>
					<span class="s-text">Providers</span>
				</a>
				<ul>
					<li><a href="{{ route('admin.provider.index') }}">List Providers</a></li>
					<li><a href="{{ route('admin.provider.create') }}">Add New Provider</a></li>
				</ul>
			</li>
			<li class="menu-title">Details</li>
			<li>
				<a href="{{ route('admin.map.index') }}" class="waves-effect waves-light">
					<span class="s-icon"><i class="ti-map-alt"></i></span>
					<span class="s-text">Map</span>
				</a>
			</li>
			<li class="with-sub">
				<a href="#" class="waves-effect  waves-light">
					<span class="s-caret"><i class="fa fa-angle-down"></i></span>
					<span class="s-icon"><i class="ti-view-grid"></i></span>
					<span class="s-text">Ratings & Reviews</span>
				</a>
				<ul>
					<li><a href="{{ route('admin.user.review') }}">User Ratings</a></li>
					<li><a href="{{ route('admin.provider.review') }}">Provider Ratings</a></li>
				</ul>
			</li>
			<li class="menu-title">Requests</li>
			<li>
				<a href="{{ route('admin.requests.index') }}" class="waves-effect  waves-light">
					<span class="s-icon"><i class="ti-infinite"></i></span>
					<span class="s-text">Request History</span>
				</a>
			</li>
			<li>
				<a href="{{ route('admin.requests.scheduled') }}" class="waves-effect  waves-light">
					<span class="s-icon"><i class="ti-palette"></i></span>
					<span class="s-text">Scheduled Rides</span>
				</a>
			</li>
			<li class="menu-title">General</li>
			<li class="with-sub">
				<a href="#" class="waves-effect  waves-light">
					<span class="s-caret"><i class="fa fa-angle-down"></i></span>
					<span class="s-icon"><i class="ti-view-grid"></i></span>
					<span class="s-text">Service Types</span>
				</a>
				<ul>
					<li><a href="{{ route('admin.service.index') }}">List Service Types</a></li>
					<li><a href="{{ route('admin.service.create') }}">Add New Service Type</a></li>
				</ul>
			</li>
			<li class="with-sub">
				<a href="#" class="waves-effect  waves-light">
					<span class="s-caret"><i class="fa fa-angle-down"></i></span>
					<span class="s-icon"><i class="ti-layout-tab"></i></span>
					<span class="s-text">Documents</span>
				</a>
				<ul>
					<li><a href="{{ route('admin.document.index') }}">List Documents</a></li>
					<li><a href="{{ route('admin.document.create') }}">Add New Document</a></li>
				</ul>
			</li>

			<li class="with-sub">
				<a href="#" class="waves-effect  waves-light">
					<span class="s-caret"><i class="fa fa-angle-down"></i></span>
					<span class="s-icon"><i class="ti-layout-tab"></i></span>
					<span class="s-text">Promocodes</span>
				</a>
				<ul>
					<li><a href="{{ route('admin.promocode.index') }}">List Promocodes</a></li>
					<li><a href="{{ route('admin.promocode.create') }}">Add New Promocode</a></li>
				</ul>
			</li>
			
			<li class="menu-title">Payment Details</li>
			<li>
				<a href="{{ route('admin.payment') }}" class="waves-effect  waves-light">
					<span class="s-icon"><i class="ti-infinite"></i></span>
					<span class="s-text">Payment History</span>
				</a>
			</li>
			<li>
				<a href="{{ route('admin.settings.payment') }}" class="waves-effect  waves-light">
					<span class="s-icon"><i class="ti-money"></i></span>
					<span class="s-text">Payment Settings</span>
				</a>
			</li>
			<li class="menu-title">Settings</li>
			<li>
				<a href="{{ route('admin.settings') }}" class="waves-effect  waves-light">
					<span class="s-icon"><i class="ti-settings"></i></span>
					<span class="s-text">Site Settings</span>
				</a>
			</li>
			
			<li class="menu-title">Others</li>
			<li>
				<a href="{{ route('admin.help') }}" class="waves-effect waves-light">
					<span class="s-icon"><i class="ti-help"></i></span>
					<span class="s-text">Help</span>
				</a>
			</li>
			<li>
				<a href="{{url('translations') }}" class="waves-effect waves-light">
					<span class="s-icon"><i class="ti-smallcap"></i></span>
					<span class="s-text">Translations</span>
				</a>
			</li>
			<li class="menu-title">Account</li>
			<li>
				<a href="{{ route('admin.profile') }}" class="waves-effect  waves-light">
					<span class="s-icon"><i class="ti-user"></i></span>
					<span class="s-text">Account Settings</span>
				</a>
			</li>
			<li>
				<a href="{{ route('admin.password') }}" class="waves-effect  waves-light">
					<span class="s-icon"><i class="ti-exchange-vertical"></i></span>
					<span class="s-text">Change Password</span>
				</a>
			</li>
			<li class="compact-hide">
				<a href="{{ url('/admin/logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
					<span class="s-icon"><i class="ti-power-off"></i></span>
					<span class="s-text">Logout</span>
                </a>

                <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
			</li>
			
			<li class="menu-title compact-hide">System usage</li>
			<li class="compact-hide">
				<div class="progress-widget progress-widget-light">
					<div class="mb-0-5">
						SSD
						<span class="float-xs-right">5 GB</span>
					</div>
					<progress class="progress progress-rounded progress-success progress-sm" value="60" max="100">100%</progress>
					<div class="mb-0-5">
						CPU
						<span class="float-xs-right">80%</span>
					</div>
					<progress class="progress progress-rounded progress-danger progress-sm mb-0-5" value="80" max="100">100%</progress>
				</div>
			</li>
			
		</ul>
	</div>
</div>