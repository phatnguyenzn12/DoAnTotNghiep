@foreach ($index as $banner)
<tr>
     <th>{{$banner->title}}</th>
     <th>{{$banner->content}}</th>
     <th>{{$banner->image}}</th>
     <th>{{$banner->type}}</th>
     <th>Ẩn</th>
 </tr>
    
@endforeach

