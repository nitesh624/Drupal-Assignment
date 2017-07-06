<?php
// index.php 20150101 - 20170302
// Copyright (C) 2015-2017 Mark Constable <markc@renta.net> (AGPL-3.0)

echo new class
{
    private
    $in = [    //in is the name of php assi=ociative array in "key=> value" pair
        'm'     => 'home',      // Method action
    ],
    $out = [    //out is also an associative array like in
        'doc'   => 'SPE::01',
        'nav1'  => '',
        'head'  => 'Simple',
        'main'  => '<p>Error: missing page!</p>',
        'foot'  => 'Copyright (C) 2015-2017 Mark Constable (AGPL-3.0)',
    ],
    $nav1 = [   // nav1 is the an array which is having three more sub arrays
        ['Home', '?m=home'],
        ['About', '?m=about'],
        ['Contact', '?m=contact'],
    ];

    public function __construct()  //__construct() function creates a new SimpleXMLElement object. 
    {
        $this->in['m'] = $_REQUEST['m'] ?? $this->in['m'];// if the request is made for the home page then value will be taken from the "in" array
        if (method_exists($this, $this->in['m'])) // the method_exist is the inbuilt PHP function which is having two parameters first is "object" and second is "method" . It returns true if the object is found in the method   
        $this->out['main'] = $this->{$this->in['m']}(); //when the above if condition evaluates ti true then this statement is executes 
        foreach ($this->out as $k => $v) // this foreach loop cycles through the out array and keep the key and value in the variable $k and $v respectively
            $this->out[$k] = method_exists($this, $k) ? $this->$k() : $v;// this ternary operator checks for the existence of current object in the method 
    }

    public function __toString() : string // _toString is an inbult function which convert the return value of the function into string and having string return type
    {
        return $this->html(); //return string value by calling the "html()"
    }

    private function nav1() : string // nav1() function is having string return type and when this function is called then the navigation menu is generated having the "url" and text to be shown for link is defined as below
    {
        return '
      <nav>' . join('', array_map(function ($n) {
            return '
        <a href="' . $n[1] . '">' . $n[0] . '</a>';
        }, $this->nav1)) . '
      </nav>';
    }

    private function head() : string // head() function is having string return type and when it is called it returns the text to be shown inside the header tag of rendering web page . The value is coming from out array which is having the key "head" which is "Simple" in this case.
    {
        return '
    <header>
      <h1>' . $this->out['head'] . '</h1>' . $this->out['nav1'] . '
    </header>';
    }

    private function main() : string // main() function is having string as return type and it returns the contents which should be placed inside <main>....</main> tag. The value is coming from out array which is having the key "main" which is "<p>Error: missing page!</p>" in this case.
    {
        return '
    <main>' . $this->out['main'] . '
    </main>';

    }
    private function foot() : string // foot() function is having return type string and it returns the string to be displayed inside  <footer> tag. The value is coming from out array which is having the key "foot" which is "Copyright (C) 2015-2017 Mark Constable (AGPL-3.0)" in this case.
    {
        return '
    <footer>
      <p><em><small>' . $this->out['foot'] . '</small></em></p>
    </footer>';
    }

    private function html() : string //html() function is having string return type string and it returns the html code is string format  
    {
        extract($this->out, EXTR_SKIP);
        return '<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>' . $doc . '</title>
  </head>
  <body>' . $head . $main . $foot . '
  </body>
</html>
';// the $head , $main and $foot variable is replaced by its defined value
    }
// on calling the below function it returns the corresponding tags with the text written
    private function home() { return '<h2>Home Page</h2><p>Lorem ipsum home.</p>'; 
    private function about() { return '<h2>About Page</h2><p>Lorem ipsum about.</p>'; }
    private function contact() { return '<h2>Contact Page</h2><p>Lorem ipsum contact.</p>'; }
};

