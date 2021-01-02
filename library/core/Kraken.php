<?php
    namespace Glowie;

    /**
     * Model core for Glowie application.
     * @category Model
     * @package glowie
     * @author Glowie Framework
     * @copyright Copyright (c) 2021
     * @license MIT
     * @link https://github.com/glowieframework/glowie
     * @version 1.0.0
     */
    class Kraken{

        /**
         * Current MysqliDb object.
         * @var \MysqliDb
         */
        public $db;

        /**
         * Current table.
         * @var string
         */
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
            if (empty($table) || trim($table) == '') trigger_error('setTable: Table name should not be empty');
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
         * @param array $data Data to be inserted. Must be an associative array with keys related to each column.
         * @return mixed|bool Returns the last inserted ID on success.
         */
        public function insertData($data){
            if(empty($data)) trigger_error('insertData: Data cannot be empty');
            if(!is_array($data)) trigger_error('insertData: Data must be an array');
            $id = $this->db->insert($this->table, $data);
            if($id && $this->db->getLastErrno() !== 0){
                return $id;
            }else{
                trigger_error('insertData: ' . $this->db->getLastError());
                return false;
            }
        }

        /**
         * Inserts multiple data into the table.
         * @param array $data Data to be inserted. Must be an array of associative arrays with keys related to each column.
         * @return array|bool Returns an array with the last inserted IDs on success.
         */
        public function insertMultipleData($data){
            if (empty($data)) trigger_error('insertMultipleData: Data cannot be empty');
            if (!is_array($data)) trigger_error('insertMultipleData: Data must be an array');
            $ids = $this->db->insertMulti($this->table, $data);
            if($ids && $this->db->getLastErrno() !== 0){
                return $ids;
            }else{
                trigger_error('insertMultipleData: ' . $this->db->getLastError());
                return false;
            }
        }

        /**
         * Updates data in the table.
         * @param array $filters Associative array with WHERE filters (see docs).
         * @param array $data Data to be updated. Must be an associative array with keys related to each column.
         * @param int $limit Maximum number of records to update. Use 0 for unlimited.
         * @return mixed|bool Returns the amount of updated records on success.
         */
        public function updateData($filters = [], $data, $limit = 0){
            if (empty($data)) trigger_error('updateData: Data cannot be empty');
            if (!is_array($data)) trigger_error('updateData: Data must be an array');
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
            if($this->db->update($this->table, $data, $limit == 0 ? null : $limit) && $this->db->getLastErrno() !== 0){
                return $this->db->count;
            }else{
                trigger_error('updateData: ' . $this->db->getLastError());
                return false;
            }
        }

        /**
         * Selects data from the table.
         * @param array $filters Associative array with WHERE filters (see docs).
         * @param int $limit Maximum number of records to select. Use 0 for unlimited.
         * @param bool $order Order data by a column value.
         * @param string $orderBy If **order** is true, the column to use while ordering data.
         * @param string $orderAs If **order** is true, the sorting method to use while ordering data.\
         * **ASC** = Ascending or **DESC** = Descending.
         * @param bool $pagination Split records in pages.
         * @param int $currentPage If **pagination** is true, the current page to fetch records.
         * @param int $itemsPerPage If **pagination** is true, the maximum number of records to get per page.
         * @return array Returns an array of associative arrays with the fetched records.
         */
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