@forelse ($courses as $course)
    <div class="flex md:space-x-6 space-x-3 md:p-5 p-2 relative">
        <a href="course-intro-2.html" class="md:w-60 md:h-36 w-28 h-20 overflow-hidden rounded-lg relative shadow-sm">
            <img src="/frontend/assets/images/courses/img-4.jpg" alt=""
                class="w-full h-full absolute inset-0 object-cover">
            <img src="/frontend/assets/images/icon-play.svg" class="w-12 h-12 uk-position-center" alt="">
        </a>
        <div class="flex-1 md:space-y-2 space-y-1">
            <a href="course-intro-2.html" class="md:text-xl font-semibold line-clamp-2">
                {{ $course->title }} </a>
            <p class="leading-6 pr-4 line-clamp-2 md:block hidden"> {{ $course->content }} </p>
            <a href="single-channel.html" class="md:font-semibold block text-sm"> Jesse Stevens </a>
            <div class="flex items-center justify-between">
                <div class="flex space-x-2 items-center text-sm">
                    <div> Advance levels </div>
                    <div class="md:block hidden">·</div>
                    <div class="flex items-center"> 18 Hourse </div>
                </div>
                <a href="#" class="md:flex items-center justify-center h-9 px-8 rounded-md border -mt-3.5 hidden">
                    Thêm vào giỏ hàng </a>
            </div>

            <div class="absolute top-1 right-3 md:flex hidden">
                <a href="#" class="hover:bg-gray-200 p-1.5 inline-block rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
@empty
@endforelse
