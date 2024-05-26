<?php

namespace App\Http\Controllers\Module;

use App\Http\Controllers\Controller;
use App\Models\MailLog;
use Illuminate\Http\Request;

class MailLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $orderCol = $request->orderCol ?? 'id';
        $orderDirection = $request->orderDirection ?? 'desc';
        $paginate = $request->paginate ?? 10;
        $mailLogs = MailLog::sortable()
            ->filter($request->all())
            ->orderBy($orderCol, $orderDirection)
            ->paginate($paginate);
        return view('modules.mailLogs.index', compact('mailLogs'));
    }
}
