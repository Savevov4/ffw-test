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
# #5
Consider the scenario from the image below. You have a <i>“functionality”</i> helper object that you reuse. In it you attach a click handler called <i>“clickListener”</i> that should ultimately change “isActive” and call <i>“checkTriggered”</i>. When a user clicks on a link: will your code execute correctly? If not – how should we fix it while keeping this original object structure?

```js
let functionality = {
    isActive: false,

    addListeners: function() {
        document
            .querySelectorAll('a')
            .addEventListener(this.clickListener);
    },

    clickListener: function(event) {
        event.preventDefault()
        this.isActive = !this.isActive;
        this.checkTriggered();
    },

    checkTriggered: function() {
        // some code
    }
};

functionality.addListeners()
```
# Solution
This code will output error. We need add loop(for || for...of || foreach) and add bind method for function <i>"clickListener"</i>
```js
let functionality = {
    isActive: false,

    addListeners: function() {
        let links = document.querySelectorAll('a');
        for ( const link of links) {
            link.addEventListener('click', this.clickListener.bind(this));
        }
    },

    clickListener: function(event) {
        event.preventDefault()
        this.isActive = !this.isActive;
        this.checkTriggered();
    },

    checkTriggered: function() {
        // some code
    }
};

functionality.addListeners();
```
# #6
You work on a jQuery project. Considering the following HTML code on a page. You need to extract all div.node only from the articles wrapper. How many ways of selector-picking using jQuery can you enumerate for this case?
```html
<div class="articles list">
    <div class="node"></div>
    <div class="node"></div>
    <div class="node"></div>
</div>
<div class="blogs list">
    <div class="node"></div>
    <div class="node"></div>
    <div class="node"></div>
</div>
```
