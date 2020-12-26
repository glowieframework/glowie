<?php
    namespace Glowie;

    /**
     * Model base for Glowie application.
     * @category Model
     * @package glowie
     * @author Glowie Framework
     * @copyright Copyright (c) 2021
     * @license MIT
     * @link https://github.com/glowieframework/glowie
     * @version 1.0.0
     */
    class Kraken{
        public $db;
        public $table;

        /**
         * Connects to a database table.
         * @param array $database Connection settings. Use an empty array to connect to the globally defined database (in **Config.php**).
         * @param string $table Table name.
         */
        public function __construct($database = [], $table = 'glowie'){
            $this->setDatabase($database);
            $this->setTable($table);
        }

        /**
         * Sets the current table.
         * @param string $table Table name.
         */
        public function setTable($table){
            if (empty($table)) trigger_error('setTable: Table name should not be empty');
            $this->table = $table;
        }

        /**
         * Sets the current database connection.
         * @param array $database Connection settings. Use an empty array to connect to the globally defined database (in **Config.php**).
         */
        public function setDatabase($database){
            if (empty($database)) $database = $GLOBALS['glowieConfig']['database'];
            if (!is_array($database)) trigger_error('setDatabase: Database connection settings must be an array');
            if (empty($database['host'])) trigger_error('setDatabase:  Database host not defined');
            if (empty($database['username'])) trigger_error('setDatabase:  Database username not defined');
            if (empty($database['password'])) $database['password'] = '';
            if (empty($database['port'])) $database['port'] = 3306;
            if (empty($database['db'])) trigger_error('setDatabase: Database name not defined');
            $this->db = new \MysqliDb($database['host'], $database['username'], $database['password'], $database['db'], $database['port']);
        }

        /**
         * Inserts data into the table.
         * @param array $data Data to be inserted. Must be an array with keys related to each column.
         * @return mixed Returns the last inserted ID on success.
         */
        public function insertData($data){
            $id = $this->db->insert($this->table, $data);
            if($id && $this->db->getLastErrno() !== 0){
                return $id;
            }else{
                trigger_error('insertData: ' . $this->db->getLastError());
            }
        }

        public function saveData($filters = [], $data){
            if (!empty($filters) && is_array($filters)) {
                foreach ($filters as $key => $value) {
                    if (substr($key, 0, 1) == '#') {
                        if (strpos($value, '%') !== false) {
                            $this->db->orWhere(substr($key, 1), $value, 'like');
                        } else {
                            $this->db->orWhere(substr($key, 1), $value);
                        }
                    } else {
                        if (strpos($value, '%') !== false) {
                            $this->db->where($key, $value, 'like');
                        } else {
                            $this->db->where($key, $value);
                        }
                    }
                }
            }
            if($this->db->update($this->table, $data) && $this->db->getLastErrno() !== 0){
                return true;
            }else{
                trigger_error('saveData: ' . $this->db->getLastError());
            }
        }

        public function getData($filters = [], $limit = 0, $order = false, $orderBy = '', $orderAs = 'ASC', $pagination = false, $currentPage = 1, $itemsPerPage = 10){
            if(!empty($filters) && is_array($filters)){
                foreach($filters as $key => $value){
                    if(substr($key, 0, 1) == '#'){
                        if(strpos($value, '%') !== false){
                            $this->db->orWhere(substr($key, 1), $value, 'like');
                        }else{
                            $this->db->orWhere(substr($key, 1), $value);
                        }
                    }else{
                        if(strpos($value, '%') !== false){
                            $this->db->where($key, $value, 'like');
                        }else{
                            $this->db->where($key, $value);
                        }
                    }
                }
            }
            if($order) $this->db->orderBy($orderBy, $orderAs);
            if($pagination){
                $this->db->pageLimit = $itemsPerPage;
                return [
                    'data' => $this->db->arraybuilder()->paginate($this->table, $currentPage),
                    'pages' => $this->db->totalPages
                ];
            }else{
                if($limit == 1){
                    return $this->db->getOne($this->table);
                }else{
                    return $this->db->get($this->table, $limit == 0 ? null : $limit);
                }
            }
        }

    }

?>