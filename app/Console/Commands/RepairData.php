<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Article;
use App\Handlers\App;

class RepairData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'repair:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Repair the error data for the website';

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
    public function handle(App $app)
    {
        // 修复文章评论
        $this->repairArticleComment();
        // 修复用户头像
        $this->repairUserAvatar($app);
    }

    protected function repairArticleComment()
    {
        $articles = Article::select('id')->get();

        if(!$articles->count()){
            return false;
        }
        $bar = $this->output->createProgressBar(count($articles));

        foreach($articles as $article){
            $article->comments = $article->comment()->count();
            $article->save();

            $bar->advance();
        }

        $bar->finish();
        $this->info("\n评论数据修复完毕!");
    }

    protected function repairUserAvatar($app)
    {
        $users = User::where('avatar', '')->select('id', 'email')->get();

        if(!$users->count()){
            return false;
        }
        $bar = $this->output->createProgressBar(count($users));

        foreach($users as $user){
            $user->avatar = $app->getAvatarByEmail($user->email);
            $user->save();

            $bar->advance();
        }

        $bar->finish();
        $this->info("\n用户数据修复完毕!");
    }
}
