<?php

namespace App\Jobs;

use App\Models\Logging;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SaveLog implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $destroy = "";
    protected $log = "";
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Logging $log)
    {
        $this->log = $log;
//        $this->log->save();
    }

    /**
     * Execute the job.
     *
     * @return bool
     */
    public function handle()
    {
//        dd(1);
//        $this->log->save();
        dd($this->log);
        sleep(10);
        $save = new Logging();
        $save = $this->log;
        $save->save();
//        return $this->log->save();
    }
}
