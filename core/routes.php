<?php
$router->get('/','./app/Views/homepage.php');
$router->get('/Login','./app/Views/Login.php',);
$router->get('/signup','./app/Views/signup.php',);
$router->get('/note','./app/Views/notes/show.php',);
$router->get('/notes','./app/controllers/NotesController.php','showNotes');
$router->post('/Login/process','./app/controllers/LoginController.php','handleLogin');
$router->post('/signup/process','./app/controllers/SignupController.php','handleSignup');
$router->post('/notes/add','./app/controllers/NotesController.php','addNote');
$router->delete('/notes/delete','./app/controllers/NotesController.php','deleteNote');

