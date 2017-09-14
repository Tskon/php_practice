<?php
$mainView = file_get_contents('views/main.php', true);
$mainView = str_replace("{{title}}", $actionName, $mainView);
if ($isAuth) {
	$admPanelView = file_get_contents('views/adminPanel.php', true);
	$admPanelView = str_replace("{{user}}", $authUser['userName'], $admPanelView);
	$mainView = str_replace("{{right}}", file_get_contents('views/loggedUserMenu.php'), $mainView);
	echo $admPanelView;
	if ($authUser['root'] == 1){
		$mainView = str_replace("{{userMenu}}", 'user', $mainView);
		$mainView = str_replace("{{adminMenu}}", 'admin', $mainView);
	}else{
		$mainView = str_replace("{{userMenu}}", 'user', $mainView);
		$mainView = str_replace("{{adminMenu}}", 'none', $mainView);
	}
} else {
	$mainView = str_replace("{{right}}", file_get_contents('views/auth.php'), $mainView);
}
$mainView = str_replace("{{header}}", file_get_contents('views/header.php'), $mainView);
$mainView = str_replace("{{content}}", $contentView, $mainView);
echo $mainView;
