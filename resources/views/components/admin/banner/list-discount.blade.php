<div class="form-group">
     <label for="">Mã giảm giá</label>
     <select name="discount_id" id="select2" class="form-control">
         <option value="">Chọn mã giảm giá</option>
         <optgroup label="">
             @foreach ($coupons as $coupon)
                 <option value="{{ $coupon->id }}">{{ $coupon->title }}</option>
             @endforeach
         </optgroup>
     </select>
</div>