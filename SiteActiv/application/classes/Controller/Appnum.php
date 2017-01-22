<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Appnum extends Controller_Template{

	public $template = 'vIndex';
	

	public function action_index()
	{
		$this->template->title = 'Тестовое задание';
		$this->template->m_title = 'Вывод чисел';
		$this->template->link = '<link rel="stylesheet" type="text/css" href="/application/bootstrap/css/bootstrap.min.css">';
		$this->template->form = View::factory('vForm');

		$numbers = array(
		
			1 => 'Тут выводятся числа', 
		);

		$this->template->content = View::factory('vAppnum', array(

			'numbers' => $numbers,

		));

		

	}



	public function action_form()
	{
		$this->template->title = 'Тестовое задание';
		$this->template->m_title = 'Вывод чисел';
		$this->template->link = '<link rel="stylesheet" type="text/css" href="/application/bootstrap/css/bootstrap.min.css">';
		$this->template->form = View::factory('vForm');

		/* Данные из формы */

		$uplimit = $_POST['uplimit'];

		$numbers = array();

		for ($i=1; $i < $uplimit + 1; $i++) { 
			
			$numbers[] = $i;
		}



		$this->template->content = View::factory('vAppnum', array(

			'numbers' => $numbers,

		));



		
	}





} // End Welcome