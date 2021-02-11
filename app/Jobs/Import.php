<?php

namespace App\Jobs;

use App\Models\Book;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Prewk\XmlStringStreamer;

class Import implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected XmlStringStreamer $streamer;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $filePath)
    {
        chdir(storage_path('app'));
        $this->streamer = XmlStringStreamer::createStringWalkerParser($filePath, ['captureDepth' => 3]);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        while($node = $this->streamer->getNode()) {
            $simpleXmlNode = simplexml_load_string($node);

            if (0 === Book::where('isbn', $simpleXmlNode->attributes()['isbn'])->count()) {
                $book = Book::create([
                    'title' => $simpleXmlNode->attributes()['title'],
                    'isbn' => $simpleXmlNode->attributes()['isbn'],
                    'description' => $simpleXmlNode->description,
                ]);
    
                $book
                    ->addMediaFromUrl($simpleXmlNode->image)
                    ->sanitizingFileName(function($filename) {
                        return md5(uniqid()) . '.' . pathinfo($filename, PATHINFO_EXTENSION);
                    })
                    ->toMediaCollection()
                ;
            }
        }
    }
}
