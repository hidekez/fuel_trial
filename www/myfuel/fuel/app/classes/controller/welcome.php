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
use Fuel\Core\DB;
use Fuel\Core\View;

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 *
 * @package  app
 * @extends  Controller
 */
class Controller_Welcome extends Controller
{
	/**
	 * The basic welcome message
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		return Response::forge(View::forge('welcome/index'));
	}

	/**
	 * A typical "Hello, Bob!" type example.  This uses a Presenter to
	 * show how to use them.
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_hello()
	{
        $query = DB::query('SELECT * FROM users WHERE id = 1');
        $fetched = $query->execute();
        Log::debug(__METHOD__." ".__LINE__." fetched:".print_r($fetched,1));// kez
        var_dump($fetched);

//        var_dump(phpinfo());

//        $this->check_db_connection();

//        if (\Fuel\Core\DBUtil::table_exists('users')){
//            \Fuel\Core\Log::debug('users exists.');
//        }

        return Response::forge(Presenter::forge('welcome/hello'));
	}



	/**
	 * The 404 action for the application.
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_404()
	{
		return Response::forge(Presenter::forge('welcome/404'), 404);
	}


    private function check_db_connection() {
        try {
            // host=XXXの部分のXXXにはmysqlのサービス名を指定します
            $dsn = 'mysql:host=mysql;dbname=myfuel;';
            $db = new PDO($dsn, 'admin', 'admin');

            $sql = 'SELECT version();';
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            var_dump($result);
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }
}
