<?php

/**
 * 重置密码
 * User: zfs
 * Date: 2019/8/17
 * Time: 22:34
 */

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class ResetPassword extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reset:password';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'reset password for a user';

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
        $id = $this->ask('请输入你想重置密码的用户ID');
        $user = User::find($id);

        if(!$user){
            return $this->error('用户不存在');
        }

        $password = $this->secret('请输入用户密码');
        if(strlen(trim($password)) < 6){
            return $this->error('密码长度不能少于6位');
        }
        
        $user->password = bcrypt($password);
        $user->save();
        $this->info('密码重置成功');
    }
}
