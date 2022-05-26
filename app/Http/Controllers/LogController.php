<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function myTestAddToLog()
    {
        Log::addToLog('My Testing Add To Log.');
        dd('log insert successfully.');
    }

    public function logActivity()
    {
        $logs = Log::logActivityLists();
        return view('logActivity',compact('logs'));
    }
}
