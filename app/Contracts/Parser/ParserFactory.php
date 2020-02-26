<?php

namespace App\Contracts\Parser;

use ErrorException;
use Exception;

class ParserFactory
{

    public static function getParserType(String $stringData): ParserInterface
    {
        if (self::isJson($stringData)) {
            return new JsonParser($stringData);
        }

        if(self::isXml($stringData)){
            return new XmlParser($stringData);
        }

        throw new Exception("Unknown string data");
    }

    private static function isJson(String $stringData): bool
    {
        json_decode($stringData);
        return (json_last_error() == JSON_ERROR_NONE);
    }

    private static function isXml(String $stringData): bool
    {
        $isXml = null;
        try {
            simplexml_load_string($stringData);
            $isXml = true;
        } catch (ErrorException $e) {
            $isXml = false;
        }
        return $isXml;
    }
}
