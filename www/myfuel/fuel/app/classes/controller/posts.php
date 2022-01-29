<?php

class Controller_Posts extends Controller_Template
{

	public function action_create()
	{
		$data["subnav"] = array('create'=> 'active' );
		$this->template->title = 'Posts &raquo; Create';
		$this->template->content = View::forge('posts/create', $data);
	}

	public function action_read()
	{
		$data["subnav"] = array('read'=> 'active' );
		$this->template->title = 'Posts &raquo; Read';
		$this->template->content = View::forge('posts/read', $data);
	}

	public function action_update()
	{
		$data["subnav"] = array('update'=> 'active' );
		$this->template->title = 'Posts &raquo; Update';
		$this->template->content = View::forge('posts/update', $data);
	}

	public function action_delete()
	{
		$data["subnav"] = array('delete'=> 'active' );
		$this->template->title = 'Posts &raquo; Delete';
		$this->template->content = View::forge('posts/delete', $data);
	}

}
