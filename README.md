# ffw-test - #1
Front end test project(Twig, Sass, Vanilla Js)
# Example
https://savevov4.github.io/ffw-test/src/index.html

# #2
Create a function named parseUrl(string), wich receive URL string and will return object with parsed data. For example:
```js
let obj = parseUrl('http://ffwagency.com/do/any.php?a=1#foo')

console.log( obj.hash ) // -> foo
console.log( obj.hostname ) // -> ffwagency.com
console.log( obj.pathname ) // -> /do/any.php
```
# Solution

```js
function parseUrl(url) {
    let link = document.createElement('a');
    link.href = url;
    return link
}

let obj = parseUrl('http://ffwagency.com/do/any.php?a=1#foo')

console.log( obj.hash ) // -> foo
console.log( obj.hostname ) // -> ffwagency.com
console.log( obj.pathname ) // -> /do/any.php
```

# #3
Consider the following code what will the console.log output be and why? Name the JS rule that is responsible for this behavior.
```js
console.log(my_variable)
var my_variable = 1;
```

# Solution
```js
console.log(my_variable) // 'undefined'
```
In JavaScript every variable declaration and function declaration brings to the top of its current scope in which it's declared then assignment happen in order this term is called <b>Hoisting</b>.
```js
var my_variable = 1; // is both declaration and definition 
                     // (also we can say we are doing initialisation),
                     // here declaration and assignment of value happen
                     // inline for variable my_variable
```
