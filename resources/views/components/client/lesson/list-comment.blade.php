@php
    $pagination = $comments;
@endphp
<!-- Pagination START -->
@if ($comments->count() != 0)
    <div class="col-12 row mb-2">
        <div class="col-8 mt-4 row">
            <div class="row align-items-center">
                <div class="col-lg-9 col-xl-8">
                    <div class="row align-items-center">
                        <div class="col-md-4 my-2 my-md-0">
                            <div class="d-flex align-items-center">
                                <select class="form-control" id="kt_datatable_search_status" onchange="fiterSort(this)">
                                    <option value="id_desc">ID</option>
                                    <option value="id_desc">Mới đến cũ</option>
                                    <option value="id_asc">Cũ đến mới</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 my-2 my-md-0">
                            <div class="d-flex align-items-center">
                                <select class="form-control" id="kt_datatable_search_status"
                                    onchange="fiterSortReply(this)">
                                    <option value="0">Reply</option>
                                    <option value="reply_desc">Reply nhiều nhất</option>
                                    <option value="reply_asc">Reply ít nhất</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <nav class="mt-4 d-flex justify-content-end" aria-label="navigation">
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
    </div>
@endif
<!-- Pagination END -->
<div class="comment-show-list">
    @forelse  ($comments as $comment)
        <!-- Comment item START -->
        <div class="border p-2 p-sm-4 rounded-3 mb-4">
            <ul class="list-unstyled mb-0">
                <li class="comment-item">
                    <div class="d-flex mb-3">
                        <!-- Avatar -->
                        <div class="avatar avatar-sm flex-shrink-0">
                            <a href="#"><img class="avatar-img rounded-circle"
                                    src="{{ asset('app/' . $comment->info->avatar) }}" alt=""></a>
                        </div>
                        <div class="ms-2 w-100">
                            <!-- Comment by -->
                            <div class="bg-light p-3 rounded">
                                <div class="">
                                    <div class="me-2">
                                        <h6 class="mb-1 lead fw-bold"> <a href="#!">
                                                {{ $comment->info->name }} ({!! $comment->role !!})
                                                {{ $comment->mentor ? $comment->mentor->cate_course->name : '' }}
                                            </a></h6>
                                        <p class="mb-0 mt-3">Bình luận: {{ $comment->comment }}
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
                        onclick="showAjaxModal('{{ route('client.lesson.commentdetails', $comment->id) }}','Bình luận {{ $comment->info->name }}')">Trả
                        lời</a>

                    <!-- Comment item nested START -->
                    <!-- Comment item nested END -->
                </li>
            </ul>
        </div>
        <!-- Comment item END -->
    @empty
    @endforelse
</div>