<?php
return [
"routes"=>[
        "/"=>"./app/Views/homepage.php",
        "/signup"=>"./app/Views/signup.php",
        "/Login"=>"./app/Views/Login.php",
        "/Login/process"=>["./app/Controllers/LoginController.php",$method="handleLogin"],
        "/signup/process"=>["./app/Controllers/SignupController.php",$method="handleSignup"],
]
];
