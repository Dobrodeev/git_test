<?php
declare( strict_types=1 );
/**
 * @copyright Valera Dobrodeev
 * @license MIT
 * @link
 * @see
 * Тестовое задание на должность Програміст (Middle PHP, PostgresSQL), Добродеев Валерий
 * На выполнения данного задания 2 дня.
 * Тестове завдання:
 * SQL
 * Дано:
 * create table t1(id_region integer, asin text, price numeric(20,6));
 * create table t2(asin text, title text);
 *
 * insert into t1 values (1,'B007',11.40), (2,'B007',11.50), (2,'B008',13.01);
 * "insert into t2 values ('B007',’a11’), ('B008',’a22’);
 *
 * ключевой связи между t1 и t2 - нет.
 *
 * 1) вывести одним sql-запросом id_region, title, price
 * 2) исходя из п.1 предложить индексы для t1 и t2
 * 3) вывести одним sql-запросом title, для которого существуют более одной цены
 * 4) возможно применить DELETE или TRUNCATE с одинаковым эффектом. что примените и почему?
 *
 * PHP
 * 1) выяснить какой из двух массивов короче и обрезать его, чтобы оба массива были равной длины
 * 2) отсортировать массив по значениям
 * 3) строка $postfix добавляемая в последствии к url имеет текстовый формат json. преобразовать $postfix так, чтобы после присоединения к url не возникло ошибок связанных со спецсимволами в url
 * 4) у вас есть $api_url. Сформируйте и запустите curl GET запрос по данному адресу, в котором явно указано, что ответ должен быть получен за 120 сек.
 */

// массив курсов криптовалют
$array = [ 'etc' => 0.03453, 'eth' => 0.5435, 'sibcoin' => 0.3232, 'dogcoin' => 0.034, 'altcoin' => 1.0433 ];
$parts = [ 'applecoin' => 0.0002, 'pear' => 0.0032, 'banancoin' => 2.430 ];

//require __DIR__ . '/vendor/autoload.php';
require '../vendor/autoload.php';

// create a variable, which could be anything!
$someVar = $array;

/**
 * выяснить какой из двух массивов короче и обрезать его, чтобы оба массива были равной длины
 *
 * @param  array  $array1
 * @param  array  $array2
 *
 * @return array
 */
function changeArray( array $array1, array $array2 ): array {
	// ternary operator 5 > 3
	if ( count( $array1 ) > count( $array2 ) ) {
		$output = array_slice( $array1, 0, count( $array2 ) );
	} elseif ( count( $array1 ) < count( $array2 ) ) {
		$output = array_slice( $array2, 0, count( $array1 ) );
	} else {
		return $array1;
	}

	return $output;
}

$result = changeArray( $array, $parts );
dump( $result );
/**
 * отсортировать массив по значениям
 *
 * @param  array  $array
 */
function sortingArray( array $array ) {
	sort( $array );
	foreach ( $array as $key => $val ) {
		echo "$key=>" . $val . ", ";
	}
}

sortingArray( $array );
$url     = 'https://api.seolib.ru/account/balance';
$params  = [ 'key' => 'YOUR_API_KEY' ];
$postfix = array(
	"first_name" => "First name",
	"last_name"  => "last name",
	"email"      => "email@gmail.com",
	"addresses"  => array(
		"address1"   => "some address",
		"city"       => "city",
		"country"    => "CA",
		"first_name" => "Mother",
		"last_name"  => "Lastnameson",
		"phone"      => "555-1212",
		"province"   => "ON",
		"zip"        => "123 ABC"
	)
);

/**
 * строка $postfix добавляемая в последствии к url имеет текстовый формат json. преобразовать $postfix так,
 * чтобы после присоединения к url не возникло ошибок связанных со спецсимволами в url
 *
 * @param  string  $url
 * @param  string  $postfix
 */
function changeUrl( string $url, string $postfix ) {
	$data_string = json_encode( $postfix );
	$ch          = curl_init( $url );
	curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, "POST" );
	curl_setopt( $ch, CURLOPT_POSTFIELDS, array( "customer" => $data_string ) );
	curl_setopt( $ch, CURLOPT_HEADER, true );
	curl_setopt( $ch, CURLOPT_HTTPHEADER,
		array(
			'Content-Type:application/json',
			'Content-Length: ' . strlen( $data_string )
		)
	);

	$result = curl_exec( $ch );
	curl_close( $ch );
}

/**
 *
 */
const TIMEOUT = 120;

/**
 * у вас есть $api_url. Сформируйте и запустите curl GET запрос по данному адресу,
 * в котором явно указано, что ответ должен быть получен за 120 сек.
 *
 * @param  string  $api_url
 */
function curlGet( string $api_url ) {
	$ch                        = curl_init();
	$postString                = '';
	$headers["Content-Length"] = strlen( $postString );
	$headers["User-Agent"]     = "Curl/1.0";

	curl_setopt( $ch, CURLOPT_URL, $api_url );
	curl_setopt( $ch, CURLOPT_HEADER, false );
	curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	curl_setopt( $ch, CURLOPT_USERPWD, 'admin:' );
	curl_setopt( $ch, CURLOPT_TIMEOUT, TIMEOUT );
	$response = curl_exec( $ch );
	curl_close( $ch );
}
