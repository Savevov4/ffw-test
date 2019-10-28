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
# #4
Consider the following data object. Use ES6 feature to easily create variables that extract and store values from the data object to obtain:
- A variable called “names” that will contain <i>data.names</i>
- A variable called “enrolled” that will contain value from data.enrolled but will default to “false” in case <i>data.enrolled</i> doesn’t exist or is not usable
- A variable called “marks” that will contain value from <i>data.marksss</i>
```js
const data = {
    names: ['A', 'B', 'C'],
    enrolled: true,
    marksss: {
        'A': [1, 1, 1],
        'B': [2, 2, 2],
        'C': [3, 3, 3]
    }
}
```
# Solution
```js
const {
    names,
    enrolled = false,
    marksss:marks
} = data
```
