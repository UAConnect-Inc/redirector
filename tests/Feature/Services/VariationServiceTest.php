<?php

use App\Models\RedirectorCampaign;
use App\Models\RedirectorPost;
use App\Models\RedirectorPostVariation;
use App\Models\RedirectorResource;
use App\Services\Redirector\VariationService;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('creates variations and links', function () {
    $campaign = RedirectorCampaign::factory()->create();
    $resource1 = RedirectorResource::factory()->create(['redirector_campaign_id' => $campaign->id, 'type' => 'type1']);
    $resource2 = RedirectorResource::factory()->create(['redirector_campaign_id' => $campaign->id, 'type' => 'type2']);
    $post = RedirectorPost::factory()->create([
        'redirector_campaign_id' => $campaign->id,
        'text' => 'Check this https://example.com and www.test.com',
    ]);

    $service = new VariationService('https://myapp.test');
    $service->handel($post);

    expect(RedirectorPostVariation::where('redirector_post_id', $post->id)->count())->toBe(2);

    $variation = RedirectorPostVariation::first();
    expect($variation->text)->toContain('https://myapp.test/r/');

    $this->assertDatabaseHas('redirector_links', [
        'destination' => 'https://example.com',
    ]);
    $this->assertDatabaseHas('redirector_links', [
        'destination' => 'https://www.test.com',
    ]);
});
