<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class SendRemider implements ShouldQueue
{
    use Queueable;

    protected $todo;

    /**
     * Create a new job instance.
     */
    public function __construct($todo)
    {
        $this->todo = $todo;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info('Todo "' . $this->todo->title . '" has been registered');
    }
}
