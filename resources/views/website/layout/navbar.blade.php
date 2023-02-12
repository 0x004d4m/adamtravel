<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
            <span class="icofont-close js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>

<nav class="site-nav mt-3">
    <div class="container">
        <div class="site-navigation">
            <div class="row">
                <div class="col-6 col-lg-3">
                    <a href="index.html" class="logo m-0 float-start">{{__('menu.adam_travel_jordan')}}</a>
                </div>
                <div class="col-lg-8 d-none d-lg-inline-block text-center nav-center-wrap">
                    <ul class="js-clone-nav  text-center site-menu p-0 m-0">
                        <li><a href="/">{{__('menu.home')}}</a></li>
                        <li><a href="/about">{{__('menu.about')}}</a></li>
                        <li class="has-children">
                            <a>{{__('menu.services')}}</a>
                            <ul class="dropdown">
                                <li><a href="#">{{__('menu.tour_packages')}}</a></li>
                                <li><a href="#">{{__('menu.excursions')}}</a></li>
                                <li><a href="#">{{__('menu.things_to_do')}}</a></li>
                                <li><a href="#">{{__('menu.transfers')}}</a></li>
                            </ul>
                        </li>
                        <li><a href="/sites">{{__('menu.sites')}}</a></li>
                        <li><a href="#">{{__('menu.tailor_made')}}</a></li>
                        <li><a href="/contact">{{__('menu.contact')}}</a></li>
                        <li><a href="/blog">{{__('menu.blog')}}</a></li>
                        <li class="has-children">
                            <a>
                                {{Backpack\LangFileManager\app\Models\Language::where('abbr',Session::get('locale'))->first()->native}}
                            </a>
                            <ul class="dropdown">
                                @foreach (Backpack\LangFileManager\app\Models\Language::where('active',1)->get() as $Language)
                                    <li><a class="@if(Session::get('locale')==$Language->abbr)active @endif" href="{{url('set-language/'.$Language->abbr)}}">{{$Language->native}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="col-2 col-lg-3 text-lg-end">
                    {{-- <ul class="js-clone-nav d-none d-lg-inline-block text-end site-menu ">
                        <li class="cta-button"><a href="contact.html">Contact Us</a></li>
                    </ul> --}}
                    <a href="#"
                        class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light"
                        data-toggle="collapse" data-target="#main-navbar">
                        <span></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
