#!/bin/php
<?php

// The following code will output a Fatal error.

class Greetings
{
    static function hello()
    {
        return 'Hello, I am Alice!';
    }
    static function bye()
    {
        return 'Good bye, I am Alice!';
    }
}

class Greetings
{
    static function hello()
    {
        return 'Hello, I am Bob!';
    }
    static function bye()
    {
        return 'Good bye, I am Bob!';
    }
}