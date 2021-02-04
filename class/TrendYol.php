<?php

class TrendYol implements ParserInterFace {

    public static function parse($html)
    {
        $old = $html->find('.prc-org', 0);
        $old = $old ? $old->plaintext: null;
        $new = $html->find('.prc-slg', 0);
        $new = $new ? $new->plaintext: null;
        return  compact('old', 'new');
    }
}
