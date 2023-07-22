<?php
$arrs = array(2, 5, 6, 9, 2, 5, 6, 12 ,5);
function tongmang($arrs) {
  $tong = array_sum($arrs);
  return $tong;
}
function tichmang($arrs) {
  $tich = array_product($arrs);
  return $tich;
}
function hieumang($arrs) 
{
  $hieu = -$arrs[0];
  for ($i = 1; $i < count($arrs); $i++) 
  {
    $hieu -= $arrs[$i];
  }
  return $hieu;
}
function thuongmang($arrs) {
  $thuong = $arrs[0];
  for ($i = 1; $i < count($arrs); $i++) 
  {
    $quotient /= $arrs[$i];
  }
  return $thuong;
}

echo "Tổng các phần tử = " . implode(" + ", $arrs) . " = " . tongmang($arrs) . "<br>";
echo "Tích các phần tử = " . implode(" * ", $arrs) . " = " . tichmang($arrs) . "<br>";
echo "Hiệu các phần tử = " . implode(" - ", $arrs) . " = " . hieumang($arrs) . "<br>";
echo "Thương các phần tử = " . implode(" / ", $arrs) . " = " . thuongmang($arrs);
?>