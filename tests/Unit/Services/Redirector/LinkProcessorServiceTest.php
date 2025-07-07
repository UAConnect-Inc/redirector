<?php

namespace Tests\Unit\Services\Redirector;

use App\Services\Redirector\LinkProcessorService;
use PHPUnit\Framework\TestCase;

class LinkProcessorServiceTest extends TestCase
{
    public function testHandleReplacesHttpUrl(): void
    {
        $baseUrl = 'https://test.com';
        $service = new LinkProcessorService($baseUrl);
        $text = 'Visit http://example.com for more info.';
        $expected = 'Visit '.$baseUrl.'/go/?url=http%3A%2F%2Fexample.com for more info.';
        $this->assertEquals($expected, $service->handle($text));
    }

    public function testHandleReplacesHttpsUrl(): void
    {
        $baseUrl = 'https://test.com';
        $service = new LinkProcessorService($baseUrl);
        $text = 'Secure site: https://secure.com/page';
        $expected = 'Secure site: '.$baseUrl.'/go/?url=https%3A%2F%2Fsecure.com%2Fpage';
        $this->assertEquals($expected, $service->handle($text));
    }

    public function testHandleReplacesWwwUrl(): void
    {
        $baseUrl = 'https://test.com';
        $service = new LinkProcessorService($baseUrl);
        $text = 'Go to www.site.com now!';
        $expected = 'Go to '.$baseUrl.'/go/?url=https%3A%2F%2Fwww.site.com now!';
        $this->assertEquals($expected, $service->handle($text));
    }

    public function testHandleMultipleUrls(): void
    {
        $baseUrl = 'https://test.com';
        $service = new LinkProcessorService($baseUrl);
        $text = 'Links: http://a.com and www.b.com';
        $expected = 'Links: '.$baseUrl.'/go/?url=http%3A%2F%2Fa.com and '.$baseUrl.'/go/?url=https%3A%2F%2Fwww.b.com';
        $this->assertEquals($expected, $service->handle($text));
    }

    public function testHandleNoUrls(): void
    {
        $baseUrl = 'https://test.com';
        $service = new LinkProcessorService($baseUrl);
        $text = 'No links here.';
        $this->assertEquals($text, $service->handle($text));
    }
}
