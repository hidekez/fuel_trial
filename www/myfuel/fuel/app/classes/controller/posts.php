<?php

class Controller_Posts extends Controller_Template
{

    public function action_index()
    {
        $data['posts'] = Model_Post::find('all');
        $this->template->title = "Posts";
        $this->template->content = View::forge('post/index', $data);
    }

    public function action_view($id = null)
    {
        is_null($id) and Response::redirect('posts');

        if (!$data['post'] = Model_Post::find($id)) {
            Session::set_flash('error', 'Could not find post #' . $id);
            Response::redirect('posts');
        }

        $this->template->title = "Post";
        $this->template->content = View::forge('post/view', $data);

    }

    public function action_add()
    {
        if (Input::method() == 'POST') {
            $val = Model_Post::validate('add');

            if ($val->run()) {
                $post = Model_Post::forge([
                    'title'   => Input::post('title'),
                    'body'    => Input::post('body'),
                    'user_id' => Input::post('user_id'),
                ]);

                if ($post and $post->save()) {
                    Session::set_flash('success', 'Added post #' . $post->id . '.');

                    Response::redirect('posts');
                } else {
                    Session::set_flash('error', 'Could not save post.');
                }
            } else {
                Session::set_flash('error', $val->error());
            }
        }

        $this->template->title = "Posts";
        $this->template->content = View::forge('post/add');

    }

    public function action_edit($id = null)
    {
        is_null($id) and Response::redirect('posts');

        if (!$post = Model_Post::find($id)) {
            Session::set_flash('error', 'Could not find post #' . $id);
            Response::redirect('posts');
        }

        $val = Model_Post::validate('edit');

        if ($val->run()) {
            $post->title = Input::post('title');
            $post->body = Input::post('body');
            $post->user_id = Input::post('user_id');

            if ($post->save()) {
                Session::set_flash('success', 'Updated post #' . $id);

                Response::redirect('posts');
            } else {
                Session::set_flash('error', 'Could not update post #' . $id);
            }
        } else {
            if (Input::method() == 'POST') {
                $post->title = $val->validated('title');
                $post->body = $val->validated('body');
                $post->user_id = $val->validated('user_id');

                Session::set_flash('error', $val->error());
            }

            $this->template->set_global('post', $post, false);
        }

        $this->template->title = "Posts";
        $this->template->content = View::forge('post/edit');

    }

    public function action_delete($id = null)
    {
        is_null($id) and Response::redirect('post');

        if ($post = Model_Post::find($id)) {
            $post->delete();

            Session::set_flash('success', 'Deleted post #' . $id);
        } else {
            Session::set_flash('error', 'Could not delete post #' . $id);
        }

        Response::redirect('posts');

    }

}
