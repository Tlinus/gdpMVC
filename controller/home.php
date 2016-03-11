<?php 
Class Home{

	public function index(){
		if(!isset($_SESSION['id'])){
			header('location: index.php');
		}
		if($_SESSION['isAdmin'] ==1){
			$this->admin();
		}
		else{ $this->user();}
	}

	public function admin(){
		
	}

	public function user(){
		
	}
}