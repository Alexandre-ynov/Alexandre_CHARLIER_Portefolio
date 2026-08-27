<?php

namespace Controllers;

use Models\Skill;

class SkillsController extends BaseController
{
    public function index(): void
    {
        $skillGroups = Skill::getGrouped();

        $this->render('skills/index', [
            'skillGroups' => $skillGroups,
        ], 'Mes Compétences Techniques - Alexandre CHARLIER');
    }
}
