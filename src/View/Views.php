<?php 
namespace Humanrizki\View;

use Humanrizki\Helper\Input;
use Humanrizki\Model\Todolist;

class Views{
    private $todolist;
    private $info;
    private $viewM = [
        1=>"Tambah Todo",
        2=>"Hapus Todo",
    ];
    public function __construct()
    {
        $this->todolist = new Todolist();
    }

    public function viewAdd(){
        echo $this->getInfo().PHP_EOL;
        $todo = (new Input("Masukkan string todo (x = batal): "))->put();
        if(strtolower($todo) == "x"){
            echo "Batal menambahkan todolist!".PHP_EOL;
        }else{
            $this->todolist->addTodo($todo);
        }
    }
    public function viewDel(){
        echo $this->getInfo().PHP_EOL;
        $todo = (new Input("Masukkan id/index todo (x = batal): "))->put();
        if(strtolower($todo) == "x"){
            echo "Batal menghapus todolist!";
        }else{
            $success = $this->todolist->removeTodo($todo);
            echo ($success) ? "Berhasil menghapus todo!".PHP_EOL : "Gagal menghapus todo!".PHP_EOL;
        }
    }
    public function viewShow(){
        while (true) {
            $this->todolist->showTodo();
    
            echo "============ MENU ============" . PHP_EOL;
            foreach($this->viewM as $number => $item){
                echo "$number. $item".PHP_EOL;
            }
            echo "x. Keluar" . PHP_EOL;
            
            $pilihan = strtolower((new Input("Masukkan pilihan aksi! (x = batal) : "))->put());
            if ($pilihan == "1") {
                $this->setInfo("Menambah Todo!")->viewAdd();
            } else if ($pilihan == "2") {
                $this->setInfo("Menghapus Todo!")->viewDel();
            } else if ($pilihan == "x") {
                break;
            } else {
                echo "Pilihan tidak dimengerti" . PHP_EOL;
            }
        }
        echo "Sampai Jumpa Lagi" . PHP_EOL;
    }

    
    public function setInfo($info)
    {
        $this->info = $info;
        return $this;
    }

    public function getInfo()
    {
        return $this->info;
    }
}