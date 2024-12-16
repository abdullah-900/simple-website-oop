<?php
return [
"routes"=>[
        "/"=>["./app/Views/homepage.php"],
        "/signup"=>["./app/Views/signup.php"],
        "/Login"=>["./app/Views/Login.php"],
        "/Login/process"=>["./app/Controllers/LoginController.php",$method="handleLogin"],
        "/signup/process"=>["./app/Controllers/SignupController.php",$method="handleSignup"],
        "/notes/add"=>["./app/Controllers/NotesController.php",$method="addNote"],
        "/notes"=>["./app/Controllers/NotesController.php",$method="showNotes"],
        "/note"=>["./app/Views/note.php"]
]
];
