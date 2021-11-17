<?php 
namespace Humanrizki\View;

use Humanrizki\Helper\Input;
use Humanrizki\Model\Todolist;
use ReflectionMethod;

class Views{
    public $todolist;
    public function __construct(private string $info = "")
    {
        $this->todolist = new Todolist();
    }

    public function viewAdd(){
        echo "$this->info".PHP_EOL;
        $input = new Input("Masukkan string todo (x = batal): ");
        $todo = $input->put();
        if(strtolower($todo) == "x"){
            echo "Batal menambahkan todolist!".PHP_EOL;
        }else{
            $this->todolist->addTodo($todo);
        }
    }
    public function viewDel(){
        echo "$this->info".PHP_EOL;
        $input = new Input("Masukkan id/index todo (x = batal): ");
        $todo = $input->put();
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
            echo "1. Tambah Todo" . PHP_EOL;
            echo "2. Hapus Todo" . PHP_EOL;
            echo "x. Keluar" . PHP_EOL;
            
            $input = new Input("Masukkan pilihan aksi! (x = batal) : ");
            $pilihan = $input->put();
    
            if ($pilihan == "1") {
                $this->info = "Menambah todo!";
                $this->viewAdd();
            } else if ($pilihan == "2") {
                $this->info = "Menghapus todo!";
                $this->viewDel();
            } else if ($pilihan == "x") {
                break;
            } else {
                echo "Pilihan tidak dimengerti" . PHP_EOL;
            }
        }
        echo "Sampai Jumpa Lagi" . PHP_EOL;
    }
}