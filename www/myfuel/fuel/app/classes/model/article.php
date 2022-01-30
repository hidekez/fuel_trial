<?php

use Orm\Model;

class Model_Article extends Model
{
    protected static $_properties = [
        'id',
        'title',
        'body',
        'user_id',
        'created_at',
        'updated_at',
    ];

    protected static $_observers = [
        'Orm\Observer_CreatedAt' => [
            'events'          => ['before_insert'],
            'mysql_timestamp' => true,
        ],
        'Orm\Observer_UpdatedAt' => [
            'events'          => ['before_save'],
            'mysql_timestamp' => true,
        ],
    ];

    public static function validate($factory)
    {
        $val = Validation::forge($factory);
        $val->add_field('title', 'Title', 'required|max_length[50]');
        $val->add_field('body', 'Body', 'required');
        $val->add_field('user_id', 'User Id', 'required|valid_string[numeric]');

        return $val;
    }

}
