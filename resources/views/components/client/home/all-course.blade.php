<div class="sm:my-4 my-3 flex items-end justify-between pt-3">
    <h2 class="text-2xl font-semibold"> Khóa học mới </h2>
    <a href="#" class="text-blue-500 sm:block hidden"> Xem tất cả </a>
</div>

<div class="mt-3">

    <!--  slider -->
    <div class="mt-3">

        <div class="relative" uk-slider="finite: true">

            <div class="uk-slider-container px-1 py-3">

                <ul class="uk-slider-items uk-child-width-1-4@m uk-child-width-1-2@s uk-grid-small uk-grid">

                    @forelse($courses as $course)
                        @if ($course->lesson > 0)
                            <li>
                                <a href="{{ route('client.course.show', ['slug' => $course->slug,'course' => $course->id]) }}"
                                    class="uk-link-reset">
                                    <div class="card uk-transition-toggle">
                                        <div class="card-media h-40">
                                            <div class="card-media-overly"></div>
                                            <img src="/frontend/assets/images/courses/img-1.jpg" alt=""
                                                class="">
                                            <span class="icon-play"></span>
                                        </div>
                                        <div class="card-body p-4">
                                            <div class="font-semibold line-clamp-2"> {{ $course->title }}. </div>
                                            <div class="flex space-x-2 items-center text-sm pt-3">
                                                <div> 13 hours </div>
                                                <div> · </div>
                                                <div> {{ $course->lesson }} Bài học </div>
                                                <div>·</div>
                                                <div> {{ $course->chapter }} chương học </div>
                                            </div>

                                            <div class="flex items-center pt-1">
                                                <div class="text-lg font-semibold text-red-500">
                                                    {{ $course->current_price }} đ
                                                </div>
                                                <div class="mx-1">
                                                    @if ($course->discount > 0)
                                                        <del class="">{{ $course->price }}</del>

                                                        <span> / {{ $course->discount }}%</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                            </li>
                        @endif
                    @empty
                    @endforelse
                </ul>

                <a class="absolute bg-white top-1/4 flex items-center justify-center p-2 -left-4 rounded-full shadow-md text-xl w-9 z-10 dark:bg-gray-800 dark:text-white"
                    href="#" uk-slider-item="previous">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
                <a class="absolute bg-white top-1/4 flex items-center justify-center p-2 -right-4 rounded-full shadow-md text-xl w-9 z-10 dark:bg-gray-800 dark:text-white"
                    href="#" uk-slider-item="next">
                    <ion-icon name="chevron-forward-outline"></ion-icon>
                </a>

            </div>
        </div>

    </div>

</div>
