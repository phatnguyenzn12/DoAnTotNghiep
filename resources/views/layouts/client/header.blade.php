<div class="left-side">
    <!-- Logo -->
    <div id="logo">
        <a href="/">
            <img src="/frontend/assets/images/logo.png" alt="">
            <img src="/frontend/assets/images/logo-light.png" class="logo_inverse" alt="">
            <img src="/frontend/assets/images/logo-mobile.png" class="logo_mobile" alt="">
        </a>
    </div>

    <!-- icon menu for mobile -->
    <div class="triger" uk-toggle="target: .header_menu ; cls: is-visible">
    </div>

    <!-- menu bar for mobile -->
    <nav class="header_menu">
        <ul>
            <li>
                <a href="#" aria-expanded="false"> Courses</a>
                <div uk-drop="mode: click" class="category-dropdown uk-drop">
                    <ul>
                        <li> <a href="courses.html">
                                <ion-icon name="newspaper-outline" class="is-icon"></ion-icon> Web
                                Development
                            </a></li>
                        <li> <a href="courses.html">
                                <ion-icon name="leaf-outline" class="is-icon"></ion-icon> Mobile App
                            </a> </li>
                        <li> <a href="courses.html">
                                <ion-icon name="briefcase-outline" class="is-icon"></ion-icon> Business
                            </a> </li>
                        <li> <a href="courses.html">
                                <ion-icon name="color-palette-outline" class="is-icon"></ion-icon> Desings
                            </a></li>
                        <li> <a href="courses.html">
                                <ion-icon name="megaphone-outline" class="is-icon"></ion-icon> Marketing
                            </a></li>
                        <li> <a href="courses.html">
                                <ion-icon name="camera-outline" class="is-icon"></ion-icon> Photography
                            </a> </li>
                        <li> <a href="courses.html">
                                <ion-icon name="accessibility-outline" class="is-icon"></ion-icon> Life
                                Style
                            </a> </li>
                    </ul>
                </div>

            </li>
            <li> <a href="categories.html" class="active"> Categories </a></li>
            <li> <a href="episodes.html"> Episode </a></li>
            <li> <a href="books.html"> Book </a></li>
            <li> <a href="blog.html"> Blog</a></li>
            <li> <a href="#" aria-expanded="false">Pages</a>
                <div uk-drop="mode: click" class="menu-dropdown uk-drop">
                    <ul>
                        <li> <a href="pages-pricing.html"> Pricing</a></li>
                        <li> <a href="pages-faq.html"> Faq </a></li>
                        <li> <a href="pages-help.html"> Help </a></li>
                        <li> <a href="pages-terms.html"> Terms </a></li>
                        <li> <a href="pages-setting.html"> Setting </a></li>
                        <li> <a href="#" aria-expanded="false"> Development </a>
                            <div class="menu-dropdown uk-drop"
                                uk-drop="mode: click;pos:right-top;animation: uk-animation-slide-right-small">
                                <ul>
                                    <li><a href="development-elements.html"> Elements </a></li>
                                    <li><a href="development-components.html"> Compounents </a></li>
                                    <li><a href="development-plugins.html"> Plugins </a></li>
                                    <li><a href="development-icons.html"> Icons </a></li>
                                </ul>
                            </div>
                        </li>
                        <li> <a href="pages-cart.html"> Shopping cart </a></li>
                        <li> <a href="pages-payment-info.html"> Payment methods </a></li>
                        <li> <a href="pages-account-info.html"> Account info </a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>

    <!-- overly for small devices -->
    <div class="overly" uk-toggle="target: .header_menu ; cls: is-visible" tabindex="0" aria-expanded="false"></div>
</div>

<div class="right-side">

    <!-- Header search box  -->
    <div uk-drop="mode: click;offset:10" class="header_search_dropdown">

        <h4 class="search_title"> Khóa học </h4>
        <ul>
            <li>
                <a href="#">
                    <img src="/frontend/assets/images/avatars/avatar-1.jpg" alt="" class="list-course">
                    <div class="list-name"> Erica Jones </div>
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="/frontend/assets/images/avatars/avatar-2.jpg" alt="" class="list-course">
                    <div class="list-name"> Coffee Addicts </div>
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="/frontend/assets/images/avatars/avatar-3.jpg" alt="" class="list-course">
                    <div class="list-name"> Mountain Riders </div>
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="/frontend/assets/images/avatars/avatar-4.jpg" alt="" class="list-course">
                    <div class="list-name"> Property Rent And Sale </div>
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="/frontend/assets/images/avatars/avatar-5.jpg" alt="" class="list-course">
                    <div class="list-name"> Erica Jones </div>
                </a>
            </li>
        </ul>

    </div>


    <!-- cart -->
    <a href="#" class="header_widgets">
        <ion-icon name="bag-add-outline" class="is-icon"></ion-icon>
    </a>
    <div uk-drop="mode: click" class="dropdown_cart">
        <div class="cart-headline"> Giỏ hàng của bạn
            <a href="{{ route('client.order.cartList') }}" class="checkout">Xem các giỏ hàng</a>
        </div>
        <ul class="dropdown_cart_scrollbar" data-simplebar>
            @forelse ($carts as $cart)
                <li>
                    <div class="cart_avatar">
                        <img src="/frontend/assets/images/courses/img-1.jpg" alt="">
                    </div>
                    <div class="cart_text">
                        <h4> {{ $cart->title }} </h4>
                        <h5>Giá: <span class="text-red-500">{{ $cart->current_price }} đ</span> </h5>
                    </div>
                </li>
            @empty
            <div class="space-x-6 relative py-7 px-6 flex items-center justify-center">
                <h1 class="text-lg font-medium">
                    <ion-icon name="bag-outline"></ion-icon> GIỎ HÀNG TRỐNG
                </h1>
            </div>
            @endforelse

        </ul>
    </div>

    @if (auth()->user())
        <!-- notification -->
        <a href="#" class="header_widgets">
            <ion-icon name="notifications-outline" class="is-icon"></ion-icon>
        </a>
        <div uk-drop="mode: click" class="header_dropdown">
            <div class="drop_headline">
                <h4>Thông báo </h4>
                <div class="btn_action">
                    <div class="btn_action">
                        <a href="#">
                            <ion-icon name="settings-outline" uk-tooltip="title: Notifications settings ; pos: left">
                            </ion-icon>
                        </a>
                        <a href="#">
                            <ion-icon name="checkbox-outline" uk-tooltip="title: Mark as read all ; pos: left">
                            </ion-icon>
                        </a>
                    </div>
                </div>
            </div>

            <ul class="dropdown_scrollbar" data-simplebar>
                <li>
                    <a href="#">
                        <div class="drop_avatar"> <img src="/frontend/assets/images/avatars/avatar-1.jpg"
                                alt="">
                        </div>
                        <div class="drop_content">
                            <p> <strong>Adrian Mohani</strong> Like Your Comment On Course
                                <span class="text-link">Javascript Introduction </span>
                            </p>
                            <span class="time-ago"> 2 hours ago </span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="drop_avatar"> <img src="/frontend/assets/images/avatars/avatar-2.jpg"
                                alt="">
                        </div>
                        <div class="drop_content">
                            <p>
                                <strong>Stella Johnson</strong> Replay Your Comments in
                                <span class="text-link">Programming for Games</span>
                            </p>
                            <span class="time-ago"> 9 hours ago </span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="drop_avatar"> <img src="/frontend/assets/images/avatars/avatar-3.jpg"
                                alt="">
                        </div>
                        <div class="drop_content">
                            <p>
                                <strong>Alex Dolgove</strong> Added New Review In Course
                                <span class="text-link">Full Stack PHP Developer</span>
                            </p>
                            <span class="time-ago"> 12 hours ago </span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="drop_avatar"> <img src="/frontend/assets/images/avatars/avatar-1.jpg"
                                alt="">
                        </div>
                        <div class="drop_content">
                            <p>
                                <strong>Jonathan Madano</strong> Shared Your Discussion On Course
                                <span class="text-link">Css Flex Box </span>
                            </p>
                            <span class="time-ago"> Yesterday </span>
                        </div>
                    </a>
                </li>
            </ul>
            <a href="#" class="see-all">See all</a>
        </div>



        <!-- profile -->
        <a href="#">
            <img src="/frontend/assets/images/avatars/placeholder.png" class="header_widgets_avatar" alt="">
        </a>
        <div uk-drop="mode: click;offset:5" class="header_dropdown profile_dropdown">
            <ul>
                <li>
                    <a href="#" class="user">
                        <div class="user_avatar">
                            <img src="/frontend/assets/images/avatars/avatar-2.jpg" alt="">
                        </div>
                        <div class="user_name">
                            <div> Stella Johnson </div>
                            <span> @Johnson </span>
                        </div>
                    </a>
                </li>
                <li>
                    <hr>
                </li>
                @hasanyrole('admin|teacher')
                    <li>
                        <a href="#" class="is-link">
                            <ion-icon name="layers-outline" class="is-icon"></ion-icon> <span> Trang quản
                                trị
                            </span>
                        </a>
                    </li>
                    <li>
                        <hr>
                    </li>
                @endhasanyrole

                <li>
                    <a href="#">
                        <ion-icon name="person-circle-outline" class="is-icon"></ion-icon>
                        Tài khoản của tôi
                    </a>
                </li>
                <li>
                    <a href="#">
                        <ion-icon name="settings-outline" class="is-icon"></ion-icon>
                        Cài đặt
                    </a>
                </li>
                <li>
                    <hr>
                </li>
                <li>
                    <a href="#" id="night-mode" class="btn-night-mode"
                        onclick="UIkit.notification({ message: 'Hmm...  <strong> Night mode </strong> feature is not available yet. ' , pos: 'bottom-right'  })">
                        <ion-icon name="moon-outline" class="is-icon"></ion-icon>
                        Night mode
                        <span class="btn-night-mode-switch">
                            <span class="uk-switch-button"></span>
                        </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('auth.logout') }}">
                        <ion-icon name="log-out-outline" class="is-icon"></ion-icon>
                        Đăng xuất
                    </a>
                </li>
            </ul>
        </div>
    @else
        <div class="capitalize font-semibold hidden lg:block my-2 space-x-3 text-center text-sm" id="pages">
            <a href="{{ route('auth.login') }}"
                class="py-3 px-4 bg-purple-500 purple-500 px-6 rounded-md shadow text-white">Đăng
                nhập</a>
        </div>
    @endif

</div>

</div>
