<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Item extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
                'auto_increment' => false
			],
			'parent'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
                'null' => true,
			],
			'by'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'descendants'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
                'null' => true,
			],
			'score'       => [
				'type'           => 'INT',
				'constraint'     => 5,
                'null' => true,
			],
			'time'       => [
				'type'           => 'TIMESTAMP',
				'null' => true,
			],
			'title'      => [
				'type'           => 'TEXT',
                'null' => true,
			],
			'type' => [
				'type'       => 'ENUM',
				'constraint' => ['job', 'story', 'comment', 'poll', 'pollopt'],
				'default'    => 'story',
			],
			'url'      => [
				'type'           => 'TEXT',
                'null' => true,
			],
            'text'      => [
				'type'           => 'TEXT',
                'null' => true,
			],
		]);

		$this->forge->addPrimaryKey('id', TRUE);
		$this->forge->createTable('items', TRUE);
    }

    public function down()
    {
        //
    }
}
