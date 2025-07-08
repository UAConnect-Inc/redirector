<?php

namespace App\Services\Redirector;

use App\Models\RedirectorLink;
use App\Models\RedirectorLog;
use Illuminate\Http\Request;

class RedirectService
{
    public function handle(RedirectorLink $link, Request $request)
    {
        // Generate the URL with query parameters
        $url = url()->query($link->destination, $link->utmData());

        // log the redirect and request data
        $logData = [
            'redirector_link_id' => $link->id,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'referer' => $request->headers->get('referer'),
            'query_params' => $request->query(),
        ];

        RedirectorLog::create([
            'data' => $logData
        ]);

        return $url;
    }
}
