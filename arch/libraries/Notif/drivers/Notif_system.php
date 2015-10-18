<?php

class Notif_system extends CI_Driver {
    function show() {
        $data = array(
            'self' => $this,
        );
        return $this->ci->load->view('libraries/notif_system_show', $data, true);
    }

    function notify($data) {
        if (empty($data['user_id'])) {
            $data['user_id'] = (empty($data['user']['id'])) ? $data['user'] : $data['user']['id'];
            unset($data['user']);
        }


        if (empty($data['title'])) {
            $message = $this->ci->load->view($data['template'] . '/'. $data['type'], $data['data'], true);
            $message = explode("\n", $message, 2);
            $data['message'] = $data['title'] = $message[0];
            if (count($message) == 2) {
                $data['message'] = $message[1];
            }
        }
        unset($data['data']);
        $this->ci->_model('notification')->save($data);
    }
}