<div class="form-group">
     <label for="">khoá học</label>
     <select name="course_id" id="select2" class="form-control">
         <option value="">Chọn khoá học</option>
         <optgroup label="">
             @foreach ($courses as $course)
                 <option value="{{ $course->id }}">{{ $course->title }}</option>
             @endforeach
         </optgroup>
     </select>
</div>