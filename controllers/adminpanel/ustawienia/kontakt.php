<?php

class Contact extends Controller {

    function __construct() {
        parent::__construct();

    }
    
    function index() {
        $this->view->title = 'Kontakt';
        $this->view->render('ustawienia/kontakt', 'admin');
    }
}