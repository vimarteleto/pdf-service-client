<?php

namespace PDF\Service\Components\Table;

use InvalidArgumentException;
use PDF\Service\Components\Component;

class Table extends Component
{
    /** @var TableTitle $title */
    public $title;

    /** @var TableHeader $tableHeader */
    public $tableHeader;

    /** @var TableWidths $tableWidths */
    public $tableWidths;

    /** @var TableSection[] $tableSections */
    public $tableSections;

    /**
     * @param TableTitle $title
     * @param TableHeader $tableHeader
     * @param TableWidths $tableWidths
     * @param TableSection[] $tableSections
     **/
    public function __construct(
        TableTitle $title,
        TableHeader $tableHeader,
        TableWidths $tableWidths,
        array $tableSections = []
    ) {
        $this->title = $title;
        $this->tableHeader = $tableHeader;
        $this->tableWidths = $tableWidths;
        $this->tableSections = $tableSections;
        $this->validate();
    }

    private function validate(): void
    {
        $tableHeaderCount = count($this->tableHeader->toArray());
        if ($tableHeaderCount != count($this->tableWidths->toArray())) {
            throw new InvalidArgumentException(
                'Table widths and table header data must have the same count'
            );
        }
        foreach ($this->tableSections as $tableSection) {
            /** @var TableSection $tableSection */
            foreach ($tableSection->toObject()->rows as $tableSectionRow) {
                if ($tableHeaderCount != count($tableSectionRow)) {
                    throw new InvalidArgumentException(
                        'Table row and table header data must have the same count'
                    );
                }
            }
        }
    }

    public function toObject(): object
    {
        return (object) [
            'component' => 'table',
            'text' => (string) $this->title,
            'headers' => $this->tableHeader->toArray(),
            'widths' => $this->tableWidths->toArray(),
            'tables' => array_map(function ($tableSection) {
                return $tableSection->toObject();
            }, $this->tableSections)

        ];
    }

    public function addTableSection(TableSection $tableSection)
    {
        $this->tableSections[] = $tableSection;
    }
}
