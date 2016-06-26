<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_new_coach_fields extends CI_Migration {

    public function __construct()
    {
        parent::__construct();
        $this->load->dbforge();
    }

    public function up()
    {
        echo '<p>Adding Coach Fields (confidentiality, trot_policies, ethics, cost, available, price)</p>';
       $fields =
            array(
                'confidentiality' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                    'null' => TRUE,
                ),
                'trot_policies' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                    'null' => TRUE,
                ),
                'ethics' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                    'null' => TRUE,
                ),
                'available' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 3,
                    'null' => TRUE,
                ),
                'price' => array(
                    'type' => 'DECIMAL',
                    'constraint' => '7, 2',
                    'null' => TRUE,
                ),
            );
        echo '<p>Finished adding Coach Fields</p>';
        $this->dbforge->add_column('users', $fields);
    }

    public function down()
    {
        $this->dbforge->drop_column('users', 'confidentiality');
        $this->dbforge->drop_column('users', 'trot_policies');
        $this->dbforge->drop_column('users', 'ethics');
        $this->dbforge->drop_column('users', 'available');
        $this->dbforge->drop_column('users', 'price');
    }
}