 <!-- Content START -->
 @if ($result_vote->count() > 0)
     <div class='col-12'>
         <!-- Review START -->
         <div class="row mb-4">
             <h5 class="mb-4">Các đánh giá của sinh viên đã mua khóa học</h5>
             <!-- Rating info -->
             <div class="col-md-4 mb-3 mb-md-0">
                 <div class="text-center">
                     <!-- Info -->
                     @if (count($result_vote) == 0)
                         <h1 class="text-5xl font-semibold">0</h1>
                     @else
                         <div hidden>
                             {{ $resultvote = 0 }}
                             @foreach ($result_vote as $vote)
                                 {{ $resultvote += $vote->vote }}
                             @endforeach
                         </div>
                         <h1 class="text-5xl font-semibold">
                             {{ round($resultvote / count($result_vote), 0) }}</h1>
                         @for ($j = 0; $j < 5; $j++)
                             @if ($j < round($resultvote / count($result_vote), 0))
                                 <span style="font-size: 18px; color: rgb(255, 255, 0)" class="fa fa-star"></span>
                             @else
                                 <span style="font-size: 18px" class="fa fa-star"></span>
                             @endif
                         @endfor
                     @endif
                     {{-- <p class="mb-0">(Based on todays review)</p> --}}
                 </div>
             </div>

             <!-- Progress-bar and star -->
             <div class="col-md-8">
                 <div class="row align-items-center text-center">
                     @if (count($result_vote) == 0)
                     @else
                         <?php $s = count($result_vote);
                         count($start5);
                         $a = round(count($start5) / $s, 1) * 100;

                         count($start4);
                         $b = round(count($start4) / $s, 1) * 100;

                         count($start3);
                         $c = round(count($start3) / $s, 1) * 100;

                         count($start2);
                         $d = round(count($start2) / $s, 1) * 100;

                         count($start1);
                         $e = round(count($start1) / $s, 1) * 100;
                         ?>
                         <!-- Progress bar and Rating -->
                         <div class="col-6 col-sm-8">
                             <!-- Progress item -->
                             <div class="progress progress-sm bg-warning bg-opacity-15">
                                 <div class="progress-bar bg-warning" role="progressbar"
                                     style="width: {{ $a }}%" aria-valuenow="{{ $a }}"
                                     aria-valuemin="0" aria-valuemax="100">
                                 </div>
                             </div>
                         </div>

                         <div class="col-6 col-sm-4">
                             <!-- Star item -->

                             <ul class="list-inline mb-0">
                                 <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                 <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                 <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                 <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                 <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                             </ul>
                         </div>

                         <!-- Progress bar and Rating -->
                         <div class="col-6 col-sm-8">
                             <!-- Progress item -->
                             <div class="progress progress-sm bg-warning bg-opacity-15">
                                 <div class="progress-bar bg-warning" role="progressbar"
                                     style="width: {{ $b }}%" aria-valuenow="{{ $b }}"
                                     aria-valuemin="0" aria-valuemax="100">
                                 </div>
                             </div>
                         </div>

                         <div class="col-6 col-sm-4">
                             <!-- Star item -->
                             <ul class="list-inline mb-0">
                                 <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                 <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                 <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                 <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                 <li class="list-inline-item me-0 small"><i class="far fa-star text-warning"></i></li>
                             </ul>
                         </div>

                         <!-- Progress bar and Rating -->
                         <div class="col-6 col-sm-8">
                             <!-- Progress item -->
                             <div class="progress progress-sm bg-warning bg-opacity-15">
                                 <div class="progress-bar bg-warning" role="progressbar"
                                     style="width: {{ $c }}%" aria-valuenow="{{ $c }}"
                                     aria-valuemin="0" aria-valuemax="100">
                                 </div>
                             </div>
                         </div>

                         <div class="col-6 col-sm-4">
                             <!-- Star item -->
                             <ul class="list-inline mb-0">
                                 <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                 <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                 <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                 <li class="list-inline-item me-0 small"><i class="far fa-star text-warning"></i></li>
                                 <li class="list-inline-item me-0 small"><i class="far fa-star text-warning"></i></li>
                             </ul>
                         </div>

                         <!-- Progress bar and Rating -->
                         <div class="col-6 col-sm-8">
                             <!-- Progress item -->
                             <div class="progress progress-sm bg-warning bg-opacity-15">
                                 <div class="progress-bar bg-warning" role="progressbar"
                                     style="width: {{ $d }}%" aria-valuenow="{{ $d }}"
                                     aria-valuemin="0" aria-valuemax="100">
                                 </div>
                             </div>
                         </div>

                         <div class="col-6 col-sm-4">
                             <!-- Star item -->
                             <ul class="list-inline mb-0">
                                 <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                 <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                 <li class="list-inline-item me-0 small"><i class="far fa-star text-warning"></i></li>
                                 <li class="list-inline-item me-0 small"><i class="far fa-star text-warning"></i></li>
                                 <li class="list-inline-item me-0 small"><i class="far fa-star text-warning"></i></li>
                             </ul>
                         </div>

                         <!-- Progress bar and Rating -->
                         <div class="col-6 col-sm-8">
                             <!-- Progress item -->
                             <div class="progress progress-sm bg-warning bg-opacity-15">
                                 <div class="progress-bar bg-warning" role="progressbar"
                                     style="width: {{ $e }}%" aria-valuenow="{{ $e }}"
                                     aria-valuemin="0" aria-valuemax="100">
                                 </div>
                             </div>
                         </div>

                         <div class="col-6 col-sm-4">
                             <!-- Star item -->
                             <ul class="list-inline mb-0">
                                 <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                 <li class="list-inline-item me-0 small"><i class="far fa-star text-warning"></i></li>
                                 <li class="list-inline-item me-0 small"><i class="far fa-star text-warning"></i></li>
                                 <li class="list-inline-item me-0 small"><i class="far fa-star text-warning"></i></li>
                                 <li class="list-inline-item me-0 small"><i class="far fa-star text-warning"></i></li>
                             </ul>
                         </div>
                     @endif
                 </div>
             </div>
         </div>
         <!-- Review END -->

         <!-- Student review START -->
         <div class="row">
             <!-- Review item START -->
             @foreach ($comments as $i)
                 <hr>
                 @if ($i->status == 1)
                     <div class="d-md-flex my-4">
                         <!-- Avatar -->
                         <div class="avatar avatar-xl me-4 flex-shrink-0">
                             <img class="avatar-img rounded-circle" src="{{ asset('app/' . $i->user->avatar) }}"
                                 alt="avatar">
                         </div>
                         <!-- Text -->
                         <div>
                             <div class="d-sm-flex mt-1 mt-md-0 align-items-center">
                                 <h5 class="me-3 mb-0">
                                     {{ DB::table('users')->where('id', '=', $i->user_id)->first()->name }}
                                 </h5>
                                 <!-- Review star -->
                                 @for ($j = 0; $j < 5; $j++)
                                     <ul class="list-inline mb-0">
                                         @if ($j < $i->vote)
                                             <li class="list-inline-item me-0"><i
                                                     class="fas fa-star text-warning"></i>
                                             </li>
                                         @else
                                             <li class="list-inline-item me-0"><i
                                                     class="far fa-star text-warning"></i>
                                             </li>
                                         @endif
                                     </ul>
                                 @endfor
                             </div>
                             <!-- Info -->
                             <p class="small mb-2">{{ date('d/m/Y', strtotime($i->created_at)) }}</p>
                             <p class="mb-2">{{ $i->comment }} </p>
                         </div>
                 @endif
         </div>
 @endforeach
 <hr>
 <!-- Divider -->

 <!-- Review item END -->

 <!-- Review item START -->

 <!-- Review item END -->
 <!-- Divider -->

 </div>
 @endif

 <!-- Student review END -->
 <!-- Leave Review START -->
 <div class="mt-2">
     @if (auth()->user())
         @if ($course->users()->get()->contains(auth()->user()->id))
             @if (auth()->user()->comment_course->count() == 0)
                 <h5 class="mb-4">Đánh giá khoá học</h5>
                 <form class="row g-3" action="{{ route('commentcourse.store') }}" method="post">
                     @csrf
                     <!-- Rating -->
                     <div class="col-12">
                         <select id="inputState2" name="vote" class="form-select  js-choice">
                             <option selected="" value="5">★★★★★ (5/5)</option>
                             <option value="4">★★★★☆ (4/5)</option>
                             <option value="3">★★★☆☆ (3/5)</option>
                             <option value="2">★★☆☆☆ (2/5)</option>
                             <option value="1">★☆☆☆☆ (1/5)</option>
                         </select>
                     </div>
                     <!-- Message -->
                     <div class="col-12">
                         <input type="hidden" name="course_id" value="{{ $course->id }}">
                         <input type="hidden" name="mentor_id" value="{{ $course->mentor->id }}">
                         <textarea class="form-control" name="comment" id="exampleFormControlTextarea1" placeholder="Your review"
                             rows="3"></textarea>
                     </div>
                     <!-- Button -->
                     <div class="col-12">
                         <button type="submit" class="btn btn-primary mb-0">Đăng bình
                             luận</button>
                     </div>
                 </form>
             @endif
         @endif
     @endif
 </div>
 <!-- Leave Review END -->
 {{-- {{dd($course->commentCourses()->get())}} --}}
 @php
     $pagination = $comments;
 @endphp
 </div>
 <!-- Content END -->

 <!-- Pagination START -->
 <div class="col-12">
     <nav class="mt-4 d-flex justify-content-center" aria-label="navigation">
         <ul class="pagination pagination-primary-soft d-inline-block d-md-flex rounded mb-0">
             <li class="page-item mb-0"><a class="page-link" onclick="pagination(1)"><i
                         class="fas fa-angle-double-left"></i></a></li>
             @for ($i = 1; $i <= $pagination->lastPage(); $i++)
                 <li class="page-item mb-0"><a class="page-link"
                         onclick="pagination('{{ $i }}')">{{ $i }}</a></li>
             @endfor
             <li class="page-item mb-0"><a class="page-link"
                     onclick="pagination('{{ $pagination->lastPage() }}')"><i
                         class="fas fa-angle-double-right"></i></a>
             </li>
         </ul>
     </nav>
 </div>
 <!-- Pagination END -->
