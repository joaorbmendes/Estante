<?php
require_once('Crud.php');
require_once('CreateQuery.php');

class Search extends Crud {
    protected $table = 'view_livros';
    public function selectSearch($select, $like) {
        $cq = new CreateQuery();
        $result = $cq->select($select)->from($this->table)->like($like)->searchResult();
        //$cq->getResult($result);
        return $this->search($result[0], $result[1]);
    }
}