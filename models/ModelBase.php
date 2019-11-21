<?php

  namespace Models;

  use DBManager\database;
  use DBManager\Manager;

  class ModelBase  {

    /**
     * @var object
    */
    public $db;

    public function __construct() {
      $this -> db = database::connect();
    }

    /**
     * Get one record from database
     *
     * @author Darío Hernández
     * @param string $table
     * @param int $id
     * @return object|bool false
     *
     */
    public function getOne(string $table, int $id) {

        $sql = "SELECT * FROM $table WHERE id = $id";
        $query = $this -> db -> query($sql);

        $query ? $record = $query -> fetch_object() : false;

        return $record;
    }

    /**
     * Gets all records from given table
     *
     * @author Darío Hernández
     * @param mixed
     * @return object
     *
     */
    public function getAll(string $table, $order = 'ASC') {

      $sql = "SELECT * FROM $table ORDER BY id $order";

      $query = $this -> db -> query($sql);

      return $query;
    }

    /**
     * Gets last introduced record from given table
     *
     * @param string $table
     * @return object
     *
     */
    public function getLast(string $table) {

      $sql = "SELECT * FROM $table WHERE id = (SELECT MAX(id) FROM $table)";
      $query = $this -> db -> query($sql);

      $output = $query -> fetch_object();

      return $output;

    }

    /**
     * Gets older introduced record from given table
     *
     * @param string $table
     * @return object
     *
     */
    public function getFirst(string $table) {

      $sql = "SELECT * FROM $table WHERE id = (SELECT MIN(id) FROM $table)";
      $query = $this -> db -> query($sql);

      $output = $query -> fetch_object();

      return $output;

    }

    /**
     * Deletes one record from given database and table
     *
     * @param string $table
     * @param integer $id
     * @return bool
     *
     */
    public function deleteOne(string $table, int $id) {

        $sql = "DELETE FROM $table WHERE id = $id";
        $query = $this -> db -> query($sql);
        return $query;

    }

    /**
     * Updates one record from database
     *
     * @author Darío Hernández
     * @param string $table
     * @param string $setValue
     * @param string $whereValue
     * @return bool
     *
     */
    public function updateOneColumn(string $table, $setValue, $whereValue) {

        $manager = new Manager();

        $sql = $manager -> update($table) -> set('cantidad', $setValue) -> where('id', $whereValue) -> getSql();
        $query = $this -> db -> query($sql);

        return $query ? true : false;

    }



  }
