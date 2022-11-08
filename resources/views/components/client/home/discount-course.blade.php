<div class="sm:my-4 my-3 flex items-end justify-between pt-3">
    <h2 class="text-2xl font-semibold"> Khóa học giảm giá </h2>
</div>

<div class="relative mt-3" uk-slider="finite: true">

    <div class="uk-slider-container px-1 py-3">
        <ul class="uk-slider-items uk-child-width-1-1@m uk-grid">
            @forelse($courses as $course)
                @if ($course->discount > 0 && $course->lesson > 0)
                    <li>
                        <div class="bg-white shadow-sm rounded-lg uk-transition-toggle md:flex">
                            <div class="md:w-5/12 md:h-60 h-40 overflow-hidden rounded-l-lg relative">
                                <img src="/frontend/assets/images/courses/img-6.jpg" alt=""
                                    class="w-full h-full absolute inset-0 object-cover">
                                <img src="http://demo.foxthemes.net/courseplus-v4.3.1/assets/images/icon-play.svg"
                                    class="w-16 h-16 uk-position-center uk-transition-fade" alt="">
                            </div>
                            <div class="flex-1 md:p-6 p-5 d-flex justify-between">

                                <div class="">
                                    <div class="font-semibold line-clamp-2 md:text-xl md:leading-relaxed">
                                        {{ $course->title }}</div>
                                    <div class="mt-2 md:block hidden">
                                        <p class="line-clamp-2">{{ $course->content }}</p>
                                    </div>

                                    <div class="mt-1">
                                        <div class="text-lg font-semibold">{{ number_format($course->price) }}
                                        </div>
                                    </div>
                                </div>

                                <div class="">
                                    <div class="mt-1">Thời gian: 13h </div>
                                    <div class="mt-1">Bài học: {{ $course->lesson }} </div>
                                    <div class="mt-1">chương học: {{ $course->chapter }} </div>
                                </div>

                            </div>
                        </div>
                    </li>
                @endif
            @empty
            @endforelse

        </ul>
    </div>

    <a class="absolute bg-white uk-position-center-left -ml-3 flex items-center justify-center p-2 rounded-full shadow-md text-xl w-11 h-11 z-10 dark:bg-gray-800 dark:text-white"
        href="#" uk-slider-item="previous">
        <ion-icon name="chevron-back-outline"></ion-icon>
    </a>
    <a class="absolute bg-white uk-position-center-right -mr-3 flex items-center justify-center p-2 rounded-full shadow-md text-xl w-11 h-11 z-10 dark:bg-gray-800 dark:text-white"
        href="#" uk-slider-item="next">
        <ion-icon name="chevron-forward-outline"></ion-icon>
    </a>

</div>