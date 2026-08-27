<?php

namespace Controllers;

use Models\Article;

class BlogController extends BaseController
{
    public function index(): void
    {
        $articles = Article::getAll();

        $this->render('blog/index', [
            'articles' => $articles,
        ], 'Blog & Retours d\'expérience');
    }

    public function show(array $params = []): void
    {
        $slug = $params['slug'] ?? '';
        $article = Article::getBySlug($slug);

        if (!$article) {
            http_response_code(404);
            $this->render('404', [], 'Article non trouvé');
            return;
        }

        $this->render('blog/show', [
            'article' => $article,
        ], $article['title']);
    }
}
