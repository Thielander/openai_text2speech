# OpenAI Text-to-Speech PHP Library

This library provides a simple PHP interface to OpenAI's Text-to-Speech API. It allows you to convert text to speech using various voices provided by OpenAI.

## Installation

You can install the package via composer:

```bash
composer require thielander/text2speech
```

## Usage
Here's a simple example of how to use the library:

```php
<?php

require_once 'vendor/autoload.php';

use Thielander\Text2Speech\ChatGPT;

$text = 'YOUR TEXT';
$chatGPT = new ChatGPT('nova');
$chatGPT->getSoundfile('test', $text);

```
This will generate a sound file from the provided text.

## Available Voices
alloy
echo
fable
onyx
nova
shimmer

## Supported Languages
The library supports a wide range of languages, including but not limited to English, German, Spanish, French, and many more.

##  License
This library is open-sourced software licensed under the MIT license.