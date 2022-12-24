<form class="w-100 d-flex has-validation-ajax-child row" method="POST"
    action="{{ route('client.lesson.childComment', ['course_id' => $course_id, 'comment_parent' => $comment_parent->id]) }}">
    @csrf
    <div class="col-12">
        <textarea class="form-control" name="comment" id="exampleFormControlTextarea1" placeholder="Your review" rows="3"></textarea>
    </div>
    <!-- Button -->
    <div class="col-12 mt-3">
        <button type="submit" class="btn btn-primary mb-0">Đăng bình
            luận</button>
    </div>
</form>

<ul class="list-unstyled ms-4 mt-5">
    <!-- Comment item START -->
    @forelse ($comment_lesson as $comment_reply)
        <li class="comment-item mt-3">
            <div class="d-flex">
                <!-- Avatar -->
                <div class="avatar avatar-xs flex-shrink-0">
                    <a href="#"><img class="avatar-img rounded-circle"
                            src="{{ auth()->user()? asset('app/' . auth()->user()->avatar): asset('app/' .auth()->guard('mentor')->user()->avatar) }}"
                            alt=""></a>
                </div>
                <!-- Comment by -->
                <div class="ms-2 w-100">
                    <div class="bg-light p-3 rounded">
                        <div class="">
                            <div class="me-2">
                                <h6 class="mb-1 lead fw-bold"> <a href="#">{{ $comment_reply->info->name }}
                                        ({!! $comment_reply->role !!})
                                    </a> </h6>
                                <p class=" mb-0">{{ $comment_reply->comment }}
                                </p>
                            </div>
                            {{-- <small>2hr</small> --}}
                        </div>
                    </div>
                    <!-- Comment react -->
                    <ul class="nav nav-divider py-2 small">
                        <li class="nav-item"> <a class="text-primary-hover" href="#">
                                Thời gian ({{ $comment_reply->created_at }})</a> </li>
                        <li class="nav-item"> <a class="text-primary-hover" data-bs-toggle="collapse"
                                href="#collapseComment{{ $comment_reply->id }}" role="button" aria-expanded="false"
                                aria-controls="collapseComment">
                                Reply</a> </li>
                    </ul>

                    <!-- collapse textarea -->
                    <div class="collapse" id="collapseComment{{ $comment_reply->id }}">
                        <form class="w-100 d-flex has-validation-ajax-child row" method="POST"
                            action="{{ route('client.lesson.childComment', ['course_id' => $course_id, 'comment_parent' => $comment_parent->id]) }}">
                            @csrf
                            <div class="col-12">
                                <textarea class="form-control" name="comment" id="exampleFormControlTextarea1" placeholder="Your review" rows="3"></textarea>
                            </div>
                            <!-- Button -->
                            <div class="col-12 mt-3">
                                <button type="submit" class="btn btn-primary mb-0">Đăng bình
                                    luận</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </li>
    @empty
    @endforelse
    <!-- Comment item END -->
</ul>

@php
    $pagination = $comment_lesson;
@endphp
<!-- Pagination START -->
@if ($comment_lesson->count() != 0)
    <div class="col-12 row mb-2">

        <div class="col-12">
            <nav class="mt-4 d-flex justify-content-end" aria-label="navigation">
                <ul class="pagination pagination-primary-soft d-inline-block d-md-flex rounded mb-0">
                    <li class="page-item mb-0"><a class="page-link"
                            onclick="pagination_child('{{ route('client.lesson.commentdetails', $comment_parent->id) }}',1)"><i
                                class="fas fa-angle-double-left"></i></a></li>
                    @for ($i = 1; $i <= $pagination->lastPage(); $i++)
                        <li class="page-item mb-0"><a class="page-link"
                                onclick="pagination_child(
                                    '{{ route('client.lesson.commentdetails', $comment_parent->id) }}',
                                    '{{ $i }}'
                                    )">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="page-item mb-0"><a class="page-link"
                            onclick="pagination_child(
                                '{{ route('client.lesson.commentdetails', $comment_parent->id) }}',
                            '{{ $pagination->lastPage() }}'
                            )"><i
                                class="fas fa-angle-double-right"></i></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endif
