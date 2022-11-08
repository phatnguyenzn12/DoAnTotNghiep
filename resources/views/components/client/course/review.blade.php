<div id="reviews" class="tube-card p-5">
    <h3 class="text-lg font-semibold mb-3"> Tất cả đánh giá ({{$comments->count()}}) </h3>

    <div class="flex space-x-5 mb-8">
        <div class="lg:w-1/4 w-full">
            <div class="bg-blue-100 space-y-1 py-5 rounded-md border border-blue-200 text-center shadow-xs">
                <h1 class="text-5xl font-semibold"> 4.8</h1>
                <div class="flex justify-center">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star" class="text-gray-300"></ion-icon>
                </div>
                <h5 class="mb-0 mt-1 text-sm"> Course Rating</h5>
            </div>
        </div>
        <!-- progress -->
        <div class="w-2/4 hidden lg:flex flex-col justify-center space-y-5">

            <div class="w-full h-2.5 rounded-lg bg-gray-300 shadow-xs relative">
                <div class="w-11/12 h-full rounded-lg bg-gray-800"> </div>
            </div>
            <div class="w-full h-2.5 rounded-lg bg-gray-300 shadow-xs relative">
                <div class="w-4/5 h-full rounded-lg bg-gray-800"> </div>
            </div>
            <div class="w-full h-2.5 rounded-lg bg-gray-300 shadow-xs relative">
                <div class="w-3/5 h-full rounded-lg bg-gray-800"> </div>
            </div>
            <div class="w-full h-2.5 rounded-lg bg-gray-300 shadow-xs relative">
                <div class="w-3/6 h-full rounded-lg bg-gray-800"> </div>
            </div>
            <div class="w-full h-2.5 rounded-lg bg-gray-300 shadow-xs relative">
                <div class="w-1/3 h-full rounded-lg bg-gray-800"> </div>
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
                <span class="ml-2"> 95 %</span>
            </div>
            <div class="flex justify-center items-center">
                <ion-icon name="star" class="text-gray-300"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <span class="ml-2"> 85 %</span>
            </div>
            <div class="flex justify-center items-center">
                <ion-icon name="star" class="text-gray-300"></ion-icon>
                <ion-icon name="star" class="text-gray-300"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <span class="ml-2"> 60 %</span>
            </div>
            <div class="flex justify-center items-center">
                <ion-icon name="star" class="text-gray-300"></ion-icon>
                <ion-icon name="star" class="text-gray-300"></ion-icon>
                <ion-icon name="star" class="text-gray-300"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <span class="ml-2"> 50 %</span>
            </div>
            <div class="flex justify-center items-center">
                <ion-icon name="star" class="text-gray-300"></ion-icon>
                <ion-icon name="star" class="text-gray-300"></ion-icon>
                <ion-icon name="star" class="text-gray-300"></ion-icon>
                <ion-icon name="star" class="text-gray-300"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <span class="ml-2"> 35 %</span>
            </div>

        </div>
    </div>

    <div class="space-y-4 my-5">

        @forelse ($comments as $comment)
            <div class="bg-gray-50 border flex gap-x-4 p-4 relative rounded-md">
                <img src="/frontend/assets/images/avatars/avatar-4.jpg" alt=""
                    class="rounded-full shadow w-12 h-12">
                <div class="flex justify-center items-center absolute right-5 top-6 space-x-1 text-yellow-500">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                </div>
                <div>
                    <h4 class="text-base m-0 font-semibold"> {{$comment->user->name}} (Đã tham gia khóa học)</h4>
                    <span class="text-gray-700 text-sm"> 14th, April 2021 </span>
                    <p class="mt-3 md:ml-0 -ml-16">
                        {{$comment->comment}}
                    </p>
                </div>
            </div>
        @empty
        @endforelse

    </div>

    <div class="flex justify-center mt-9">
        <a href="#" class="bg-gray-50 border hover:bg-gray-100 px-4 py-1.5 rounded-full text-sm">Xem thêm đánh giá
            ..</a>
    </div>

</div>
