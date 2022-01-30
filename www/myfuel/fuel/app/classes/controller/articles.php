<?php

class Controller_Articles extends Controller_Template
{

    public function action_index()
    {
        Log::debug(__METHOD__ . " " . __LINE__ . " called.");// kez
        $data['articles'] = Model_Article::find('all');
        $this->template->title = "Articles";
        $this->template->content = View::forge('article/index', $data);

    }

    public function action_view($id = null)
    {
        is_null($id) and Response::redirect('article');

        if (!$data['article'] = Model_Article::find($id)) {
            Session::set_flash('error', 'Could not find article #' . $id);
            Response::redirect('article');
        }

        $this->template->title = "Article";
        $this->template->content = View::forge('article/view', $data);

    }

    public function action_add()
    {
        if (Input::method() == 'POST') {
            $val = Model_Article::validate('add');

            if ($val->run()) {
                $article = Model_Article::forge([
                    'title'   => Input::post('title'),
                    'body'    => Input::post('body'),
                    'user_id' => Input::post('user_id'),
                ]);

                if ($article and $article->save()) {
                    Session::set_flash('success', 'Added article #' . $article->id . '.');

                    Response::redirect('articles');
                } else {
                    Session::set_flash('error', 'Could not save article.');
                }
            } else {
                Session::set_flash('error', $val->error());
            }
        }

        $this->template->title = "Articles";
        $this->template->content = View::forge('article/add');

    }

    public function action_edit($id = null)
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

                Response::redirect('articles');
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

    public function action_delete($id = null)
    {
        is_null($id) and Response::redirect('article');

        if ($article = Model_Article::find($id)) {
            $article->delete();

            Session::set_flash('success', 'Deleted article #' . $id);
        } else {
            Session::set_flash('error', 'Could not delete article #' . $id);
        }

        Response::redirect('articles');

    }

}
