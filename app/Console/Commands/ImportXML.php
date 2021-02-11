<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Prewk\XmlStringStreamer;

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

    protected XmlStringStreamer $streamer;

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
        $streamer = XmlStringStreamer::createStringWalkerParser(Storage::get($this->argument('path')));

        while($node = $this->streamer->getNode()) {
            $simpleXmlNode = simplexml_load_string($node);
            $this->info((string)$simpleXmlNode);
            return 0;
        }

        return 0;
    }
}
