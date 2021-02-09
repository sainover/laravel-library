<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportXML extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:xml {path}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import books form XML file';

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
     * @return int
     */
    public function handle()
    {
        return 0;
    }
}
