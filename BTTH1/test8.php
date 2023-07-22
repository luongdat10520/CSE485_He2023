<?php
$array = ['programming', 'php', 'basic', 'dev', 'is', 'program is PHP'];

$maxStr = "";
$maxLen = 0;
foreach ($array as $str) {
  $len = strlen($str);
  if ($len > $maxLen) {
    $maxLen = $len;
    $maxStr = $str;
  }
}

$minStr = "";
$minLen = PHP_INT_MAX;
foreach ($array as $str) {
  $len = strlen($str);
  if ($len < $minLen) {
    $minLen = $len;
    $minStr = $str;
  }
}
echo "Chuỗi lớn nhất là " . $maxStr . ", độ dài = " . $maxLen . "<br>";
echo "Chuỗi nhỏ nhất là " . $minStr . ", độ dài = " . $minLen;
?>