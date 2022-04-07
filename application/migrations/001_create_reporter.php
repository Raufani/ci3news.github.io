<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Migration_create_reporter extends CI_Migration {
    public function up() {
        $attributes = array('ENGINE' => 'MyISAM');
        $fields = array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'reporter_name' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
            ),
            'id_news' => array(
                'type' => 'INT',
                'constraint' => 11,
            ),
        );
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id');
        //$this->dbforge->add_field('CONSTRAINT FOREIGN KEY (id_news) REFERENCES ci_news(ne_id)');
        $this->dbforge->create_table('reporter', FALSE, $attributes);

        $data = array(
            array('reporter_name' => "raufani",
            'id_news' => "48"),
            array('reporter_name' => "Abdul",
            'id_news' => "38"),
         );
         //$this->db->insert('user_group', $data); 
        $this->db->insert_batch('reporter', $data);
        $this->db->query('ALTER TABLE `reporter` ADD FOREIGN KEY(`id_news`) REFERENCES  ci_news(`ne_id`) ON DELETE CASCADE ON UPDATE CASCADE;');
    }
    
    public function down() {
        $this->dbforge->drop_table('reporter');
    }
}