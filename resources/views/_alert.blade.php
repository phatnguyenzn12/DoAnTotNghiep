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

@if($errors->all())
    <script type="module">
        import {salert} from '/js/sweet-alert.js'
        salert('Warning','Please check the form carefully for errors!')
    </script>
@endif