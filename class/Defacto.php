<?php

class Defacto implements ParserInterFace {

    public static function parse($html)
    {
        $old = $html->find('.product-info-prices-old', 0);
        $old = $old ? $old->plaintext: null;
        $new = $html->find('.product-info-prices-new', 0);
        $new = $new ? $new->plaintext: null;
        return  compact('old', 'new');
    }
}
