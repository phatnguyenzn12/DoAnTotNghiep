<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Vimeo\Vimeo;

class VimeoService
{
    public $client;

    public function __construct()
    {
        $this->client = new Vimeo(env('CLIENT_ID_VIMEO'), env('CLIENT_SECRET_VIMEO'), env('ACCESS_TOKEN_VIMEO'));
    }

    public function create($file_video, $title, $content, $is_demo)
    {
        $privacy = array(
            'view' => 'disable',
            'embed' => 'whitelist',
            'download' => "false",
        );
        $url = $this->client->upload($file_video, array(
            "name" => $title,
            "description" => $content,
            'privacy' => $privacy,
        ));

        $this->client->request($url . '/privacy/domains/' . env('DB_HOST'), [], 'PUT');



        $url = Str::after($url, 'videos/');

        return $url;
    }

    public function update($video_path, $title, $content, $is_demo)
    {
        if ($is_demo == 0) {
            $privacy = array(
                'view' => 'disable',
                'embed' => 'whitelist',
                'download' => "false",
            );
        } else {
            $privacy = array(
                'view' => 'anybody',
                'embed' => 'public',
                'download' => "true",
            );
        }

        $url = $this->client->request(
            "/videos/$video_path",
            array(
                "name" => $title,
                "description" => $content,
                'privacy' => $privacy,
            ),
            'PATCH'
        );

        return $url;
    }

    public function getVideo($video_path)
    {
        dd($this->client->request("/videos/$video_path"));
    }
}
