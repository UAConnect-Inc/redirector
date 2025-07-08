<?php

namespace App\Http\Controllers;

use App\Models\RedirectorLink;
use App\Services\Redirector\RedirectService;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function index(Request $request, RedirectorLink $link)
    {
        $url = app(RedirectService::class)->handle($link, $request);
        return redirect($url, 302);
    }
}
