<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
       div.certificate-header {
           position: relative;
       }

       div.student-name {
           position: absolute;
           text-align: center;
           top: 200px;
           right: 100px;
           left: 100px;
           font-size: 50px;
           color: #FFCC00;
           font-weight: bold;
           /* font-family: 'Times New Roman', Times, serif; */

       }
       /* .student-name {
           transition-timing-function: ease-in-out;
           transition-duration: 3s;
       } */

       div.about-certificate {
           position: absolute;
           text-align: center;
           bottom: 150px;
           right: 150px;
           left: 150px;
           font-size: 30px;
           color: #3366FF;
       }
       div.date-certificate {
           position: absolute;
           text-align: center;
           bottom: 80px;
           left: 160px;
       }
   </style>
</head>
<body>

<section id="certification" >
    <div class="container" style="max-width:800px" style="font-family: DejaVu Sans, sans-serif;">
        <div class="certificate-container" style="background-image: url(); background-size: 100%">
            <div class="certificate">
                <div class="water-mark-overlay"></div>
                <div class="certificate-header">
                    {{-- <img src="../app/public/storages/images/certificate.png" class="logo" alt=""> --}}
                    <img src="https://res.cloudinary.com/dbsjoou0l/image/upload/v1670898484/z3955466613652_396a41596f3f5aaab446dbe9ef05d526_sysghu.jpg" class="logo" alt="">

                    <div class="student-name">
                        <p><I>{{ auth()->user()->name }}</I></p>
                    </div>
                    <div class="about-certificate">
                        <p>
                            {{$course->title}}
                        </p>
                    </div>
                    <div class="date-certificate">
                        <p>
                           {{$course->created_at}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        {{-- <a class="btn btn-primary mt-3" href="{{ route('client.certificate.exportpdf') }}">Generate PDF</a> --}}
    </div>
</section>
</body>
</html>
