<?php
defined('BASEPATH') or exit('No direct script access allowed');

class front extends CI_Controller
{

    public function index()
    {
        
        $this->template->load('templates/front', 'auth/front');
        
    }

    
}
