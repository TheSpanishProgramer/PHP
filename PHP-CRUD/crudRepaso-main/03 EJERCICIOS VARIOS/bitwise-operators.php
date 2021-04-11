#!/bin/php
<script language="php">
$a = 18;
$b = 7;

$aBin = decbin($a);         // 10010 = 0001 0010
$bBin = decbin($b);         // 00111 = 0000 0111

$aAndB = $a & $b;           // 00010 ≡ 2
$aOrB = $a | $b;            // 10111 ≡ 1 + 2 + 4 + 16 = 23
$aXorB = $a ^ $b;           // 10101 ≡ 1 + 4 + 16 = 21
$notA = ~$a;                // 0001 0010 inverted is 1110 1101 ≡
                            // ≡ 1 + 4 + 8 + 32 + 64 - 128 = -19
$aShiftLeft1 = $a << 2;     // 18 * 2 * 2 = 72
$aShiftRight2 = $a >> 2;    // 18 / 2 / 2 = 4

$aAndBBin = decbin($aAndB);
$aOrBBin = decbin($aOrB);
$aXorBBin = decbin($aXorB);
$notABin = decbin($notA);

echo "---------------------------------------------------------\r\n";
echo " bitwise operators\r\n";
echo "---------------------------------------------------------\r\n";
echo "\$a = $a ≡ 0001 0010\r\n";
echo "\$b = $b ≡ 0000 0111\r\n"; 

Echo "\$a & \$b = $a & $b = $aBin & $bBin = $aAndBBin ≡ $aAndB\r\n";
echO "\$a | \$b = $a | $b = $aBin | $bBin = $aOrBBin ≡ $aOrB\r\n";
eCHo "\$a ^ \$b = $a ^ $b = $aBin ^ $bBin = $aXorBBin ≡ $aXorB\r\n";
ECHO "~\$a = ~$a = $notA ≡ $notABin\r\n";  

echo "\$a << 2 = $a << 2 = $aShiftLeft1\r\n";
echo "\$a >> 2 = $a >> 2 = $aShiftRight2";