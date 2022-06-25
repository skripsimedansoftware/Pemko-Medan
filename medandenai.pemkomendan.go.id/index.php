<?php

$base_url = 'https://medandenai.pemkomedan.go.id';

$html_base_url = file_get_contents($base_url);
$html_base_url = str_replace('href="web"', 'href="web/"', $html_base_url);
$html_base_url = str_replace(['js/', 'css/', 'img/', 'vid/', 'fonts/'], [$base_url.'/js/', $base_url.'/css/', $base_url.'/img/', $base_url.'/vid/', $base_url.'/fonts/'], $html_base_url);
echo $html_base_url;
?>