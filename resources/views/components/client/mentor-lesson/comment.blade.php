@forelse  ($comments as $comment)
    <!-- Comment item START -->
    <div class="border p-2 p-sm-4 rounded-3 mb-4">
        <ul class="list-unstyled mb-0">
            <li class="comment-item">
                <div class="d-flex mb-3">
                    <!-- Avatar -->
                    <div class="avatar avatar-sm flex-shrink-0">
                        <a href="#"><img class="avatar-img rounded-circle" src="/frontend/images/avatar/05.jpg"
                                alt=""></a>
                    </div>
                    <div class="ms-2 w-100">
                        <!-- Comment by -->
                        <div class="bg-light p-3 rounded">
                            <div class="">
                                <div class="me-2">
                                    <h6 class="mb-1 lead fw-bold"> <a href="#!">
                                            {{ $comment->info->name }} ({{ $comment->role }}) </a></h6>
                                    <p class="h6 mb-0">{{ $comment->comment }}
                                    </p>
                                </div>
                                <small>5hr</small>
                            </div>
                        </div>
                        <!-- Comment react -->
                        <ul class="nav nav-divider py-2 small">
                            <li class="nav-item"> <a class="text-primary-hover" href="#">
                                    Thời gian ({{ $comment->created_at }})</a> </li>
                            <li class="nav-item"> <a class="text-primary-hover" href="#">
                                    Hồi đáp {{ $comment->replies->count() }}</a> </li>
                        </ul>
                    </div>

                </div>

                <a class="btn btn-sm btn-success mb-0" data-toggle="modal"
                    data-bs-target="#modal-example"data-bs-toggle="modal" data-bs-target="#viewReview"
                    onclick="showAjaxModal('{{ route('client.mentorLesson.commentdetails', $comment->id) }}','Bình luận {{ $comment->info->name }}')">Trả
                    lời</a>

                <!-- Comment item nested START -->
                <!-- Comment item nested END -->
            </li>
        </ul>
    </div>
    <!-- Comment item END -->

@empty
@endforelse

<!-- Modal-->
<div class="modal fade " id="modal-example" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Loading...</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold"
                    data-bs-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>