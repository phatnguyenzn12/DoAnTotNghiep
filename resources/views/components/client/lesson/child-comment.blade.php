<form class="w-100 d-flex has-validation-ajax-child" method="POST"
    action="{{ route('client.lesson.childComment', ['course_id' => $course_id,'comment_parent' => $comment_parent->id]) }}">
    @csrf
    <textarea class="one form-control pe-4 bg-light" name="comment" id="autoheighttextarea" rows="1"
        placeholder="Thêm bình luận..."></textarea>
    <button class="btn btn-sm btn-primary-soft ms-2 px-4 mb-0 flex-shrink-0"><i
            class="fas fa-paper-plane fs-5"></i></button>
</form>

<ul class="list-unstyled ms-4 mt-5">
    <!-- Comment item START -->
    @forelse ($comment_lesson as $comment_reply)
        <li class="comment-item mt-3">
            <div class="d-flex">
                <!-- Avatar -->
                <div class="avatar avatar-xs flex-shrink-0">
                    <a href="#"><img class="avatar-img rounded-circle" src="/frontend/images/avatar/06.jpg"
                            alt=""></a>
                </div>
                <!-- Comment by -->
                <div class="ms-2 w-100">
                    <div class="bg-light p-3 rounded">
                        <div class="">
                            <div class="me-2">
                                <h6 class="mb-1 lead fw-bold"> <a href="#">{{ $comment_reply->info->name }}
                                        ({{ $comment_reply->role }})
                                    </a> </h6>
                                <p class=" mb-0">{{ $comment_reply->comment }}
                                </p>
                            </div>
                            <small>2hr</small>
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
                        <form class="w-100 d-flex has-validation-ajax-child" method="POST"
                            action="{{ route('client.lesson.childComment', ['course_id' => $course_id,'comment_parent' => $comment_parent->id]) }}">
                            @csrf
                            <textarea class="one form-control pe-4 bg-light" name="comment" id="autoheighttextarea" rows="1"
                                placeholder="Thêm bình luận..."></textarea>
                            <button class="btn btn-sm btn-primary-soft ms-2 px-4 mb-0 flex-shrink-0"><i
                                    class="fas fa-paper-plane fs-5"></i></button>
                        </form>
                    </div>

                </div>
            </div>
        </li>
    @empty
    @endforelse
    <!-- Comment item END -->

</ul>
