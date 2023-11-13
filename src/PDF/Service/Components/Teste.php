<?php

namespace PDF\Service\Components;

use PDF\Service\Document;
use PDF\Service\Components\Common\Text;
use PDF\Service\Components\Table\Table;
use PDF\Service\Components\Common\Image;
use PDF\Service\Components\Header\Header;
use PDF\Service\Components\Table\TableRow;
use PDF\Service\Components\Breaker\Breaker;
use PDF\Service\Components\Table\TableTitle;
use PDF\Service\Components\Table\TableHeader;
use PDF\Service\Components\Table\TableWidths;
use PDF\Service\Components\Table\TableSection;
use PDF\Service\Components\Table\TableSubtitle;

class Teste
{
    public function get()
    {
        $document = new Document();

        $header = new Header(
            new Text('RELATORIO TESTE'),
            new Image(
                'https://www.futuraexpress.com.br/blog/wp-content/uploads/2020/03/Exemplo-de-Logotipo-7.jpg'
            )
        );
        $document->addComponent($header);

        $table = new Table(
            new TableTitle('Título de tabela teste'),
            new TableHeader(['#', 'Nome', 'Profissão']),
            new TableWidths(['20%', 'auto', '*'])
        );

        $tableSectionBRL = new TableSection(
            new TableSubtitle('BRL')
        );
        $tableSectionBRL->addTableRow(new TableRow(['1', 'Vinicius', 'Desenvolvedor']));
        $tableSectionBRL->addTableRow(new TableRow(['1', 'Vinicius', 'Desenvolvedor']));
        $tableSectionBRL->addTableRow(new TableRow(['1', 'Vinicius', 'Desenvolvedor']));
        $tableSectionBRL->addTableRow(new TableRow(['1', 'Vinicius', 'Desenvolvedor']));

        $tableSectionEUR = new TableSection(
            new TableSubtitle('EUR')
        );
        $tableSectionEUR->addTableRow(new TableRow(['2', 'Vinicius', 'Desenvolvedor']));
        $tableSectionEUR->addTableRow(new TableRow(['2', 'Vinicius', 'Desenvolvedor']));
        $tableSectionEUR->addTableRow(new TableRow(['2', 'Vinicius', 'Desenvolvedor']));
        $tableSectionEUR->addTableRow(new TableRow(['2', 'Vinicius', 'Desenvolvedor']));

        $table->addTableSection($tableSectionEUR);
        $table->addTableSection($tableSectionEUR);

        $document->addComponent($table);
        $document->addComponent(new Breaker());

        return $document->send();
    }
}
