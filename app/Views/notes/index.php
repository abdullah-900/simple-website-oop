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
  $notes=$_SESSION["notes"];
  foreach ($notes as $note) {
    echo"<li class='flex items-center justify-center gap-4'>";
    echo"<a href='/note?noteid=$note[0]' class='hover:underline mb-2'>"; 
    echo htmlspecialchars($note[2]); 
    echo "</a>";
    ?>
    <form action="/notes/delete" method="POST">
      <input type="hidden" name="_method" value="delete">
      <input value=<?php echo $note[0]?> name="noteId" type="hidden">
<button type="submit">
<svg  class="cursor-pointer" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 48 48">
<path d="M 20.5 4 A 1.50015 1.50015 0 0 0 19.066406 6 L 14.640625 6 C 12.803372 6 11.082924 6.9194511 10.064453 8.4492188 L 7.6972656 12 L 7.5 12 A 1.50015 1.50015 0 1 0 7.5 15 L 8.2636719 15 A 1.50015 1.50015 0 0 0 8.6523438 15.007812 L 11.125 38.085938 C 11.423352 40.868277 13.795836 43 16.59375 43 L 31.404297 43 C 34.202211 43 36.574695 40.868277 36.873047 38.085938 L 39.347656 15.007812 A 1.50015 1.50015 0 0 0 39.728516 15 L 40.5 15 A 1.50015 1.50015 0 1 0 40.5 12 L 40.302734 12 L 37.935547 8.4492188 C 36.916254 6.9202798 35.196001 6 33.359375 6 L 28.933594 6 A 1.50015 1.50015 0 0 0 27.5 4 L 20.5 4 z M 14.640625 9 L 33.359375 9 C 34.196749 9 34.974746 9.4162203 35.439453 10.113281 L 36.697266 12 L 11.302734 12 L 12.560547 10.113281 A 1.50015 1.50015 0 0 0 12.5625 10.111328 C 13.025982 9.4151428 13.801878 9 14.640625 9 z M 11.669922 15 L 36.330078 15 L 33.890625 37.765625 C 33.752977 39.049286 32.694383 40 31.404297 40 L 16.59375 40 C 15.303664 40 14.247023 39.049286 14.109375 37.765625 L 11.669922 15 z"></path>
</svg>
</button>
</form>
    <?php
    echo "</li>";
  }
}else{
echo $note;
}

?>
  <div id="notesform" class="flex <?php echo  isset($_SESSION["notes_errors"])? "block":"hidden"  ?> sm:ml-5 justify-center  sm:mx-auto sm:w-full sm:max-w-60">
  <svg onclick="closeform()" class="order-last cursor-pointer" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 24 24">
<path d="M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z"></path>
</svg>
    <form class="space-y-6" action="/notes/add" method="POST">
      <div>
        <label for="noteTitle" class="block text-sm/6 font-medium text-gray-900">NoteTitle</label>
        <div class="mt-2">
          <input type="text" name="noteTitle" id="noteTitle" autocomplete="noteTitle" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
        </div>
      </div>

      <div>
        <div class="flex items-center justify-between">
          <label for="Note" class="block text-sm/6 font-medium text-gray-900">Note</label>
        </div>
        <div class="mt-2">
            <textarea  name="Note" id="Note" autocomplete="Note" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"></textarea>
        </div>
      </div>

      <div>
        <button onclick="closeform()" type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add</button>
      </div>
      <?php
    if (isset($_SESSION["notes_errors"])) {
      $errors=$_SESSION["notes_errors"];
      unset ($_SESSION["notes_errors"]);
      foreach($errors as $error) {
       echo $error;
      }
      
    }
    ?>
    </form>

</div>
  <svg id="addnote"  onclick="addNote()" class="<?php echo  isset($_SESSION["notes_errors"])? "hidden":"block"  ?> cursor-pointer" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 50 50">
<path d="M 25 2 C 12.309295 2 2 12.309295 2 25 C 2 37.690705 12.309295 48 25 48 C 37.690705 48 48 37.690705 48 25 C 48 12.309295 37.690705 2 25 2 z M 25 4 C 36.609824 4 46 13.390176 46 25 C 46 36.609824 36.609824 46 25 46 C 13.390176 46 4 36.609824 4 25 C 4 13.390176 13.390176 4 25 4 z M 24 13 L 24 24 L 13 24 L 13 26 L 24 26 L 24 37 L 26 37 L 26 26 L 37 26 L 37 24 L 26 24 L 26 13 L 24 13 z"></path>
</svg>

</ul>
</main>
<script>
function addNote() {
  if (document.getElementById("notesform").classList.contains("hidden")) {
    document.getElementById("notesform").classList.remove("hidden")
    document.getElementById("addnote").classList.add("hidden")
  }else{
    document.getElementById("notesform").classList.add("hidden")
  }
}
function closeform() {
    document.getElementById("notesform").classList.add("hidden")
    document.getElementById("addnote").classList.remove("hidden")
}
    </script>
</body>
</html>