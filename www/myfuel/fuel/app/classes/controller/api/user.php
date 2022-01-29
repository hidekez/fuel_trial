<?php
/**
 * Fuel is a fast, lightweight, community driven PHP 5.4+ framework.
 *
 * @package    Fuel
 * @version    1.9-dev
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2019 Fuel Development Team
 * @link       https://fuelphp.com
 */

use Fuel\Core\Controller;
use Fuel\Core\Controller_Rest;

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 *
 * @package  app
 * @extends  Controller
 */
class Controller_Api_User extends Controller_Rest
{
    public function get_list()
    {
        return $this->response([
            'foo'   => Input::get('foo'),
            'baz'   => [
                1,
                50,
                219
            ],
            'empty' => null
        ]);
    }

    public function get($id)
    {

    }
}
