<?php

namespace PDF\Service\Components\Table;

class TableSection
{
    /** @var ?TableSubtitle $subtitle */
    public $subtitle;

    /** @var TableRow $text */
    public $rows;

    /**
     * @param TableSubtitle $subtitle
     * @param TableRow[] $rows
     **/
    public function __construct(?TableSubtitle $subtitle, array $rows = [])
    {
        $this->subtitle = $subtitle;
        $this->rows = $rows;
    }

    public function toObject(): object
    {
        return (object) [
            'subtitle' => (string) $this->subtitle,
            'rows' => array_map(function ($row) {
                return $row->toArray();
            }, $this->rows)
        ];
    }

    public function addTableRow(TableRow $row)
    {
        $this->rows[] = $row;
    }
}
