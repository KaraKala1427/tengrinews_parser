<?php

echo "жана парсер жасалуда, әлі бітпеді 123 456 789 hello 123";

$x  = 123;

function calculate(int $a, int $b)
{
    return $a+$b;
}

class Parser
{
    public function __construct()
    {

    }

    public function parser(string $url)
    {
        $html = '<html> <body> <div> Hello world 123 </div></body> </html>';
        return $html;
    }
}
