<?php
require_once('BaseDados.php');

class Crud extends BaseDados {
  protected $table;

/**
 * Metodo para inserir valores na base de dados
 *
 * @param String $sqlCreated
 * @param Array $bind
 * @return void
 */
  public function insert($sqlCreated, $bind) {
    $sql = $sqlCreated;
    $stmt = BaseDados::prepare($sql);
    //var_dump($sql);
    //var_dump($bind);
  
    foreach ($bind as $key => &$value) {
      $stmt->bindParam(':'.$key, $value); 
    }
  
    //var_dump($stmt);
    return $stmt->execute();
 }
  
 /**
  * Metodo para fazer um select à base de dados
  *
  * @param [type] $sqlCreated
  * @param [type] $bind
  * @return void
  */
  public function select($sqlCreated, $bind) {

    $sql = $sqlCreated;
    $stmt = BaseDados::prepare($sql);
    
    foreach ($bind as $key => &$value) {
      $stmt->bindParam(':'.$key, $value); 
    }
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;

  }

 /**
  * Metodo para fazer um select à base de dados
  *
  * @param [type] $sqlCreated
  * @param [type] $bind
  * @return void
  */
  public function search($sqlCreated, $bind) {

    $sql = $sqlCreated;
    $stmt = BaseDados::prepare($sql);
    
    
      $stmt->bindParam(':search', $bind[0]); 
      $stmt->bindParam(':search', $bind[0]); 
   
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;

  }
  /**
   * Metodo para fazer um update à base de dados
   *
   * @param String $sqlCreated
   * @param Array $bind
   * @return void
   */
  public function update($sqlCreated, $bind) {
    $sql = $sqlCreated;
    $stmt = BaseDados::prepare($sql);
    return $stmt->execute();
  }

  /**
   * Metodo para eliminar da base de dados
   *
   * @param String $sqlCreated
   * @param Array $bind
   * @return void
   */
  public function delete($sqlCreated, $bind) {
    $sql = $sqlCreated;
    $stmt = BaseDados::prepare($sql);
    $stmt->execute();
  }

}
