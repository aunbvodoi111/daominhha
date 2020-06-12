<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;
use App\Post;

class SendMailable implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data= array(
            'title'=>'anh',
            'body'=> 'em',
        );

        Mail::send('emails.cron', $data, function($message){
            $message->from('phamquycntta@gmail.com', 'Laravel Queues');
            $message->to('phamquycntta@gmail.com')->subject('There is a new post');
        });
    }
}