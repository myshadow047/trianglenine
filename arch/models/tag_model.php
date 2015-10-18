<?php

class tag_model extends App_Base_Model {

    function add($tag_name) {

        $data = array(
            'name' => $tag_name
        );
        $obj = $this->get($data);

        if (empty($obj)) {
            return $this->save($data);
        } else {
            return $obj['id'];
        }
    }

}
