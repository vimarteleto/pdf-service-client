<?php

namespace PDF\Service\Components\Table;

use InvalidArgumentException;

class TableWidths
{
    public $tableWidths;

    public function __construct(array $tableWidths)
    {
        $this->tableWidths = $tableWidths;
    }

    private function validate($tableWidth): void
    {
        if (
            $tableWidth !== '*'
            && $tableWidth !== 'auto'
            && !preg_match('/^\d+%$/', $tableWidth)
        ) {
            throw new InvalidArgumentException("Table width must be a valid width value");
        }
    }

    public function toArray(): array
    {
        $data = [];
        foreach ($this->tableWidths as $tableWidth) {
            $this->validate($tableWidth);
            $data[] = $tableWidth;
        }
        return $data;
    }
}
