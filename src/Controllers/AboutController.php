<?php

namespace Controllers;

use Models\Experience;
use Models\Skill;

class AboutController extends BaseController
{
    public function index(): void
    {
        $education = Experience::getEducation();
        $experience = Experience::getProfessional();
        $skillGroups = Skill::getGrouped();

        $this->render('about', [
            'education' => $education,
            'experience' => $experience,
            'skillGroups' => $skillGroups,
        ], 'À Propos & Cursus');
    }
}
