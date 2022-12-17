<form action="#" class="has-validation-ajax" method="POST"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <p class="text-danger errors system"></p>
    <div class="form-group">
        <label>Sửa bài học</label>
        @foreach($lesson as $lesson)
          @if($lesson->is_demo == 0){
               
               <button>video demo</button>
          }
        
        @endforeach
    </div>
    <div class="form-group">
        <label >Nội dung</label>
        <button>Không là video demo</button>
    </div>

</form>
