
<!-- Pagination END -->
<div class="comment-show-list mt-3">
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
                                    {{-- <small>5hr</small> --}}
                                </div>
                            </div>
                            <!-- Comment react -->
                            <ul class="nav nav-divider py-2 small">
                                <li class="nav-item"> <a class="text-primary-hover" href="#">
                                        Thời gian ({{ date('d-m-Y', strtotime($comment->created_at)) }})</a> </li>
                                <li class="nav-item"> <a class="text-primary-hover" href="#">
                                        Hồi đáp {{ $comment->replies->count() }}</a> </li>
                                @if (auth()->user() && auth()->user()->id == $comment->user_id  )
                                    <li class="nav-item"> <a onclick="return confirm('Bạn chắc chắn muốn xóa?')"
                                            href="{{ route('client.lesson.removeComment', ['commentLesson' => $comment->id]) }}"
                                            class="text-primary-hover">
                                            Xóa</a> </li>
                                @endif
                            </ul>
                        </div>

                    </div>

                    <a class="btn btn-sm btn-success mb-0" data-toggle="modal"
                        data-bs-target="#modal-example"data-bs-toggle="modal" data-bs-target="#viewReview"
                        onclick="showAjaxModal('{{ route('client.lesson.commentdetails', $comment->id) }}','Bình luận nằm trong: {{ $comment->info->name }}')">Trả
                        lời & chi tiết</a>

                    <!-- Comment item nested START -->
                    <!-- Comment item nested END -->
                </li>
            </ul>
        </div>
        <!-- Comment item END -->
    @empty
    @endforelse
</div>
@php
    $pagination = $comments;
@endphp
<!-- Pagination START -->
@if ($comments->count() != 0)
    <div class="col-12 row mb-2">

        <div class="col-12">
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
  <!-- Modal-->
  <div class="modal fade " id="modal-example" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop"
      aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Loading...</h5>
                  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
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
