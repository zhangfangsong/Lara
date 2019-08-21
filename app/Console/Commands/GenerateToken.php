<?php

/**
 * 给用户创建token
 * User: zfs
 * Date: 2019/8/17
 * Time: 22:34
 */

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GenerateToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lara:token';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'quick create token for a user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $id = $this->ask('请输入用户ID');
        $user = User::find($id);

        if(!$user){
            return $this->error('用户不存在');
        }

        $ttl = 60 * 24 * 365;

        $this->info(Auth::guard('api')->setTTL($ttl)->fromUser($user));
    }
}
