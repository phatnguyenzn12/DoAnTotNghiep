
<style>
    div {
        width: 559px;
        height: 842px;
        margin: auto;
    }
</style>

<body style="font-family: DejaVu Sans, sans-serif;">
    <div style="position: relative;">
        <img src="https://res.cloudinary.com/dbsjoou0l/image/upload/v1670898484/z3955466613652_396a41596f3f5aaab446dbe9ef05d526_sysghu.jpg"
            style="width: 100%;" alt="">
        <p
            style="position: absolute;
               text-align: center;
               top: 110px;
               right: 100px;
               left: 100px;
               font-size: 35px;
               color: #FFCC00;
               font-weight: bold;">
            {{ auth()->user()->name }}</p>
        <p
            style="position: absolute;
               text-align: center;
               top: 230px;
               right: 120px;
               left: 120px;
               font-size: 20px;
               color: #3366FF;">
            {{ $data->title }}</span>
        <p style="position: absolute;left:20%;top:295px;font-size: 12px;"> {{ $data->created_at }}</span>
    </div>
</body>
