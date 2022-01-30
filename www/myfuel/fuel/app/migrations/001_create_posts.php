<?php

namespace Fuel\Migrations;

use DBUtil;

class Create_posts
{
    public function up()
    {
        DBUtil::create_table('posts', [
            'id'         => [
                'type'           => 'int',
                'unsigned'       => true,
                'null'           => false,
                'auto_increment' => true,
                'constraint'     => 11
            ],
            'title'      => ['type' => 'varchar', 'constraint' => 50, 'null' => false],
            'body'       => ['type' => 'text', 'null' => false],
            'user_id'    => ['type' => 'int', 'constraint' => 11, 'null' => false],
            'deleted_at' => ['null' => true, 'type' => 'datetime'],
            'created_at' => ['null' => false, 'type' => 'datetime'],
            'updated_at' => ['null' => false, 'type' => 'datetime'],
        ], ['id']);
    }

    public function down()
    {
        DBUtil::drop_table('posts');
    }
}