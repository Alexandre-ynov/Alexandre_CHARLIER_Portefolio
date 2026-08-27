<?php

namespace Controllers;

abstract class BaseController
{
    protected array $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    protected function render(string $viewPath, array $data = [], string $pageTitle = ''): void
    {
        $config = $this->config;
        $activeRoute = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $metaTitle = $pageTitle ? $pageTitle . ' | ' . $config['site']['name'] : $config['site']['title'];

        // Exposer toutes les variables transmises
        extract($data);

        // Capturer le contenu de la vue
        ob_start();
        $fullViewPath = __DIR__ . '/../Views/pages/' . $viewPath . '.php';
        if (file_exists($fullViewPath)) {
            include $fullViewPath;
        } else {
            echo "<p class='text-red-500'>Vue introuvable : {$viewPath}</p>";
        }
        $content = ob_get_clean();

        // Inclure le layout maître
        include __DIR__ . '/../Views/layouts/main.php';
    }
}
