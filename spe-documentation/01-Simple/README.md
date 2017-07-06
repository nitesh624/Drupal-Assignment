## spe/01-Simple

**2015-10-15** -- _Copyright (C) 2015-2017 Mark Constable (AGPL-3.0)_

This is the first and simplest project example that demonstrates the
essential core structure for this project series.

We start off on 

line [5]- with a PHP7 declaration of `stict_types` for this
file. Unlike previous versions of PHP, this forces strict type checking on
`int`, `float`, `string`, `bool` and class types for function and method
arguments as well as the return type. 

Line [7]- starts the most important
part of the framework. It has 3 components...

- it contains the only `echo` statement for the entire framework. All output
  to the browser or command line is encapsulated in methods and returned
  as strings and amalgamated to the global `$out` array. There is no "raw"
  (outside of a method or function) code allowed let alone any line by line
  echo statements.

Line [8]- in is the name of php assi=ociative array in "key=> value" pair

Line [11]-out is also an associative array like in

Line [18]-nav1 is the an array which is having three more sub arrays

Line [24]- _construct() function creates a new SimpleXMLElement object.

Line [26]-if the request is made for the home page then value will be taken from the "in" array

Line [27]-the method_exist is the inbuilt PHP function which is having two parameters first is "object" and second is "method" . It returns true if the object is found in the method

Line [28]-when the above if condition evaluates ti true then this statement is executes

Line [29]-this foreach loop cycles through the out array and keep the key and value in the variable $k and $v respectively

Line [30]-this ternary operator checks for the existence of current object in the method 

Line [33]-_toString is an inbult function which convert the return value of the function into string and having string return type

Line [35]-return string value by calling the "html()"

Line [38]-nav1() function is having string return type and when this function is called then the navigation menu is generated having the "url" and text to be shown for link is defined as below

Line [48]-head() function is having string return type and when it is called it returns the text to be shown inside the header tag of rendering web page . The value is coming from out array which is having the key "head" which is "Simple" in this case.

Line [56]-main() function is having string as return type and it returns the contents which should be placed inside <main>....</main> tag. The value is coming from out array which is having the key "main" which is "<p>Error: missing page!</p>" in this case.

Line [63]-foot() function is having return type string and it returns the string to be displayed inside  <footer> tag. The value is coming from out array which is having the key "foot" which is "Copyright (C) 2015-2017 Mark Constable (AGPL-3.0)" in this case.

Line [71]-html() function is having string return type string and it returns the html code is string format

Line [81]-the $head , $main and $foot variable is replaced by its defined value

Line [87]-on calling the below function it returns the corresponding tags with the text written


**TODO: complete documentation.**

[5]: https://github.com/markc/spe/blob/master/01-Simple/index.php#L5
[7]: https://github.com/markc/spe/blob/master/01-Simple/index.php#L7
[8]: https://github.com/markc/spe/blob/master/01-Simple/index.php#L8
[11]: https://github.com/markc/spe/blob/master/01-Simple/index.php#L11
[18]: https://github.com/markc/spe/blob/master/01-Simple/index.php#L18
[24]: https://github.com/markc/spe/blob/master/01-Simple/index.php#L24
[26]: https://github.com/markc/spe/blob/master/01-Simple/index.php#L26
[27]: https://github.com/markc/spe/blob/master/01-Simple/index.php#L27
[28]: https://github.com/markc/spe/blob/master/01-Simple/index.php#L28
[29]: https://github.com/markc/spe/blob/master/01-Simple/index.php#L29
[30]: https://github.com/markc/spe/blob/master/01-Simple/index.php#L30
[33]: https://github.com/markc/spe/blob/master/01-Simple/index.php#L33
[35]: https://github.com/markc/spe/blob/master/01-Simple/index.php#L35
[38]: https://github.com/markc/spe/blob/master/01-Simple/index.php#L38
[48]: https://github.com/markc/spe/blob/master/01-Simple/index.php#L48
[56]: https://github.com/markc/spe/blob/master/01-Simple/index.php#L56
[63]: https://github.com/markc/spe/blob/master/01-Simple/index.php#L63
[71]: https://github.com/markc/spe/blob/master/01-Simple/index.php#L71
[81]: https://github.com/markc/spe/blob/master/01-Simple/index.php#L81
[87]: https://github.com/markc/spe/blob/master/01-Simple/index.php#L87


