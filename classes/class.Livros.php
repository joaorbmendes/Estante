<?php
require_once('Crud.php');
require_once('CreateQuery.php');

class Livros extends Crud  {
    //protected $table = 'view_livros';
    protected $table = 'view_livro';
 
    public function selectLivros($select, $where) {
        //$where = array("1"=>"1");
        //$select = array("*");
        $cq = new CreateQuery();
        $result = $cq->select($select)->from($this->table)->where($where)->selectResult();
        return $this->select($result[0], $result[1]);
    }
    public function selectLivro($whereId) {
        $where = array("id"=>$whereId);
        $select = array("*");
        $cq = new CreateQuery();
        $result = $cq->select($select)->from($this->table)->where($where)->selectResult();
        return $this->select($result[0], $result[1]);
    }

}
