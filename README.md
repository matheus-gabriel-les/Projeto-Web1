Project developed in collaboration with erosa-dev

Typing Game – Web Development I (TADS/UFPR)
This project is a sentence typing game developed for the Web Development I course in the Technology in Systems Analysis and Development (TADS) program at UFPR. The goal of the game is to measure the user's typing speed based on sentences displayed on the screen.

📝 Features
Automatic display of sentences for typing.

Reading sentences from an external file (palavras.json) via PHP.

Real-time typing verification with JavaScript.

Interface built with HTML and CSS.

Visual feedback during typing (correct and incorrect keystrokes).

Recording of the time spent to complete the sentence.

🚀 Technologies Used
HTML5 – interface structure

CSS3 – layout and styling

JavaScript – game logic and user interaction

PHP – reading sentences and communication with the frontend

JSON - NoSQL Data

MySQL - SQL Database

▶️ How to Run
Place all files on a local server (Apache, XAMPP, WAMP, or similar).

Ensure that PHP is enabled.

Access via your browser: http://localhost/AbaSite.html/

The game will load the registration/login screen.

📄 How it Works
Upon loading the page, JavaScript requests a list of sentences from PHP.

PHP reads the palavras.json file and returns the sentences.

The chosen sentence appears on the screen.

The user types in the indicated field, and the system compares it letter by letter.

When the sentence is completed, the total number of correct keystrokes is displayed.

👨‍🏫 Academic Project
This repository is part of the activities for the Web Development I course, focusing on:

Basic use of PHP for reading files

DOM manipulation with JavaScript

HTML page organization

Initial usability and layout practices

Version 7.0.1-Alpha
