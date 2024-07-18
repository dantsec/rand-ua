<?php

namespace Dant\RandUa;

class UserAgentGenerator
{
    protected $browsers = [
        'chrome' => __DIR__ . '/user-agents/chrome.txt',
        'edge' => __DIR__ . '/user-agents/edge.txt',
        'firefox' => __DIR__ . '/user-agents/firefox.txt',
        'opera' => __DIR__ . '/user-agents/opera.txt',
        'safari' => __DIR__ . '/user-agents/safari.txt',
    ];

    public static function create()
    {
        return new static();
    }

    private function getRandomElementFromArray(array $content = []): string {
        return $content[rand(0, count($content) - 1)];
    }

    public function getUserAgent(string $browser = ''): string
    {
        $file = file(
            $this->browsers[$browser],
            FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES
        );
        
        return $this->getRandomElementFromArray($file);
    }

    public function getRandomUserAgent(): string
    {
        $avaiable_browsers = array_keys($this->browsers);

        $rand_browser = $this->getRandomElementFromArray($avaiable_browsers);

        $file = file(
            $this->browsers[$rand_browser],
            FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES
        );

        return $this->getRandomElementFromArray($file);
    }
}
