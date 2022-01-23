<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use Log, DB, Str;
use Illuminate\Support\Facades\Storage;
use Throwable;
use App\Repositories\BackupRepository;

class BackupJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $backupRepository;
    
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(BackupRepository $backupRepository)
    {
        $this->backupRepository = $backupRepository;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::info("|----------------------------- DB Backup Job: Started ----------------------------------|");

        // db backup job logic
        Storage::disk('backup')->put('database_backup_on_' . date('y_m_d_H_i_s') . '.sql', file_get_contents($this->backupRepository->backup()));

        Log::info("|----------------------------- DB Backup Job: Ended ----------------------------------|");
    }
}