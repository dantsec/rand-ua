<?php

namespace Dant\RandUa;

class UserAgentGenerator
{
    /**
     * Array defining browser names and their corresponding
     * user-agent file paths that contains user-agent strings.
     *
     * @var array
     */
    private const BROWSER_FILE_PATHS = [
        'Chrome' => __DIR__ . '/user-agents/chrome.txt',
        'Edge' => __DIR__ . '/user-agents/edge.txt',
        'Firefox' => __DIR__ . '/user-agents/firefox.txt',
        'Opera' => __DIR__ . '/user-agents/opera.txt',
        'Safari' => __DIR__ . '/user-agents/safari.txt'
    ];

    /**
     * @var array
     */
    private const AVAILABLE_OS = [
        'Windows',
        'Macintosh',
        'X11'
    ];

    /**
     * @var string
     */
    private $os;

    /**
     * @var string
     */
    private $browser;

    /**
     * @return static
     */
    public static function generate(): static
    {
        return new static;
    }

    /**
     * @param string $os
     *
     * @return self
     */
    public function setOs(string $os = ''): self
    {
        if (!in_array($os, self::AVAILABLE_OS)) {
            throw new \InvalidArgumentException('Invalid Operational System.');
        }

        $this->os = $os;

        return $this;
    }

    /**
     * @param string $browser
     *
     * @return self
     */
    public function setBrowser(string $browser = ''): self
    {
        if (!array_key_exists($browser, self::BROWSER_FILE_PATHS)) {
            throw new \InvalidArgumentException('Invalid Browser.');
        }

        $this->browser = $browser;

        return $this;
    }

    /**
     * @param array $content
     *
     * @return string
     */
    private function getRandomElementFromArray(array $content): string
    {
        return $content[array_rand($content)];
    }

    /**
     * @return void
     */
    private function setRandomOs(): void
    {
        $this->os = $this->getRandomElementFromArray(self::AVAILABLE_OS);
    }

    /**
     * @return void
     */
    private function setRandomBrowser(): void
    {
        $this->browser = $this->getRandomElementFromArray(array_keys(self::BROWSER_FILE_PATHS));
    }

    /**
     * This function reads the content of a file and returns it as an array.
     *
     * @param string $filePath
     *
     * @return array
     */
    private function readFileContent(string $filePath): array
    {
        if (!file_exists($filePath) || !is_readable($filePath)) {
            throw new \Exception("Could not read the user-agent file of the browser {$this->browser}.");
        }

        return file($filePath, FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
    }

    /**
     * This function get user-agent data from a file,
     * filters it based on the operating system,
     * and returns a random user agent that matches the OS.
     *
     * @return string A random user agent string.
     */
    private function getUserAgent(): string
    {
        $filePath = self::BROWSER_FILE_PATHS[$this->browser];

        $browserContent = $this->readFileContent($filePath);

        $availableUserAgents = array_filter($browserContent, function ($ua) {
            return strpos($ua, $this->os) !== false;
        });

        return $this->getRandomElementFromArray($availableUserAgents);
    }

    /**
     * @return string
     */
    public function get(): string
    {
        if (!isset($this->os)) {
            $this->setRandomOs();
        }

        if (!isset($this->browser)) {
            $this->setRandomBrowser();
        }

        return $this->getUserAgent();
    }
}
