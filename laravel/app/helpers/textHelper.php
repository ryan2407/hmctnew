<?php

function excerpt($content, $wordcount) {
    $words = explode(" ", $content);
    return implode(" ", array_splice($words, 0, $wordcount));
}
