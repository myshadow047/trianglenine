<?php

class Sequence_model extends App_Base_Model {

    function get_sequence($key) {
        $row = $this->db->query('SELECT * FROM sequence WHERE skey = ?', array($key))->row_array();
        if (empty($row)) {
            $row = array(
                'skey' => $key,
                'sequence' => 1,
            );
            $id = NULL;
        } else {
            $row['sequence'] = $row['sequence'] + 1;
            $id = $row['id'];

        }
        $this->save($row, $id);
        return $row['sequence'];
    }

}

