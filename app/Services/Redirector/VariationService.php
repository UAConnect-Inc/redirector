<?php

namespace App\Services\Redirector;

use App\Models\RedirectorLink;
use App\Models\RedirectorPost;
use App\Models\RedirectorPostVariation;

class VariationService
{
    public function __construct(private string $baseUrl = '')
    {
        $this->baseUrl = $baseUrl ?: config('app.url');
    }

    public function handle(RedirectorPost $post): RedirectorPost
    {
        foreach ($post->redirectorCampaign->redirectorResources as $resource) {
            // TODO: Check if the post already has variations for this resource
            // Maybe need to delete existing variations first.
            RedirectorPostVariation::create([
                'text' => $this->replaceLinks($post->text),
                'redirector_post_id' => $post->id,
                'redirector_resource_id' => $resource->id,
            ]);
        }

        return $post;
    }

    protected function replaceLinks(string $text): string
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

            $link = RedirectorLink::create([
                'destination' => $url,
            ]);

            return rtrim($this->baseUrl, '/') . '/r/' . $link->id;
        }, $text);
    }
}
