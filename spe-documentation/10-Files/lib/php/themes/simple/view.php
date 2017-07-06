<?php
// simple.php 20151015 (C) 2015 Mark Constable <markc@renta.net> (AGPL-3.0)

declare(strict_types = 1);

class Themes_Simple_View extends View
{
    function css()
    {
error_log(__METHOD__);

        return '
    <link href="//fonts.googleapis.com/css?family=Roboto:100,300,400,600,100italic,300italic" rel="stylesheet">
    <style>
/* simples.css 20150924 (C) 2015-2016 Mark Constable <markc@renta.net> (AGPL-3.0) */

* {
    transition: 0.2s linear;
}
body {
    background-color: #FFF;
    color: #444;
    font-family: "Roboto", sans-serif;
    font-weight: 300;
    height: 50rem;
    line-height: 1.33;
    margin: 0 auto;
    width: 42rem;
}
a:link, a:visited {
    color: #E91E63;
    text-decoration: none;
}
a:hover {
    text-decoration: underline;
}
:focus {
    outline: none;
}
::-moz-focus-inner {
    border: 0;
}
h1, h2, h3, h4 {
    font-weight: 300;
    margin: 0.25em 0;
}
h1 {
    font-weight: 100;
}
header, footer {
    color: #E91E63;
    font-weight: 100;
    text-align: center;
    text-shadow: 0 0.03em 0.03em #000;
}
pre {
    overflow-x: auto;
}
label {
    font-size: 0.9rem;
    font-weight: 100;
}
input[type="text"], input[type="password"], input[type="email"], textarea, pre {
    background-color: #FFF;
    border-radius: 0.2em;
    border: 0.01em solid #CCC;
    box-shadow: 0 0.1em 0.3em #DDD inset;
    box-sizing: border-box;
    font-family: monospace;
    font-size: 0.9rem;
    padding: 0.5em 0.75em;
    width: 100%;
}
nav a, button, input[type="submit"], .btn {
    border-radius: 0.2em;
    border: 0.01em solid #CCC;
    display: inline-block;
    font-family: "Roboto", sans-serif;
    font-size: 0.9rem;
    font-weight: 300;
    font-weight: 300;
    line-height: 1.33;
    padding: 0.5em 1em;
}
nav a:hover, button:hover, input[type="submit"]:hover, .btn:hover  {
    background-color: #CFCFCF;
    color: #000000;
    text-decoration: none;
}
nav a {
    background-color: #DDD;
    color: #E91E63;
    border-bottom: none;
    border-radius: 0.2em 0.2em 0 0;
}
footer {
    font-size: 80%;
    margin: 1em;
}
table {
    /* table-layout: fixed; ? */
    width: 100%;
}
hr {
    border: none;
    border-top: 1px solid #F7F7F7;
}
form {
    margin: 0 auto;
    width: 24em;
}
th {
    font-weight: 400;
}
.active {
    background-color: #EFEFEF;
    color: #3F3F3F;
}
.active:hover {
    background-color: #EFEFEF;
    color: #E91E63;
}
main, main div {
    background-color: #EFEFEF;
    border-radius: 0.2em;
    padding: 0.5em 2em;
}
.success {
    color: #3C763D;
    background-color: #DFF0D8;
}
.danger {
    color: #A94442;
    background-color: #F2DEDE;
}
.primary, a.primary {
    color: #FFF;
    background-color: #337AB7;
}
.alert {
    padding: 1em;
}

nav > ul { display: inline-block; list-style: none; padding: 0; margin: 0; }
nav > ul > li > ul { display: none; padding: 0; margin: 0; }
nav > ul > li { position: relative; list-style: none; padding: 0; margin: 0; }
nav > ul > li:hover > ul { display: block; position: absolute; list-style: none; }
nav > ul > li > ul > li a { border-radius: 0; width: 100%; padding: 0.25em 1em; }
nav > ul > li > ul > li { text-align: left; }

@media (max-width: 38rem) {
    body {
        width: 100%;
    }
    main {
        border-radius: 0;
    }
}
@media (max-width: 28rem) {
    main {
        padding: 0.5em;
    }
}
    </style>';
    }

    public function nav1(array $a = []) : string
    {
error_log(__METHOD__);

        $a = isset($a[0]) ? $a : util::which_usr($this->g->nav1);
        $o = '?o='.$this->g->in['o'];
        $t = '?t='.$this->g->in['t'];
        return '
      <nav>'.join('', array_map(function ($n) use ($o) {
            $c = $o === $n[1] ? ' class="active"' : '';
            return '
        <a'.$c.' href="'.$n[1].'">'.$n[0].'</a>';
        }, $a)).'
        <ul>
          <li>
            <a href="#">Themes</a>
            <ul>'.join('', array_map(function ($n) use ($t) {
            $c = $t === $n[1] ? ' class="active"' : '';
            return '
              <li><a'.$c.' href="'.$n[1].'">'.$n[0].'</a></li>';
        }, $this->g->nav2)).'
            </ul>
          </li>
        </ul>
      </nav>';
    }

    public function veto_a(string $href, string $label, string $class, string $extra) : array
    {
error_log(__METHOD__);

        return ['class' => 'btn '.$class];
    }

}
