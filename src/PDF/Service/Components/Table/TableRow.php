<?php

namespace PDF\Service\Components\Table;

use InvalidArgumentException;

class TableRow
{
    public $tableRow;

    public function __construct(array $tableRow)
    {
        $this->tableRow = $tableRow;
    }

    private function validate($tableRow): void
    {
        if (is_null($tableRow)) {
            throw new InvalidArgumentException('Table row data must be valid');
        }
    }

    public function toArray(): array
    {
        $data = [];
        foreach ($this->tableRow as $tableRow) {
            $this->validate($tableRow);
            $data[] = $tableRow;
        }
        return $data;
    }
}
