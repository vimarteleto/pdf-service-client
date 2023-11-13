<?php

namespace PDF\Service\Components\Breaker;

use PDF\Service\Components\Component;

class Breaker extends Component
{
    public function toObject()
    {
        return (object) [
            'component' => 'breaker'
        ];
    }
}
