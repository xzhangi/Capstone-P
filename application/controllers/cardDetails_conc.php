<?php

class cardDetails_conc extends CI_Controller {
	
		public function __construct()
		{
			parent::__construct();
		}

        public function cardDetails() // This method initializes the validation class and loads the form helper and URL helper used by view files
        {
			$this->load->view('cardDetails');
        }
}		