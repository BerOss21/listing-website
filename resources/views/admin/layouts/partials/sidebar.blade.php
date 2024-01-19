<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Listing</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Starter</li>
            <li @class(['active'=>request()->routeIs('admin.dashboard')])><a class="nav-link" href="{{route('admin.dashboard')}}"><i class="far fa-square"></i> <span>Dashboard</span></a></li>
            <li  @class(["dropdown",'active'=>request()->routeIs('admin.sections.*')])>
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Sections</span></a>
                <ul class="dropdown-menu">
                    <li @class(['active'=>request()->routeIs('admin.sections.hero')])><a class="nav-link" href="{{route('admin.sections.hero')}}">Hero</a></li>
                    <li @class(['active'=>request()->routeIs('admin.sections.categories.*')])><a class="nav-link" href="{{route('admin.sections.categories.index')}}">Categories</a></li>
                    <li @class(['active'=>request()->routeIs('admin.sections.locations.*')])><a class="nav-link" href="{{route('admin.sections.locations.index')}}">Locations</a></li>
                    <li @class(['active'=>request()->routeIs('admin.sections.amenities.*')])><a class="nav-link" href="{{route('admin.sections.amenities.index')}}">Amenities</a></li>
                    <li @class(['active'=>request()->routeIs('admin.sections.packages.*')])><a class="nav-link" href="{{route('admin.sections.packages.index')}}">Packages</a></li>
                    <li @class(['active'=>request()->routeIs('admin.sections.listings.*')])><a class="nav-link" href="{{route('admin.sections.listings.index')}}">Listings</a></li>  
                </ul>
            </li>
            <li @class(['active'=>request()->routeIs('admin.settings.*')])><a class="nav-link" href="{{route('admin.settings.create')}}"><i class="far fa-square"></i> <span>Settings</span></a></li>
            <li @class(['active'=>request()->routeIs('admin.payment_methods.*')])><a class="nav-link" href="{{route('admin.payment_methods.index')}}"><i class="far fa-square"></i> <span>Payment methods</span></a></li>
        </ul>
    </aside>
</div>