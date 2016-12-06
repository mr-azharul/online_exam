<?php
	 // Inialize session
	 session_start();

	 // Delete certain session
	 session_unset();
	 // Delete all session variables
	 // session_destroy();
	 session_destroy();
	 // Jump to login page
	 header('Location: http://localhost/online_exam/Index/index');
?>