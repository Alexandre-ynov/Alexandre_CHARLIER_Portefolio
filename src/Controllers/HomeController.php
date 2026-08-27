<?php

namespace Controllers;

use Models\Project;
use Models\Article;
use Models\Skill;

class HomeController extends BaseController
{
    public function index(): void
    {
        $projects = Project::getFeatured();
        $latestArticles = array_slice(Article::getAll(), 0, 2);
        $skillGroups = Skill::getGrouped();

        $this->render('home', [
            'projects' => $projects,
            'latestArticles' => $latestArticles,
            'skillGroups' => $skillGroups,
        ], 'Accueil');
    }
}
