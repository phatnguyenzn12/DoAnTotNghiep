@foreach ($index as $banner)
<tr>
     <td>{{$banner->title}}</td>
     <td>{{$banner->content}}</td>
     <td><img src="{{asset('app/'.$banner->image)}}" alt=""></td>
     <td>{{$banner->type}}</td>
     <td><button></button></td>
     <td style="display: flex" ><a href="{{route('admin.banner.edit',$banner->id)}}" class="btn btn-light btn-sm">
        <i class="flaticon2-pen text-warning"></i></a>
        <form action="{{ route('admin.banner.delete', ['id' => $banner->id])}}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-light btn-sm"><i class="flaticon2-trash text-danger"></i></button>
                
          </form>
</td>
 </tr>
    
@endforeach

