<?php

namespace PDF\Service;

use Carbon\Carbon;
use Illuminate\Support\Str;
use InvalidArgumentException;
use PDF\Service\Components\Component;
use Illuminate\Support\Facades\Storage;

class Document
{
    public $components;

    /**
     * @param Component[] $components
     **/
    public function __construct(array $components = [])
    {
        $this->components = $components;
    }

    private function validade($component)
    {
        if (!$component instanceof Component) {
            throw new InvalidArgumentException('Document must have Component parameters only');
        }
    }

    public function toJson()
    {
        $document = [];
        foreach ($this->components as $component) {
            $this->validade($component);
            $document[] = $component->toObject();
        }
        return json_encode($document);
    }

    public function addComponent(Component $component)
    {
        $this->components[] = $component;
    }

    public function send()
    {
        // verificar como esses dados vao chegar,
        // talvez componente de metadados
        $initialDate = '1/1/2001';
        $finalDate = '1/1/2001';
        $bucket = 's3-pdf-service-bucket-trigger';
        $userId = 123;
        $isGm = 0;

        Storage::disk($bucket)->put(
            Str::uuid()->toString(),
            $this->toJson(),
            [
                'Metadata' => [
                    'user' => (string) $userId,
                    'initialDate' => Carbon::parse($initialDate)->format('d/m/Y'),
                    'finalDate' => Carbon::parse($finalDate)->format('d/m/Y'),
                    'godmode' => $isGm
                ]
            ]
        );
    }
}
