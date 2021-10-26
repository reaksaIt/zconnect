<?php

function about($key){
    $about = App\About::where('key','=',$key)->select('value')->first();
    return $about->value;
}

?>