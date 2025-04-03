<?php

namespace App\Jobs;

use Mail;
use App\Models\Post;
use App\Mail\PostMail;
use App\Models\PostNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class PostCreatedJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public Post $post, 
        private $email, 
        public PostNotification $postNotification
    ){
        
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            Mail::to($this->email)->send(new PostMail($this->post));
            
            $this->postNotification->sent_at = \Carbon\Carbon::now();
            $this->postNotification->save();
            
            \Log::info('===email===sent:' . $this->email,[$this->post]);
        } catch (\Exception $e) {
            \Log::error('===email==send===failed==for==' . $this->email . '=:=' . $e->getMessage());
        }
    }
}
