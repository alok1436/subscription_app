<?php

namespace App\Console\Commands;
use App\Jobs\PostCreatedJob;
use App\Models\Post;
use App\Models\PostNotification;
use Illuminate\Console\Command;

class SendPostNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:sendnotification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $post_noticiations = PostNotification::has('post')->with('post')->whereNull('sent_at')->get();
        if(!empty($post_noticiations)){
            foreach ($post_noticiations as $key => $noticiation) {
                PostCreatedJob::dispatch($noticiation->post, $noticiation->email, $noticiation)->onQueue('default');
            }
        }
    }
}
