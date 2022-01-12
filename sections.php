<?php
$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	case '3EFDTQ8eHXjIZt1FQqyw2w7uF0hrU0YT60yCN8kPBJ9tQ2kSXmOlgroKx6Y61' :
		include_once 'home.php';		
		break;

	case '3EFDTQ8eHXjIZt1FQqyw2w7uF0hrU0YT60yCN8kPBJ9tQ2kSXmOlgroKx6Y62' :
		include_once 'gallery.php';		
		break;

	case '3EFDTQ8eHXjIZt1FQqyw2w7uF0hrU0YT60yCN8kPBJ9tQ2kSXmOlgroKx6Y63' :
		include_once 'rates.php';		
		break;

	case '3EFDTQ8eHXjIZt1FQqyw2w7uF0hrU0YT60yCN8kPBJ9tQ2kSXmOlgroKx6Y64' :
        include_once 'contact.php';		
	break;
    case '3EFDTQ8eHXjIZt1FQqyw2w7uF0hrU0YT60yCN8kPBJ9tQ2kSXmOlgroKx6Y65' :
		include_once 'sitemap.php';		
		break;

	default :
    include_once 'home.php';		
}
?>