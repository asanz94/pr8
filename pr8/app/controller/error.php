<?php

	Class Home extends Controller{
		function __construct($params){

			parent::__construct($params);
			$this->model = new merror;
		}

			function error(){
				$this->loader->vista('vError.php',$this->model->Infoerror());
		}

	}