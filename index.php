<?php
  include 'vendor/autoload.php';
  $api = new LandPrice\WebAPI();
  $list = $api->getTradeHistory('13', '13103', '20171', '20174');
?>
<html>
<body>
<table border="1">
<?php
  foreach($list as $trade){
?>
  <tr><?php 
  echo '<td>'. $trade->period . '</td>'; 
  echo '<td>'. $trade->municipality . '</td>'; 
  echo '<td>'. $trade->districtName . '</td>'; 
  echo '<td>'. $trade->cityPlanning . '</td>'; 
  echo '<td>'. $trade->buildingYear . '</td>'; 
  echo '<td>'. $trade->type . '</td>'; 
  echo '<td>'. $trade->region . '</td>'; 
  echo '<td>'. $trade->area . '</td>'; 
  echo '<td>'. $trade->tradePrice . '</td>'; 
  echo '<td>'. $trade->pricePerUnit . '</td>'; 
  ?>
</tr>
<?php
  }
?>
</table>
</body>
</html>
