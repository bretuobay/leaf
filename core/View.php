<?php
namespace Bretuobay\App;

class View{

	public $data;

	public $css = [];

	public $js = [];


	protected $viewDir;

	protected $assetsDir;



	public function __construct()
	{

		$this->viewDir = __DIR__ . DS . STEPUP . DS . VIEWS . DS;

		$this->assetsDir =    ASSETS . ADS;
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

	public function appendJs($file,$module)
	{

    $this->js[] = $this->append_cache_breaker($this->assetsDir.'js'.ADS.$module.ADS.$file);
}

		public function appendCss($file, $module, $media='screen')
		{
        $temp = [];
        $temp['path'] = $this->append_cache_breaker($this->assetsDir.'css'.ADS.$module.ADS.$file);
        $temp['media'] = $media;
        $this->css[] = $temp;
    }

		public function append_cache_breaker($filename, $local_path = '') {
			 // added $local_path, in case the local filesystem path isn't the same as the relative url path.
			 // e.g. append_cache_breaker('images/popup_arrow.png', PATH_ROOT . 'html/');
			 // it doesn't affect output

			 if (APPEND_CACHE_BREAKER) {
					 // assumes file extension of 2-4 characters
					 preg_match('/(.*)\.([a-zA-Z0-9]{2,4})/', $filename, $matches);
					 return $matches[1] . '.v' . filemtime($local_path . $filename) . '.' . $matches[2];
			 } else {
					 return $filename;
			 }

	 } // function append_cache_breaker

}
