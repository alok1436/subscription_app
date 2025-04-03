<?php

namespace App\Listeners;
use App\Events\PostEvent;
use App\Jobs\PostCreatedJob;
use App\Models\PostNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PostEventListner
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PostEvent $event): void
    {
        $post = $event->post;
       if($post->website){
            $subscribers = $event->post->website->subscribers()->pluck('email')->toArray();

            if(!empty($subscribers)){
                foreach ($subscribers as $key => $email) {
                    $post_noticiation = PostNotification::create(['email'=> $email, 'post_id'=> $post->id]);
                    PostCreatedJob::dispatch($post, $email, $post_noticiation)->onQueue('default');
                }
            }else{
                \Log::info("No subscribers found for website",[$post->website]);
            }
       }
    }
}
