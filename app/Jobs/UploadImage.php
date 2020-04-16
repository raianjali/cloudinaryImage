<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Jobs;

class UploadImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $details;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $url = $this->details['url'];
        $result = \Cloudinary\Uploader::upload($url);
        Jobs::create ([
            'name' => $result['original_filename'],
            'size' => $result['bytes'],
            'type' => $result['resource_type'],
            'local_url' => $url,
            'global_url' => $result['url']
        ]);
        return;
        /*Details to store in database.
        dd($result->original_filename);
        dd($result->bytes);
        dd($result->resource_type);
        dd($url);
        dd($result->url);*/
    }
}
