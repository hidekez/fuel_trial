<?php

use Orm\Model_Soft;

class Model_Post extends Model_Soft
{
    protected static $_properties = [
        "id"         => [
            "label"     => "Id",
            "data_type" => "int",
        ],
        "title"      => [
            "label"     => "Title",
            "data_type" => "varchar",
        ],
        "body"       => [
            "label"     => "Body",
            "data_type" => "text",
        ],
        "user_id"    => [
            "label"     => "User id",
            "data_type" => "int",
        ],
        "deleted_at" => [
            "label"     => "Deleted at",
            "data_type" => "timestamp",
        ],
        "created_at" => [
            "label"     => "Created at",
            "data_type" => "timestamp",
        ],
        "updated_at" => [
            "label"     => "Updated at",
            "data_type" => "timestamp",
        ],
    ];

    protected static $_observers = [
        'Orm\Observer_CreatedAt' => [
            'events'          => ['before_insert'],
            'property'        => 'created_at',
            'mysql_timestamp' => true,
        ],
        'Orm\Observer_UpdatedAt' => [
//            'events'          => ['before_update'],
            'events'          => ['before_save'],
//            'property'        => 'updated_at',
            'mysql_timestamp' => true,
        ],
    ];

    protected static $_soft_delete = [
        'mysql_timestamp' => true,
        'deleted_field'   => 'deleted_at',
    ];

    protected static $_table_name = 'posts';

    protected static $_primary_key = ['id'];

    protected static $_has_many = [];

    protected static $_many_many = [];

    protected static $_has_one = [];

    protected static $_belongs_to = [];

    public static function validate($factory)
    {
        $val = Validation::forge($factory);
        $val->add_field('title', 'Title', 'required|max_length[50]');
        $val->add_field('body', 'Body', 'required');
        $val->add_field('user_id', 'User Id', 'required|valid_string[numeric]');

        return $val;
    }

}
