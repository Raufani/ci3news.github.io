<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Migration_create_reporter extends CI_Migration {
public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'reporter_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'id_news' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
        ));
        $this->dbforge->add_key('id');
        $this->dbforge->create_table('reporter');
    }
    public function down() {
        $this->dbforge->drop_table('reporter');
    }
}