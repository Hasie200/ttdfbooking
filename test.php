 <?php

$_SESSION['jackson'] = 'jackson';

$_SESSION[$_SESSION['username']] = 'we maybe onto something' ;



if(isset($_SESSION[ $_SESSION['username'] ])){

	echo 'this is the '. $_SESSION[ $_SESSION['username'] ];

}



?>