<?php
namespace Bretuobay\App;

class View{

	public $data;

	public $css = [];

	public $js = [];

	public $viewDir;

	public function __construct()
	{
		$this->viewDir = __DIR__ . DS . STEPUP . DS . 'views' . DS;
	}

	public function loadHeader($header = null, $dir = null)
	{
		if ($header == null && $dir == null)
		{
			require_once $this->viewDir . 'header.php';

		}
 }

	public function loadFooter($footer = null, $dir = null)
	{
		if ($footer == null && $dir === null)
		{
			require_once $this->viewDir . 'footer.php';

		}
	}

	public function loadView($module, $data)
	{

		// this must be calls to the view

		$this->data = $data;
		$this->loadHeader();
		require_once $this->viewDir . $module . DS . $module . '.view.php';

		$this->loadFooter();
	}

	public function addCss()
	{
		foreach($this->css as $row)
		{
			echo "<link rel=\"stylesheet\" href=\"{$row['path']}\" media=\"{$row['media']}\" type=\"text/css\" />\n";
		}
	}


	public function addJs()
	{
		foreach($this->js as $row)
		{
			echo "<script type=\"text/javascript\" src=\"$row\"></script>\n";
		}
	}
  
}
