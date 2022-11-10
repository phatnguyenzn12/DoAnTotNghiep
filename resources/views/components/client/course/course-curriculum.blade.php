 <div id="curriculum">
     <h3 class="mb-4 text-xl font-semibold lg:mb-5"> Lộ trình khóa học </h3>
     <ul uk-accordion="multiple: true" class="tube-card p-4 divide-y space-y-3 uk-accordion">

         @foreach ($course->chapters as $key => $chapter)
             <li class="uk-open">
                 <a class="uk-accordion-title text-md mx-2 font-semibold" href="#">
                     <div class="mb-1 text-lg font-medium"> Phần {{ $key + 1 }}: {{ $chapter->title }} </div>
                 </a>
                 <div class="uk-accordion-content mt-3 text-base">

                     <ul class="course-curriculum-list mx-2">
                         @foreach ($chapter->lessons as $key2 => $lesson)
                             <li>
                                 <a href="#" class="flex justify-between">

                                     <div class="">
                                        <a href="{{route('client.lesson.show', $lesson->id)}}">
                                            <span>Bài {{ $key2 + 1 }}: {{ $lesson->title }}</span>
                                        </a>
                                         <div class="">
                                             @if ($lesson->lesson_type == 'video')
                                                 <ion-icon name="logo-youtube"></ion-icon>
                                             @else
                                                 <ion-icon name="pencil"></ion-icon>
                                             @endif
                                             <span>
                                                 4:00
                                             </span>
                                         </div>

                                     </div>

                                     <div class="">
                                         @if ($lesson->lessonVideo->is_demo == 1)
                                             <button class="button">Học thử</button>
                                         @else
                                         @endif
                                     </div>

                                 </a>
                             </li>
                         @endforeach
                     </ul>

                 </div>
             </li>
         @endforeach

     </ul>

 </div>
