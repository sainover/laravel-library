<?php

namespace App\Http\Controllers;

use App\Jobs\Import;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

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
