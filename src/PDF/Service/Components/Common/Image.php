<?php

namespace PDF\Service\Components\Common;

use InvalidArgumentException;

class Image
{
    public $url;

    public function __construct(string $url)
    {
        $this->url = $url;
        $this->validate();
    }

    private function validate(): void
    {
        if (!filter_var($this->url, FILTER_VALIDATE_URL)) {
            throw new InvalidArgumentException('Invalid URL');
        }
    }

    public function __toString()
    {
        return $this->url;
    }
}
