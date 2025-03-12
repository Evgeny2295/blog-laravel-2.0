<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class RedisWorkCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'redis:go';

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
        $string = 'gtp';
        Cache::put('example','my_str');
        Cache::put('ert','ert');
        Cache::forget('ert');
        $result = '';
        //Так не используется, так как много писать
//        if(Cache::has('mystr')){
//            $result = Cache::get('mystr');
//        }else{
//            Cache::put('mystr',$string);
//            $result = $string;
//        }


        $result= Cache::remember('mystring',60*60,fn()=>$string);
        $result= Cache::rememberForever('mystring',fn()=>$string);
        dd($result);
    }
}
