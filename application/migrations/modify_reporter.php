<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Migration_modify_reporter extends CI_Migration {
    public function up() {
        $fields = array(
            'id_news' => array(
                'type' => 'VARCHAR',
                'constraint' => '11',
            ),
        );
        $this->dbforge->modify_column('reporter', $fields);
    }
    public function down() {
        
    }
}