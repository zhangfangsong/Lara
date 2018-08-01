<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Article;

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
    public function handle()
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
        $this->info("\n数据修复完毕!");
    }
}
