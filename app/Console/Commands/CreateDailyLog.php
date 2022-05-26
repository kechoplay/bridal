<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class CreateDailyLog extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'touch:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        //
        $app_log = env('APP_LOG');
        $log_max_files = env('APP_LOG_MAX_FILES');
        // Check if logs daily so create new file log
        if ($app_log == 'daily') {
            $filename = 'storage/logs/laravel-' . Carbon::tomorrow()->format('Y-m-d') . '.log';
            exec('touch ' . $filename);
            exec('chmod -R 0777 ' . $filename);
            exec('chown -R www-data:www-data ' . $filename);
            Log::debug('created Daily Logs' . Carbon::tomorrow()->format('Y-m-d'));
            $list_file = File::files(storage_path('logs'));
            // Check if list file > log_max_files delete file. Number files deleted == count($list_file) - $log_max_files
            if (count($list_file) > $log_max_files) {
                $len = count($list_file) - $log_max_files;
                for ($i = 0; $i < $len; $i++) {
                    exec('rm -rf ' . $list_file[$i]);
                }
            }
        }
    }
}
