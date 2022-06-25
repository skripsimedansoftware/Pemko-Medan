<?php
$base_url = 'https://medandenai.pemkomedan.go.id/web/';
preg_match('/(index\.php)(.*)/i', $_SERVER['REQUEST_URI'], $uri_to_forward);

if (!empty($uri_to_forward[2])) {
	$html = file_get_contents($base_url.ltrim($uri_to_forward[2], '/'));
} else {
	$html = file_get_contents($base_url);
}

preg_match_all("/(http|ftp|https):\/\/([\w_-]+(?:(?:\.[\w_-]+)+))([\w.,@?^=%&:\/~+#-]*[\w@?^=%&\/~+#-])/i", $html, $matches);

foreach ($matches[0] as $url) {
	if (!preg_match('/medandenai\.pemkomedan\.go\.id\/web\/(assets)/', $url)) {
		preg_match('/medandenai\.pemkomedan\.go\.id\/web\/(.*)/', $url, $matches_url);
		if (!empty($matches_url) && !empty($matches_url[1])) {
			$html = str_replace($url, $_SERVER['SCRIPT_NAME'].'/'.$matches_url[1], $html);
		}
	}
}

$find = 'Alamat Kantor Lurah : Jl. Medan Tenggara Gg. Rahmat I Medan';
$html = str_replace($find, $find."<br>Website : <a href='https://kelurahan-menteng.medandenai.pemkomedan.my.id'>Website Kelurahan Menteng</a>", $html);

echo $html;