<div class="lg:w-3/12 space-y-4 lg:block hidden">

    <div class="">
        <h4 class="font-semibold text-base mb-2"> Tìm kiếm khóa học </h4>
        <input type="text" class="with-border" placeholder="Search" oninput="filerSearch(this)">
    </div>

    <div>
        <h4 class="font-semibold text-base mb-2"> Danh mục khóa học </h4>
        <select class=" default shadow-sm rounded" data-selected-text-format="count" data-size="7" title="All Categories"
            onchange="filterCate(this)">
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
                oninput="filterPrice(this)">
            <span class="md:font-semibold block text-sm" id="price">0</span>
        </form>
    </div>

    <div>
        <h4 class="font-semibold text-base mb-2"> Sắp xếp khóa học </h4>
        <form class="space-y-1">
            <div class="radio">
                <input id="radio-0" name="radio" type="radio" checked onclick="filterSort(this)" value="0">
                <label for="radio-0"><span class="radio-label"></span> Mặc định </label>
            </div>
            <br>
            <div class="radio">
                <input id="radio-1" name="radio" type="radio" onclick="filterSort(this)" value="price">
                <label for="radio-1"><span class="radio-label"></span> Gía cao đến thấp </label>
            </div>
            <br>
            <div class="radio">
                <input id="radio-2" name="radio" type="radio" onclick="filterSort(this)" value="price"
                    value="current_price">
                <label for="radio-2"><span class="radio-label"></span> Gía thấp đến cao </label>
            </div>
            <br>
            <div class="radio">
                <input id="radio-3" name="radio" type="radio" onclick="filterSort(this)" value="id_desc">
                <label for="radio-3"><span class="radio-label"></span> Khóa học mới đến cũ </label>
            </div>
            <br>
            <div class="radio">
                <input id="radio-4" name="radio" type="radio" onclick="filterSort(this)" value="id_asc">
                <label for="radio-4"><span class="radio-label"></span> Khóa học cũ đến mới </label>
            </div>
        </form>
    </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>

<script>
    filter = {
        price: 0,
        title: 0,
        sort: 0,
        cate: 0,
    }

    function filerSearch(a) {
        filter.title = a.value
        showAxios(filter.price, filter.title, filter.cate, filter.sort)
    }

    function filterPrice(a) {
        js_$('#price').innerText = a.value;
        filter.price = a.value
        showAxios(filter.price, filter.title, filter.cate, filter.sort)
    }

    function filterSort(a) {
        filter.sort = a.value
        showAxios(filter.price, filter.title, filter.cate, filter.sort)
    }

    function filterCate(a) {
        filter.cate = a.value
        showAxios(filter.price, filter.title, filter.cate, filter.sort)
    }

    function showAxios(price, title, cate, sort) {
        axios.get('{{ route('client.course.filterCourse') }}', {
                params: {
                    price: price,
                    title: title,
                    cate: cate,
                    id: sort,
                }
            })
            .then(
                res => {
                    js_$('[show-data]').innerHTML = res.data
                }
            )
    }

    showAxios(filter.price, filter.title, filter.cate, filter.sort)
</script>
