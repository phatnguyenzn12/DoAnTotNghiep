<!-- course-filter -->
<div id="course-filter" uk-offcanvas="modee: reveal; overlay: true; flip: true">
    <div class="uk-offcanvas-bar bg-white lg:w-96 w-full overflow-hidden flex justify-between flex-col">

        <div class="px-5 py-2.5 flex items-center space-x-2 shadow-sm">
            <ion-icon name="arrow-back" data-tippy-placement="right" title="Close filter"
                class="text-xl uk-offcanvas-close relative inset-0 p-0 cursor-pointer"></ion-icon>
            <h3 class="font-semibold text-lg"> Filter </h3>
        </div>
        <div class="p-6 pt-3 flex-1 lg:h-1/6 mr-1" data-simplebar>

            <h3 class="font-semibold text-lg"> Tên khóa học </h3>
            <div> lọc theo tên khóa học </div>

            <ul class="ml-2 mb-4 mt-1 -space-y-2">
                <input type="text" placeholder="Search" style="border: 1px solid rgb(204, 204, 204)">
            </ul>

            <h3 class="font-semibold text-lg"> Pricing </h3>
            <div> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sediam nibh </div>

            <ul class="ml-2 mb-4 mt-2 -space-y-2">
                <li class="radio w-full">
                    <input id="Paid-1" name="paid" type="radio" checked>
                    <label for="Paid-1" class="flex justify-between p-2 hover:bg-gray-100 rounded-md"
                        style="padding-left: 20px;">
                        Paid <span class="radio-label" style="position: relative"></span>
                    </label>
                </li>
                <li class="radio w-full">
                    <input id="paid-2" name="paid" type="radio">
                    <label for="paid-2" class="flex justify-between p-2 hover:bg-gray-100 rounded-md"
                        style="padding-left: 20px;">
                        Free <span class="radio-label" style="position: relative"></span>
                    </label>
                </li>
            </ul>

            <h3 class="font-semibold text-lg"> Duration time </h3>
            <div> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sediam nibh </div>

            <ul class="ml-2 mb-4 mt-2 -space-y-2">
                <li class="radio w-full">
                    <input id="duration-1" name="duration" type="radio" checked>
                    <label for="duration-1" class="flex justify-between p-2 hover:bg-gray-100 rounded-md"
                        style="padding-left: 20px;">
                        +5 Hourse <span class="radio-label" style="position: relative"></span>
                    </label>
                </li>
                <li class="radio w-full">
                    <input id="duration-2" name="duration" type="radio">
                    <label for="duration-2" class="flex justify-between p-2 hover:bg-gray-100 rounded-md"
                        style="padding-left: 20px;">
                        +10 Hourse <span class="radio-label" style="position: relative"></span>
                    </label>
                </li>
                <li class="radio w-full">
                    <input id="duration-3" name="duration" type="radio">
                    <label for="duration-3" class="flex justify-between p-2 hover:bg-gray-100 rounded-md"
                        style="padding-left: 20px;">
                        +25 Hourse <span class="radio-label" style="position: relative"></span>
                    </label>
                </li>
                <li class="radio w-full">
                    <input id="duration-4" name="duration" type="radio">
                    <label for="duration-4" class="flex justify-between p-2 hover:bg-gray-100 rounded-md"
                        style="padding-left: 20px;">
                        +30 Hourse <span class="radio-label" style="position: relative"></span>
                    </label>
                </li>
            </ul>

        </div>
        <div class="font-medium gap-2 grid grid-cols-2 text-center p-3 border-t">
            <div class="absolute w-full h-16 -mt-12 bg-gradient-to-b to-transparent from-white"></div>
            <a href="#" class="bg-gray-200 flex-1 py-2.5 rounded-md"> Reset</a>
            <a href="#" class="bg-blue-600 flex-1 py-2.5 rounded-md text-white"> Apply</a>
        </div>

    </div>
