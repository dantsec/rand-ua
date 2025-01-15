# Random User-Agent Generator (+2350 UA's) 🤖

> Developed for [**PHP Classes Challenge**](https://www.phpclasses.org/blog/post/372-How-to-Win-a-Big-PHP-ElePHPant-Plush-Mascott-Every-Month-and-Innovation-Award-Certificates.html)!

> The _rand-ua_ project is a user-agent generator designed to provide random user-agent strings for various web browsers. This PHP library allows developers to easily generate random user-agent strings, which can be useful for web scraping, automated testing, and other applications that require varied user-agent headers.

- Key features of rand-ua include:
  - **Support for Multiple Browsers**: Generate user-agent strings for popular browsers such as Chrome, Edge, Firefox, Opera, and Safari;
  - **Random Selection**: Retrieve random user-agent strings to simulate different browsers and platforms;
  - **Customizable Filtering**: Filter user-agent strings based on specific criteria, such as operating system or browser version;
  - **Simple Integration**: Easy to integrate into existing PHP projects with minimal setup.

## Authors 👥

- For more information see my blog and my contributions to community.
  - [**dantsec**](https://www.github.com/dantsec)

## Tech Stack 🧑‍💻

- This project was developed with the following technologies:
  - [**PHP**](https://www.php.net/) (Main Language)
  - [**Composer**](https://getcomposer.org/) (Package Manager)

## Documents 📂

- [**License**](./LICENSE)

## PoC ⚙️

- **Important**: First of all, you must have [**PHP**](https://www.php.net/) and [**Composer**](https://getcomposer.org/) utilitary installed; 
- **Run**: `composer dump-autoload && php poc.php`.

```php
<?php

// Composer autoloader.
require __DIR__ . '/vendor/autoload.php';

// Module namespace.
use Dant\RandUa\UserAgentGenerator;

// Get user-agent based on specified OS and Browser (both are optional).
$specific_ua = UserAgentGenerator::generate()
    ->setOs('Windows')
    ->setBrowser('Edge')
    ->get();

// Get random user-agent.
$random_ua = UserAgentGenerator::generate()->get();

echo $specific_ua . PHP_EOL;
echo $random_ua . PHP_EOL;

// Possible output:
// Mozilla/5.0 (Windows NT 10.0; Win64; x64) ... Edge/12.246
// Opera/9.21 (Windows NT 5.1; U; MEGAUPLOAD 1.0; en)
```

## Probabilities of each OS / Browser 🎲

### General

- **Total**: 2360

| Operational System  | Quantity   | Ratio       | Percentage | Command                                                          |
| ------------------- | ---------- | ----------- | ---------- | ---------------------------------------------------------------- |
| Windows             | 1218       | 1218 / 2360 | 51,6%      | `UserAgentGenerator::create()->getUserAgent('Windows')`          |
| Macintosh           | 561        | 561 / 2360  | 23,7%      | `UserAgentGenerator::create()->getUserAgent('Macintosh')`        |
| X11 (Unix)          | 581        | 581 / 2360  | 24,6%      | `UserAgentGenerator::create()->getUserAgent('X11')`              |

### Chrome

- **Total**: 600

| Operational System  | Quantity   | Ratio     | Percentage | Command                                                             |
| ------------------- | ---------- | --------- | ---------- | ------------------------------------------------------------------- |
| Windows             | 284        | 284 / 600 | 47,3%      | `UserAgentGenerator::create()->getUserAgent('Windows', 'chrome')`   |
| Macintosh           | 122        | 122 / 600 | 20,3%      | `UserAgentGenerator::create()->getUserAgent('Macintosh', 'chrome')` |
| X11 (Unix)          | 194        | 194 / 600 | 32,3%      | `UserAgentGenerator::create()->getUserAgent('X11', 'chrome')`       |

### Edge

- **Total**: 8

| Operational System  | Quantity   | Ratio     | Percentage | Command                                                           |
| ------------------- | ---------- | --------- | ---------- | ----------------------------------------------------------------- |
| Windows             | 6          | 6 / 8     | 75%        | `UserAgentGenerator::create()->getUserAgent('Windows', 'edge')`   |
| Macintosh           | 1          | 1 / 8     | 12,5%      | `UserAgentGenerator::create()->getUserAgent('Macintosh', 'edge')` |
| X11 (Unix)          | 1          | 1 / 8     | 12,5%      | `UserAgentGenerator::create()->getUserAgent('X11', 'edge')`       |

### Firefox

- **Total**: 589

| Operational System  | Quantity   | Ratio     | Percentage | Command                                                             |
| ------------------- | ---------- | --------- | ---------- | --------------------------------------------------------------------|
| Windows             | 329        | 329 / 589 | 55,8%      | `UserAgentGenerator::create()->getUserAgent('Windows', 'firefox')`  |
| Macintosh           | 25         | 25 / 589  | 4,2%       | `UserAgentGenerator::create()->getUserAgent('Macintosh', 'firefox')`|
| X11 (Unix)          | 235        | 235 / 589 | 39,8%      | `UserAgentGenerator::create()->getUserAgent('X11', 'firefox')`      |

### Opera

- **Total**: 586

| Operational System  | Quantity   | Ratio     | Percentage | Command                                                            |
| ------------------- | ---------- | --------- | ---------- | ------------------------------------------------------------------ |
| Windows             | 415        | 415 / 586 | 70,8%      | `UserAgentGenerator::create()->getUserAgent('Windows', 'opera')`   |
| Macintosh           | 23         | 23 / 586  | 3,9%       | `UserAgentGenerator::create()->getUserAgent('Macintosh', 'opera')` |
| X11 (Unix)          | 148        | 148 / 586 | 25,2%      | `UserAgentGenerator::create()->getUserAgent('X11', 'opera')`       |

### Safari

- **Total**: 577

| Operational System  | Quantity   | Ratio     | Percentage | Command                                                             |
| ------------------- | ---------- | --------- | ---------- | ------------------------------------------------------------------- |
| Windows             | 184        | 184 / 577 | 31,8%      | `UserAgentGenerator::create()->getUserAgent('Windows', 'safari')`   |
| Macintosh           | 390        | 390 / 577 | 67,5%      | `UserAgentGenerator::create()->getUserAgent('Macintosh', 'safari')` |
| X11 (Unix)          | 3          | 3 / 577   | 0,5%       | `UserAgentGenerator::create()->getUserAgent('X11', 'safari')`       |

## Contributing 🛠️

```bash
# Create a fork from the original repository and clone it.
git clone https://github.com/dantsec/rand-ua.git
# Enter into the project folder.
cd rand-ua/
# Create a new branch with the name feat-[BRANCH_NAME].
git checkout -b feat/[BRANCH_NAME]
# Make your changes and commit them.
git add . && git commit -m "YOUR_COMMIT_MESSAGE"
# Push your branch and open a pull request.
git push origin feat-[BRANCH_NAME]
```
