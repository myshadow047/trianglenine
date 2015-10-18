<?php

class MY_Cache extends CI_Cache {

    protected $lib_name = 'CI_Cache';
    var $app_id = '';

    protected function _initialize($config) {
        parent::_initialize($config);

        if ( ! $this->is_supported($this->_adapter) && $this->is_supported($this->_backup_driver)) {
            // If the main adapter isn't supported, use the backup driver
            $this->_adapter = $this->_backup_driver;
        }

        $CI = &get_instance();
        $this->app_id = $CI->config->item('app_id');
    }

    public function context_get($id) {
        return $this->get($this->app_id.':'.$id);
    }

    public function context_save($id, $data, $ttl = 60) {
        return $this->save($this->app_id.':'.$id, $data, $ttl);
    }

    public function context_delete($id) {
        return $this->delete($this->app_id.':'.$id);
    }

}
