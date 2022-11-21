<?php

namespace App\Jobs;

use App\Services\VimeoService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UploadVideo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $video_path, $title, $content, $is_demo;
    private $response;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($video_path, $title, $content, $is_demo)
    {
        $this->$video_path = $video_path;
        $this->$title = $title;
        $this->$content = $content;
        $this->$is_demo = $is_demo;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(VimeoService $vimeoService)
    {
        $this->response = $vimeoService->create($this->video_path, $this->title, $this->content, $this->is_demo);
    }

    public function getResponse()
    {
        return $this->response;
    }
}
