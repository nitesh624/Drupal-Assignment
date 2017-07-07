<?php
// index.php 20150101 - 20170302
// Copyright (C) 2015-2017 Mark Constable <markc@renta.net> (AGPL-3.0)

declare(strict_types = 1);// strict type-checking mode is used for function calls and return statements in the the file

echo new class() extends Init //the new class is created by extending the class "Init"
{// In below protected access modifier the variables and arrays are declared
    protected
    $email = 'markc@renta.net',
    $in = [
        'm'     => 'home',  // Method [home|about|contact]
    ],
    $out = [
        'doc'   => 'SPE::02',
        'css'   => '',
        'nav1'  => '',
        'head'  => 'Styled',
        'main'  => 'Error: missing page!',
        'foot'  => 'Copyright (C) 2015 Mark Constable (AGPL-3.0)',
    ],
    $nav1 = [
        ['Home', '?m=home'],
        ['About', '?m=about'],
        ['Contact', '?m=contact'],
    ];
};

class Init
{
    public function __construct()//__construct() function creates a new SimpleXMLElement object. 
    {
        foreach ($this->in as $k => $v) // this foreach loop cycles through each entry in the array named "in" and stored the values as "key=>value" pair in $k and $v respectively
            $this->in[$k] = isset($_REQUEST[$k])// isset() function is checking if the value of variable $k is set or not
                ? htmlentities(trim($_REQUEST[$k])) : $v;//htmlentities is used to Convert all applicable characters to HTML entities

        if (method_exists($this, $this->in['m']))//the method_exist is the inbuilt PHP function which is having two parameters first is "object" and second is "method" . It returns true if the object is found in the method
            $this->out['main'] = $this->{$this->in['m']}();//when the above if condition evaluates ti true then this statement is executes

        foreach ($this->out as $k => $v)
            $this->out[$k] = method_exists($this, $k) ? $this->$k() : $v;
    }

    public function __toString() : string
    {
        return $this->html();
    }

    private function css() : string // This css() function is having string return type and when it is called it return the below defined styles 
    {
        return '
    <link href="//fonts.googleapis.com/css?family=Roboto:100,300,400,500,300italic" rel="stylesheet" type="text/css">
    <style>
* { transition: 0.25s linear; }
body {
    background-color: #fff;
    color: #444;
    font-family: "Roboto", sans-serif;
    font-weight: 300;
    height: 50rem;
    line-height: 1.5;
    margin: 0 auto;
    max-width: 42rem;
}
h1, h2, h3, nav, footer {
    color: #0275d8;
    font-weight: 300;
    text-align: center;
    margin: 0.5rem 0;
}
nav a, .btn {
    background-color: #ffffff;
    border-radius: 0.2em;
    border: 0.01em solid #0275d8;
    display: inline-block;
    padding: 0.25em 1em;
    font-family: "Roboto", sans-serif;
    font-weight: 300;
    font-size: 1rem;
}
nav a:hover, button:hover, input[type="submit"]:hover, .btn:hover  {
    background-color: #0275d8;
    color: #fff;
    text-decoration: none;
}
label, input[type="text"], textarea, pre {
    display: inline-block;
    width: 100%;
    padding: 0.5em;
    font-size: 1rem;
    box-sizing : border-box;
}
p { margin-top: 0; }
a:link, a:visited { color: #0275d8; text-decoration: none; }
a:hover { text-decoration: underline; }
a.active { background-color: #2295f8; color: #ffffff; }
a.active:hover { background-color: #2295f8; }
.rhs { text-align: right; }
.center { text-align: center; }

@media (max-width: 46rem) { body { width: 92%; } }
        </style>';
    }

    private function nav1() : string // nav1() function is having string return type and when this function is called then the navigation menu is generated having the "url" and text to be shown for link is defined as below
    {
        $m = '?m='.$this->in['m'];
        return '
      <nav>' . join('', array_map(function ($n) use ($m) {
            $c = $m === $n[1] ? ' class="active"' : '';
            return '
        <a' . $c . ' href="' . $n[1] . '">' . $n[0] . '</a>';
        }, $this->nav1)) . '
      </nav>';
    }

    private function head() : string // head() function is having string return type and when it is called it returns the text to be shown inside the header tag of rendering web page . The value is coming from out array which is having the key "head" which is "Styled" in this case.
    {
        return '
    <header>
      <h1>' . $this->out['head'] . '</h1>' . $this->out['nav1'] . '
    </header>';
    }

    private function main() : string// main() function is having string as return type and it returns the contents which should be placed inside <main>....</main> tag. The value is coming from out array which is having the key "main" which is "<p>Error: missing page!</p>" in this case.
    {
        return '
    <main>' . $this->out['main'] . '
    </main>';
    }

    private function foot() : string// foot() function is having return type string and it returns the string to be displayed inside  <footer> tag. The value is coming from out array which is having the key "foot" which is "Copyright (C) 2015-2017 Mark Constable (AGPL-3.0)" in this case.
    {
        return '
    <footer>
      <p><em><small>' . $this->out['foot'] . '</small></em></p>
    </footer>';
    }

    private function html() : string //html() function is having string return type string and it returns the html code is string 
    {
        extract($this->out, EXTR_SKIP);
        return '<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>' . $doc . '</title>' . $css . '
  </head>
  <body>' . $head . $main . $foot . '
  </body>
</html>
';
    }

    private function home() : string //when home() function is called it returns the link defined under the "array_merge()" to the nav1 menu
    {
        $this->nav1 = array_merge($this->nav1, [
            ['Project Page', 'https://github.com/markc/spe/tree/master/02-Styled'],
            ['Issue Tracker', 'https://github.com/markc/spe/issues'],
        ]);
        return '
      <h2>Home</h2>
      <p>
This is an ultra simple single-file PHP7 framework and template system example.
Comments and pull requests are most welcome via the Issue Tracker link above.
      </p>';
    }

    private function about() : string //when about() is called it returns the string type which is written under the "return" statement.
    {
        return '
      <h2>About</h2>
      <p>
This is an example of a simple PHP7 "framework" to provide the core
structure for further experimental development with both the framework
design and some of the new features of PHP7.
      </p>';
    }

    private function contact() : string //when contact() is called it create the contact form for submisssion of messages
    {
        return '
      <h2>Email Contact Form</h2>
      <form id="contact-send" method="post" onsubmit="return mailform(this);">
        <p><input id="subject" required="" type="text" placeholder="Message Subject"></p>
        <p><textarea id="message" rows="9" required=""placeholder="Message Content"></textarea></p>
        <p class="rhs">
          <small>(Note: Doesn\'t seem to work with Firefox 50.1)</small>
          <input class="btn" type="submit" id="send" value="Send">
        </p>
      </form>
      <script>
function mailform(form) {
    location.href = "mailto:' . $this->email . '"
        + "?subject=" + encodeURIComponent(form.subject.value)
        + "&body=" + encodeURIComponent(form.message.value);
    form.subject.value = "";
    form.message.value = "";
    alert("Thank you for your message. We will get back to you as soon as possible.");
    return false;
}
      </script>';
    }
}
