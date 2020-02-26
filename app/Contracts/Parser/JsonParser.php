<?php

namespace App\Contracts\Parser;

final class JsonParser implements ParserInterface
{
    private $data;

    public function __construct($data)
    {
        $this->data = collect(json_decode($data)->elements);
    }

    public function parse(): array
    {
        $players = [];

        $getPlayerFields = function ($data) use (&$players) {
            $players[] = [
                'first_name' => $data->first_name,
                'second_name' => $data->second_name,
                'form' => $data->form,
                'total_points' => $data->total_points,
                'influence' => $data->influence,
                'creativity' => $data->creativity,
                'threat' => $data->threat,
                'ict_index' => $data->ict_index
            ];
        };

        $this->data->each($getPlayerFields);

        return $players;
    }
}
