<header class="template-header course-item-active {{ isHome() ? 'nav-white-color position-absolute' : (isAuth() ? 'bg-white' : '')}}">
        <div class="header-navigation p-t-lg-20 p-b-lg-20 sticky-header {{ isHome() ? '': 'header-shadow'}}">
            <div class="container container-1278">
                <div class="header-inner">
                    <div class="header-left">
                        <div class="brand-logo">
                            @if(isDemoMode())
                                @php
                                    $logo           = isHome() ? get_media('images/default/logo/'.setting('theme_color').'/logo-white-text.png') : get_media('images/default/logo/'.setting('theme_color').'/logo-black-text.png');
                                    $sticky_logo    = get_media('images/default/logo/'.setting('theme_color').'/logo-black-text.png');
                                @endphp
                                <a href="{{ route('home') }}" class="main-logo">
                                    <img
                                        src="{{ $logo }}"
                                        alt="logo">
                                </a>
                                <a href="{{ route('home') }}" class="sticky-logo">
                                    <img
                                        src="{{ $sticky_logo }}"
                                        alt="logo">
                                </a>
                            @else
                                <a href="{{ route('home') }}" class="main-logo">
                                    <img
                                        src="{{ isHome() ? (setting('light_logo') && @is_file_exists(setting('light_logo')['original_image']) ? get_media(setting('light_logo')['original_image']) : get_media('images/default/logo/logo-green-white.png')) : (setting('dark_logo') && @is_file_exists(setting('dark_logo')['original_image']) ? get_media(setting('dark_logo')['original_image']) : get_media('images/default/logo/logo-green-black.png')) }}"
                                        alt="logo">
                                </a>
                                <a href="{{ route('home') }}" class="sticky-logo">
                                    <img src="{{ (setting('dark_logo') && @is_file_exists(setting('dark_logo')['original_image']) ? get_media(setting('dark_logo')['original_image']) : get_media('images/default/logo/logo-green-black.png')) }}" alt="logo">
                                </a>
                            @endif
                        </div>
                        <nav class="nav-menu d-none d-xl-block">
                            <ul>
                                @if (setting('show_default_courses_link') != 0)
                                    @php
                                        $maxCategoriesPerColumn = 5;
                                        $columns = $categories->chunk($maxCategoriesPerColumn);
                                        if ($columns->count() > 4):
                                            $columns = $columns->chunk(ceil($columns->count() / 4));
                                        endif;
                                    @endphp
                                    <li class="course-active">
                                        <a data-bs-toggle="dropdown" href="javascript:void(0)">{{__("course")}}</a>
                                        <div class="mega-menu dropdown-menu">
                                            <h6 class="border-bottom-soft-white fw-semibold m-b-10 p-b-10 m-l-25 m-r-25">{{__('course_by_categories')}}</h6>
                                            <div class="row g-0">
                                                @foreach($columns as $columnSet)
                                                    @if($loop->index < 4)
                                                        <div class="col">
                                                            <ul class="sub-menu">
                                                                @foreach($columnSet as $category)
                                                                    <li><a href="#">{{ $category->lang_title }}</a></li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </li>
                                @endif
                                @if(isDemoMode())
                                    <li>
                                        <a href="#" data-bs-toggle="dropdown">Home</a>
                                        <ul class="dropdown-menu sub-menu">
                                            <li><a href="{{url('/')}}">{{ __('home1')}}</a></li>
                                            <li><a href="{{url('/home2')}}">{{ __('home2')}}</a></li>
                                            <li><a href="{{url('/home3')}}">{{ __('home3')}}</a></li>
                                        </ul>
                                    </li>
                                @endif
                                @if (is_array(headerFooterMenu('header_menu', App::getLocale())))
                                @foreach ( headerFooterMenu('header_menu', App::getLocale()) as $main_menu)
                                <li class="{{ url($main_menu['url']) == url()->full() ? 'active' : '' }}">
                                    {{-- <a href="{{url($main_menu['url'])}}" @if((count($main_menu) > 3) && ($main_menu['mega_menu'] != 'true')) data-bs-toggle="dropdown" @endif>{{ $main_menu['label'] }}</a> --}}
                                    <a href="{{url($main_menu['url'])}}" data-bs-toggle="dropdown">{{ $main_menu['label'] }}</a>
                                    @if (count($main_menu) > 3)
                                        @if ($main_menu['mega_menu'] == 'true')
                                            @php
                                                $maxSubmenuPerColumn = 5;
                                                $megaMenuColumns = collect(array_slice($main_menu, 3))->chunk($maxSubmenuPerColumn);
                                                if ($megaMenuColumns->count() > 4):
                                                    $megaMenuColumns = $megaMenuColumns->chunk(ceil($megaMenuColumns->count() / 4));
                                                endif;
                                            @endphp
                                            <div class="mega-menu dropdown-menu">
                                                <div class="row g-0">
                                                    @foreach($megaMenuColumns as $megaMenuColumn)
                                                    @if($loop->index < 4)
                                                    <div class="col">
                                                        <ul class="sub-menu">
                                                            @foreach($megaMenuColumn as $subMenu)
                                                                <li><a href="{{url($subMenu['url'])}}">{{$subMenu['label']}}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        @else
                                        <ul class="sub-menu">
                                            @foreach (array_slice($main_menu, 3) as $submenu)
                                                <li><a href="{{url($submenu['url'])}}">{{ $submenu['label'] }}</a></li>
                                            @endforeach
                                        </ul>
                                        @endif

                                    @endif
                                </li>
                                @endforeach
                                @endif
                            </ul>
                        </nav>
                    </div>
                    <div class="header-right">
                        <ul class="header-extra">
                            <li class="shopping-mini-cart">
                                <a href="#" class="cart-btn">
                                    <svg width="16" height="18" viewBox="0 0 16 18" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M14.3212 4.16667H12.205C11.9291 1.82368 9.93149 0 7.51563 0C5.09976 0 3.10212 1.82368 2.82625 4.16667H0.710069C0.326528 4.16667 0.015625 4.47757 0.015625 4.86111V17.0833C0.015625 17.4669 0.326528 17.7778 0.710069 17.7778H14.3212C14.7047 17.7778 15.0156 17.4669 15.0156 17.0833V4.86111C15.0156 4.47757 14.7047 4.16667 14.3212 4.16667ZM7.51563 1.38889C9.16438 1.38889 10.5371 2.59219 10.8024 4.16667H4.22885C4.49413 2.59219 5.86688 1.38889 7.51563 1.38889ZM13.6267 16.3889H1.40451V5.55556H2.7934V7.63889C2.7934 8.02243 3.10431 8.33333 3.48785 8.33333C3.87139 8.33333 4.18229 8.02243 4.18229 7.63889V5.55556H10.849V7.63889C10.849 8.02243 11.1599 8.33333 11.5434 8.33333C11.9269 8.33333 12.2378 8.02243 12.2378 7.63889V5.55556H13.6267V16.3889Z"
                                            fill="#333333"/>
                                    </svg>
                                    <input type="text" class="badge {{ (count($carts['courses'])+count($carts['books']) > 0) ? '' :'d-none'}}" id="cart_iteam_no" value="{{ count($carts['courses'])+count($carts['books']) }}">

                                </a>
                            </li>
                            <li class="language-selection">
                                <select name="language" id="language-selector">
                                    @foreach(app('languages') as $language)
                                        <option value="{{ $language->locale }}"
                                                data-url="{{ setLanguageRedirect($language->locale) }}" {{ app()->getLocale() == $language->locale ? ' selected' : '' }}>{{ $language-> name }}</option>
                                    @endforeach
                                </select>
                            </li>
                            @if(Auth::check())
                                <li class="user-profile-dropdown">
                                    <a href="#" class="template-btn" id="userProfileDropdown" data-bs-toggle="dropdown"
                                       aria-expanded="false">
                                        <i class="fal fa-sign-in"></i> {{__('my_profile')}}
                                    </a>
                                    <div
                                        class="user-profile-dropdown-content dropdown-menu dropdown-menu-end profile-sidebar"
                                        aria-labelledby="userProfileDropdown">
                                        <div class="profile-info">
                                            <div class="profile-picture">
                                                <img src="{{ getFileLink('40x40', Auth()->user()->images) }}"
                                                     alt="Profile Picture">
                                            </div>
                                            <div class="profile-info-content">
                                                <h3>{{ Auth()->user()->first_name }} {{ Auth()->user()->last_name }}</h3>
                                                <p>{{ Auth()->user()->email }}</p>
                                            </div>
                                        </div>
                                        @include('frontend.profile.sidebar',['profile_dropdown' => 1])
                                    </div>
                                </li>
                            @else
                            <li class="d-none d-md-block">
                                <a href="{{ route('login') }}" class="template-btn">
                                    <i class="fal fa-sign-in"></i> {{__('sign_in')}}
                                </a>
                            </li>
                            @endif
                            <li class="d-xl-none d-xl-none">
                                <a href="#" class="navbar-toggler text-align-end d-inline-block">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--====== Mobile Slide Menu ======-->
        <div class="mobile-slide-panel">
            <div class="panel-overlay"></div>
            <div class="panel-inner">
                <div class="mobile-logo">
                    <a href="{{url('/')}}">
                        <img
                        src="{{ isHome() ? (setting('light_logo') && @is_file_exists(setting('light_logo')['original_image']) ? get_media(setting('light_logo')['original_image']) : get_media('images/default/logo/logo-green-white.png')) : (setting('dark_logo') && @is_file_exists(setting('dark_logo')['original_image']) ? get_media(setting('dark_logo')['original_image']) : get_media('images/default/logo/logo-green-black.png')) }}"
                        alt="logo">
                    </a>
                </div>
                <nav class="mobile-menu">
                    <ul>
                        @if (is_array(headerFooterMenu('header_menu')))
                        @foreach ( headerFooterMenu('header_menu') as $main_menu)
                        <li>
                            <a href="{{url($main_menu['url'])}}" @if(count($main_menu) > 3) data-bs-toggle="dropdown" @endif>{{ $main_menu['label'] }}</a>
                            @if (count($main_menu) > 3)
                            <ul class="sub-menu">
                                @foreach (array_slice($main_menu, 3) as $submenu)
                                    <li><a href="{{url($submenu['url'])}}">{{ $submenu['label'] }}</a></li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endforeach
                        @endif
                    </ul>
                </nav>
                <a href="#" class="panel-close">
                    <i class="fal fa-times"></i>
                </a>
            </div>
        </div>
        <!--====== Off Canvas Cart Slide ======-->
        <div class="off-canvas-wrapper">
            <div class="canvas-overlay"></div>
            <div class="canvas-inner">
                @include('frontend.cart_component')
            </div>
        </div>
    </header>
    <!--====== End Header ======-->
