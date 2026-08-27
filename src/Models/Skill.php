<?php

namespace Models;

class Skill
{
    public static function getGrouped(): array
    {
        return [
            'Langages & Web' => [
                ['name' => 'Python', 'level' => 'Avancé', 'icon' => 'devicon-python-plain colored', 'badge' => 'Principal'],
                ['name' => 'C#', 'level' => 'Intermédiaire', 'icon' => 'devicon-csharp-plain colored', 'badge' => 'POO'],
                ['name' => 'PHP (MVC)', 'level' => 'Intermédiaire', 'icon' => 'devicon-php-plain colored', 'badge' => 'Backend'],
                ['name' => 'Vue.js', 'level' => 'Intermédiaire', 'icon' => 'devicon-vuejs-plain colored', 'badge' => 'Frontend'],
                ['name' => 'Tailwind CSS', 'level' => 'Avancé', 'icon' => 'devicon-tailwindcss-original colored', 'badge' => 'Design System'],
                ['name' => 'HTML5 / CSS3', 'level' => 'Avancé', 'icon' => 'devicon-html5-plain colored', 'badge' => 'Web'],
            ],
            'Data Science & Big Data' => [
                ['name' => 'SQL & MySQL', 'level' => 'Avancé', 'icon' => 'devicon-mysql-plain colored', 'badge' => 'BDD'],
                ['name' => 'Jupyter Notebook', 'level' => 'Avancé', 'icon' => 'devicon-jupyter-plain colored', 'badge' => 'Analyse'],
                ['name' => 'Pandas / NumPy', 'level' => 'Intermédiaire', 'icon' => 'devicon-pandas-plain colored', 'badge' => 'Data Science'],
                ['name' => 'Scikit-Learn', 'level' => 'En cours', 'icon' => 'devicon-scikitlearn-line colored', 'badge' => 'Machine Learning'],
                ['name' => 'Spark', 'level' => 'Intermédiaire', 'icon' => 'devicon-apachespark-original colored', 'badge' => 'Big Data'],
                ['name' => 'Kafka', 'level' => 'Intermédiaire', 'icon' => 'devicon-apachekafka-original colored', 'badge' => 'Streaming'],
                ['name' => 'Design Patterns', 'level' => 'Pratique', 'icon' => '🏗️', 'badge' => 'Architecture'],
            ],
            'Outils & Environnement' => [
                ['name' => 'GitHub / Git', 'level' => 'Avancé', 'icon' => 'devicon-git-plain colored', 'badge' => 'DevOps'],
                ['name' => 'VS Code', 'level' => 'Avancé', 'icon' => 'devicon-vscode-plain colored', 'badge' => 'IDE'],
                ['name' => 'Docker', 'level' => 'Intermédiaire', 'icon' => 'devicon-docker-plain colored', 'badge' => 'Conteneurs'],
                ['name' => 'Word / Excel / PPT', 'level' => 'Expert', 'icon' => '📑', 'badge' => 'Bureautique'],
                ['name' => 'Teams / Zoom', 'level' => 'Avancé', 'icon' => '💬', 'badge' => 'Collaboration'],
            ]
        ];
    }
}
