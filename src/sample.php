<?php
require('vendor/autoload.php');

$cur1 = CCY::RUB(10)->mul(5);

echo $cur1->describe(); // (10RUB) * 5



$cur2 = ($cur1->add(CCY::USD(5))->sub(CCY::RUB(3)))->mul(2);

echo $cur2->describe(); // ((10RUB) * 5 + 5USD - 3RUB) * 2
print_r($cur2->collapse()); // ['RUB' => 94, 'USD' => 10]
echo $cur2->asFloat(['RUB' => 1, 'USD' => 63.23]); // 726.3