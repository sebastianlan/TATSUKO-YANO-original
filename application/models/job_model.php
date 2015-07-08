<?php

/**
 * 工作 model类
 */
class Job_model extends CI_Model {

    private $_table = "tyo_job";

    /**
     * 构造函数
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * 获取记录
     * @param type $where
     * @param type $order
     * @param type $limit
     * @param type $offset
     */
    public function getRecord($select="*",$where = array(), $order = array()) {
        $this->db->select($select);
        $this->db->where($where);
        if (!empty($order)) {
            $this->db->order_by($order);
        }
        return $this->db->get($this->_table);
    }

    /**
     * 
     * 
     * @param type $where
     * @param type $order
     * @param type $limit
     * @param type $offset
     * @return type
     */
    public function getRecordLimit($where = array(), $order = array(), $limit = 10, $offset = 0) {
        $this->db->where($where);
        if (!empty($order)) {
            $this->db->order_by($order);
        }
        return $this->db->get($this->_table, $limit, $offset);
    }

    /**
     * 
     * 获取数量
     * @param type $where
     * @return type
     */
    public function getCount($where = array()) {
        $this->db->where($where);
        $this->db->from($this->_table);
        return $this->db->count_all_results();
    }
    
    
    /**
     * 新增记录
     * @param type $field
     */
    public function addRecord($field) {
        $this->db->insert($this->_table, $field);
        return $this->db->insert_id();
    }
    
    /**
     * 新增多条记录
     * @param type $fields
     */
    public function addRecords($fields){
        return $this->db->insert_batch($this->_table, $fields);
    }
    
    /**
     * 
     * 更新记录
     * @param type $field
     * @param type $where
     */
    public function updateRecord($field, $where) {
        $this->db->where($where);
        return $this->db->update($this->_table, $field);
    }
    
    /**
     * 
     * 删除记录
     * @param type $field
     * @param type $where
     */
    public function deleteRecord($where) {
        $this->db->where($where);
        return $this->db->delete($this->_table);
    }
    
    
    

}
