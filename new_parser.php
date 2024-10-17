<?php

echo "жана парсер жасалуда, бітті";

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
