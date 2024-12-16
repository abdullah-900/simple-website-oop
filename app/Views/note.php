<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
</head>
<body>
<nav class="bg-gray-800">
  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
    <div class="relative flex h-16 items-center justify-between">
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
      </div>
      <div class="flex flex-1 items-center  sm:items-stretch justify-start">
        <div class="flex shrink-0 items-center">
          <img class="h-8 w-auto" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
        </div>
        <div class="sm:ml-6 sm:block">
          <div class="flex space-x-4">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="/notes" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" aria-current="page">Dashboard</a>
          </div>
        </div>
      </div>
      <div class="flex items-center justify-center gap-2">
      <img class="size-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
      <a href="/Logout"><button  type="button" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-3 py-1.5 me-2  dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Logout</button></a>
      </div>
      </div>
    </div>
  </div>
</nav>
<main class="grid place-items-center h-screen">
<ul class="text-xl  flex flex-col gap-2 items-center justify-center ">
<?php
if (isset($_SESSION["notes"]) && is_array($_SESSION["notes"])) {
    $noteid=(int)$_GET["noteid"];
    $notes=$_SESSION["notes"];
    $notfound=true;
foreach($notes as $note) {
   if ($noteid===$note[0]) {
    echo"<li>";
    echo"<a>"; 
    echo htmlspecialchars($note[3]); 
    echo "</a>";
    echo "</li>";
    $notfound=false;
   }
}

if ($notfound) {
 abort();
}
    }


?>
</ul>
</main>

</body>
</html>