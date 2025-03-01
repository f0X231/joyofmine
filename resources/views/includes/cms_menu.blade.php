<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ URL::to('/cms') }}">
		<div class="sidebar-brand-icon rotate-n-15">
			<i class="fas fa-laugh-wink"></i>
		</div>
		<div class="sidebar-brand-text mx-3">{{ __('cms_default.nav_dashboard_name') }}</div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<!-- Nav Item - Dashboard -->
	<li class="nav-item active">
		<a class="nav-link" href="{{ URL::to('/cms') }}">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>{{ __('cms_default.dashboard_txt') }}</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">{{ __('cms_default.nav_group_system') }}</div>

	<!-- Nav Item - Pages Collapse Menu -->
	<li class="nav-item">
		<a 	class="nav-link collapsed" 
			href="{{ URL::to('/cms') }}" 
			data-toggle="collapse" 
			data-target="#collapseTwo"
			aria-expanded="true" 
			aria-controls="collapseTwo">
			<i class="fas fa-fw fa-cog"></i>
			<span>{{ __('cms_default.nav_group_user') }}</span>
		</a>
		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">{{ __('cms_default.nav_list_txt') }}</h6>
				<a class="collapse-item" href="{{ URL::to('/cms/user') }}">{{ __('cms_default.nav_item_user') }}</a>
				<a class="collapse-item" href="{{ URL::to('/cms/groups') }}">{{ __('cms_default.nav_item_user_group') }}</a>
			</div>
		</div>
	</li>

	<!-- Nav Item - Utilities Collapse Menu -->
	<li class="nav-item">
		<a 	class="nav-link collapsed" 
			href="#" 
			data-toggle="collapse" 
			data-target="#collapseUtilities"
			aria-expanded="true" 
			aria-controls="collapseUtilities">
			<i class="fas fa-fw fa-wrench"></i>
			<span>{{ __('cms_default.nav_group_general') }}</span>
		</a>
		<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">{{ __('cms_default.nav_group_infomation') }}</h6>
				{{-- <a class="collapse-item" href="{{ URL::to('/cms/info') }}">{{ __('cms_default.nav_item_basic_info') }}</a>--}}
				<div class="collapse-divider"></div>
				<a class="collapse-item" href="{{ URL::to('/cms/panorama') }}">{{ __('cms_default.nav_item_pano') }}</a> 
				<a class="collapse-item" href="{{ URL::to('/cms/doctor') }}">{{ __('cms_default.nav_item_doctor') }}</a>
				<a class="collapse-item" href="{{ URL::to('/cms/article') }}">{{ __('cms_default.nav_item_article') }}</a>
				<a class="collapse-item" href="{{ URL::to('/cms/service') }}">{{ __('cms_default.nav_item_services') }}</a>
			</div>
		</div>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">{{ __('cms_default.nav_group_addons') }}</div>

	<!-- Nav Item - Profile -->
	<li class="nav-item">
		<a class="nav-link" href="{{ URL::to('/cms/profile') }}">
			<i class="fas fa-fw fa-wrench"></i>
			<span>{{ __('cms_default.nav_item_profile') }}</span>
		</a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>
<!-- End of Sidebar -->