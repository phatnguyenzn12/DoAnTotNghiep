<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    * {
        margin: 0;
        padding: 0;
    }

    .rate {
        float: left;
        height: 46px;
        padding: 0 10px;
    }

    .rate:not(:checked)>input {
        position: absolute;
        top: -9999px;
    }

    .rate:not(:checked)>label {
        float: right;
        width: 1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 30px;
        color: #ccc;

    }

    .rate:not(:checked)>label:before {
        content: '★ ';
    }

    .rate>input:checked~label {
        color: #ffc700;
    }

    .rate:not(:checked)>label:hover,
    .rate:not(:checked)>label:hover~label {
        color: #deb217;
    }

    .rate>input:checked+label:hover,
    .rate>input:checked+label:hover~label,
    .rate>input:checked~label:hover,
    .rate>input:checked~label:hover~label,
    .rate>label:hover~input:checked~label {
        color: #c59b08;
    }
</style>
<div id="reviews" class="tube-card p-5">
    <h3 class="text-lg font-semibold mb-3"> Tất cả đánh giá ({{ count($course->commentCourses) }}) </h3>

    <div class="flex space-x-5 mb-8">
        <div class="lg:w-1/4 w-full">
            <div class="bg-blue-100 space-y-1 py-5 rounded-md border border-blue-200 text-center shadow-xs">
                @if (count($result_vote) == 0)
                    <h1 class="text-5xl font-semibold">0</h1>
                @else
                    <div hidden>
                        {{ $resultvote = 0 }}
                        @foreach ($result_vote as $vote)
                            {{ $resultvote += $vote->vote }}
                        @endforeach
                    </div>
                    <h1 class="text-5xl font-semibold"> {{ round($resultvote / count($result_vote), 0) }}</h1>
                    @for ($j = 0; $j < 5; $j++)
                        @if ($j < round($resultvote / count($result_vote), 1))
                            <ion-icon style="font-size: 18px" name="star" class="text-yellow-300"></ion-icon>
                        @else
                            <ion-icon style="font-size: 18px" name="star" class="text-gray-300"></ion-icon>
                        @endif
                    @endfor
                @endif
                <h5 class="mb-0 mt-1 text-sm"> Course Rating</h5>
            </div>
        </div>
        <!-- progress -->
        <div class="w-2/4 hidden lg:flex flex-col justify-center space-y-5">
            @if ((count($result_vote) == 0))

            @else
            <?php $s = count($result_vote);
            count( $start5);
            $a= round((count($start5)/$s), 1)*100;

            count( $start4);
            $b= round((count($start4)/$s), 1)*100;

            count( $start3);
            $c= round((count($start3)/$s), 1)*100;

            count( $start2);
            $d= round((count($start2)/$s), 1)*100;

            count( $start1);
            $e= round((count($start1)/$s), 1)*100;
            ?>

            <div class="w-full h-2.5 rounded-lg bg-gray-300 shadow-xs relative">
                <div style="width:{{$a}}%" class=" h-full rounded-lg bg-gray-800"> </div>
            </div>
            <div class="w-full h-2.5 rounded-lg bg-gray-300 shadow-xs relative">
                <div style="width:{{$b}}%" class=" h-full rounded-lg bg-gray-800"> </div>
            </div>
            <div class="w-full h-2.5 rounded-lg bg-gray-300 shadow-xs relative">
                <div style="width:{{$c}}%" class=" h-full rounded-lg bg-gray-800"> </div>
            </div>
            <div class="w-full h-2.5 rounded-lg bg-gray-300 shadow-xs relative">
                <div style="width:{{$d}}%" class=" h-full rounded-lg bg-gray-800"> </div>
            </div>
            <div class="w-full h-2.5 rounded-lg bg-gray-300 shadow-xs relative">
                <div style="width:{{$e}}%" class=" h-full rounded-lg bg-gray-800"> </div>
            </div>
        </div>
        <!-- stars -->
        <div class="w-1/4 hidden lg:flex flex-col justify-center space-y-2">

            <div class="flex justify-center items-center">
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <span class="ml-2"> {{$a}} %</span>
            </div>
            <div class="flex justify-center items-center">
                <ion-icon name="star" class="text-gray-300"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <span class="ml-2"> {{$b}} %</span>
            </div>
            <div class="flex justify-center items-center">
                <ion-icon name="star" class="text-gray-300"></ion-icon>
                <ion-icon name="star" class="text-gray-300"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <span class="ml-2"> {{$c}} %</span>
            </div>
            <div class="flex justify-center items-center">
                <ion-icon name="star" class="text-gray-300"></ion-icon>
                <ion-icon name="star" class="text-gray-300"></ion-icon>
                <ion-icon name="star" class="text-gray-300"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <span class="ml-2"> {{$d}} %</span>
            </div>
            <div class="flex justify-center items-center">
                <ion-icon name="star" class="text-gray-300"></ion-icon>
                <ion-icon name="star" class="text-gray-300"></ion-icon>
                <ion-icon name="star" class="text-gray-300"></ion-icon>
                <ion-icon name="star" class="text-gray-300"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <span class="ml-2"> {{$e}} %</span>
            </div>

        </div>
        @endif
    </div>
    {{-- {{dd($course->commentCourses())}} --}}

    @foreach ($course->commentCourses as $i)
        <div class="space-y-4 my-5">

            <div style="display: inline-block">
                <div class="drop_content">
                    <div style="display:inline-flex">
                        <div>
                            <img src="/frontend/assets/images/avatars/avatar-1.jpg" alt=""
                                class="rounded-full shadow w-20 h-20">
                        </div>
                        <div style="margin-left: 20px">
                            <strong>{{ DB::table('users')->where('id', '=', $i->user_id)->first()->name }}</strong> <br>
                            <span class="time-ago text-gray-300">Nhận xét
                                vào:{{ date('d/m/Y', strtotime($i->created_at)) }}</span>

                        </div>
                    </div>
                    <div>
                        @for ($j = 0; $j < 5; $j++)
                            @if ($j < $i->vote)
                                <ion-icon style="font-size: 18px" name="star" class="text-yellow-300"></ion-icon>
                            @else
                                <ion-icon style="font-size: 18px" name="star" class="text-gray-300"></ion-icon>
                            @endif
                        @endfor

                        {{-- số lượt vote {{($i->vote)}} --}}
                    </div>
                    <br><i class="fa-solid fa-bullhorn"></i>
                    <span style="font-size: 15px" class="text-gray-500">{{ $i->comment }} </span>

                </div>

            </div>
        </div>
    @endforeach
    <div>
        <div class="flex justify-center mt-9">
            <button type="submit" class="bg-gray-50 border hover:bg-gray-300 px-4 py-1.5 rounded-full text-sm">Xem
                thêm
                đánh giá</button>

        </div>
        @if (auth()->user())
            @if ($course->users()->get()->contains(auth()->user()->id))
                <form action="{{ route('commentcourse.store') }}" method="post">
                    @csrf
                    <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                        <div class="d-flex flex-start w-100">
                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                            <textarea style="border: 1px solid rgba(92, 88, 88, 0.562)" name="comment" id="textAreaExample"
                                placeholder="Đánh giá khóa học..."></textarea>
                        </div>
                        <div class="rate" name="" style="margin-left: 380px">
                            <input type="radio" id="star5" name="vote" value="5" />
                            <label for="star5" title="text">5 stars</label>
                            <input type="radio" id="star4" name="vote" value="4" />
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" id="star3" name="vote" value="3" />
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" name="vote" value="2" />
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" name="vote" value="1" />
                            <label for="star1" title="text">1 star</label>
                        </div><br>
                        <div class="float-end mt-2 pt-1">
                            <input class="btn btn-primary" type="submit" value="Gửi">
                        </div>
                    </div>
                </form>
            @endif
        @endif
    </div>



</div>
