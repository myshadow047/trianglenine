<?php

class chat_inbox_model extends App_Base_Model {

    function save($data, $id = null) {
        if (empty($id)) {
            $this->_db()->insert($this->_name, $data);
            $err_no = $this->_db()->_error_number();
            $err_msg = $this->_db()->_error_message();
            if (empty($err_no)) {
                return $this->_db()->insert_id();
            } else {
                log_message('warn', $err_no . ' : ' . $err_msg);
                throw new RuntimeException($err_msg, $err_no);
            }
        } else {
            $this->_db()->where('id', $id);
            $this->_db()->update($this->_name, $data);
            $err_no = $this->_db()->_error_number();
            $err_msg = $this->_db()->_error_message();
            if (empty($err_no)) {
                return $id;
            } else {
                log_message('warn', $err_no . ' : ' . $err_msg);
                throw new RuntimeException($err_msg, $err_no);
            }
        }
    }

}