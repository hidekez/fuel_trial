<?php

use Fuel\Core\Controller_Rest;

class Controller_Api_Articles extends Controller_Rest
{
    protected $format = 'json';

    public function get_index()
    {
        Log::debug(__METHOD__." ".__LINE__."  called.");// kez
        $fetched = Model_Article::find('all');
        $this->response($fetched);
    }

    public function get_view($id = null)
    {
        if (is_null($id)) {
            $this->response([], 400);
        }
        $fetched = Model_Article::find($id);
        $this->response($fetched);
    }

    public function post_add()
    {
        $request = Input::post('article');
        Model_Article::forge(['article' => $request])->save();

//        if (Input::method() == 'POST') {
//            $val = Model_Article::validate('add');
//
//            if ($val->run()) {
//                $article = Model_Article::forge([
//                    'title'   => Input::post('title'),
//                    'body'    => Input::post('body'),
//                    'user_id' => Input::post('user_id'),
//                ]);
//
//                if ($article and $article->save()) {
//                    Session::set_flash('success', 'Added article #' . $article->id . '.');
//
//                    Response::redirect('article');
//                } else {
//                    Session::set_flash('error', 'Could not save article.');
//                }
//            } else {
//                Session::set_flash('error', $val->error());
//            }
//        }
    }

    public function post_edit($id = null)
    {
        is_null($id) and Response::redirect('article');

        if (!$article = Model_Article::find($id)) {
            Session::set_flash('error', 'Could not find article #' . $id);
            Response::redirect('article');
        }

        $val = Model_Article::validate('edit');

        if ($val->run()) {
            $article->title = Input::post('title');
            $article->body = Input::post('body');
            $article->user_id = Input::post('user_id');

            if ($article->save()) {
                Session::set_flash('success', 'Updated article #' . $id);

                Response::redirect('article');
            } else {
                Session::set_flash('error', 'Could not update article #' . $id);
            }
        } else {
            if (Input::method() == 'POST') {
                $article->title = $val->validated('title');
                $article->body = $val->validated('body');
                $article->user_id = $val->validated('user_id');

                Session::set_flash('error', $val->error());
            }

            $this->template->set_global('article', $article, false);
        }

        $this->template->title = "Articles";
        $this->template->content = View::forge('article/edit');

    }

//    public function delete($id = null)
//    {
//        is_null($id) and Response::redirect('article');
//
//        if ($article = Model_Article::find($id)) {
//            $article->delete();
//
//            Session::set_flash('success', 'Deleted article #' . $id);
//        } else {
//            Session::set_flash('error', 'Could not delete article #' . $id);
//        }
//
//        Response::redirect('article');
//    }

}
