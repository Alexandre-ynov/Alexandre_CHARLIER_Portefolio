<?php
/**
 * Table de routage URL -> Controller@method
 */

return [
    '/' => ['controller' => 'HomeController', 'action' => 'index'],
    '/projects' => ['controller' => 'ProjectsController', 'action' => 'index'],
    '/skills' => ['controller' => 'SkillsController', 'action' => 'index'],
    '/blog' => ['controller' => 'BlogController', 'action' => 'index'],
    '/blog/{slug}' => ['controller' => 'BlogController', 'action' => 'show'],
    '/about' => ['controller' => 'AboutController', 'action' => 'index'],
    '/contact' => ['controller' => 'ContactController', 'action' => 'index'],
    '/styleguide' => ['controller' => 'StyleguideController', 'action' => 'index'],
];
