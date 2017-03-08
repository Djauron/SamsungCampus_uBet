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

	public function render($filename, array $scope)
	{
		extract($scope);
		ob_start();
		$content_for_layout = false;

		if(file_exists(ROOT.'views/'.strtolower(get_class($this)).'/'.$filename.'.php'))
		{
			require_once(ROOT.'views/'.strtolower(get_class($this)).'/'.$filename.'.php');
			$content_for_layout = ob_get_clean();
		}


		if($content_for_layout != false)
		{
			echo $content_for_layout;
		}
		else
		{
			if(file_exists(ROOT.'views/layout/'.strtolower($filename).'.php'))
			{
				require_once(ROOT.'views/layout/'.strtolower($filename).'.php');
			}
			else
			{
				require_once(ROOT.'views/layout/'.strtolower($this->layout).'.php');
			}
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