<?php

namespace PDF\Service\Components\Common;

class Subtitle
{
    public $subtitle;

    public function __construct(string $subtitle)
    {
        $this->subtitle = $subtitle;
    }

    public function __toString()
    {
        return $this->subtitle;
    }
}
