<?php
namespace LandPrice;

class Trade
{
  private function setApiData($data, $key)
  {
    if(array_key_exists($key, $data)){
      return $data[$key];
    }else{
      return "";
    }
  }

  public function __construct($data)
  {
    $type                 = $this->setApiData($data, 'Type');
    $region               = $this->setApiData($data, 'Region');
    $municipalityCode     = $this->setApiData($data, 'MunicipalityCode');
    $prefecture           = $this->setApiData($data, 'Prefecture');
    $municipality         = $this->setApiData($data, 'Municipality');
    $districtName         = $this->setApiData($data, 'DistrictName');
    $nearestStation       = $this->setApiData($data, 'NearestStation');
    $timeToNearestStation = $this->setApiData($data, 'TimeToNearestStation');
    $tradePrice           = $this->setApiData($data, 'TradePrice');
    $pricePerUnit         = $this->setApiData($data, 'PricePerUnit');
    $floorPlan            = $this->setApiData($data, 'FloorPlan');
    $area                 = $this->setApiData($data, 'Area');
    $unitPrice            = $this->setApiData($data, 'UnitPrice');
    $landShape            = $this->setApiData($data, 'LandShape');
    $frontage             = $this->setApiData($data, 'Frontage');
    $totalFloorArea       = $this->setApiData($data, 'TotalFloorArea');
    $buildingYear         = $this->setApiData($data, 'BuildingYear');
    $structure            = $this->setApiData($data, 'Structure');
    $use                  = $this->setApiData($data, 'Use');
    $purpose              = $this->setApiData($data, 'Purpose');
    $direction            = $this->setApiData($data, 'Direction');
    $classification       = $this->setApiData($data, 'Classification');
    $breadth              = $this->setApiData($data, 'Breadth');
    $cityPlanning         = $this->setApiData($data, 'CityPlanning');
    $coverageRatio        = $this->setApiData($data, 'CoverageRatio');
    $floorAreaRatio       = $this->setApiData($data, 'FloorAreaRatio');
    $period               = $this->setApiData($data, 'Period');
    $remarks              = $this->setApiData($data, 'Remarks');
  }
}
