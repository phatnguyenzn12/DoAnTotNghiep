<div class="lg:w-3/12 space-y-4 lg:block hidden">
    <div>
        <h4 class="font-semibold text-base mb-2"> Sắp xếp khóa học </h4>
        <select class=" default shadow-sm rounded" data-selected-text-format="count" data-size="7" title="All Categories"
            filter-sort>
            <option value="0"> Mặc định </option>
            <option value="price"> Gía cao đến thấp </option>
            <option value="current_price"> Gía thấp đến cao </option>
            <option value="id_desc"> Khóa học mới đến cũ </option>
            <option value="id_asc"> Khóa học cũ đến mới </option>
        </select>
    </div>

    <div class="">
        <h4 class="font-semibold text-base mb-2"> Tìm kiếm khóa học </h4>
        <input type="text" class="with-border" placeholder="Search" filter-search-title>
    </div>

    <div>
        <h4 class="font-semibold text-base mb-2"> Danh mục khóa học </h4>
        <select class=" default shadow-sm rounded" data-selected-text-format="count" data-size="7"
            title="All Categories" filter-cate>
            <option value="0" selected> Tất cả </option>
            @forelse ($cateCourses as $cate)
                <option value="{{ $cate->id }}"> {{ $cate->name }} </option>
            @empty
            @endforelse

        </select>
    </div>

    <div>
        <h4 class="font-semibold text-base mb-2"> Đánh giá khóa học </h4>

        <form class="space-y-1">

            <div class="radio">
                <input id="radio-1" name="radio" type="radio" checked>
                <label for="radio-1"><span class="radio-label"></span> Tất cả </label>
            </div>
            <br>
            <div class="radio">
                <input id="course-rate-1" name="radio" type="radio">
                <label for="course-rate-1"><span class="radio-label"></span>

                    <div class="star-rating leading-4">
                        <ion-icon name="star"></ion-icon>
                    </div>

                </label>
            </div>
            <br>
            <div class="radio">
                <input id="course-rate-2" name="radio" type="radio">
                <label for="course-rate-2"><span class="radio-label"></span>

                    <div class="star-rating leading-4">
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                    </div>

                </label>
            </div>
            <br>
            <div class="radio">
                <input id="course-rate-3" name="radio" type="radio">
                <label for="course-rate-3"><span class="radio-label"></span>

                    <div class="star-rating leading-4">
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                    </div>

                </label>
            </div>
            <br>
            <div class="radio">
                <input id="course-rate-4" name="radio" type="radio">
                <label for="course-rate-4"><span class="radio-label"></span>

                    <div class="star-rating leading-4">
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                    </div>

                </label>
            </div>
            <br>
            <div class="radio">
                <input id="course-rate-5" name="radio" type="radio">
                <label for="course-rate-5"><span class="radio-label"></span>

                    <div class="star-rating leading-4">
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                    </div>

                </label>
            </div>
        </form>

    </div>

    <div>
        <h4 class="font-semibold text-base mb-2"> Giá khóa học </h4>
        <form class="space-y-1">
            <input class="uk-range" type="range" value="2" min="0" max="1000000" step="0.1"
                filter-price>
            <span class="md:font-semibold block text-sm" id="price" show-price>0</span>
        </form>
    </div>





</div>
