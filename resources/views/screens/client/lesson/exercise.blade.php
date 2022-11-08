@extends('layouts.client.master-lesson')

@section('title', 'Trang chủ')

@section('head-links')
    <link rel="stylesheet" data-name="vs/editor/editor.main"
        href="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.20.0/min/vs/editor/editor.main.min.css">
    <link rel="stylesheet" href="/frontend/assets/prism/prism.css">
    <link rel="stylesheet" href="/frontend/assets/prism/copy.css">
@endsection

@section('content')
    <div id="wrapper" class="course-watch">

        <!--  Sidebar  -->
        @include('components.client.lesson.sidebar')

        <!-- Main Contents -->
        <div class="main_content">

            <div class="relative">

                <ul class="uk-switcher relative z-10" id="video_tabs" style="touch-action: pan-y pinch-zoom;">

                    <li class="uk-active">

                        <div class="embed-exercise">
                            <!-- to autoplay video uk-video="automute: true" -->
                            @include('components.client.lesson.exercise')

                        </div>
                    </li>

                </ul>

                <div class="bg-gray-200 w-full h-full absolute inset-0 animate-pulse"></div>

            </div>

            <nav class="cd-secondary-nav border-b md:p-0 lg:px-6 bg-white uk-sticky"
                uk-sticky="cls-active:shadow-sm ; media: @s" style="">
                <ul uk-switcher="connect: #course-tabs; animation: uk-animation-fade">
                    <li class="uk-active"><a href="#" class="lg:px-2" aria-expanded="true"> Thông tin </a></li>
                    <li><a href="#" class="lg:px-2" aria-expanded="false"> Hỏi đáp </a></li>
                </ul>
            </nav>
            <div class="uk-sticky-placeholder" style="height: 68px; margin: 0px;" hidden=""></div>

            <div class="container">

                <div class="max-w-2xl lg:py-6 mx-auto uk-switcher" id="course-tabs" style="touch-action: pan-y pinch-zoom;">

                    <!--  Overview -->
                    <div class="uk-active">

                        <h4 class="text-2xl font-semibold"> About this course </h4>

                        <p> Learn Web Development Without Writing Much Code </p>

                        <hr class="my-5">

                        <div class="grid lg:grid-cols-3 mt-8 gap-8">
                            <div>
                                <h3 class="text-lg font-semibold"> Description </h3>
                            </div>
                            <div class="col-span-2">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                                    tincidunt ut
                                    laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim laoreet dolore magna
                                    aliquam erat
                                    volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit
                                    lobortis
                                    nisl ut aliquip ex ea commodo consequat

                                    <br>
                                    <a href="#" class="text-blue-500">Read more .</a>
                                </p>
                            </div>

                            <div>
                                <h3 class="text-lg font-semibold"> What You’ll Learn </h3>
                            </div>
                            <div class="col-span-2">
                                <ul>
                                    <li> <i class="uil-check text-xl font-bold mr-2"></i>Setting up the environment</li>
                                    <li> <i class="uil-check text-xl font-bold mr-2"></i>Advanced HTML Practices</li>
                                    <li> <i class="uil-check text-xl font-bold mr-2"></i>Build a portfolio website</li>
                                    <li> <i class="uil-check text-xl font-bold mr-2"></i>Responsive Designs</li>
                                    <li> <i class="uil-check text-xl font-bold mr-2"></i>Understand HTML Programming</li>
                                    <li> <i class="uil-check text-xl font-bold mr-2"></i>Code HTML</li>
                                    <li> <i class="uil-check text-xl font-bold mr-2"></i>Start building beautiful websites
                                    </li>
                                </ul>
                            </div>

                            <div>
                                <h3 class="text-lg font-semibold"> Requirements </h3>
                            </div>
                            <div class="col-span-2">
                                <ul class="list-disc ml-5 space-y-1">
                                    <li>Any computer will work: Windows, macOS or Linux</li>
                                    <li>Basic programming HTML and CSS.</li>
                                    <li>Basic/Minimal understanding of JavaScript</li>
                                </ul>
                            </div>

                        </div>


                    </div>

                    <!--  comment -->
                    @include('components.client.lesson.comment')

                </div>
            </div>


        </div>

        <!-- This is the modal -->
        @include('components.client.lesson.modal')


    </div>
@endsection
@section('component_bottom')

@endsection
@section('js-links')
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
    <script src="/frontend/assets/prism/prism.js"></script>
    <script src="/frontend/assets/prism/copy.js"></script>
    <script src="https://unpkg.com/axios@1.0.0/dist/axios.min.js"></script>
    <script src='https://unpkg.com/monaco-editor@0.8.3/min/vs/loader.js'></script>
@endsection
@push('js-handles')
    <script>
        const editorPreview = js_$('iframe[editorPreview]').contentWindow.document;
        require.config({
            paths: {
                'vs': 'https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.26.1/min/vs'
            }
        });
        require(["vs/editor/editor.main"], () => {
            resourse = monaco.editor.create(js_$('div[source-code]'), {
                value: `#include <stdio.h>
int main() {
  int myNumbers[] = {25, 50, 75, 100};
  printf("%d", myNumbers[0]);
  return 0;
}`,
                language: "c",
                theme: 'vs-dark',
            });
        });

        const config = {
            method: "post",
            url: "https://codex-api.herokuapp.com/",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            data: {
                code: ``,
                language: "c",
            }
        }

        js_$('button[run-code]').onclick = () => {
            config.data.code = resourse.getValue()
            axios(config)
                .then(
                    data => {
                        if (data.data.output) {
                            editorPreview.body.innerHTML = data.data.output;
                        } else {
                            editorPreview.body.innerHTML = data.data.error;
                        }
                    }
                )
                .catch(
                    data => {
                        console.log(data);
                    }
                )
        }
    </script>
@endpush
