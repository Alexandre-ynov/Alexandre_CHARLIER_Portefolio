<?php

namespace Controllers;

class ContactController extends BaseController
{
    public function index(): void
    {
        $this->render('contact', [], 'Contact');
    }
}
