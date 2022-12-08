@extends('layouts.client.master')

@section('title', 'Trang chủ')
@section('head-links')
    <style>
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 400;
            font-stretch: normal;
            src: url(https://fonts.gstatic.com/s/opensans/v34/memSYaGs126MiZpBA-UvWbX2vVnXBbObj2OVZyOOSr4dVJWUgsjZ0B4gaVc.ttf) format('truetype');
        }

        @font-face {
            font-family: 'Pinyon Script';
            font-style: normal;
            font-weight: 400;
            src: url(https://fonts.gstatic.com/s/pinyonscript/v17/6xKpdSJbL9-e9LuoeQiDRQR8WOXaPw.ttf) format('truetype');
        }

        @font-face {
            font-family: 'Rochester';
            font-style: normal;
            font-weight: 400;
            src: url(https://fonts.gstatic.com/s/rochester/v18/6ae-4KCqVa4Zy6Fif-UC2FHS.ttf) format('truetype');
        }

        .cursive {
            font-family: 'Pinyon Script', cursive;
        }

        .sans {
            font-family: 'Open Sans', sans-serif;
        }

        :root {
            --primary: #6b52eb;
        }

        .logo {
            width: 5rem;
            margin: 2rem;
        }

        .text-dark {
            color: black;
            font-weight: bold;
        }

        .text-dark {
            color: #343a40 !important;
        }

        .fond-violet {
            background: repeating-linear-gradient(-45deg, #e4e6fb, #e4e6fb 20px, #ffffff 20px, #ffffff 100px);
        }

        .section-count {
            padding-top: 5rem;
            padding-bottom: 8.5rem;
        }

        .ombre-externe {
            background-color: #618597;
            padding: 1rem;
            -moz-box-shadow: 20px 20px 36px rgba(0, 0, 0, 0.2);
            -webkit-box-shadow: 20px 20px 36px rgba(0, 0, 0, 0.2);
            box-shadow: 20px 20px 36px rgba(0, 0, 0, 0.2);
        }

        .ombre-interne {
            padding: 5rem;
            background-color: white;
            -webkit-box-shadow: inset 8px 0px 14px -1px rgba(0, 0, 0, 0.4);
            -moz-box-shadow: inset 8px 0px 14px -1px rgba(0, 0, 0, 0.4);
            box-shadow: inset 8px 0px 14px -1px rgba(0, 0, 0, 0.4);
        }

        .peinture-ombre-interne-fine {
            -webkit-box-shadow: inset 0px 0px 6px 0px rgba(0, 0, 0, 0.19);
            -moz-box-shadow: inset 0px 0px 6px 0px rgba(0, 0, 0, 0.19);
            box-shadow: inset 0px 0px 6px 0px rgba(0, 0, 0, 0.19);
            background-color: #f7f7f7;
        }

        .color-primary {
            color: var(--primary);
        }
    </style>
@endsection
@section('content')



    <section id="certification" class="section-count fond-violet">
        <div class="container">
            <div class="ombre-externe">
                <div class="ombre-interne">
                    <div class="peinture-ombre-interne-fine">

                        <div class="text-center p-5">
                            <h2 class="title-h2 text-center color-black wow fadeInUp">Bạn đã hoàn thành khóa học và nhận chứng chỉ: {{ $course->title }}
                            </h2>
                            <div class="pm-certificate-border col-xs-12">

                                <hr>
                                <p class="text-dark text-center my-3 wow fadeInUp"> {{ $course->certificate->title }}. </p>
                                <hr>

                                <p class="after-title text-center wow fadeInUp">  {{ $course->certificate->description }}</p>

                                <img src="/images/logo.png" class="img-fluid logo" alt="logo">
                            </div>

                        </div>
                        <!--cadre-ombre-interne-fine -->
                    </div><!-- ombre-interne -->
                </div><!-- ombre-externe -->
                <a class="btn btn-primary mt-3">Generate PDF</a>
            </div>

    </section>
@endsection
@section('js-links')

@endsection
@push('js-handles')
    <script type="module"></script>
@endpush
