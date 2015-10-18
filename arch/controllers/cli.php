<?php

class cli extends CI_Controller {

    function __construct() {
        parent::__construct();
        include APPPATH . 'config/' . ENVIRONMENT . '/database.php';
        $this->db = $db;
        $this->load->helper(array('x', 'url'));
        $this->load->config('app');
    }

    function _rrmdir($dir) {
        foreach(glob($dir . '/*') as $file) {
            if(is_dir($file))
                $this->_rrmdir($file);
            else
                unlink($file);
        }
        @rmdir($dir);
    }

    function lang() {
        if (!$this->input->is_cli_request()) {
            echo '<pre>';
        }

        $locale_dir = APPPATH . 'language/locale';
        $lang_dir = APPPATH . 'language';
        $output_dir = $locale_dir . '/default/LC_MESSAGES';
        $arch_output_dir = ARCHPATH . 'language/locale/default/LC_MESSAGES';
        $lock_file = './install/lang/xlang.lock';

        $now = time();
        $micro = microtime();
        if (!empty($micro)) {
            $micro = $micro * 100000000;
            $now = date('YmdHis', $now) . intval($micro);
        } else {
            $now = date('YmdHis', $now) . '00000000';
        }

        $which_find = exec('which find');
        if (strpos(strtolower($which_find), 'windows') !== FALSE) {
            $which_find = 'C:\cygwin\bin\find';
        }

        if (!file_exists($lock_file)) {
            @touch($lock_file);

			if (!file_exists($output_dir)) {
            	mkdir($output_dir, 0777, true);
			}
            if (file_exists($output_dir . '/messages.po')) {
                unlink($output_dir . '/messages.po');
            }
            touch($output_dir . '/messages.po');

			if (!file_exists($arch_output_dir)) {
            	mkdir($arch_output_dir, 0777, true);
			}
            if (file_exists($arch_output_dir . '/messages.po')) {
                unlink($arch_output_dir . '/messages.po');
            }
            touch($arch_output_dir . '/messages.po');

            $output = '';
            $cmd = $which_find . ' '.APPPATH.' -iname "*.php" -print0 | xargs -0 xgettext --language=PHP --indent --omit-header --no-location --sort-output --output-dir="' . $output_dir . '" --keyword=l -j -f -';
            exec($cmd, $output);

            $cmd = $which_find . ' '.ARCHPATH.' -iname "*.php" -print0 | xargs -0 xgettext --language=PHP --indent --omit-header --no-location --sort-output --output-dir="' . $arch_output_dir . '" --keyword=l -j -f -';
            exec($cmd, $output);

            $d = opendir($lang_dir);
            while ($entry = readdir($d)) {
                if (is_dir($lang_dir . '/' . $entry) && $entry[0] !== '.' && strtolower($entry) !== 'default'  && strtolower($entry) !== 'locale') {
                    echo "Create language for $entry\n";

                    $this->_rrmdir($locale_dir . '/' . $entry);
                    $lang_file = $lang_dir.'/'.$entry.'/messages_lang.php';
                    $lang = array();
                    include($lang_file);
                    $f = fopen($output_dir . '/messages.po', 'r');
                    $fw = fopen($lang_file, 'w');
                    fputs($fw, "<?php\n\n");
                    fputs($fw, "/** Generated code. Please dont add manually, it will be discarded on next generate cycle **/\n\n");
                    while($line = fgets($f)) {
                        if (substr($line, 0, 5) === 'msgid') {
                            $exploded = explode('"', $line, 2);
                            $key_line = substr($exploded[1], 0, (count($exploded[1])-3));
                            while($line = fgets($f)) {
                                if ($line[0] === ' ') {
                                    $exploded = explode('"', $line, 2);
                                    $key_line .= substr($exploded[1], 0, (count($exploded[1])-3));
                                } else {
                                    break;
                                }
                            }
                            eval('$key_key = "'.$key_line.'";');

                            fputs($fw, '$lang["'.$key_line."\"] = '".@stripslashes($lang[$key_key])."';\n");
                        }
                    }
                    fclose($f);
                    fclose($fw);

                    $lang_file = ARCHPATH.'language/'.$entry.'/messages_lang.php';
                    $lang = array();
                    @include($lang_file);
                    $f = fopen(ARCHPATH.'language/locale/default/LC_MESSAGES/messages.po', 'r');
                    $fw = fopen($lang_file, 'w');
                    fputs($fw, "<?php\n\n");
                    fputs($fw, "/** Generated code. Please dont add manually, it will be discarded on next generate cycle **/\n\n");
                    while($line = fgets($f)) {
                        if (substr($line, 0, 5) === 'msgid') {
                            $exploded = explode('"', $line, 2);
                            $key_line = substr($exploded[1], 0, (count($exploded[1])-3));
                            while($line = fgets($f)) {
                                if ($line[0] === ' ') {
                                    $exploded = explode('"', $line, 2);
                                    $key_line .= substr($exploded[1], 0, (count($exploded[1])-3));
                                } else {
                                    break;
                                }
                            }
                            eval('$key_key = "'.$key_line.'";');

                            fputs($fw, '$lang["'.$key_line."\"] = '".@stripslashes($lang[$key_key])."';\n");
                        }
                    }
                    fclose($f);
                    fclose($fw);
                }
            }
            closedir($d);
            @unlink($lock_file);
        } else {
            echo "install/lang is already running\n";
        }

        if (!$this->input->is_cli_request()) {
            echo '</pre>';
        }
    }

    function _clean_sql($dump_file) {
        $this->load->helper('date');
        // copy($dump_file, $dump_file . '.backup-working-' . date('YmdHis'));

        @unlink($dump_file . '.1');
        $f = fopen($dump_file, 'r');
        $f1 = fopen($dump_file . '.1', 'w');

        while ($line = fgets($f)) {
            if (substr($line, 0, 3) == '/*!') {
                continue;
            }
            $line = str_replace('),(', "),\n(", $line);
            $line = str_replace('VALUES (', "VALUES\n(", $line);
            $line = preg_replace('/ AUTO_INCREMENT=(\d+)/e', '', $line);
            $line = preg_replace('/\(\d+,/i', '(NULL,', $line);
            $line = preg_replace("/'\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}'/i", 'NOW()', $line);
            $line = preg_replace("/NOW\\(\\),'*\\w+'*/i", "NOW(),'0'", $line);

            if (strpos($line, "`created_by` varchar(255) NOT NULL,") !== FALSE) {
                $line = str_replace("`created_by` varchar(255) NOT NULL,", "`created_by` int(11) NOT NULL,", $line);
            }

            if (strpos($line, "`updated_by` varchar(255) NOT NULL,") !== FALSE) {
                $line = str_replace("`updated_by` varchar(255) NOT NULL,", "`updated_by` int(11) NOT NULL,", $line);
            }

            fputs($f1, $line, strlen($line));
        }

        fclose($f);
        fclose($f1);

        @unlink($dump_file);
        rename($dump_file . '.1', $dump_file);
    }

    function dump_db() {
        if (!$this->input->is_cli_request()) {
            show_404($this->uri->uri_string);
        }

        foreach ($this->db as $d) {
            if ($d['dbdriver'] == 'pdo') {
                $d['_hostname'] = $d['hostname'];

                $t = explode(':', $d['hostname']);
                $d['dbdriver'] = $t[0];

                $t = explode(';', $t[1]);
                $o = array();
                foreach($t as $s) {
                    $s = explode('=', $s);
                    $o[$s[0]] = $s[1];
                }
                $d['hostname'] = $o['host'];
            }
            $dump_file = APPPATH.'install/db/' . $d['database'] . '.sql';
            $output = '';
            $cmd = sprintf('mysqldump -h"%s" -u"%s" -p"%s" "%s" > "%s"', $d['hostname'], $d['username'], $d['password'], $d['database'], $dump_file);
            exec($cmd, $output);
            $to_file = explode('/application/', $dump_file, 2);
            $to_file = $to_file[1];
            $this->_print('Database "' . $d['database'] . '" dumped to '. $to_file);
            $this->_print($output);

            $this->_clean_sql($dump_file);
            $this->_print('Database SQL "' . $d['database'] . '" cleaned');
        }
    }

    function meld_db() {
        if (!$this->input->is_cli_request()) {
            show_404($this->uri->uri_string);
        }

        foreach($this->db as $d) {
            $output = '';
            $cmd = sprintf('meld "'.APPPATH.'/install/db/%s.sql" "'.APPPATH.'install/init/init.sql"', $d['database']);
            exec($cmd, $output);
            $this->_print($output);
            break;
        }
    }

    function init($force = false) {
        if (!$this->input->is_cli_request()) {
            show_404($this->uri->uri_string);
        }

        foreach ($this->db as $d) {

            if ($d['dbdriver'] == 'pdo') {
                $d['_hostname'] = $d['hostname'];

                $t = explode(':', $d['hostname']);
                $d['dbdriver'] = $t[0];

                $t = explode(';', $t[1]);
                $o = array();
                foreach($t as $s) {
                    $s = explode('=', $s);
                    $o[$s[0]] = $s[1];
                }
                $d['hostname'] = $o['host'];
            }
            $dump_file = APPPATH.'/install/init/init.sql';

            $output = '';
            $cmd = sprintf('mysqladmin -f -h"%s" -u"%s" -p"%s" drop "%s"', $d['hostname'], $d['username'], $d['password'], $d['database']);
            exec($cmd, $output);
            $this->_print($output);

            $output = '';
            $cmd = sprintf('mysqladmin -h"%s" -u"%s" -p"%s" create "%s"', $d['hostname'], $d['username'], $d['password'], $d['database']);
            exec($cmd, $output);
            $this->_print($output);
            $this->_print('Database "' . $d['database'] . '" created');

            $output = '';
            $cmd = sprintf('mysql -h"%s" -u"%s" -p"%s" "%s" < "%s"', $d['hostname'], $d['username'], $d['password'], $d['database'], $dump_file);
            exec($cmd, $output);
            $this->_print($output);
            $this->_print('Database "' . $d['database'] . '" initialized');

            exit;
        }
    }

    function _print($output) {
        if (!is_array($output)) {
            $output = array($output);
        }

        foreach ($output as $line) {
            echo $line . "\n";
        }
    }

    function _post_controller_constructor() {
        if (!$this->_check_access()) {
            redirect('user/error?continue=' . current_url(), null, 303);
        }
    }

    function _check_access() {
        return $this->input->is_cli_request();
    }

}
