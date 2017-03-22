<?php
class core {
	static function loadPage($url) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch);
		curl_close($ch);
		return $result;
	}
	
	static function getPage($a, $b) {
		list($page, $value) = array(
			strtolower($a),
			strtolower($b)
		);
		$getParams = json_decode(file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'params.json'), true);
		if(empty($page) || !array_key_exists($page, $getParams)) {
			return false;
		}
		$newURL = 'https://api.mundosmilies.com/' . $page . '.php?' . $getParams[$page] . '=' . urlencode($value);
		$getResult = self::loadPage($newURL);
		if(empty($getResult)) {
			return false;
		}
		$getJson = json_decode($getResult, true);
		if(is_null($getJson)) {
			return false;
		}
		return $getJson;
	}
	
	static function wikiSanatize($text) {
		$finalText = str_replace(
			array(
				'GROUP POWER.',
				'LIMITED.',
				'$WIKIP.',
				'$WIKI.'
			), 
			'', 
			$text
		);
		return $finalText;
	}
}