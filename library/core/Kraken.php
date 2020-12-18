<?php

    /**
     * Database model for Glowie applications.
     * @category Database model
     * @package GlowieFramework
     * @author Gabriel Silva
     * @copyright Copyright (c) 2020
     * @link https://github.com/glowie
     * @version 1.0.0
     */
    class Kraken{
        public $db;
        public $table;

        /**
         * Connects application to a specific database table.
         * @param array $database Connection settings. Use 'default' to connect to the globally defined database (in Config.php);
         * @param string $table Table name.
         */
        public function __construct($database = 'default', $table = 'glowie'){
            if($database == 'default') $database = $GLOBALS['glowieConfig']['database'];
            $this->db = new MysqliDb($database['host'], $database['username'], $database['password'], $database['db'], $database['port']);
            $this->table = $table;
        }

        /**
         * Inserts data into the table.
         * @param array $data Data to be inserted. Must be an array with keys related to each column.
         * @return mixed Returns the last inserted ID on success or false on error.
         */
        public function insertData($data){
            $id = $this->db->insert($this->table, $data);
            if($id){
                return $id;
            }else{
                return false;
                if($this->db->errors == E_ALL) Util::log('DATABASE ERROR: ' . $this->db->getLastError(), true);
            }
        }

        public function saveData($filters = array(), $data){
            if (!empty($filters) && is_array($filters)) {
                foreach ($filters as $key => $value) {
                    if (substr($key, 0, 1) == '#') {
                        if (substr($value, 0, 1) == '%' || substr($value, -1, 1) == '%') {
                            $this->db->orWhere(substr($key, 1), $value, 'like');
                        } else {
                            $this->db->orWhere(substr($key, 1), $value);
                        }
                    } else {
                        if (substr($value, 0, 1) == '%' || substr($value, -1, 1) == '%') {
                            $this->db->where($key, $value, 'like');
                        } else {
                            $this->db->where($key, $value);
                        }
                    }
                }
            }
            if($this->db->update($this->table, $data)){
                return true;
            }else{
                return false;
                if ($this->db->errors == E_ALL) Util::log('DATABASE ERROR: ' . $this->db->getLastError(), true);
            }
        }

        public function getData($filters = array(), $limit = 0, $order = false, $orderBy = '', $orderAs = 'ASC', $pagination = false, $currentPage = 1, $itemsPerPage = 10){
            if(!empty($filters) && is_array($filters)){
                foreach($filters as $key => $value){
                    if(substr($key, 0, 1) == '#'){
                        if(substr($value, 0, 1) == '%' || substr($value, -1, 1) == '%'){
                            $this->db->orWhere(substr($key, 1), $value, 'like');
                        }else{
                            $this->db->orWhere(substr($key, 1), $value);
                        }
                    }else{
                        if(substr($value, 0, 1) == '%' || substr($value, -1, 1) == '%'){
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
                return array(
                    'dados' => $this->db->arraybuilder()->paginate($this->table, $currentPage),
                    'paginas' => $this->db->totalPages
                );
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