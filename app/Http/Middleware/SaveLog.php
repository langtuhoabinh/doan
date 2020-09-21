<?php

namespace App\Http\Middleware;

use App\Models\Logging;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SaveLog
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        dd($class);
        $response = $next($request);
//        dd(1);

        $user = Auth::user();
        $user_id = $user['id'];
//        \DB::enableQueryLog();
        $query_infor = \DB::getQueryLog();

        $query = $query_infor[0]['query'];
//        dd($query);
        $time_query = $query_infor[0]['time'];
        $param = $query_infor[0]['bindings'];
//        $param_array->implode(,);
//        $param = json_encode($param);
//        dd($param);
//        $class = get_class($this);
        $log = new Logging;
        $log->query = $query;
        $log->user_id = $user_id;
        $log->time = $time_query;
//        $log->class = $class;
        $log->param = json_encode($param);
//        dd($log);
//        $log->save();
//        $this->dispatch(new \App\Jobs\SaveLog($log));
//        dd($this);
//        $job = (new \App\Jobs\SaveLog($log))->delay(15);
//        $this->dispatch($job);

        \App\Jobs\SaveLog::dispatch($log)->onQueue('jobs');
//        dd(1);
//        \App\Jobs\SaveLog::dispatch($log)->delay(now()->addMinute(1));
        return $response;
    }
}
