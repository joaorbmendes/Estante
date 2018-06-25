<?php
class CreateQuery
{
    private $selectables = array();
    private $table;
    private $whereClause;
    private $limit;
    private $orderby;
    private $groupby;
    private $insert;
    private $update;

    public function insert($insertValues) {
        $this->insert=$insertValues;
        return $this;
    }

    public function select($select) {
        $this->selectables=$select;
        return $this;
    }

    public function update($update) {
        $this->update=$update;
        return $this;
    }
    public function from($table) {
        $this->table = $table;
        return $this;
    }
    public function where($clause) {
        $this->whereClause = $clause;
        return $this;
    }
    public function groupby($groupby) {
        $this->groupby = $groupby;
        return $this;
    }
    public function orderby($orderby) {
        $this->orderby = $orderby;
        return $this;
    }
    public function limit($limit) {
        $this->limit = $limit;
        return $this;
    }
    public function like($like) {
        $this->like = $like;
        return $this;
    }
    public function getResult($result) {
       $query = $result[0];
       $bind = $result[1];
       echo "Query = " . $query;
       echo "<br>";
       foreach ($bind as $key => $value) {
           echo "Bind = " . $key . " ==> " . $value . "<br/>";
       }
    }

    public function insertResult() {
        $query = "INSERT INTO {$this->table}";
        $field = 0;
        foreach ($this->insert as $key => $value) {
            if($field === 0) {
                $query .= " (" .  $key;
            } else {
                $query .= ", " . $key; 
            }
            $field++; 
        }
        $query .= ") VALUES ( ";

        $field = 0;
        foreach ($this->insert as $key => $value) {
            if($field === 0) {
                $query .= ":". $key . "";
            } else {
                $query .= ", " . ":" . $key. ""; 
            }
            $field++; 
        }

        $query .= " )";

        // Colocar os valor para o bind da query
        $bind = array();
        foreach($this->insert as $key => $value) {
            $bind[$key] = $value;
        }
        return $result = array($query, $bind);    // retorna a query e o bind
    }


    public function selectResult() {
        $query = "SELECT ".join(", ",$this->selectables)." FROM {$this->table}";
        if (!empty($this->whereClause)) {
            $query .= " WHERE ";
            $field = 0; 
            foreach($this->whereClause as $key => $value) {
                if($field != 0) {
                    $query .= " AND ";              
                }
                $query .= $key . " = :" . $key;
                $field++;
            }
        }
        if (!empty($this->groupby))
        $query .= " GROUP BY {$this->groupby}";
        if (!empty($this->orderby))
        $query .= " ORDER BY {$this->orderby}";
        if (!empty($this->limit))
        $query .= " LIMIT {$this->limit}";
        if (!empty($this->like))
        $query .= " LIKE {$this->like}";
   
        // Colocar os valor para o bind da query
        $bind = array();
        foreach($this->whereClause as $key => $value) {
            $bind[$key] = $value;
        }
        return $result = array($query, $bind);    // retorna a query e o bind
        
    }


    public function searchResult() {
        $query = "SELECT ".join(", ",$this->selectables)." FROM {$this->table}";
     
        if (!empty($this->like))
        $query .= " WHERE titulo LIKE :search OR nome LIKE :search";
   
        // Colocar os valor para o bind da query
        $bind = array($this->like);

        return $result = array($query, $bind);    // retorna a query e o bind
        
    }


    public function updateResult() {
        $query = "UPDATE {$this->table} SET ";

        $field = 0; 
        foreach ($this->update as $key => $value) {
            if($field === 0) {
                $query .= $key . " = '" . $value . "'";
            } else {
                $query .= ", " . $key . " = '" . $value . "'";                
            }

            $field++; 
        }
        if (!empty($this->whereClause)) {
            $query .= " WHERE ";
            $field = 0; 
            foreach($this->whereClause as $key => $value) {
                $query .= $key . " = " . $value;
            } 
        }

        // Colocar os valor para o bind da query
        $bind = array();
        foreach($this->update as $key => $value) {
            $bind[$key] = $value;
        }
        return $result = array($query, $bind);     // retorna a query e o bind
    }

    public function deleteResult() {
        $query = "DELETE FROM {$this->table}";

        if (!empty($this->whereClause)) {
            $query .= " WHERE ";
            $field = 0; 
            foreach($this->whereClause as $key => $value) {
                $query .= $key . " = " . $value;
            } 
        }

        // Colocar os valor para o bind da query
        $bind = array();
        foreach($this->whereClause as $key => $value) {
            $bind[$key] = $value;
        }
        return $result = array($query, $bind);  // retorna a query e o bind
    }
}
