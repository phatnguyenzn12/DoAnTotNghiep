<!-- Logo Nav START -->
<nav class="navbar navbar-expand-xl">
    <div class="container">
        <!-- Logo START -->
        <a class="navbar-brand" href="{{ route('client') }}">
            <img class="light-mode-item navbar-brand-item" src="/frontend/images/logo.svg" alt="logo">
            <img class="dark-mode-item navbar-brand-item" src="/frontend/images/logo-light.svg" alt="logo">
        </a>
        <!-- Logo END -->

        <!-- Responsive navbar toggler -->
        <button class="navbar-toggler ms-sm-auto" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-animation">
                <span></span>
                <span></span>
                <span></span>
            </span>
        </button>

        <!-- Main navbar START -->
        <div class="navbar-collapse collapse" id="navbarCollapse">
            <!-- Nav Search START -->
            <div class="col-xl-7">
                <div class="nav my-3 my-xl-0 px-4 flex-nowrap align-items-center">
                    <div class="nav-item w-100">
                        <form class="rounded position-relative">
                            <input class="form-control pe-5 bg-secondary bg-opacity-10 border-0" type="search"
                                placeholder="Search" aria-label="Search">
                            <button
                                class="btn btn-link bg-transparent px-2 py-0 position-absolute top-50 end-0 translate-middle-y"
                                type="submit"><i class="fas fa-search fs-6 text-primary"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Nav Search END -->

            <!-- Nav Main menu START -->
            <ul class="navbar-nav navbar-nav-scroll ms-auto">
                <!-- Nav item 1 Demos -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="demoMenu" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Menu</a>
                    <ul class="dropdown-menu" aria-labelledby="demoMenu">
                        <li> <a class="dropdown-item" href="{{ route('client.mentor.list') }}">Người giảng dạy</a></li>
                        <li> <a class="dropdown-item" href="{{ route('client.mentor.index') }}">Trở thành giáo viên</a>
                        </li>
                    </ul>
                </li>

                <!-- Nav item 2 Course -->
                <li class="nav-item dropdown"><a class="nav-link" href="{{ route('client.account.myCourse') }}">Khoá học
                        của tôi</a></li>

            </ul>
            <!-- Nav Main menu END -->
        </div>
        <!-- Main navbar END -->
        @if (Auth::guard('web')->user() || Auth::guard('admin')->user() || Auth::guard('mentor')->user())
            <!-- Profile and notification START -->
            <ul class="nav flex-row align-items-center list-unstyled ms-xl-auto">
                <!-- Add to cart -->
                <li class="nav-item ms-2 dropdown position-relative overflow-visible">
                    <!-- Cart button -->
                    <a class="nav-link mb-0 stretched-link" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false" data-bs-auto-close="outside">
                        <i class="bi bi-cart2 fs-4"></i>
                    </a>
                    <!-- badge -->
                    <span
                        class="position-absolute top-0 start-100 translate-middle badge rounded-circle text-bg-success mt-2 mt-xl-3 ms-n3 smaller">5
                        <span class="visually-hidden">unread messages</span>
                    </span>

                    <!-- Cart dropdown menu START -->
                    <div
                        class="dropdown-menu dropdown-animation dropdown-menu-end dropdown-menu-size-md p-0 shadow-lg border-0">
                        <div class="card bg-transparent">
                            <div class="card-header bg-transparent border-bottom py-4">
                                <h5 class="m-0">Giỏ hàng</h5>
                            </div>
                            <div class="card-body p-0">

                                @forelse ($carts as $cart)
                                    <!-- Cart item START -->
                                    <div class="row p-3 g-2">
                                        <!-- Image -->
                                        <div class="col-3">
                                            <img class="rounded-2" src="/frontend/images/book/02.jpg" alt="avatar">
                                        </div>

                                        <div class="col-9">
                                            <!-- Title -->
                                            <div class="d-flex justify-content-between">
                                                <h6 class="m-0">{{ $cart->title }} </h6>
                                                <a href="#" class="small text-primary-hover"><i
                                                        class="bi bi-x-lg"></i></a>
                                            </div>
                                            <!-- Select item -->
                                            <span>
                                                {{ $cart->current_price }}
                                            </span>
                                        </div>
                                    </div>
                                    <!-- Cart item END -->
                                @empty
                                    <div class="space-x-6 relative py-7 px-6 flex items-center justify-center">
                                        <h5 class="text-lg font-medium">
                                            <ion-icon name="bag-outline"></ion-icon> GIỎ HÀNG TRỐNG
                                        </h5>
                                    </div>
                                @endforelse

                            </div>
                            <!-- Button -->
                            <div
                                class="card-footer bg-transparent border-top py-3 text-center d-flex justify-content-between position-relative">
                                <a href="{{ route('client.order.cartList') }}" class="btn btn-sm btn-light mb-0">Xem giỏ
                                    hàng</a>
                                <a href="#" class="btn btn-sm btn-success mb-0">Thanh toán ngay</a>
                            </div>
                        </div>
                    </div>
                    <!-- Cart dropdown menu END -->
                </li>

                <!-- Notification dropdown START -->
                <li class="nav-item ms-0 ms-md-3 dropdown">
                    <!-- Notification button -->
                    <a class="btn btn-light btn-round mb-0" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false" data-bs-auto-close="outside">
                        <i class="bi bi-bell fa-fw"></i>
                    </a>
                    <!-- Notification dote -->
                    <span class="notif-badge animation-blink"></span>

                    <!-- Notification dropdown menu START -->

                    @if (Auth::guard('web')->user() || Auth::guard('admin')->user() || Auth::guard('mentor')->user())


                        <div
                            class="dropdown-menu dropdown-animation dropdown-menu-end dropdown-menu-size-md p-0 shadow-lg border-0">
                            <div class="card bg-transparent">
                                <div
                                    class="card-header bg-transparent border-bottom py-4 d-flex justify-content-between align-items-center">
                                    <h6 class="m-0">Notifications <span
                                            class="badge bg-danger bg-opacity-10 text-danger ms-2">{{ Auth::user()->unreadNotifications->count() > 0 ?? Auth::user()->unreadNotifications->count() }}
                                            new</span></h6>
                                    <a class="small" href="#">Clear all</a>
                                </div>
                                <div class="card-body p-0">
                                    <ul class="list-group list-unstyled list-group-flush">

                                        <!-- Notif item -->

                                        @forelse (Auth::user()->unreadNotifications as $notification )
                                        <li>
                                            <a href="{{route('client.lesson.index',['course'=>$notification->data['course_id'], 'lesson'=>$notification->data['lesson_id']])}}"
                                                class="list-group-item-action border-0 border-bottom d-flex p-3">
                                                <div class="me-3">
                                                    <div class="avatar avatar-md">
                                                        <img class="avatar-img rounded-circle"
                                                            src="{{Auth::user()->avatar}}" alt="avatar">
                                                       
                                                    </div>
                                                </div>
                                                <div>
                                                    <p class="text-body small m-0"> <b>{{Auth::user()->name}}</b> commented on <b>{{$notification->data['lesson_id']}}</b></p>
                                                    <u class="small">View detail</u>
                                                </div>
                                            </a>
                                        </li>
                                        @empty
                                        @endforelse

                                        <!-- Notif item -->
                                        {{-- <li>
                                            <a href="#"
                                                class="list-group-item-action border-0 border-bottom d-flex p-3">
                                                <div class="me-3">
                                                    <div class="avatar avatar-md">
                                                        <img class="avatar-img rounded-circle"
                                                            src="/frontend/images/avatar/02.jpg" alt="avatar">
                                                    </div>
                                                </div>
                                                <div>
                                                    <h6 class="mb-1">Larry Lawson Added a new course</h6>
                                                    <p class="small text-body m-0">What's new! Find out about new
                                                        features
                                                    </p>
                                                    <u class="small">View detail</u>
                                                </div>
                                            </a>
                                        </li> --}}

                                        <!-- Notif item -->
                                        {{-- <li>
                                            <a href="#"
                                                class="list-group-item-action border-0 border-bottom d-flex p-3">
                                                <div class="me-3">
                                                    <div class="avatar avatar-md">
                                                        <img class="avatar-img rounded-circle"
                                                            src="/frontend/images/avatar/05.jpg" alt="avatar">
                                                    </div>
                                                </div>
                                                <div>
                                                    <h6 class="mb-1">New request to apply for Instructor</h6>
                                                    <u class="small">View detail</u>
                                                </div>
                                            </a>
                                        </li> --}}

                                        <!-- Notif item -->
                                        {{-- <li>
                                            <a href="#"
                                                class="list-group-item-action border-0 border-bottom d-flex p-3">
                                                <div class="me-3">
                                                    <div class="avatar avatar-md">
                                                        <img class="avatar-img rounded-circle"
                                                            src="/frontend/images/avatar/03.jpg" alt="avatar">
                                                    </div>
                                                </div>
                                                <div>
                                                    <h6 class="mb-1">Update v2.3 completed successfully</h6>
                                                    <p class="small text-body m-0">What's new! Find out about new
                                                        features
                                                    </p>
                                                    <small class="text-body">5 min ago</small>
                                                </div>
                                            </a>
                                        </li> --}}
                                    </ul>
                                </div>
                                <!-- Button -->
                                <div class="card-footer bg-transparent border-0 py-3 text-center position-relative">
                                    <a href="#" class="stretched-link">See all incoming activity</a>
                                </div>
                            </div>
                        </div>
                        <!-- Notification dropdown menu END -->

                    @endif
                </li>
                <!-- Notification dropdown END -->

                <!-- Profile dropdown START -->
                <li class="nav-item ms-3 dropdown">
                    <!-- Avatar -->
                    <a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button"
                        data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img class="avatar-img rounded-circle" src="{{asset('app/'.Auth::user()->avatar)}}" alt="avatar">
                 </a>                                            

                    <!-- Profile dropdown START -->
                    <ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3"
                        aria-labelledby="profileDropdown">
                        <!-- Profile info -->
                        <li class="px-3 mb-3">
                            <div class="d-flex align-items-center">
                                <!-- Avatar -->
                                <div class="avatar me-3">
                                    <img class="src="{{asset('app/'.Auth::user()->avatar)}} src="/frontend/images/avatar/01.jpg"
                                        alt="avatar">
                                </div>
                                <div>
                                    @if (Auth::guard('admin')->user())
                                        <a class="h6" href="#">{{ Auth::guard('admin')->user()->name }}</a>
                                        <p class="small m-0">{{ Auth::guard('admin')->user()->email }}</p>
                                    @elseif (Auth::guard('mentor')->user())
                                        <a class="h6"
                                            href="#">{{ Auth::guard('mentor')->user()->name }}</a>
                                        <p class="small m-0">{{ Auth::guard('mentor')->user()->email }}</p>
                                    @else
                                        <a class="h6" href="#">{{ Auth::guard('web')->user()->name }}</a>
                                        <p class="small m-0">{{ Auth::guard('web')->user()->email }}</p>
                                    @endif
                                </div>
                            </div>
                        </li>
                        <!-- Links -->
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        @if (Auth::guard('admin')->user() || Auth::guard('mentor')->user())
                            <li><a class="dropdown-item" href="/admin"><i class="bi bi-person fa-fw me-2"></i>Trang
                                    quản
                                    trị</a></li>
                        @endif
                        <li><a class="dropdown-item" href="{{ route('client.account.index') }}"><i
                                    class="bi bi-person fa-fw me-2"></i>Edit
                                Profile</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-gear fa-fw me-2"></i>Account
                                Settings</a></li>
                        <li><a class="dropdown-item" href="#"><i
                                    class="bi bi-info-circle fa-fw me-2"></i>Help</a>
                        </li>
                        <li>
                            @if (Auth::guard('admin')->user())
                                <a class="dropdown-item bg-danger-soft-hover" href="{{ route('admin.logout') }}"><i
                                        class="bi bi-power fa-fw me-2"></i>Đăng xuất</a>
                            @elseif (Auth::guard('mentor')->user())
                                <a class="dropdown-item bg-danger-soft-hover" href="{{ route('mentor.logout') }}"><i
                                        class="bi bi-power fa-fw me-2"></i>Đăng xuất</a>
                            @else
                                <a class="dropdown-item bg-danger-soft-hover" href="{{ route('auth.logout') }}"><i
                                        class="bi bi-power fa-fw me-2"></i>Đăng xuất</a>
                            @endif
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <!-- Dark mode switch START -->
                        <li>
                            <div class="modeswitch-wrap" id="darkModeSwitch">
                                <div class="modeswitch-item">
                                    <div class="modeswitch-icon"></div>
                                </div>
                                <span>Dark mode</span>
                            </div>
                        </li>
                        <!-- Dark mode switch END -->
                    </ul>
                    <!-- Profile dropdown END -->
                </li>
            </ul>
        @else
            <div>
                <a href="{{ route('auth.login') }}" class="btn btn-primary">Đăng
                    nhập</a>
            </div>
        @endif
        <!-- Profile and notification END -->

    </div>
</nav>
<!-- Logo Nav END -->
