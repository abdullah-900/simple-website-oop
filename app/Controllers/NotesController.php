<?php
declare (strict_types=1);
use Core\Validator;
require_once BASE_PATH ."./core/functions.php";
use function Core\base_path;
class NotesController extends Notes {


public function showNotes() {
   $notes = $this->getNotes();
if (is_array($notes)) {
    $_SESSION["notes"]=$notes;
}else{
    $message="no notes added yet";
    $_SESSION["notes"]=$message;
}
require_once base_path("./app/Views/notes/index.php");;
}

public function addNote() {

    if ($_SERVER["REQUEST_METHOD"]==="POST" && isset($this->userId)) {
        try {
            $notetitle=$_POST["noteTitle"];
            $note=$_POST["Note"];
            $notes_errors=[];
            if (!Validator::checkStringLength($notetitle,1,300)) {
                $notes_errors["title"]="title must be no more than 300 characters";
            }
            if (!Validator::checkStringLength($note,1,1000)) {
                $notes_errors["note"]="note must be no more than 1000 characters";
            }
            if(empty($notes_errors)) {
                $query='INSERT INTO notes (user_id,note_title,note_content) VALUES (:user_id,:note_title,:note_content)  ;';
                $this->query($query,[":user_id"=>$this->userId,":note_title"=>$notetitle,":note_content"=>$note]);
                header("Location: ../notes");
            }else {
                $_SESSION["notes_errors"]=$notes_errors;
                header("Location: ../notes");
            }
        } catch (Exception $e) {
            die("query failed" . $e->getMessage());
        }
    }else {
        header("Location: ../notes");
        die();
    }
}
public function deleteNote() {
    if ($_SERVER["REQUEST_METHOD"]==="POST" && isset($this->userId)) {
        try {
        $noteId=$_POST["noteId"];
       $this->delNote($noteId);
          header("Location: ../notes");
        } catch (Exception $e) {
            die("query failed" . $e->getMessage());
        }
    }else {
        header("Location: ../notes");
        die();
    }
}

}