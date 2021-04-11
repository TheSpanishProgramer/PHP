#!/bin/php
<?php
/**
 * @param Closure $message 
 */
function hi($message)
{
    echo $message();
} 

hi(function() {
    return 'Hello world';
});