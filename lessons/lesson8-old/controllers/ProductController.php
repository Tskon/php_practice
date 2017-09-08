<?php


class ProductController {
	public function actionList() {
		echo 'ProductController';
		
		return true;
	}
	
	public function actionCatalog() {
		echo 'ProductController. Catalog';
		require_once '../models/products.php';
		
		
	}

}