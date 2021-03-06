<?php
namespace LandPrice;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Handler\CurlHandler;

class WebAPI
{
  const BASE_URI = 'http://www.land.mlit.go.jp/';
  const CITY_PATH = 'webland/api/CitySearch?';
  const TRADE_PATH = 'webland/api/TradeListSearch?';
  const AREA = [
    "01" => "北海道",
    "02" => "青森県",
    "03" => "岩手県",
    "04" => "宮城県",
    "05" => "秋田県",
    "06" => "山形県",
    "07" => "福島県",
    "08" => "茨城県",
    "09" => "栃木県",
    "10" => "群馬県",
    "11" => "埼玉県",
    "12" => "千葉県",
    "13" => "東京都",
    "14" => "神奈川県",
    "15" => "新潟県",
    "16" => "富山県",
    "17" => "石川県",
    "18" => "福井県",
    "19" => "山梨県",
    "20" => "長野県",
    "21" => "岐阜県",
    "22" => "静岡県",
    "23" => "愛知県",
    "24" => "三重県",
    "25" => "滋賀県",
    "26" => "京都府",
    "27" => "大阪府",
    "28" => "兵庫県",
    "29" => "奈良県",
    "30" => "和歌山県",
    "31" => "鳥取県",
    "32" => "島根県",
    "33" => "岡山県",
    "34" => "広島県",
    "35" => "山口県",
    "36" => "徳島県",
    "37" => "香川県",
    "38" => "愛媛県",
    "39" => "高知県",
    "40" => "福岡県",
    "41" => "佐賀県",
    "42" => "長崎県",
    "43" => "熊本県",
    "44" => "大分県",
    "45" => "宮崎県",
    "46" => "鹿児島県",
    "47" => "沖縄県",
  ];

  public function __construct($stack = null)
  {
    if( isset($stack) == false ){
      $handler = new CurlHandler();
      $stack = HandlerStack::create($handler);
    }
    $this->client = new \GuzzleHttp\Client([
      'base_uri' => \LandPrice\WebAPI::BASE_URI,
      'handler' => $stack,
    ]);
  }

  public function getAreaCode($area)
  {
    return array_flip(\LandPrice\WebAPI::AREA)[$area];
  }

  public function getCityCode($areaCode)
  {
    $response = $this->client->request( 'GET',
      \LandPrice\WebAPI::CITY_PATH . 'area=' . $areaCode );
    return $this->getJson($response);
  }

  public function getTradeHistory($area, $city, $from, $to)
  {
    $list = array();
    $response = $this->client->request( 'GET',
        \LandPrice\WebAPI::TRADE_PATH
        . 'area=' . $area . '&city=' . $city . '&from=' . $from . '&to=' . $to
    );

    $data = $this->getJson($response);
    foreach($data as $d){
      $list[] = new Trade($d);
    }
    return $list;
  }

  private function getJson($resp)
  {
    $json = json_decode( $resp->getBody() , true);
    return $json['data'];
  }
}
