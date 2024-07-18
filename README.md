# Random User-Agent Generator 🤖

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

// Get user-agent based on specified OS and Browser.
$specific_ua = UserAgentGenerator::create()->getUserAgent('Windows', 'edge');
// Get random user-agent.
$random_ua = UserAgentGenerator::create()->getRandomUserAgent();

// Possible output: Mozilla/5.0 (Windows NT 10.0) ...
```

## Contributing 🛠️

```bash
# Create a fork from the original repository and clone it.
git clone https://github.com/dantsec/rand-ua.git
# Enter into the project folder.
cd rand-ua/
# Create a new branch with the name feat-[BRANCH_NAME].
git checkout -b feat-[BRANCH_NAME]
# Make your changes and commit them.
git add . && git commit -m "YOUR_COMMIT_MESSAGE"
# Push your branch and open a pull request.
git push origin feat-[BRANCH_NAME]
```
