<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Mail;
use App\Models\User;
use App\Models\Setting;

class SendRegisterEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $cfg = (object)Setting::getAll();
        $user= $this->user;
        
        $to = $user->email;
        $data = compact('user', 'cfg');
        $subject = "感谢注册 ".$cfg->title."！请确认你的邮箱";

        Mail::send('emails.confirm', $data, function ($msg) use ($to, $subject) {
            $msg->to($to)->subject($subject);
        });
    }
}
