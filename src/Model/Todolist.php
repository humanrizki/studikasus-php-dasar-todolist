<?php
namespace Humanrizki\Model;
class Todolist{
    private $todolist = [];
    public function addTodo(string $statement){
        $number = (sizeof($this->todolist) == 0) ? 1 : sizeof($this->todolist) + 1;
        $this->todolist[$number] = $statement;
        return $this;
    }
    public function showTodo(){
        echo "======== Todolist App ========".PHP_EOL;
        foreach($this->todolist as $number => $item){
            echo "$number. $item".PHP_EOL;
        }
        return $this;
    }
    public function removeTodo($id):bool|Todolist{
        if($id > sizeof($this->todolist)){
            return false;
        } else {
            for ($i = $id; $i < sizeof($this->todolist); $i++) {
                $this->todolist[$i] = $this->todolist[$i + 1];
            }
            unset($this->todolist[sizeof($this->todolist)]);
            return true;
        }
        return $this;
    }
}