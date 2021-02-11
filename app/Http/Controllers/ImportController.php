<?php

namespace App\Http\Controllers;

use App\Jobs\Import;
use App\Models\Book;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Unique;
use Illuminate\View\View;
use Prewk\XmlStringStreamer;
use Prewk\XmlStringStreamer\Stream;
use Prewk\XmlStringStreamer\Parser;

use function PHPUnit\Framework\fileExists;

class ImportController extends Controller
{
    public function index(): View
    {
        return view('import');
    }

    public function upload(Request $request): RedirectResponse
    {
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('import');
            Import::dispatchAfterResponse($path);
        }

        return redirect()->route('import.index');
    }
}
