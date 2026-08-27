<?php

namespace Controllers;

use Models\Project;

class ProjectsController extends BaseController
{
    public function index(): void
    {
        $projects = Project::getAll();

        $this->render('projects/index', [
            'projects' => $projects,
        ], 'Mes Projets');
    }
}
