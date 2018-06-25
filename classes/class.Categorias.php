<?php
require_once('Crud.php');
require_once('CreateQuery.php');

class Categorias extends Crud  {
    protected $table = 'desc_categoria';
 
    public function selectCategorias() {
        $where = array("1"=>"1");
        $select = array("*");
        $cq = new CreateQuery();
        $result = $cq->select($select)->from($this->table)->where($where)->selectResult();
        return $this->select($result[0], $result[1]);
    }
    public function selectCategoria($whereId) {
        $where = array("id_categoria"=>$whereId);
        $select = array("*");
        $cq = new CreateQuery();
        $result = $cq->select($select)->from('categorias')->where($where)->selectResult();
        //$cq->getResult($result);
        return $this->select($result[0], $result[1]);
    }

}
