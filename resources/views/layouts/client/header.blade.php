
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
            {{-- <li>
                <a href="#" aria-expanded="false"> Danh mục khoá học</a>
                <div uk-drop="mode: click" class="category-dropdown uk-drop">
                    <ul>
                        @foreach ($cate as $item)
                        <li><a href="">{{$item->name}}</a> </li>
                        @endforeach
                    </ul>
                </div>

            </li> --}}
            <li> <a href="categories.html" class="active"> Khoá học ưu đãi </a></li>
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
        {{-- @dd($carts) --}}
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

    @if (Auth::guard('web')->user() || Auth::guard('admin')->user() || Auth::guard('mentor')->user())
        <!-- notification -->
        <a href="#" class="header_widgets">
            <ion-icon name="notifications-outline" class="is-icon"></ion-icon>
        </a>
        <div uk-drop="mode: click" class="header_dropdown">
            <div class="drop_headline">
                <h4>Thông báo {{Auth::user()->unreadNotifications->count()}} </h4>
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
                @foreach (Auth::user()->unreadNotifications as $notification )
                {{-- @dd($notification) --}}
                <li>          {{--  {{route('client.lesson.index', $notification->data['course_id'], $notification->data['lesson_id'])}} --}}
                  <a href="{{route('client.lesson.index',['course'=>$notification->data['course_id'], 'lesson'=>$notification->data['lesson_id']])}}">
                        <div class="drop_avatar"> <img src="/frontend/assets/images/avatars/avatar-1.jpg"
                                alt="">
                        </div>
                        <div class="drop_content">
                            <p> <strong class="text-black">{{Auth::user()->name}}</strong> commented on
                               <span class="text-link">{{$notification->is_check}} </span>
                            </p>
                            <span class="time-ago"> {{$notification->created_at}} </span>
                        </div>
                    </a>
                </li>
                @endforeach
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
                            @if (Auth::guard('admin')->user())
                                <div>
                                    {{ Auth::guard('admin')->user()->name }}
                                </div>
                                <span>
                                    {{ Auth::guard('admin')->user()->email }}
                                </span>
                            @elseif (Auth::guard('mentor')->user())
                                <div>
                                    {{ Auth::guard('mentor')->user()->name }}
                                </div>
                                <span>
                                    {{ Auth::guard('mentor')->user()->email }}
                                </span>
                            @else
                                <div>
                                    {{ Auth::guard('web')->user()->name }}
                                </div>
                                <span>
                                    {{ Auth::guard('web')->user()->email }}
                                </span>
                            @endif
                        </div>
                    </a>
                </li>
                <li>
                    <hr>
                </li>
                @if (Auth::guard('admin')->user() || Auth::guard('mentor')->user())
                    <li>
                        <a href="/admin" class="is-link">
                            <ion-icon name="layers-outline" class="is-icon"></ion-icon> <span> Trang quản
                                trị
                            </span>
                        </a>
                    </li>
                    <li>
                        <hr>
                    </li>
                @endif

                <li>
                    <a href="#">

                    <a href="{{route('client.account.detail',auth()->user()->id)}}">

                        <ion-icon name="person-circle-outline" class="is-icon"></ion-icon>
                        Tài khoản của tôi
                    </a>
                </li>
                <li>
                    @if (Auth::guard('admin')->user())
                        <a href="{{ route('admin.logout') }}">
                            <ion-icon name="log-out-outline" class="is-icon"></ion-icon>
                            Đăng xuất
                        </a>
                    @elseif (Auth::guard('mentor')->user())
                        <a href="{{ route('mentor.logout') }}">
                            <ion-icon name="log-out-outline" class="is-icon"></ion-icon>
                            Đăng xuất
                        </a>
                    @else
                        <a href="{{ route('admin.logout') }}">
                            <ion-icon name="log-out-outline" class="is-icon"></ion-icon>
                            Đăng xuất
                        </a>
                    @endif
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
