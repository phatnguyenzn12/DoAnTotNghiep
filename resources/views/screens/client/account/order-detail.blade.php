<div>
    <table class="table">
        <thead>
                <th scope="col">Tên khóa học</th>
                <th scope="col" style="margin: auto" >Ảnh</th>
                <th scope="col">Giá tiền</th>
                <th scope="col">Phần trăm thanh toán</th>

        </thead>
            <tbody>
                <td>{{ ($orderDetail->course->title) }}</td>
                <td ><img style="width:70%" src="{{asset('app/'. $orderDetail->course->image)}}" alt=""></td>
                <td>{{ number_format($orderDetail->price) }}đ</td>
                <td>{{ ($orderDetail->percentage_pay) }}%</td>
            </tbody>
    </table>
</div>
