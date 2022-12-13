@if(Session::has('success'))
    <script type="module">
        import {salert} from '/js/sweet-alert.js'
        salert('success','{{Session::get('success')}}')
    </script>
@endif

@if(Session::has('failed'))
    <script type="module">
        import {salert} from '/js/sweet-alert.js'
        salert('error','{{Session::get('failed')}}')
    </script>
@endif

@if(Session::has('null'))
    <script type="module">
        import {salert} from '/js/sweet-alert.js'
        salert('null','{{Session::get('null')}}')
    </script>
@endif


{{-- @if($errors->all())
    <script type="module">
        import {salert} from '/js/sweet-alert.js'
        salert('Warning','Vui lòng kiểm tra lại thông tin!')
    </script>
@endif --}}
