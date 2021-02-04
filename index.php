<form action="" method="post">
    <label for="">Url Daxil edin</label>
    <input type="url" name="url">
    <button type="submit">submit</button>
</form>

<?php

if(isset($_POST['url'])) {
    include_once("simple_html_dom.php");

    spl_autoload_register(function ($class_name) {
        include_once "class/". $class_name . '.php';
    });

    $url = $_POST['url'];

    $arr = explode('/', $url);

    if($arr[2] === 'www.defacto.com.tr') {
        $site = 'Defacto';
//    print_r($output);
    }else if($arr[2] === 'www.hepsiburada.com') {
        $site = 'HepsiBurda';
    }
    else if($arr[2] === 'www.trendyol.com') {
        $site = 'TrendYol';
    }
    else {
        die("product not found");
    }

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:85.0) Gecko/20100101 Firefox/85.0");
    $output = curl_exec($ch);

    curl_close($ch);

    if(!$output) {
        die("product not found");
    }

    new Parser(new $site, str_get_html($output));
}



