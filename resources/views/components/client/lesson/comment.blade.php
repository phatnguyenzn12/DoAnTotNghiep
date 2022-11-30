<div class="tab-pane fade active show" id="course-pills-4" role="tabpanel" aria-labelledby="course-pills-tab-4">
    <!-- Review START -->
    <div class="row mb-4">
        <div class="col-12">
            <h5 class="mb-4">Bình luận về bài học</h5>

            <!-- Comment box -->
            <div class="d-flex mb-4">
                <!-- Avatar -->
                <div class="avatar avatar-sm flex-shrink-0 me-2">
                    <a href="#"> <img class="avatar-img rounded-circle" src="/frontend/images/avatar/09.jpg"
                            alt=""> </a>
                </div>

                <form class="w-100 d-flex">
                    <textarea class="one form-control pe-4 bg-light" id="autoheighttextarea" rows="1" placeholder="Add a comment..."></textarea>
                    <button class="btn btn-sm btn-primary-soft ms-2 px-4 mb-0 flex-shrink-0"><i
                            class="fas fa-paper-plane fs-5"></i></button>
                </form>
            </div>


             <!-- Comment item START -->
             <div class="border p-2 p-sm-4 rounded-3 mb-4">
                <ul class="list-unstyled mb-0">
                    @foreach ($cmt as $item)
                        @php
                            // $i++
                        @endphp
                        @if ($item->reply == null)
                            <li class="comment-item">
                                <div class="d-flex mb-3 ">
                                    <!-- Avatar -->
                                    @if (Auth::guard('web')->user())
                                        <div class="avatar avatar-sm flex-shrink-0">
                                            <a href="#"><img
                                                    class="avatar-img rounded-circle"
                                                    src="{{ Auth::user()->avatar }}"
                                                    alt=""></a>
                                        </div>
                                    @else
                                        <div class="avatar avatar-sm flex-shrink-0">
                                            <a href="#"><img
                                                    class="avatar-img rounded-circle"
                                                    src="/frontend/images/avatar/05.jpg"
                                                    alt=""></a>
                                        </div>
                                    @endif
                                    <div class="ms-2">
                                        <div class="bg-light p-3 rounded">
                                            <div class="d-flex ">
                                                <div class="me-2">
                                                    <h6 class="mb-0 lead fw-bold"> <a
                                                            href="#!">
                                                            {{ DB::table('users')->where('id', '=', $item->user_id)->first()->name }}
                                                        </a><span class="text-gray-300">(Học
                                                            sinh)</span></h6>

                                                    <img src="{{ DB::table('users')->where('id', '=', $item->user_id)->first()->avatar }}"
                                                        alt="">
                                                    <p class="h6 mb-1 text-dark">
                                                        {{ $item->comment }}

                                                        <img src="{{ asset('app/' . $item->image) }}"
                                                            alt="image" class="img-fluid">
                                                </div>
                                                <small>2hr</small>
                                            </div>
                                        </div>
                                        <!-- Comment react -->
                                        <ul class="nav nav-divider py-2 small">
                                            <li class="nav-item"> <a class="text-primary-hover"
                                                    href="#">
                                                    Like (3)</a> </li>
                                            <li class="nav-item"> <a class="text-primary-hover"
                                                    data-bs-toggle="collapse" href=""
                                                    onclick="showform()" role="button"
                                                    aria-expanded="false"
                                                    aria-controls="collapseComment">
                                                    Reply</a> </li>
                                            <li class="nav-item"> <a class="text-primary-hover"
                                                    href="#">
                                                    View 5 replies</a> </li>
                                        </ul>
                                        {{-- end lisst cooment  --}}
                                        @foreach ($cmt as $i)
                                            @if ($i->reply == $item->id)
                                                <div class="bg-light p-3 rounded"
                                                    style="margin-left: 80px">
                                                    <div class="d-flex ">
                                                        @if (isset($i->mentor_id))
                                                            <div
                                                                class="avatar avatar-sm flex-shrink-0">
                                                                <a href="#"><img
                                                                        class="avatar-img rounded-circle"
                                                                        src="{{ DB::table('mentors')->where('id', '=', $i->mentor_id)->first()->avatar }}"
                                                                        alt=""></a>
                                                            </div>
                                                        @else
                                                            <div
                                                                class="avatar avatar-sm flex-shrink-0">
                                                                <a href="#"><img
                                                                        class="avatar-img rounded-circle"
                                                                        src="/frontend/images/avatar/02.jpg"
                                                                        alt=""></a>
                                                            </div>
                                                        @endif
                                                        <div class="me-2">
                                                            @if (isset($i->mentor_id))
                                                                <h6 class="mb-1 lead fw-bold"> <a
                                                                        href="#!">
                                                                        {{ DB::table('mentors')->where('id', '=', $i->mentor_id)->first()->name }}
                                                                    </a><span
                                                                        class="text-gray-300">(Giảng
                                                                        viên)</span></h6>
                                                            @else
                                                                <h6 class="mb-1 lead fw-bold"> <a
                                                                        href="#!">
                                                                        {{ DB::table('users')->where('id', '=', $item->user_id)->first()->name }}
                                                                    </a><span
                                                                        class="text-gray-300">(Học
                                                                        sinh)</span></h6>
                                                            @endif
                                                            <p class="h6 mb-2">{{ $i->comment }}
                                                            </p>
                                                            <img src="{{ asset('app/' . $i->image) }}"
                                                                alt="image" class="img-fluid">
                                                        </div>
                                                        <small>{{ date('d/m/Y', strtotime($i->created_at)) }}</small>
                                                    </div>
                                                    <ul class="nav nav-divider py-2 small">
                                                        <li class="nav-item"> <a
                                                                class="text-primary-hover"
                                                                href="#">
                                                                Like (3)</a> </li>
                                                        <li class="nav-item"> <a
                                                                class="text-primary-hover"
                                                                data-bs-toggle="collapse"
                                                                onclick="showform({{ $loop->iteration }})"
                                                                href="#collapseComment1{{ $item->id }}"
                                                                role="button"
                                                                aria-expanded="false"
                                                                aria-controls="collapseComment">
                                                                Reply</a> </li>
                                                        <li class="nav-item"> <a
                                                                class="text-primary-hover"
                                                                href="#">
                                                                View 5 replies</a> </li>
                                                    </ul>
                                                </div>
                                            @endif
                                        @endforeach
                                        <!-- Comment react -->

                                        <form class="reply"
                                            action="{{ route('client.lesson.reply', $item->id) }}"
                                            method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="collapse show"
                                                id="collapseComment1{{ $item->id }}">
                                                <div class="d-flex mt-3">
                                                    <input type="hidden" name="course_id"
                                                        value="{{ $course->id }}">

                                                    @if (Auth::guard('web')->user())
                                                        <input type="hidden" name="user_id"
                                                            value="{{ Auth::user()->id }}">
                                                    @else
                                                        <input type="hidden" name="mentor_id"
                                                            value="{{ $course->mentor_id }}">
                                                    @endif
                                                    <input type="hidden" name="lesson_id"
                                                        value="{{ $lesson->id }}">
                                                    <input type="file" name="image">
                                                    <textarea class="form-control mb-0" name="replycmt" placeholder="Add a comment..." rows="2"
                                                        spellcheck="false"></textarea>
                                                    <button
                                                        class="btn btn-sm btn-primary-soft ms-2 px-4 mb-0 flex-shrink-0"><i
                                                            class="fas fa-paper-plane fs-5"></i></button>
                                                </div>
                                            </div>
                                        </form>
                        @endif
                    @endforeach

            </div>
            <!-- Comment item END -->


            <!-- Comment item START -->
            <div class="border p-2 p-sm-4 rounded-3 mb-4">
                <ul class="list-unstyled mb-0">
                    <li class="comment-item">
                        <div class="d-flex mb-3">
                            <!-- Avatar -->
                            <div class="avatar avatar-sm flex-shrink-0">
                                <a href="#"><img class="avatar-img rounded-circle"
                                        src="/frontend/images/avatar/05.jpg" alt=""></a>
                            </div>
                            <div class="ms-2">
                                <!-- Comment by -->
                                <div class="bg-light p-3 rounded">
                                    <div class="d-flex justify-content-center">
                                        <div class="me-2">
                                            <h6 class="mb-1 lead fw-bold"> <a href="#!"> Frances
                                                    Guerrero (Giảng viên) </a></h6>
                                            <p class="h6 mb-0">Removed demands expense account in
                                                outward
                                                tedious do. Particular way thoroughly unaffected
                                                projection?
                                            </p>
                                        </div>
                                        <small>5hr</small>
                                    </div>
                                </div>
                                <!-- Comment react -->
                                <ul class="nav nav-divider py-2 small">
                                    <li class="nav-item"> <a class="text-primary-hover" href="#">
                                            Like (3)</a> </li>
                                    <li class="nav-item"> <a class="text-primary-hover" data-bs-toggle="collapse"
                                            href="#collapseComment1" role="button" aria-expanded="false"
                                            aria-controls="collapseComment">
                                            Reply</a> </li>
                                    <li class="nav-item"> <a class="text-primary-hover" href="#">
                                            View 5 replies</a> </li>
                                </ul>

                                <!-- collapse textarea -->
                                <div class="collapse show" id="collapseComment1">
                                    <div class="d-flex mt-3">
                                        <textarea class="form-control mb-0" placeholder="Add a comment..." rows="2" spellcheck="false"></textarea>
                                        <button class="btn btn-sm btn-primary-soft ms-2 px-4 mb-0 flex-shrink-0"><i
                                                class="fas fa-paper-plane fs-5"></i></button>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <!-- Comment item nested START -->
                        <ul class="list-unstyled ms-4">
                            <!-- Comment item START -->
                            <li class="comment-item">
                                <div class="d-flex">
                                    <!-- Avatar -->
                                    <div class="avatar avatar-xs flex-shrink-0">
                                        <a href="#"><img class="avatar-img rounded-circle"
                                                src="/frontend/images/avatar/06.jpg" alt=""></a>
                                    </div>
                                    <!-- Comment by -->
                                    <div class="ms-2">
                                        <div class="bg-light p-3 rounded">
                                            <div class="d-flex justify-content-center">
                                                <div class="me-2">
                                                    <h6 class="mb-1  lead fw-bold"> <a href="#">
                                                            Lori Stevens </a> </h6>
                                                    <p class=" mb-0">See resolved goodness felicity
                                                        shy
                                                        civility domestic had but Drawings offended yet
                                                        answered Jennings perceive. Domestic had but
                                                        Drawings offended yet answered Jennings
                                                        perceive.
                                                    </p>
                                                </div>
                                                <small>2hr</small>
                                            </div>
                                        </div>
                                        <!-- Comment react -->
                                        <ul class="nav nav-divider py-2 small">
                                            <li class="nav-item"><a class="text-primary-hover" href="#!"> Like
                                                    (5)</a></li>
                                            <li class="nav-item"><a class="text-primary-hover" href="#!"> Reply</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <!-- Comment item END -->
                        </ul>
                        <!-- Comment item nested END -->
                    </li>
                </ul>
            </div>
            <!-- Comment item END -->

            <!-- Comment item START -->
            <div class="border p-2 p-sm-4 rounded-3">
                <ul class="list-unstyled mb-0">
                    <li class="comment-item">
                        <div class="d-flex">
                            <!-- Avatar -->
                            <div class="avatar avatar-sm flex-shrink-0">
                                <a href="#"><img class="avatar-img rounded-circle"
                                        src="/frontend/images/avatar/02.jpg" alt=""></a>
                            </div>
                            <div class="ms-2">
                                <!-- Comment by -->
                                <div class="bg-light p-3 rounded">
                                    <div class="d-flex justify-content-center">
                                        <div class="me-2">
                                            <h6 class="mb-1 lead fw-bold"> <a href="#!"> Louis
                                                    Ferguson </a></h6>
                                            <p class="h6 mb-0">Removed demands expense account in
                                                outward
                                                tedious do. Particular way thoroughly unaffected
                                                projection?
                                            </p>
                                        </div>
                                        <small>5hr</small>
                                    </div>
                                </div>
                                <!-- Comment react -->
                                <ul class="nav nav-divider py-2 small">
                                    <li class="nav-item"> <a class="text-primary-hover" href="#">
                                            Like</a> </li>
                                    <li class="nav-item"> <a class="text-primary-hover" href="#">
                                            Reply</a> </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- Comment item END -->

        </div>

    </div>
</div>
