<?php
declare (strict_types=1);
use Core\Dbh;
use function Core\base_path;
Class Notes extends Dbh{
    protected $userId;
 public function __construct(){
if (isset($_SESSION["user_id"])) {
    $this->userId=$_SESSION["user_id"];
}
 }

    protected function getNotes() {
        if (isset($this->userId)) {
            $query='SELECT * from notes where user_id=:user_id;';
           return  $this->query($query,[":user_id"=>$this->userId])->fetchall();
        }

    }

    protected function delNote($noteId) {
        $query="DELETE FROM notes where note_id=:NoteId;";
       $stmt= $this->query($query,[":NoteId"=>$noteId]);
       return $stmt;
    }
protected function editNote($noteId,$title,$note) {
    $query="UPDATE notes SET note_title=:title , note_content=:note   where note_id=:NoteId;";
    $stmt= $this->query($query,[":NoteId"=>$noteId,":title"=>$title,":note"=>$note]);
    return $stmt;
}
}