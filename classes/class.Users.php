<?php
require_once('Crud.php');
require_once('CreateQuery.php');

class Users extends Crud {
    protected $table = 'utilizadores';
    protected $id;
    protected $nome;
    protected $email;
    protected $data_nasc;
    protected $genero;
    protected $password;

    public function insertUser($insert) {
        $cq = new CreateQuery();
        $result = $cq->from($this->table)->insert($insert)->insertResult();  
        return $this->insert($result[0], $result[1]);
        //$cq->getResult($result);
        //var_dump($result);
    }
    public function selectUser($select, $where) {
        $cq = new CreateQuery();
        $result = $cq->select($select)->from($this->table)->where($where)->limit('1')->selectResult();
        //$cq->getResult($result);
        return $this->select($result[0], $result[1]);
    }
    public function updateUser($update, $where) {
        $cq = new CreateQuery();
        $result = $cq->update($update)->from($this->table)->where($where)->updateResult();
        $this->update($result[0], $result[1]);
    }
    public function deleteUser($where) {
        $cq = new CreateQuery();
        $result = $cq->from($this->table)->where($where)->deleteResult();
        $this->delete($result[0], $result[1]);
    }

    public function createSession() {
        $_SESSION['ID'] = $this->id; 
        $_SESSION['NOME'] = $this->nome;
        $_SESSION['GENERO'] = $this->genero;
        $_SESSION['DATA_NASC'] = $this->data_nasc;   
        $_SESSION['EMAIL'] = $this->email;
        $_SESSION['TIMEOUT'] = time(); 
    }
  
}


