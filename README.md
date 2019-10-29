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
# Solution
```js
$('.articles .node');
$('.articles.list .node');
$('.list:not(.blogs) .node');
$('.articles > .node');
$('.articles [class*="node"]');
$('.articles [class^="node"]')
```
# #7
Write a short JS snippet that pulls JSON users data from https://jsonplaceholder.typicode.com/users. Once you have the data print a div for each user instance object received like in the following example:
```html
<div class="user">
    <h3 class="user__name">{user_name_here}</h3>
    <div class="user__email">{user_email_here}</div>
</div>
```
# Solution
```js
console,log('13');
```
# #8
At what point do you recommend to run AJAX requests (or trigger other asynchronous tasks) during a React Component lifecycle? Why?
# Solution
Use this <b>ComponentDidMount</b> lifecycle. According to official React docs, the recommended place to do Ajax requests is in componentDidMount which is a lifecycle method that runs after the React component has been mounted to the DOM. ... This means if you make the Ajax call, and set the response to the component state, the component will not re-render.

# #9
Considering the following react component please pick one or more correct ways of passing a handler to a component. Also, explain what happens when you click each button from this component?
```jsx
class Example extends React.Component {
    constructor(props) {
        super(props);
        this.text = 'This is an example text.';

        this.handler2 = this.handler1.bind(this);
    }

    handler1() {
        alert(this.text)
    }

    handler3 = () => alert(this.text);

    render() {
        return (
            <div>
                <button onClick={this.handler1()}>First</button>
                <button onClick={this.handler1}>Second</button>
                <button onClick={this.handler2}>Third</button>
                <button onClick={this.handler3}>Fourth</button>
            </div>
        )
    }
}
```
# Solution
<b>1 Button </b> - the function <i>this.handler1()</i> is executed immediately when page loaded and output alert with text. Click on the button will be ignored.  
<b>2 Button </b> - the function <i>this.handler1</i> will output <i>'undefined'</i>, because it does not have bind method. Or we can change the function to an arrow function. Arrow function don't have its own context and refer outside context.  
<b>3 Button </b> - the function <i>this.handler2</i> calls handler2, after that handler2 calls handler1 and will ouput alert with text.  
<b>4 Button </b> - the arrow function <i>this.handler3</i> will output alert with text <i>'This is an example text.'</i>
