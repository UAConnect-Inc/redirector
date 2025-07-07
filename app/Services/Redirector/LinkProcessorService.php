<?php

namespace App\Services\Redirector;

class LinkProcessorService
{
    public function __construct(private string $baseUrl = '')
    {
        $this->baseUrl = $baseUrl ?: config('app.url');
    }

    public function handle(string $text): string
    {
        // Regex pattern to match URLs (http, https, www)
        $pattern = '/\b((https?:\/\/|www\.)[^\s<]+)/i';

        // Callback to replace each URL with the internal link
        return preg_replace_callback($pattern, function ($matches) {
            $url = $matches[1];
            // Ensure URLs starting with www. have the protocol
            if (stripos($url, 'www.') === 0) {
                $url = 'https://' . $url;
            }
            $encodedUrl = urlencode($url);
            return rtrim($this->baseUrl, '/') . '/go/?url=' . $encodedUrl;
        }, $text);
    }
}
