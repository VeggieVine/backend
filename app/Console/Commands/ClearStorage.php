<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ClearStorage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:clear-storage';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clearing storage...';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->clearStorage();
    }

    protected function clearStorage()
	{
		$storagePath = storage_path('public');

		if (File::isDirectory($storagePath))
		{
			File::cleanDirectory($storagePath);
			$this->info('The storage has been cleared.');
		}
		else
		{
			File::makeDirectory($storagePath, 0755, true, true);
			$this->info('Storage not found, creating a new one.');
		}
	}
}
