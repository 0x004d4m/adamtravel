{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-globe"></i> Website Data</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('hero') }}"><i class="nav-icon la la-question"></i> Heroes</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('service') }}"><i class="nav-icon la la-question"></i> Services</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('destination') }}"><i class="nav-icon la la-question"></i> Destinations</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('section') }}"><i class="nav-icon la la-question"></i> Sections</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('testimonial') }}"><i class="nav-icon la la-question"></i> Testimonials</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('fqa') }}"><i class="nav-icon la la-question"></i> Fqas</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('social') }}"><i class="nav-icon la la-question"></i> Socials</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('post') }}"><i class="nav-icon la la-question"></i> Posts</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('member') }}"><i class="nav-icon la la-question"></i> Members</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('tour-classification') }}"><i class="nav-icon la la-question"></i> Tour classifications</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('partner') }}"><i class="nav-icon la la-question"></i> Partners</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('term') }}"><i class="nav-icon la la-question"></i> Terms</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('site') }}"><i class="nav-icon la la-question"></i> Sites</a></li>
    </ul>
</li>

<!-- Users, Roles, Permissions -->
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Authentication</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i> <span>Users</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-id-badge"></i> <span>Roles</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon la la-key"></i> <span>Permissions</span></a></li>
    </ul>
</li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-globe"></i> Translations</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('language') }}"><i class="nav-icon la la-flag-checkered"></i> Languages</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('language/texts') }}"><i class="nav-icon la la-language"></i> Site texts</a></li>
    </ul>
</li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-globe"></i> Defaults</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('season') }}"><i class="nav-icon la la-question"></i> Seasons</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('hotel') }}"><i class="nav-icon la la-question"></i> Hotels</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('room-bed') }}"><i class="nav-icon la la-question"></i> Room beds</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('room-type') }}"><i class="nav-icon la la-question"></i> Room types</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('star') }}"><i class="nav-icon la la-question"></i> Stars</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('guide') }}"><i class="nav-icon la la-question"></i> Guides</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('group-category') }}"><i class="nav-icon la la-question"></i> Group categories</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('meal') }}"><i class="nav-icon la la-question"></i> Meals</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('city') }}"><i class="nav-icon la la-question"></i> Cities</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('currency') }}"><i class="nav-icon la la-question"></i> Currencies</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('inclusion') }}"><i class="nav-icon la la-question"></i> Inclusions</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('provided-service') }}"><i class="nav-icon la la-question"></i> Provided services</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('resturant') }}"><i class="nav-icon la la-question"></i> Resturants</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('vehicle-type') }}"><i class="nav-icon la la-question"></i> Vehicle types</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('transportation-service') }}"><i class="nav-icon la la-question"></i> Transportation services</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('transportation-company') }}"><i class="nav-icon la la-question"></i> Transportation companies</a></li>
    </ul>
</li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('log') }}'><i class='nav-icon la la-terminal'></i> Logs</a></li>
