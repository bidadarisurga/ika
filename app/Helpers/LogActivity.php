<?php


namespace App\Helpers;

use App\Models\LogActivity as ModelsLogActivity;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Request;


class LogActivity
{


    public static function addToLog($subject)
    {
        $log = [];
        $log['subject'] = $subject;
        $log['url'] = Request::fullUrl();
        $log['method'] = Request::method();
        $log['ip'] = Request::ip();
        $log['agent'] = Request::header('user-agent');
        $log['user_name'] = Auth::user()->name;
        $log['time'] = date('H:i:s');
        $log['tanggal'] = date("d-m-Y");
        ModelsLogActivity::create($log);
    }


    public static function logActivityLists()
    {
        return ModelsLogActivity::simplePaginate(5);
    }
}
