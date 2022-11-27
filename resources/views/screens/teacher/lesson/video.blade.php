<div class="form-group" video>
    <label>Đường dẫn video</label>
    <div class="custom-file">
        <input type="file" name="video_path" class="custom-file-input" id="customFile">
        <label class="custom-file-label" for="customFile">Choose file</label>
    </div>
    <p class="text-danger errors video_url"></p>
</div>

<div class="form-group">
    <label>Cho học thử</label>
    <select class="custom-select form-control" name="is_demo">
        <option @selected(true) value="0">Không học thử</option>
        <option value="1">Học thử</option>
    </select>
    <p class="text-danger errors"></p>
</div>
