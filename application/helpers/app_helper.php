<?php
defined('BASEPATH') OR exit('No direct script access allowed');


function currency_format($value){
   return number_format($value, 2, '.', '');
}

function currencies_list(){
    $currencies = [
        'AFN' => [ 'name' => 'Afghani', 'symbol' => '؋' ],
        'ALL' => [ 'name' => 'Lek', 'symbol' => 'Lek' ],
        'ANG' => [ 'name' => 'Netherlands Antillian Guilder', 'symbol' => 'ƒ' ],
        'ARS' => [ 'name' => 'Argentine Peso', 'symbol' => '$' ],
        'AUD' => [ 'name' => 'Australian Dollar', 'symbol' => '$' ],
        'AWG' => [ 'name' => 'Aruban Guilder', 'symbol' => 'ƒ' ],
        'AZN' => [ 'name' => 'Azerbaijanian Manat', 'symbol' => 'ман' ],
        'BAM' => [ 'name' => 'Convertible Marks', 'symbol' => 'KM' ],
        'BBD' => [ 'name' => 'Barbados Dollar', 'symbol' => '$' ],
        'BGN' => [ 'name' => 'Bulgarian Lev', 'symbol' => 'лв' ],
        'BMD' => [ 'name' => 'Bermudian Dollar', 'symbol' => '$' ],
        'BND' => [ 'name' => 'Brunei Dollar', 'symbol' => '$' ],
        'BOB' => [ 'name' => 'BOV Boliviano Mvdol', 'symbol' => '$b' ],
        'BRL' => [ 'name' => 'Brazilian Real', 'symbol' => 'R$' ],
        'BSD' => [ 'name' => 'Bahamian Dollar', 'symbol' => '$' ],
        'BWP' => [ 'name' => 'Pula', 'symbol' => 'P' ],
        'BYR' => [ 'name' => 'Belarussian Ruble', 'symbol' => 'p.' ],
        'BZD' => [ 'name' => 'Belize Dollar', 'symbol' => 'BZ$' ],
        'CAD' => [ 'name' => 'Canadian Dollar', 'symbol' => '$' ],
        'CHF' => [ 'name' => 'Swiss Franc', 'symbol' => 'CHF' ],
        'CLP' => [ 'name' => 'CLF Chilean Peso Unidades de fomento', 'symbol' => '$' ],
        'CNY' => [ 'name' => 'Yuan Renminbi', 'symbol' => '¥' ],
        'COP' => [ 'name' => 'COU Colombian Peso Unidad de Valor Real', 'symbol' => '$' ],
        'CRC' => [ 'name' => 'Costa Rican Colon', 'symbol' => '₡' ],
        'CUP' => [ 'name' => 'CUC Cuban Peso Peso Convertible', 'symbol' => '₱' ],
        'CZK' => [ 'name' => 'Czech Koruna', 'symbol' => 'Kč' ],
        'DKK' => [ 'name' => 'Danish Krone', 'symbol' => 'kr' ],
        'DOP' => [ 'name' => 'Dominican Peso', 'symbol' => 'RD$' ],
        'EGP' => [ 'name' => 'Egyptian Pound', 'symbol' => '£' ],
        'EUR' => [ 'name' => 'Euro', 'symbol' => '€' ],
        'FJD' => [ 'name' => 'Fiji Dollar', 'symbol' => '$' ],
        'FKP' => [ 'name' => 'Falkland Islands Pound', 'symbol' => '£' ],
        'GBP' => [ 'name' => 'Pound Sterling', 'symbol' => '£' ],
        'GIP' => [ 'name' => 'Gibraltar Pound', 'symbol' => '£' ],
        'GTQ' => [ 'name' => 'Quetzal', 'symbol' => 'Q' ],
        'GYD' => [ 'name' => 'Guyana Dollar', 'symbol' => '$' ],
        'HKD' => [ 'name' => 'Hong Kong Dollar', 'symbol' => '$' ],
        'HNL' => [ 'name' => 'Lempira', 'symbol' => 'L' ],
        'HRK' => [ 'name' => 'Croatian Kuna', 'symbol' => 'kn' ],
        'HUF' => [ 'name' => 'Forint', 'symbol' => 'Ft' ],
        'IDR' => [ 'name' => 'Rupiah', 'symbol' => 'Rp' ],
        'ILS' => [ 'name' => 'New Israeli Sheqel', 'symbol' => '₪' ],
        'IRR' => [ 'name' => 'Iranian Rial', 'symbol' => '﷼' ],
        'ISK' => [ 'name' => 'Iceland Krona', 'symbol' => 'kr' ],
        'JMD' => [ 'name' => 'Jamaican Dollar', 'symbol' => 'J$' ],
        'JPY' => [ 'name' => 'Yen', 'symbol' => '¥' ],
        'KGS' => [ 'name' => 'Som', 'symbol' => 'лв' ],
        'KHR' => [ 'name' => 'Riel', 'symbol' => '៛' ],
        'KPW' => [ 'name' => 'North Korean Won', 'symbol' => '₩' ],
        'KRW' => [ 'name' => 'Won', 'symbol' => '₩' ],
        'KYD' => [ 'name' => 'Cayman Islands Dollar', 'symbol' => '$' ],
        'KZT' => [ 'name' => 'Tenge', 'symbol' => 'лв' ],
        'LAK' => [ 'name' => 'Kip', 'symbol' => '₭' ],
        'LBP' => [ 'name' => 'Lebanese Pound', 'symbol' => '£' ],
        'LKR' => [ 'name' => 'Sri Lanka Rupee', 'symbol' => '₨' ],
        'LRD' => [ 'name' => 'Liberian Dollar', 'symbol' => '$' ],
        'LTL' => [ 'name' => 'Lithuanian Litas', 'symbol' => 'Lt' ],
        'LVL' => [ 'name' => 'Latvian Lats', 'symbol' => 'Ls' ],
        'MKD' => [ 'name' => 'Denar', 'symbol' => 'ден' ],
        'MNT' => [ 'name' => 'Tugrik', 'symbol' => '₮' ],
        'MUR' => [ 'name' => 'Mauritius Rupee', 'symbol' => '₨' ],
        'MXN' => [ 'name' => 'MXV Mexican Peso Mexican Unidad de Inversion (UDI)', 'symbol' => '$' ],
        'MYR' => [ 'name' => 'Malaysian Ringgit', 'symbol' => 'RM' ],
        'MZN' => [ 'name' => 'Metical', 'symbol' => 'MT' ],
        'NGN' => [ 'name' => 'Naira', 'symbol' => '₦' ],
        'NIO' => [ 'name' => 'Cordoba Oro', 'symbol' => 'C$' ],
        'NOK' => [ 'name' => 'Norwegian Krone', 'symbol' => 'kr' ],
        'NPR' => [ 'name' => 'Nepalese Rupee', 'symbol' => '₨' ],
        'NZD' => [ 'name' => 'New Zealand Dollar', 'symbol' => '$' ],
        'OMR' => [ 'name' => 'Rial Omani', 'symbol' => '﷼' ],
        'PAB' => [ 'name' => 'USD Balboa US Dollar', 'symbol' => 'B/.' ],
        'PEN' => [ 'name' => 'Nuevo Sol', 'symbol' => 'S/.' ],
        'PHP' => [ 'name' => 'Philippine Peso', 'symbol' => 'Php' ],
        'PKR' => [ 'name' => 'Pakistan Rupee', 'symbol' => '₨' ],
        'PLN' => [ 'name' => 'Zloty', 'symbol' => 'zł' ],
        'PYG' => [ 'name' => 'Guarani', 'symbol' => 'Gs' ],
        'QAR' => [ 'name' => 'Qatari Rial', 'symbol' => '﷼' ],
        'RON' => [ 'name' => 'New Leu', 'symbol' => 'lei' ],
        'RSD' => [ 'name' => 'Serbian Dinar', 'symbol' => 'Дин.' ],
        'RUB' => [ 'name' => 'Russian Ruble', 'symbol' => 'руб' ],
        'SAR' => [ 'name' => 'Saudi Riyal', 'symbol' => '﷼' ],
        'SBD' => [ 'name' => 'Solomon Islands Dollar', 'symbol' => '$' ],
        'SCR' => [ 'name' => 'Seychelles Rupee', 'symbol' => '₨' ],
        'SEK' => [ 'name' => 'Swedish Krona', 'symbol' => 'kr' ],
        'SGD' => [ 'name' => 'Singapore Dollar', 'symbol' => '$' ],
        'SHP' => [ 'name' => 'Saint Helena Pound', 'symbol' => '£' ],
        'SOS' => [ 'name' => 'Somali Shilling', 'symbol' => 'S' ],
        'SRD' => [ 'name' => 'Surinam Dollar', 'symbol' => '$' ],
        'SVC' => [ 'name' => 'USD El Salvador Colon US Dollar', 'symbol' => '$' ],
        'SYP' => [ 'name' => 'Syrian Pound', 'symbol' => '£' ],
        'THB' => [ 'name' => 'Baht', 'symbol' => '฿' ],
        'TRY' => [ 'name' => 'Turkish Lira', 'symbol' => 'TL' ],
        'TTD' => [ 'name' => 'Trinidad and Tobago Dollar', 'symbol' => 'TT$' ],
        'TWD' => [ 'name' => 'New Taiwan Dollar', 'symbol' => 'NT$' ],
        'UAH' => [ 'name' => 'Hryvnia', 'symbol' => '₴' ],
        'USD' => [ 'name' => 'US Dollar', 'symbol' => '$' ],
        'UYU' => [ 'name' => 'UYI Peso Uruguayo Uruguay Peso en Unidades Indexadas', 'symbol' => '$U' ],
        'UZS' => [ 'name' => 'Uzbekistan Sum', 'symbol' => 'лв' ],
        'VEF' => [ 'name' => 'Bolivar Fuerte', 'symbol' => 'Bs' ],
        'VND' => [ 'name' => 'Dong', 'symbol' => '₫' ],
        'XCD' => [ 'name' => 'East Caribbean Dollar', 'symbol' => '$' ],
        'YER' => [ 'name' => 'Yemeni Rial', 'symbol' => '﷼' ],
        'ZAR' => [ 'name' => 'Rand', 'symbol' => 'R' ],
    ];

    return $currencies;
}

function get_currency_symbol($iso_code){
    $found = '';
    foreach(currencies_list() as $key => $value){
       if($iso_code == $key){
        $found = $value['symbol'];
       }
    }
    return $found;
}


function get_weekdays(){
    return [
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday',
        'Sunday',
    ];
}

function get_weekdays_between_dates($start_time, $end_time){
    $interval   = new \DateInterval('P1D');
    $end_time   = $end_time->modify('+1 day');
    $dateRange  = new \DatePeriod($start_time, $interval, $end_time);
    $weekNumber = 1;
    $weeks      = [];

    foreach ($dateRange as $date) {
        $weeks[$weekNumber][] = $date->format('Y-m-d');
        if ($date->format('w') == 0) {
            $weekNumber++;
        }
    }

    return $weeks;
}

function slugify($string, $replace = array(), $delimiter = '-', $locale = 'en_US.UTF-8', $encoding = 'UTF-8') {
    if (!extension_loaded('iconv')) {
        throw new Exception('iconv module not loaded');
    }
    // Save the old locale and set the new locale
    $oldLocale = setlocale(LC_ALL, '0');
    setlocale(LC_ALL, $locale);
    $clean = iconv($encoding, 'ASCII//TRANSLIT', $string);
    if (!empty($replace)) {
        $clean = str_replace((array) $replace, ' ', $clean);
    }
    $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
    $clean = strtolower($clean);
    $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
    $clean = trim($clean, $delimiter);
    // Revert back to the old locale
    setlocale(LC_ALL, $oldLocale);
    return $clean;
}
