<?php
$router->get('/','./app/Views/homepage.php','guest');
$router->get('/Login','./app/Views/Login.php','guest');
$router->get('/signup','./app/Views/signup.php','guest');
$router->get('/note','./app/Views/notes/show.php','user');
$router->get('/notes','./app/controllers/NotesController.php','user','showNotes');
$router->post('/Login/process','./app/controllers/LoginController.php','guest','handleLogin');
$router->post('/signup/process','./app/controllers/SignupController.php','guest','handleSignup');
$router->post('/notes/create','./app/controllers/NotesController.php','user','createNote');
$router->delete('/Logout','./app/controllers/AuthController.php','user','logout');
$router->delete('/notes/delete','./app/controllers/NotesController.php','user','deleteNote');
$router->patch('/notes/patch','./app/controllers/NotesController.php','user','patchNote');

