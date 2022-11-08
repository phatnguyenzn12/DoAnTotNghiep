<div class="video uk-responsive-width">
    <div class="content" style="padding:56.25% 0 0 0;position:relative;">
        <iframe
            src="https://player.vimeo.com/video/766989834?h=24c128e20d&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479"
            frameborder="0" allow="fullscreen; picture-in-picture" allowfullscreen
            style="position:absolute;top:0;left:0;width:100%;height:100%;" title="tải xuống"></iframe>
    </div>
</div>

<script src="https://player.vimeo.com/api/player.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    axios.get('https://vimeo.com/api/oembed.json?url=https%3A//vimeo.com/'+'{{ $lesson->lessonVideo->video_path }}')
        .then(
            res => {
                console.log(res)
                $('.video.uk-responsive-width .content').html(res.data.html)
                $('iframe').css({
                    'width': '100%',
                    'height': '100%',
                    'position': 'absolute',
                    'top': 0,
                    'left': 0
                });
            }
        )
</script>
