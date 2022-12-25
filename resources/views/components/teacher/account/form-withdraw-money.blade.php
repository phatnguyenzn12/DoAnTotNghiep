<form action="{{route('teacher.account.withdraw',$mentor_id)}}" class="form has-validation-ajax" method="POST">
    @csrf
    <p class="text-danger errors system"></p>
    <div class="form-group">
        <label>Số tiền rút</label>
        <input type="text" name="money" placeholder="Nhập số tiền rút" class="form-control">
        <p class="text-danger errors money"></p>
    </div>
    <button type="submit"  class="btn btn-primary font-weight-bold">Rút</button>
</form>