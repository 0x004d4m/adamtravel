<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-globe"></i> Website Data</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('hero') }}"> Heroes</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('landingpage-service') }}"> Services</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('destination') }}"> Destinations</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('section') }}"> Sections</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('testimonial') }}"> Testimonials</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('fqa') }}"> Fqas</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('social') }}"> Socials</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('post') }}"> Posts</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('member') }}"> Members</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('tour-classification') }}"> Tour classifications</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('partner') }}"> Partners</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('term') }}"> Terms</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('site') }}"> Sites</a></li>
    </ul>
</li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Authentication</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i> <span>Users</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-id-badge"></i> <span>Roles</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon la la-key"></i> <span>Permissions</span></a></li>
    </ul>
</li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon las la-language"></i> Translations</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('language') }}"><i class="nav-icon la la-flag-checkered"></i> Languages</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('language/texts') }}"><i class="nav-icon la la-language"></i> Site texts</a></li>
    </ul>
</li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('log') }}'><i class='nav-icon la la-terminal'></i> Logs</a></li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-cog"></i> Setup Menu</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('star') }}"> Stars</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('currency') }}"> Currencies</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('region') }}"> Regions</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('country') }}"> Countries</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('city') }}"> Cities</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('market') }}"> Markets</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('nationality') }}"> Nationalities</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('hotel-meal') }}"> Hotel meals</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('title') }}"> Titles</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('bank-detail') }}"> Bank details</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('group-category1') }}"> Group categories 1</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('group-category2') }}"> Group categories 2</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('status') }}"> Statuses</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('restaurant-meal') }}"> Restaurant meals</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('vehicle-type') }}"> Vehicle types</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('transportation-service') }}"> Transportation services</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('room-type') }}"> Room types</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('season') }}"> Seasons</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('promotion') }}"> Promotions</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('route-group') }}"> Route groups</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('service-classification') }}"> Service classifications</a></li>
    </ul>
</li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-user"></i> Accounts</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('hotel') }}"> Hotels</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('transportation-company') }}"> Transportation companies</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('restaurant') }}"> Restaurants</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('guide') }}"> Guides</a></li>
    </ul>
</li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-percent"></i> Rates</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('entrance') }}"> Entrances</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('service') }}"> Services</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('hotel-contract') }}"> Hotel contracts</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('restaurant-contract') }}"> Restaurant contracts</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('transportation-contract') }}"> Transportation contracts</a></li>
    </ul>
</li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-cogs"></i> Defaults</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('inclusion-default') }}"> Inclusion</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('visit') }}"> Visits</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('route') }}"> Routes</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('program') }}"> Programs</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('transportation-plan') }}"> Transportation plans</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('cover-page') }}"> Cover pages</a></li>
    </ul>
</li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-file-alt"></i> Quotation</a>
    <ul class="nav-dropdown-items">
    </ul>
</li>
