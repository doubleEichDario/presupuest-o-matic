<?php
namespace DBManager;

class Manager {

    /**
    * @var string
    */
    private $sql = "";

    /**
    * @var string
    */
    private $table;

    /**
    * @var string
    */
    private $whereColumn;

    /**
    * @var string
    */
    private $whereValue;

    /**
    * @var string
    */
    private $setColumn;

    /**
    * @var string
    */
    private $setValue;

    /**
     * Adds SET clause
     *
     * @param string $table
     * @return $this
     *
     */
    public function update($table) {
      $this -> table = $table;
      $this -> sql = "UPDATE {$this -> table} ";

      return $this;
    }

    /**
     * Adds SET clause
     *
     * @param string $setColumn
     * @param mixed $setValue
     * @return $this
     *
     */
    public function set($setColumn, $setValue) {
        $this -> setColumn = $setColumn;
        $this -> setValue = $setValue;
        $this -> sql .= "SET {$this -> setColumn} = {$this -> setValue} ";

        return $this;
    }

    /**
     * Adds WHERE clause
     *
     * @return $this
     *
     */
    public function where($whereColumn, $whereValue) {

        $this -> whereColumn = $whereColumn;
        $this -> whereValue = $whereValue;
        $this -> sql .= "WHERE {$this -> whereColumn} = {$this -> whereValue}";

        return $this;
    }

    /**
     * Gets a constructed sql statement
     *
     * @return string
     *
     */
    public function getSql() {
        return $this -> sql;
    }


}
