@extends('layouts.client.master')

@section('title', 'Trang chủ')

@section('content')
    <!-- =======================
                                                                                    Page Banner START -->
    <section class="bg-dark align-items-center d-flex"
        style="background:url(/frontend/images/pattern/04.png) no-repeat center center; background-size:cover;">
        <!-- Main banner background image -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Title -->
                    <h1 class="text-white">Tất cả khóa học</h1>
                    <!-- Breadcrumb -->
                    <div class="d-flex">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-dark breadcrumb-dots mb-0">
                                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Khóa học</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container">
            <div class="row">
                <!-- Main content START -->

                <!-- Main content END -->

                <!-- Right sidebar START -->
                <div class="col-lg-4 col-xl-3">
                    <!-- Responsive offcanvas body START -->
                    <div class="offcanvas-lg offcanvas-end" tabindex="-1" id="offcanvasSidebar"
                        aria-labelledby="offcanvasSidebarLabel">
                        <div class="offcanvas-header bg-light">
                            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Advance Filter</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                data-bs-target="#offcanvasSidebar" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body p-3 p-lg-0">
                            <form>
                                <!-- Category START -->
                                <div class="card card-body shadow p-4 mb-4">
                                    <!-- Title -->
                                    <h4 class="mb-3">Danh mục</h4>
                                    <!-- Category group -->
                                    <div class="col-12">
                                        <!-- Checkbox -->
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value=""
                                                    name="category" id="flexCheckDefault9" onclick="fiterCategory(0)">
                                                <label class="form-check-label text-dark" for="flexCheckDefault9">Tất
                                                    cả</label>
                                            </div>
                                        </div>
                                        <hr>
                                        <!-- Checkbox -->
                                        @foreach ($cate_courses as $cate_course)
                                            @if ($cate_course->courses->where('status', 2)->count() != 0)
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value=""
                                                            name="category" id="flexCheckDefault9"
                                                            onclick="fiterCategory('{{ $cate_course->id }}')">
                                                        <label class="form-check-label text-dark"
                                                            for="flexCheckDefault10">{{ $cate_course->name }}</label>
                                                    </div>
                                                    <span
                                                        class="small">({{ $cate_course->courses->where('status', 2)->count() }})</span>
                                                </div>
                                                <hr>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <!-- Category END -->

                                <!-- Price START -->
                                <div class="card card-body shadow p-4 mb-4">
                                    <!-- Title -->
                                    <h4 class="mb-3">Lọc giá</h4>
                                    <input class="input-range" orient="vertical" type="range" step="10000"
                                        onchange="fiterPrice(this)" value="{{ $min_price }}" min="{{ $min_price }}"
                                        max="{{ $max_price }}">
                                    <span class="range-value"></span>
                                </div>
                                <!-- Price END -->

                                <!-- Skill level START -->
                                <div class="card card-body shadow p-4 mb-4">
                                    <!-- Title -->
                                    <h4 class="mb-3">Kỹ năng</h4>
                                    <ul class="list-inline mb-0">
                                        <!-- Checkbox -->
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="" name="skill"
                                                    id="flexCheckDefault9" onclick="fiterSkill(0)">
                                                <label class="form-check-label text-dark" for="flexCheckDefault9">Tất
                                                    cả</label>
                                            </div>
                                        </div>
                                        @foreach ($skills as $skill)
                                            @if ($skill->courses->where('status', 2)->count() != 0)
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value=""
                                                            name="skill" id="flexCheckDefault9"
                                                            onclick="fiterSkill('{{ $skill->id }}')">
                                                        <label class="form-check-label text-dark"
                                                            for="flexCheckDefault10">{{ $skill->title }}</label>
                                                    </div>
                                                    <span class="small">
                                                        ({{ $skill->courses->where('status', 2)->count() }})
                                                    </span>
                                                </div>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- Skill level END -->

                                <!-- Language START -->
                                <div class="card card-body shadow p-4 mb-4">
                                    <!-- Title -->
                                    <h4 class="mb-3">Ngôn ngữ</h4>
                                    <ul class="list-inline mb-0 g-3">

                                        <select id="select2" class="form-control" name="language" id=""
                                            onchange="fiterLanguage(this)">
                                            <option value="0">Tất cả</option>
                                            <option value="viet">Tiếng việt</option>
                                            <option value="english">Tiếng anh</option>
                                        </select>
                                    </ul>
                                </div>
                                <!-- Language END -->

                                <div class="card card-body shadow p-4 mb-4">
                                    <!-- Title -->
                                    <h4 class="mb-3">Giảng viên</h4>
                                    <ul class="list-inline mb-0 g-3">
                                        <select id="select2" class="form-control" id=""
                                            onchange="fiterTeacher(this)">
                                            <option value="0">Tất cả</option>
                                            @foreach ($teachers as $teacher)
                                                @if ($teacher->courses->where('status', 2)->count() != 0)
                                                    <option value="{{ $teacher->id }}">{{ $teacher->name }}
                                                        ({{ $teacher->courses->where('status', 2)->count() }})</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </ul>
                                </div>
                            </form><!-- Form End -->
                        </div>

                        <!-- Button -->
                        <div class="d-grid p-2 p-lg-0 text-center">
                            <button class="btn btn-primary mb-0">Tìm kiếm</button>
                        </div>

                    </div>
                    <!-- Responsive offcanvas body END -->
                </div>
                <div class="col-lg-8 col-xl-9">

                    <!-- Search option START -->
                    <div class="row mb-4 align-items-center">
                        <!-- Search bar -->
                        <div class="col-xl-6">
                            <form class="border rounded p-2">
                                <div class="input-group input-borderless">
                                    <input class="form-control me-1" type="search" oninput="search(this)"
                                        placeholder="Tìm kiếm khóa học">
                                    <button type="button" class="btn btn-primary mb-0 rounded z-index-1"><i
                                            class="fas fa-search"></i></button>
                                </div>
                            </form>
                        </div>

                        <!-- Select option -->
                        <div class="col-xl-3 mt-3 mt-xl-0">
                            <form class="border rounded p-2 input-borderless">
                                <select class="form-select form-select-sm js-choice border-0" aria-label=".form-select-sm"
                                    onchange="fiterSort(this)">
                                    <option value="id_desc">Mặc định</option>
                                    <option value="id_desc">Mới đến cũ</option>
                                    <option value="id_asc">Cũ đến mới</option>
                                </select>
                            </form>
                        </div>
                    </div>
                    <!-- Search option END -->

                    <!-- Course Grid START -->
                    <div id="table-innerHtml">

                    </div>

                    <!-- Course Grid END -->
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js-links')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>
@endsection
@push('js-handles')
    <script>
        objFiter = {
            page: 1,
            title: 0,
            record: 10,
            id: 'id_desc',
            price: 0,
            discount: 0,
            cate_course: 0,
            skill: 0,
            language: 0,
            teacher: 0,
        }

        function showAjax(obj) {
            $.ajax({
                url: '{{ route('client.course.listData') }}',
                timeout: 1000,
                data: obj,

                success: function(res) {
                    $('#table-innerHtml').html(res)
                }
            })
        }
        showAjax(objFiter);

        function search(elemment) {
            objFiter.title = elemment.value
            showAjax(objFiter);
        }

        function fiterSort(elemment) {
            objFiter.id = elemment.value
            showAjax(objFiter);
        }

        function fiterCategory(cate_course_id) {
            objFiter.cate_course = cate_course_id
            showAjax(objFiter);
        }

        function fiterSkill(skill_id) {
            objFiter.skill = skill_id
            showAjax(objFiter);
        }

        function fiterPrice(elemment) {
            objFiter.price = elemment.value
            showAjax(objFiter);
        }

        function fiterLanguage(elemment) {
            objFiter.language = elemment.value
            showAjax(objFiter);
        }

        function fiterTeacher(elemment) {
            objFiter.teacher = elemment.value
            showAjax(objFiter);
        }

        // function fiterSale(elemment) {
        //     objFiter.discount = elemment.value
        //     showAjax(objFiter);
        // }

        function pagination(page) {
            objFiter.page = page
            showAjax(objFiter);
        }

        var range = $('.input-range'),
            value = $('.range-value');

        value.html(range.attr('value'));

        range.on('input', function() {
            value.html(this.value);
        });
    </script>
@endpush
