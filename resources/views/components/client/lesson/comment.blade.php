<div class="tube-card p-6">

    <h1 class="block text-xl font-semibold mb-6"> Bình luận {{ count($cmt) }} </h1>
    <div class="space-y-5">
        @foreach ($cmt as $item)
            @if ($item->reply == null)
                <div class="flex gap-x-4 relative rounded-md">
                    <button id="btnreply" onclick="showform()"
                        class="bg-gray-100 py-1.5 px-4 rounded-full absolute right-5 top-0">Replay</button>
                    <img src="{{ $item->avatar }}" alt="" class="rounded-full shadow w-12 h-12">
                    <div>
                        <h4 class="text-base m-0 font-semibold">
                            {{ DB::table('users')->where('id', '=', $item->user_id)->first()->name }} </h4>
                        <span class="text-gray-700 text-sm"> {{ date('d/m/Y', strtotime($item->created_at)) }} </span>
                        <p class="mt-3 md:ml-0 -ml-16">
                            {{ $item->comment }}
                        </p>
                    </div>
                </div>
                @foreach ($cmt as $i)
                    @if ($i->reply == $item->id)
                        <div class="flex gap-x-4 relative rounded-md lg:ml-16">
                            <button id="btnreply" onclick="showform()"
                                class="bg-gray-100 py-1.5 px-4 rounded-full absolute right-5 top-0">Replay</button>
                            <img src="{{ $i->avatar }}" alt="" class="rounded-full shadow w-12 h-12">
                            <div>
                                <h4 class="text-base m-0 font-semibold">
                                    {{ DB::table('users')->where('id', '=', $i->user_id)->first()->name }} </h4>
                                </h4>
                                <span class="text-gray-700 text-sm"> {{ date('d/m/Y', strtotime($i->created_at)) }}
                                </span>
                                <p class="mt-3 md:ml-0 -ml-16">
                                    {{ $i->comment }}
                                </p>
                            </div>
                        </div>
                    @endif
                @endforeach
                <form id="reply" style="display: none" action="{{ route('client.lesson.reply', $item->id) }}"
                    method="post">
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
            @endif
        @endforeach
    </div>

    <div class="flex justify-center mt-9">
        <a href="#" class="bg-gray-50 border hover:bg-gray-100 px-4 py-1.5 rounded-full text-sm">More Comments
            ..</a>
    </div>
    <form action="{{ route('client.lesson.storecmt') }}" method="post">
        @csrf
        <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
            <div class="d-flex flex-start w-100">
                {{-- {{ $exe->id }} --}}
                <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">
                <textarea style="border: 1px solid rgba(92, 88, 88, 0.562)" name="comment" placeholder="Comment..."></textarea>
            </div>
            <div class="float-end mt-2 pt-1">
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Gửi</button>
                </div>

            </div>
        </div>
    </form>
</div>
<script>
    function showform() {
        var x = document.getElementById("reply");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>
