  <!-- Comment box -->
  <div class="d-flex mb-4">
      <!-- Avatar -->
      <div class="avatar avatar-sm flex-shrink-0 me-2">
          <a href="#"> <img class="avatar-img rounded-circle" src="/frontend/images/avatar/09.jpg" alt="">
          </a>
      </div>

      <form class="w-100 d-flex has-validation-ajax" method="POST"
          action="{{ route('client.lesson.parentComment', ['lesson' => $lesson->id, 'course' => $course->id]) }}">
          @csrf
          <textarea class="one form-control pe-4 bg-light" name="comment" id="autoheighttextarea" rows="1"
              placeholder="Thêm bình luận..." class="clear-input"></textarea>
          <button class="btn btn-sm btn-primary-soft ms-2 px-4 mb-0 flex-shrink-0"><i
                  class="fas fa-paper-plane fs-5"></i></button>
      </form>
  </div>
  <div id="table-innerHtml">

  </div>
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