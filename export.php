<?php
/**
 * Script d'export HTML statique pour GitHub Pages
 * Génère le site web complet dans le dossier docs/
 */

require_once __DIR__ . '/src/Controllers/BaseController.php';
require_once __DIR__ . '/src/Controllers/HomeController.php';
require_once __DIR__ . '/src/Controllers/ProjectsController.php';
require_once __DIR__ . '/src/Controllers/SkillsController.php';
require_once __DIR__ . '/src/Controllers/BlogController.php';
require_once __DIR__ . '/src/Controllers/AboutController.php';
require_once __DIR__ . '/src/Controllers/ContactController.php';
require_once __DIR__ . '/src/Controllers/StyleguideController.php';
require_once __DIR__ . '/src/Models/Project.php';
require_once __DIR__ . '/src/Models/Skill.php';
require_once __DIR__ . '/src/Models/Article.php';
require_once __DIR__ . '/src/Models/Experience.php';

$outputDir = __DIR__ . '/docs';
if (!is_dir($outputDir)) {
    mkdir($outputDir, 0777, true);
}

// Copie des assets publics (CSS, images, PDF) dans docs/
function copyDir($src, $dst) {
    $dir = opendir($src);
    @mkdir($dst);
    while (false !== ($file = readdir($dir))) {
        if (($file != '.') && ($file != '..')) {
            if (is_dir($src . '/' . $file)) {
                copyDir($src . '/' . $file, $dst . '/' . $file);
            } else {
                copy($src . '/' . $file, $dst . '/' . $file);
            }
        }
    }
    closedir($dir);
}

// Copier le contenu de public/ dans docs/
copyDir(__DIR__ . '/public', $outputDir);

// Capturer l'affichage d'un contrôleur
function capturePage(callable $action, string $activeRoute): string {
    $_SERVER['REQUEST_URI'] = $activeRoute;
    $GLOBALS['activeRoute'] = $activeRoute;
    ob_start();
    $action();
    $content = ob_get_clean();
    
    // Remplacer les liens internes pour GitHub Pages statique
    $content = str_replace('href="/projects"', 'href="projects.html"', $content);
    $content = str_replace('href="/skills"', 'href="skills.html"', $content);
    $content = str_replace('href="/blog"', 'href="blog.html"', $content);
    $content = str_replace('href="/about"', 'href="about.html"', $content);
    $content = str_replace('href="/contact"', 'href="contact.html"', $content);
    $content = str_replace('href="/styleguide"', 'href="styleguide.html"', $content);
    $content = str_replace('href="/"', 'href="index.html"', $content);
    $content = preg_replace('/href="\/blog\/([a-zA-Z0-9\-]+)"/', 'href="blog-$1.html"', $content);

    return $content;
}

$config = require __DIR__ . '/config/config.php';

// 1. Home
echo "Génération de index.html...\n";
$homeHtml = capturePage(function() use ($config) {
    $c = new Controllers\HomeController($config);
    $c->index();
}, '/');
file_put_contents($outputDir . '/index.html', $homeHtml);

// 2. Projects
echo "Génération de projects.html...\n";
$projectsHtml = capturePage(function() use ($config) {
    $c = new Controllers\ProjectsController($config);
    $c->index();
}, '/projects');
file_put_contents($outputDir . '/projects.html', $projectsHtml);

// 3. Skills
echo "Génération de skills.html...\n";
$skillsHtml = capturePage(function() use ($config) {
    $c = new Controllers\SkillsController($config);
    $c->index();
}, '/skills');
file_put_contents($outputDir . '/skills.html', $skillsHtml);

// 4. Blog index
echo "Génération de blog.html...\n";
$blogHtml = capturePage(function() use ($config) {
    $c = new Controllers\BlogController($config);
    $c->index();
}, '/blog');
file_put_contents($outputDir . '/blog.html', $blogHtml);

// 5. Articles de blog individuels
$articles = Models\Article::getAll();
foreach ($articles as $article) {
    $slug = $article['slug'];
    echo "Génération de blog-{$slug}.html...\n";
    $articleHtml = capturePage(function() use ($config, $slug) {
        $c = new Controllers\BlogController($config);
        $c->show(['slug' => $slug]);
    }, '/blog');
    file_put_contents($outputDir . "/blog-{$slug}.html", $articleHtml);
}

// 6. About
echo "Génération de about.html...\n";
$aboutHtml = capturePage(function() use ($config) {
    $c = new Controllers\AboutController($config);
    $c->index();
}, '/about');
file_put_contents($outputDir . '/about.html', $aboutHtml);

// 7. Contact
echo "Génération de contact.html...\n";
$contactHtml = capturePage(function() use ($config) {
    $c = new Controllers\ContactController($config);
    $c->index();
}, '/contact');
file_put_contents($outputDir . '/contact.html', $contactHtml);

// 8. Styleguide
echo "Génération de styleguide.html...\n";
$styleguideHtml = capturePage(function() use ($config) {
    $c = new Controllers\StyleguideController($config);
    $c->index();
}, '/styleguide');
file_put_contents($outputDir . '/styleguide.html', $styleguideHtml);

echo "✅ Export statique généré avec succès dans le dossier docs/ !\n";
