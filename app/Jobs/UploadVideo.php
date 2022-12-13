<?php

namespace App\Jobs;

use App\Models\Lesson;
use App\Services\VimeoService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Exception;

class UploadVideo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $lesson, $video_path, $title, $content, $is_demo;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Lesson $lesson, $video_path, $title, $content, $is_demo)
    {
        $this->lesson = $lesson;
        $this->video_path = $video_path;
        $this->title = $title;
        $this->content = $content;
        $this->is_demo = $is_demo;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $vimeoService = new VimeoService();
        $path = $vimeoService->create($this->video_path, $this->title, $this->content, $this->is_demo);
        $this->lesson->lessonVideo()->update(['video_path' => '123']);
    }


    // public function failed($exception)
    // {
    //     return dd($exception);
    // }
}
