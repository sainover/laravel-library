<?php

namespace App\Services;

use App\Factory\BookFactory;
use App\Jobs\Import;
use App\Models\Book;
use Prewk\XmlStringStreamer;
use SimpleXMLElement;

class ImportService
{
    public const PARS_CONFIG = [
        'captureDepth' => 3,
        'uniqueNode' => 'book',
    ];

    protected BookFactory $bookFactory;
    protected XmlStringStreamer $streamer;

    public function __construct(BookFactory $bookFactory)
    {
        $this->bookFactory = $bookFactory;
    }

    public function xmlParse(string $filePath): void
    {
        $this->streamer = XmlStringStreamer::createUniqueNodeParser($filePath, self::PARS_CONFIG);

        while ($node = $this->streamer->getNode()) {
            $simpleXmlNode = simplexml_load_string($node);
            $bookAttributes = $this->xmlElementToAttributes($simpleXmlNode);

            if (!Book::where('isbn', $bookAttributes['isbn'])->exists()) {
                $book = $this->bookFactory->fromArray($bookAttributes);
                $book->saveOrFail();
            }
        }
    }

    private function xmlElementToAttributes(SimpleXMLElement $xmlElement): array
    {
        return [
            'title' => $xmlElement->attributes()['title'],
            'isbn' => $xmlElement->attributes()['isbn'],
            'description' => $xmlElement->description,
            'image' => $xmlElement->image,
        ];
    }
}
