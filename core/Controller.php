<?php

class Controller
{
	protected $vars = array();
	protected $layout = 'defaut';

	public function __construct()
	{
		if(isset($_POST))
		{
			$this->data = $_POST;
		}
	}

	function render($filename, $data)
	{
		extract($data);
		ob_start(); 
		require(ROOT.'views/'.strtolower(get_class($this)).'/'.$filename.'.php');
		$content_for_layout = ob_get_clean();
		if($this->layout==false)
		{
			echo $content_for_layout;
		}
		else
		{
			require(ROOT.'views/layout/'.$this->layout.'.php');
		}
	}

	public function loadModel($name)
	{
		require_once(ROOT.'models/'.strtolower($name).'Model.php');
		$this->$name = new $name();
		return $this->$name;
	}
}
?>