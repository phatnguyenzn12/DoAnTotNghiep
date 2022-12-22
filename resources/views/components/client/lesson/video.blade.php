<!-- Full screen video START -->

<div class="video uk-responsive-width">

</div>
<script src="https://player.vimeo.com/api/player.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    axios.get('https://vimeo.com/api/oembed.json?url=https%3A//vimeo.com/' + '{{ $lesson->lessonVideo->video_path }}')
        .then(
            res => {
                $('.video.uk-responsive-width').html(res.data.html)

                $('iframe').css({
                    'width': '100%',
                    'height': '100%',
                    'position': 'absolute',
                    'top': 0,
                    'left': 0
                });
            }
        )
        .catch(
            res => {
                Swal.fire(
                    'Video chưa tồn tại',
                    err,
                    'error'
                )
            }
        )
</script>
<!-- Full screen video END -->

<!-- Plyr resources and browser polyfills are specified in the pen settings -->
