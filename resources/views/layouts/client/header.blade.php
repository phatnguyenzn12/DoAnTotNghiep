<style>
    ::-webkit-scrollbar {
        width: 10px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #888;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #555;
    }
</style>
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
        <!-- Category menu START -->
        <ul class="navbar-nav navbar-nav-scroll dropdown-clickable">
            <li class="nav-item dropdown dropdown-menu-shadow-stacked">
                <a class="nav-link" href="#" id="categoryMenu" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="bi bi-grid-3x3-gap-fill me-3 fs-5 me-xl-1 d-xl-none"></i>
                    <i class="bi bi-grid-3x3-gap-fill me-1 d-none d-xl-inline-block"></i>
                    <span class="d-none d-xl-inline-block">Danh mục</span>
                </a>

                <ul class="dropdown-menu z-index-unset" aria-labelledby="categoryMenu">
                    @foreach ($cate_courses = DB::table('cate_courses')->get() as $cate_course)
                        <!-- Dropdown submenu -->
                        <li class="dropdown-submenu dropend">
                            <a class="dropdown-item dropdown-toggle" href="#">{{ $cate_course->name }}</a>
                            <ul class="dropdown-menu dropdown-menu-start" data-bs-popper="none">
                                <!-- dropdown submenu open right -->
                                <div class="col-12">
                                    @forelse ($courses = DB::table('courses')->where('status', 2)->where('cate_course_id', $cate_course->id)->get() as $course)
                                        <div class="">
                                            <li> <a class="dropdown-item"
                                                    href="{{ route('client.course.show', ['slug' => $course->slug, 'course' => $course->id]) }}">{{ $course->title }}</a>
                                            </li>
                                        </div>
                                    @empty
                                        <li> <a class="dropdown-item" href="#">Không có khóa học</a> </li>
                                    @endforelse
                                </div>
                            </ul>
                        </li>
                        {{-- <li> <a class="dropdown-item"
                                href="{{ route('client.course.list') }}">{{ $cate_course->name }}</a></li> --}}
                    @endforeach
                </ul>
            </li>
        </ul>
        <!-- Category menu END -->
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
                        <li> <a class="dropdown-item" href="{{ route('client.mentor.list') }}">Người giảng dạy</a>
                        </li>
                        <li> <a class="dropdown-item" href="{{ route('client.course.list') }}">Danh sách khóa học</a>
                        </li>
                        <li> <a class="dropdown-item" href="{{ route('ab.policy') }}">Chính sách</a>
                        </li>
                        <li> <a class="dropdown-item" href="{{ route('client.course.list') }}">Liên hệ</a>
                        </li>
                    </ul>
                </li>

                @if (Auth::guard('web')->user())
                    <!-- Nav item 2 Course -->
                    <li class="nav-item dropdown"><a class="nav-link" href="{{ route('client.account.myCourse') }}">Khoá
                            học của tôi</a></li>
                @endif

            </ul>
            <!-- Nav Main menu END -->
        </div>
        <!-- Main navbar END -->
        @if (Auth::guard('web')->user() || Auth::guard('admin')->user() || Auth::guard('mentor')->user())
            <!-- Profile and notification START -->
            <ul class="nav flex-row align-items-center list-unstyled ms-xl-auto">
                <!-- Add to cart -->
                <li class="nav-item ms-2 dropdown position-relative overflow-visible">
                    @if (auth()->user())
                        <!-- Cart button -->
                        <a class="nav-link mb-0 stretched-link" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false" data-bs-auto-close="outside">
                            <i class="bi bi-cart2 fs-4"></i>
                        </a>

                        <!-- badge -->
                        <span
                            class="position-absolute top-0 start-100 translate-middle badge rounded-circle text-bg-success mt-2 mt-xl-3 ms-n3 smaller">{{ $carts != [] ? $carts->count() : 0 }}
                            <span class="visually-hidden">unread messages</span>
                        </span>

                        <!-- Cart dropdown menu START -->
                        <div
                            class="dropdown-menu dropdown-animation dropdown-menu-end dropdown-menu-size-md p-0 shadow-lg border-0">
                            <div class="card bg-transparent">
                                <div class="card-header bg-transparent border-bottom py-4">
                                    <h5 class="m-0">Giỏ hàng</h5>
                                </div>
                                <div class="card-body p-0"
                                    style="overflow: scroll;
                            max-height: 300px;
                            overflow-x: hidden;">

                                    @forelse ($carts as $cart)
                                        <!-- Cart item START -->
                                        <div class="row p-3 g-2">
                                            <!-- Image -->
                                            <div class="col-3">
                                                <img class="rounded-2" src="{{ asset('app/' . $cart->image) }}"
                                                    alt="avatar">
                                            </div>

                                            <div class="col-9">
                                                <!-- Title -->
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="m-0">{{ $cart->title }} </h6>
                                                    <!-- Action item -->
                                                    <form action="{{ route('client.order.cartRemove', $cart->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <td>
                                                            <button type="submit"
                                                                class="btn btn-sm btn-danger-soft px-2 mb-0"><i
                                                                    class="bi bi-x-lg"></i></button>
                                                        </td>
                                                    </form>

                                                </div>
                                                <!-- Select item -->
                                                <span>
                                                    {{ number_format($cart->current_price) }}đ
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
                                    <a href="{{ route('client.order.cartList') }}"
                                        class="btn btn-sm btn-light mb-0">Xem
                                        giỏ
                                        hàng</a>
                                    <a href="{{ route('client.order.pay') }}"
                                        class="btn btn-sm btn-success mb-0">Thanh
                                        toán ngay</a>
                                </div>
                            </div>
                        </div>
                    @endif
                    <!-- Cart dropdown menu END -->
                </li>


                <!-- Notification dropdown START -->


                @include('components.client.notification')

                <!-- Notification dropdown END -->

                <!-- Profile dropdown START -->
                <li class="nav-item ms-3 dropdown">
                    <!-- Avatar -->
                    <a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button"
                        data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        @if (Auth::guard('admin')->user())
                            <img class="avatar-img rounded-circle"
                                src="{{ asset('app/' .auth()->guard('admin')->user()->avatar) }}" alt="avatar">
                        @elseif (Auth::guard('mentor')->user())
                            <img class="avatar-img rounded-circle"
                                src="{{ asset('app/' .auth()->guard('mentor')->user()->avatar) }}" alt="avatar">
                        @else
                            <img class="avatar-img rounded-circle"
                                src="{{ asset('app/' .auth()->guard('web')->user()->avatar) }}" alt="avatar">
                        @endif
                    </a>

                    <!-- Profile dropdown START -->
                    <ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3"
                        aria-labelledby="profileDropdown">
                        <!-- Profile info -->
                        <li class="px-3 mb-3">
                            <div class="d-flex align-items-center">
                                <!-- Avatar -->
                                <div class="avatar me-3">
                                    @if (Auth::guard('admin')->user())
                                        <img class="avatar-img rounded-circle"
                                            src="{{ asset('app/' .auth()->guard('admin')->user()->avatar) }}"
                                            alt="avatar">
                                    @elseif (Auth::guard('mentor')->user())
                                        <img class="avatar-img rounded-circle"
                                            src="{{ asset('app/' .auth()->guard('mentor')->user()->avatar) }}"
                                            alt="avatar">
                                    @else
                                        <img class="avatar-img rounded-circle"
                                            src="{{ asset('app/' .auth()->guard('web')->user()->avatar) }}"
                                            alt="avatar">
                                    @endif
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
                        @if (Auth::guard('admin')->user())
                            <li><a class="dropdown-item" href="/admin"><i class="bi bi-person fa-fw me-2"></i>Trang
                                    quản
                                    trị</a></li>
                        @elseif (Auth::guard('mentor')->user())
                            @if (auth()->guard('mentor')->user()->hasRole('lead'))
                                <li><a class="dropdown-item" href="{{ route('mentor.course.index') }}"><i
                                            class="bi bi-person fa-fw me-2"></i>Trang Lead</a></li>
                            @elseif(auth()->guard('mentor')->user()->hasRole('teacher'))
                                <li><a class="dropdown-item" href="{{ route('teacher.course.index') }}"><i
                                            class="bi bi-person fa-fw me-2"></i>Trang Giảng viên</a></li>
                            @endif
                        @endif
                        <li><a class="dropdown-item" href="{{ route('client.account.detail') }}"><i
                                    class="bi bi-person fa-fw me-2"></i>Sửa thông tin cá nhân</a></li>
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
