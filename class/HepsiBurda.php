<?php


class HepsiBurda  implements ParserInterFace
{
    public static function parse($html)
    {
        $old = $html->find('#originalPrice', 0);
        $old = $old ? $old->plaintext: null;
        $new = $html->find('#offering-price', 0);
        $new = $new ? $new->plaintext: null;
        return  compact('old', 'new');
    }
}