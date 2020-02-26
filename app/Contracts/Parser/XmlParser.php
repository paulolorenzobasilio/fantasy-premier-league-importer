<?php

namespace App\Contracts\Parser;

final class XmlParser implements ParserInterface
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function parse(): array
    {
        // TODO: XML Import
        return [];
    }
}
