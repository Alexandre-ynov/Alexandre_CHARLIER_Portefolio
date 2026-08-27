<?php
/**
 * Front Controller & Routeur PHP MVC
 */

// Si le fichier demandé existe sur le système (images, CSS, PDF), le serveur web le sert directement
$requestUri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$publicFile = __DIR__ . $requestUri;
if ($requestUri !== '/' && file_exists($publicFile) && !is_dir($publicFile)) {
    return false;
}

// Chargement de la configuration et des routes
$config = require __DIR__ . '/../config/config.php';
$routes = require __DIR__ . '/../config/routes.php';

// Autoloading basique des classes src/
spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $baseDir = __DIR__ . '/../src/';
    
    // Si la classe utilise le namespace App\
    if (strpos($class, $prefix) === 0) {
        $relativeClass = substr($class, strlen($prefix));
        $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';
        if (file_exists($file)) {
            require $file;
            return;
        }
    }

    // Chargement fallback par nom de classe (ex: Controllers\HomeController)
    $file = $baseDir . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

// Traitement du routing
$matchedRoute = null;
$params = [];

foreach ($routes as $routePattern => $target) {
    // Transformer /blog/{slug} en regex
    $pattern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '(?P<$1>[a-zA-Z0-9_-]+)', $routePattern);
    $pattern = '#^' . $pattern . '$#';
    
    if (preg_match($pattern, $requestUri, $matches)) {
        $matchedRoute = $target;
        foreach ($matches as $key => $value) {
            if (is_string($key)) {
                $params[$key] = $value;
            }
        }
        break;
    }
}

if ($matchedRoute) {
    $controllerName = 'Controllers\\' . $matchedRoute['controller'];
    $actionName = $matchedRoute['action'];

    if (class_exists($controllerName)) {
        $controller = new $controllerName($config);
        if (method_exists($controller, $actionName)) {
            call_user_func_array([$controller, $actionName], [$params]);
            exit;
        }
    }
}

// Page 404 si non trouvé
http_response_code(404);
$title = "404 - Page Non Trouvée";
$content = '<div class="text-center py-20">
    <h1 class="text-6xl font-extrabold text-emerald-400 mb-4 font-mono">404</h1>
    <p class="text-xl text-slate-300 mb-8">Oups ! La page recherchée n\'existe pas.</p>
    <a href="/" class="btn-primary">Retour à l\'accueil</a>
</div>';

include __DIR__ . '/../src/Views/layouts/main.php';
