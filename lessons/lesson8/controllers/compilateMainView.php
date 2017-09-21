<?php
$mainView = file_get_contents('views/main.php', true);
$mainView = str_replace("{{title}}", $actionName, $mainView);
if ($isAuth) {
    include_once '/models/loggedUserMenu.php';
	$admPanelView = file_get_contents('views/adminPanel.php', true);
	$admPanelView = str_replace("{{user}}", $authUser['userName'], $admPanelView);
	$mainView = str_replace("{{right}}", file_get_contents('views/loggedUserMenu.php'), $mainView);
	echo $admPanelView;
	if ($authUser['root'] == 1){
		$mainView = str_replace("{{adminMenu}}", adminMenu(), $mainView);
	}else{
		$mainView = str_replace("{{adminMenu}}", '', $mainView);
	}
    $mainView = str_replace("{{userMenu}}", userMenu(), $mainView);
} else {
	$mainView = str_replace("{{right}}", file_get_contents('views/auth.php'), $mainView);
}
$mainView = str_replace("{{header}}", file_get_contents('views/header.php'), $mainView);
$mainView = str_replace("{{content}}", $contentView, $mainView);
echo $mainView;
