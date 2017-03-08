<?php

class Defaut extends Controller
{
	function index()
	{
		$data = [];
		$this->render('index', $data);
	}
}

?>