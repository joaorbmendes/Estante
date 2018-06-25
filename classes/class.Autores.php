<?php
require_once('Crud.php');
require_once('CreateQuery.php');

class Autores extends Crud  {
    protected $table = 'autores';
 
    public function selectAutores() {
        $where = array("1"=>"1");
        $select = array("*");
        $cq = new CreateQuery();
        $result = $cq->select($select)->from($this->table)->where($where)->groupby('id')->selectResult();
        return $this->select($result[0], $result[1]);
    }
    public function selectAutor($whereId) {
        $where = array("id"=>$whereId);
        $select = array("*");
        $cq = new CreateQuery();
        $result = $cq->select($select)->from($this->table)->where($where)->selectResult();
        return $this->select($result[0], $result[1]);
    }

}
