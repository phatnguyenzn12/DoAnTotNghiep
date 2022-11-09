@if (auth()->user())
    <div class="tube-card p-4 mt-3" uk-toggle="cls: tube-card p-4; mode: media; media: 640">

        <h4 class="py-3 px-5 border-b font-semibold text-grey-700 -mx-4 -mt-3 mb-4"> Khóa sở hữu </h4>

        <div class="relative -mx-1 uk-slider" uk-slider="finite: true">

            <div class="uk-slider-container md:px-1 px-2 py-3">
                <ul class="uk-slider-items uk-child-width-1-3@m uk-child-width-1-2 uk-grid-small uk-grid"
                    style="transform: translate3d(0px, 0px, 0px);">
                    @forelse($ownerCourse as $course)
                        <li>
                            <a href="{{ route('client.course.show', ['slug' => $course->slug, 'course' => $course->id]) }}"
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
                                    </div>
                                    <div class="relative overflow-hidden rounded-md bg-gray-200 h-1 mt-4">
                                        <div class="w-2/4 h-full bg-green-500"></div>
                                    </div>
                                </div>
                            </a>

                        </li>
                    @empty
                    @endforelse
                </ul>

                <a class="absolute bg-white top-16 flex items-center justify-center p-2 -left-4 rounded-full shadow-md text-xl w-9 z-10 dark:bg-gray-800 dark:text-white uk-invisible"
                    href="#" uk-slider-item="previous">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
                <a class="absolute bg-white top-16 flex items-center justify-center p-2 -right-4 rounded-full shadow-md text-xl w-9 z-10 dark:bg-gray-800 dark:text-white"
                    href="#" uk-slider-item="next">
                    <ion-icon name="chevron-forward-outline"></ion-icon>
                </a>

            </div>

        </div>

    </div>
@else
@endif
