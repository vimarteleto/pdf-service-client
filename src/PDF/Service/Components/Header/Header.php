<?php

namespace PDF\Service\Components\Header;

use PDF\Service\Components\Component;
use PDF\Service\Components\Common\Text;
use PDF\Service\Components\Common\Image;

class Header extends Component
{
    /** @var Text $text */
    public $text;

    /** @var Image $url */
    public $url;

    /**
     * @param Text $text
     * @param Image $url
     **/
    public function __construct(Text $text, Image $url)
    {
        $this->text = $text;
        $this->url = $url;
    }

    public function toObject(): object
    {
        return (object) [
            'component' => 'header',
            'text' => (string) $this->text,
            'url' => (string) $this->url,
        ];
    }
}
