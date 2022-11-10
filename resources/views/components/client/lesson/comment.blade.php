{{-- <div class="tube-card p-6">

    <h1 class="block text-xl font-semibold mb-6"> Bình luận (12) </h1>

    <div class="space-y-5">

        <div class="flex gap-x-4 relative rounded-md">
            <a href="#"
                class="bg-gray-100 py-1.5 px-4 rounded-full absolute right-5 top-0">Replay</a>
            <img src="/frontend/assets/images/avatars/avatar-3.jpg" alt=""
                class="rounded-full shadow w-12 h-12">
            <div>
                <h4 class="text-base m-0 font-semibold"> Alex Dolgove</h4>
                <span class="text-gray-700 text-sm"> 14th, April 2021 </span>
                <p class="mt-3 md:ml-0 -ml-16">
                    elit, sed diam ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim
                    ipsum dolor sit
                    amet, consectetuer adipiscing elit, sed diam ut laoreet dolore
                </p>
            </div>
        </div>

        <div class="flex gap-x-4 relative rounded-md lg:ml-16">
            <a href="#"
                class="bg-gray-100 py-1.5 px-4 rounded-full absolute right-5 top-0">Replay</a>
            <img src="/frontend/assets/images/avatars/avatar-1.jpg" alt=""
                class="rounded-full shadow w-12 h-12">
            <div>
                <h4 class="text-base m-0 font-semibold"> Stella Johnson</h4>
                <span class="text-gray-700 text-sm"> 13th, May 2021 </span>
                <p class="mt-3 md:ml-0 -ml-16">
                    elit, sed diam ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim
                    ipsum dolor sit
                    amet, consectetuer adipiscing elit, sed diam ut laoreet dolore
                </p>
            </div>
        </div>

    </div>

    <div class="flex justify-center mt-9">
        <a href="#"
            class="bg-gray-50 border hover:bg-gray-100 px-4 py-1.5 rounded-full text-sm">More Comments
            ..</a>
    </div>

</div> --}}

<div class="tube-card p-6">

    <h1 class="block text-xl font-semibold mb-6"> Bình luận {{ count($cmt) }} </h1>

    <div class="space-y-5">
        @foreach ($cmt as $item)
            {{-- reply --}}
            {{-- <form action="{{ route('reply', $item->id) }}"
            method="post">
            @csrf
            <div class="card-footer py-3 border-0"
                style="background-color: #f8f9fa;">
                <div class="d-flex flex-start w-100">
                    <img class="rounded-circle shadow-1-strong me-3"
                        src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp"
                        alt="avatar" width="40"
                        height="40" />
                    <div class="form-outline w-100">
                        <textarea class="form-control" name="replycmt" id="textAreaExample" rows="4" placeholder="Reply..."
                            style="background: #fff;"></textarea>
                        <input type=hidden name="id_lesson"
                            value="{{ $item->id_lesson }}" />
                    </div>

                </div>
                <div class="float-end mt-2 pt-1">
                    <div class="form-group">

                        <button class="btn btn-success"
                            type="submit">Reply</button>
                    </div>
                    <button type="button"
                        class="btn btn-outline-primary btn-sm">Cancel</button>
                </div>
            </div>
        </form> --}}
            {{-- end reply --}}
            @if ($item->reply == null)
                <div class="flex gap-x-4 relative rounded-md">
                    <button id="btnreply" onclick="showform()"
                        class="bg-gray-100 py-1.5 px-4 rounded-full absolute right-5 top-0">Replay</button>
                    <img src="/frontend/assets/images/avatars/avatar-3.jpg" alt=""
                        class="rounded-full shadow w-12 h-12">
                    <div>
                        <h4 class="text-base m-0 font-semibold">
                            {{ DB::table('users')->where('id', '=', $item->user_id)->first()->name }} </h4>
                        <span class="text-gray-700 text-sm"> {{ $item->created_at }} </span>
                        <p class="mt-3 md:ml-0 -ml-16">
                            {{ $item->comment }}
                        </p>
                    </div>
                </div>

                <form id="reply" style="display: none" action="{{ route('exercise.reply', $item->id) }}" method="post">
                    @csrf
                    <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                        <div class="d-flex flex-start w-100">
                            <input type="hidden" name="lesson_id" value="{{ $item->lesson_id }}">
                            <textarea style="border: 1px solid rgba(92, 88, 88, 0.562)" name="replycmt" placeholder="Comment..."></textarea>
                        </div>
                        <div class="float-end mt-2 pt-1">
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Reply</button>
                            </div>

                        </div>
                    </div>
                </form>
                @foreach ($cmt as $i)
                    @if ($i->reply == $item->id)
                        <div class="flex gap-x-4 relative rounded-md lg:ml-16">
                            <a href="#"
                                class="bg-gray-100 py-1.5 px-4 rounded-full absolute right-5 top-0">Replay</a>
                            <img src="/frontend/assets/images/avatars/avatar-1.jpg" alt=""
                                class="rounded-full shadow w-12 h-12">
                            <div>
                                <h4 class="text-base m-0 font-semibold">
                                    {{ DB::table('users')->where('id', '=', $item->user_id)->first()->name }} </h4>
                                <span class="text-gray-700 text-sm"> {{ $item->created_at }} </span>
                                <p class="mt-3 md:ml-0 -ml-16">
                                    {{$i->comment}}
                                </p>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
        @endforeach
    </div>

    <div class="flex justify-center mt-9">
        <a href="#" class="bg-gray-50 border hover:bg-gray-100 px-4 py-1.5 rounded-full text-sm">More Comments
            ..</a>
    </div>
    <form action="{{ route('exercise.storecmt') }}" method="post">
        @csrf
        <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
            <div class="d-flex flex-start w-100">
                <input type="hidden" name="lesson_id" value="{{ $exe->id }}">
                <textarea style="border: 1px solid rgba(92, 88, 88, 0.562)" name="comment" placeholder="Câu hỏi cho bài học..."></textarea>
            </div>
            <div class="float-end mt-2 pt-1">
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Send</button>
                </div>

            </div>
        </div>
    </form>
</div>
<script>
    // $(document).ready(function() {
    //     $('#btnreply').click(function() {
    //         $('#reply').show(500);
    //     });
    // });

    function showform() {
        var x = document.getElementById("reply");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

</script>
