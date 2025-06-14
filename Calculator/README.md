# PHP Dark Mode Calculator

This is a simple calculator web application built with PHP. It allows users to perform basic arithmetic operations (+, -, *, /) in a classic calculator interface, with support for light and dark mode.

## Features

- Add, subtract, multiply, and divide numbers
- All buttons (numbers, operators, =, C) are always visible
- Expression is built up as you click buttons
- Result is displayed when you press "="
- "C" button clears the current expression
- Input and result are shown in a readonly display
- Expression is stored between button clicks using a hidden input
- Light/Dark mode toggle (if implemented in CSS)

## How It Works

1. All calculator buttons are displayed on the screen.
2. When a button is clicked, its value is sent to the server as `input`.
3. If a number is clicked, it is appended to the current expression.
4. If an operator is clicked, it is appended only if the expression is not empty and the last character is not already an operator.
5. If "C" is clicked, the expression is cleared.
6. If "=" is clicked, the expression is checked for validity and evaluated if valid; otherwise, an error is shown.
7. The current expression is stored in a hidden input so it persists between button clicks.
8. The current expression or result is displayed in a readonly input box.

## Usage

1. Open the `site.php` file in your browser via a local PHP server.
2. Click the number and operator buttons to build your calculation.
3. Press "=" to see the result.
4. Press "C" to clear and start a new calculation.

## Requirements

- PHP 7.x or higher
- A web browser

## Customization

- You can edit `style/site.css` to change the appearance or add a dark mode toggle.

---

*This project is for learning and demonstration purposes. Use with caution if deploying publicly, as it uses `eval()` for expression evaluation.*