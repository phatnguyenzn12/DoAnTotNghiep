<style>
    .rate {
        height: 46px;
        padding: 0 10px;
        position: relative;
        display: flex;
        flex-direction: row-reverse;
        align-items: center;
        justify-content: center;

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

    /* Modified from: https://github.com/mukulkant/Star-rating-using-pure-css */
</style>

<div class="">
    <!-- Instructor image START -->
    <div class="card shadow p-2 mb-4 text-center">
        <div class="rounded-3">
            <!-- Image -->
            <img src="/frontend/images/instructor/07.jpg" class="card-img" alt="course image">
        </div>

        <!-- Card body -->
        <div class="card-body px-3">
            <!-- Rating -->


            <!-- Social media button -->
            <ul class="list-inline mb-0">
                <li class="list-inline-item"> <a class="btn px-2 btn-sm bg-facebook" href="#"><i
                            class="fab fa-fw fa-facebook-f"></i></a> </li>
                <li class="list-inline-item"> <a class="btn px-2 btn-sm bg-instagram-gradient" href="#"><i
                            class="fab fa-fw fa-instagram"></i></a> </li>
                <li class="list-inline-item"> <a class="btn px-2 btn-sm bg-twitter" href="#"><i
                            class="fab fa-fw fa-twitter"></i></a> </li>
                <li class="list-inline-item"> <a class="btn px-2 btn-sm bg-linkedin" href="#"><i
                            class="fab fa-fw fa-linkedin-in"></i></a> </li>
            </ul>

            <h1 class="mb-0">Gỉang viên: {{ $mentor->name }}</h1>



            <div class="mt-2">
                <h5 class="mb-4">Đánh giá chương học: {{ $chapter->title }}</h5>
                <form class="row g-3" action="{{ route('client.chapter.postReview',$chapter->id) }}" method="post">
                    @csrf
                    <!-- Name -->

                    <div class="rate">
                        <input type="radio" id="star5" name="votes" value="5" />
                        <label for="star5" title="text">5 sao</label>
                        <input type="radio" id="star4" name="votes" value="4" />
                        <label for="star4" title="text">4 sao</label>
                        <input type="radio" id="star3" name="votes" value="3" />
                        <label for="star3" title="text">3 sao</label>
                        <input type="radio" id="star2" name="votes" value="2" />
                        <label for="star2" title="text">2 sao</label>
                        <input type="radio" id="star1" name="votes" value="1" />
                        <label for="star1" title="text">1 sao</label>
                    </div>
                    <!-- Message -->
                    <div class="col-12 bg-light-input">
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="content" placeholder="Đánh giá của bạn" rows="3"></textarea>
                    </div>
                    <!-- Button -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary mb-0">Gửi đánh giá</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Instructor image END -->
</div>
