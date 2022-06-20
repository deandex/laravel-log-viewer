<?php

namespace Deandex\LaravelLogViewer\Http\Controllers;

use Deandex\LaravelLogViewer\File;
use Illuminate\Support\Facades\File as FileFacade;
use Symfony\Component\Finder\SplFileInfo;

class LogViewController extends Controller
{
    public function index()
    {
        $allFiles = FileFacade::allFiles(storage_path('logs'));
        $logs = collect($allFiles)->map(function (SplFileInfo $log) {
            return [
                'label' => $log->getRelativePathname(),
                'value' => $log->getRelativePathname(),
            ];
        });

        $log = request('log');
        $lines = null;
        if (! blank($log)) {
            $logFile = new File(storage_path('logs/' . $log));
            $lines = $logFile->contentAfterLine(0);
        }

        return view('logviewer::log-view.index', compact('logs', 'log', 'lines'));
    }
}
