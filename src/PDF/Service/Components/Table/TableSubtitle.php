<?php

namespace PDF\Service\Components\Table;

class TableSubtitle
{
    public $title;

    public function __construct(string $title)
    {
        $this->title = $title;
    }

    public function __toString()
    {
        return $this->title;
    }
}
