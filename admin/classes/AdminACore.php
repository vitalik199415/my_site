<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 09.09.14
 * Time: 12:23
 * Admin Core
 */

abstract class ACore {

    protected $db;

    public function __construct(){
        $this->db = mysql_connect(HOST, USER, PASS);
        if (!$this->db) {
            exit("Помилка з'єднання з БД".mysql_error());
        }
        if (!mysql_select_db(DB,$this->db)) {
            exit("Вибраної БД не існує.".mysql_error());
        }
        mysql_query("SET NAMES 'UTF8'");

    }
    
    protected function get_header(){
        include "template/header.php";
    }
    
    protected function get_category(){
        include "template/left_block.php";
    }

    protected abstract function get_content();

    protected function get_footer() {
        include "template/footer.php";
    }

    public function get_body(){
        $this->get_header(); 
        $this->get_category();
        $this->get_content();
        $this->get_footer();
    }
}

?> 