<?php

namespace Controllers;

class StyleguideController extends BaseController
{
    public function index(): void
    {
        $this->render('styleguide', [], 'Design System & Styleguide');
    }
}
