<?php
class View
{
	public static function render($target, $arguments = null)
	{
		ob_start();

		if(is_array($arguments)) {
			extract($arguments);
		}

		include 'templete/'.$target.".php";

		echo ob_get_clean();
	}
}
