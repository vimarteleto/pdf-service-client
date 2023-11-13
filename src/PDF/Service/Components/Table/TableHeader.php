<?php

namespace PDF\Service\Components\Table;

use InvalidArgumentException;

class TableHeader
{
    public $tableHeaders;

    public function __construct(array $tableHeaders)
    {
        $this->tableHeaders = $tableHeaders;
    }

    private function validate($tableHeader): void
    {
        if (gettype($tableHeader) !== 'string') {
            throw new InvalidArgumentException('Table header must be a string');
        }
    }

    public function toArray(): array
    {
        $data = [];
        foreach ($this->tableHeaders as $tableHeader) {
            $this->validate($tableHeader);
            $data[] = $tableHeader;
        }
        return $data;
    }
}
