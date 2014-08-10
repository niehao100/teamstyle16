<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Home extends Controller
{
	/**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
	public function index($user_nickname )
	{
		// debug message to show where you are, just for the demo
		echo 'Message from Controller: You are in the controller home, using the method index()';
		if ($user_nickname == '') {
			if (isset($_SESSION['user_logged_in'])) {
				header('location:' .URL. 'dashboard');
			} else {
				require 'application/views/_templates/header.php';
				require 'application/views/home/index.php';
				require 'application/views/_templates/footer.php';
			}
		} else {
			echo 'You are visiting ' .$user_nickname. '\'s home page.';
		}
	}
}