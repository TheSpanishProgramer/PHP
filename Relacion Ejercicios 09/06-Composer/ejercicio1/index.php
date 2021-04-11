<?php

require "vendor/autoload.php";

use SebastianBergmann\Timer\Timer;

Timer::start();

// Cada iteración incluye un segundo de espera.
for($i=0; $i<10; $i++) {
    echo rand(1,100);
    sleep(1);
}

$time = Timer::stop();

echo "<p>" . Timer::secondsToTimeString($time) . "</p>";