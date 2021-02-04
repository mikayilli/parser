<?php


class Parser
{
    public function __construct(ParserInterFace $paser, $html)
    {
        print_r($paser->parse($html));
    }
}