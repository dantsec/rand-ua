<?php

namespace Dant\RandUa;

class UserAgentGenerator
{
    /**
     * Array defining browser names and their corresponding user-agent file paths.
     * Each browser name is associated with a file path pointing to a text file containing user-agent strings.
     * 
     * @var array
     */
    private $browsers = [
        'chrome' => __DIR__ . '/user-agents/chrome.txt',
        'edge' => __DIR__ . '/user-agents/edge.txt',
        'firefox' => __DIR__ . '/user-agents/firefox.txt',
        'opera' => __DIR__ . '/user-agents/opera.txt',
        'safari' => __DIR__ . '/user-agents/safari.txt',
    ];

    /**
     * Creates and returns a new instance of the class using the late static binding.
     *
     * Example usage:
     * ```
     * $uagen = UserAgentGenerator::create();
     * ```
     *
     * @return static A new instance of the class.
     */
    public static function create()
    {
        return new static();
    }

    /**
     * Returns a randomly selected element from the given array.
     *
     * @param array $content The array from which to select a random element.
     * @return string The randomly selected element from the array, or an empty string if the array is empty.
     */
    private function getRandomElementFromArray(array $content = []): string
    {
        if (empty($content)) {
            die('The provided array is empty. Cannot select a random element.');
        }

        return $content[rand(0, count($content) - 1)];
    }

    /**
     * Opens a user agent file and returns its contents as an array.
     *
     * @param string $browser The name of the browser whose user agent file should be opened.
     * @return array An array of strings, each representing a user agent string from the file.
     */
    private function openUserAgentFile(string $browser = ''): array
    {
        if (!isset($this->browsers[$browser])) {
            die("Browser key '$browser' does not exist in the browsers array.");
        }

        $filePath = $this->browsers[$browser];

        if (!file_exists($filePath)) {
            die("The file '$filePath' does not exist.");
        }

        if (!is_readable($filePath)) {
            die("The file '$filePath' is not readable.");
        }

        $fileContent = file(
            $filePath,
            FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES
        );

        if (empty($fileContent) || !$fileContent) {
            die("The file '$filePath' is empty.");
        }

        return $fileContent;
    }

    /**
     * Retrieves a random user-agent string based on the specified operating system and browser.
     *
     * This method retrieves a user-agent string for a specified browser. If no browser is specified,
     * it selects a random one from the available browsers. Optionally, you can filter the user-agents
     * by a specified operating system substring (Windows, Macintosh or X11).
     * It reads user-agent strings from a file associated with the specified browser, and if an operating system
     * is provided, it filters the user-agent strings to include only those containing the specified OS substring
     * before returning a random one.
     *
     * Example usage:
     * ```php
     * $uagen = UserAgentGenerator::create()->getUserAgent('Windows', 'edge');
     * ```
     *
     * @param string $os Optional. The substring of the operating system to filter user-agent strings by.
     *                    If provided, only user-agent strings containing this substring will be considered.
     *                    If not provided, no filtering by OS is performed.
     * @param string $browser Optional. The name of the browser to retrieve a user-agent for.
     *                        If not provided, a random browser from the available list will be selected.
     *                        Possible values are 'chrome', 'edge', 'firefox', 'opera', 'safari'.
     * @return string A randomly selected user-agent string that matches the specified criteria.
     *                If no matching user-agent is found, an empty string may be returned.
     */
    public function getUserAgent(string $os = '', string $browser = ''): string
    {
        if (!$browser) {
            $avaiable_browsers = array_keys($this->browsers);

            $browser = $this->getRandomElementFromArray($avaiable_browsers);
        }

        $agents = $this->openUserAgentFile($browser);

        if ($os) {
            $agents = array_filter($agents, function ($ua) use ($os) {
                return strpos($ua, $os) == true;
            });
        }

        return $this->getRandomElementFromArray(array_values($agents));
    }

    /**
     * Retrieves a randomly selected user-agent string from a randomly chosen browser.
     *
     * This method randomly selects a browser from the available browsers defined in
     * the class property `$browsers`. It then reads the user-agent strings from the
     * corresponding file associated with the randomly chosen browser and returns
     * a randomly selected user-agent string from that file.
     *
     * Example usage:
     * ```
     * $uagen = UserAgentGenerator::create()->getRandomUserAgent();
     * ```
     *
     * @return string A randomly selected user-agent string from a randomly chosen browser.
     */
    public function getRandomUserAgent(): string
    {
        $avaiable_browsers = array_keys($this->browsers);

        $rand_browser = $this->getRandomElementFromArray($avaiable_browsers);

        $agents = $this->openUserAgentFile($rand_browser);

        return $this->getRandomElementFromArray($agents);
    }
}
