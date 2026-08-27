<?php

namespace Models;

class Article
{
    private static string $blogDir = __DIR__ . '/../../content/blog/';

    public static function getAll(): array
    {
        $articles = [];
        if (!is_dir(self::$blogDir)) {
            return [];
        }

        $files = glob(self::$blogDir . '*.md');
        foreach ($files as $file) {
            $article = self::parseFile($file);
            if ($article) {
                $articles[] = $article;
            }
        }

        // Tri par date décroissante
        usort($articles, fn($a, $b) => strcmp($b['date'], $a['date']));

        return $articles;
    }

    public static function getBySlug(string $slug): ?array
    {
        foreach (self::getAll() as $article) {
            if ($article['slug'] === $slug) {
                return $article;
            }
        }
        return null;
    }

    private static function parseFile(string $filePath): ?array
    {
        $content = file_get_contents($filePath);
        if (!$content) return null;

        $meta = [];
        $markdownContent = $content;

        // Frontmatter extraction --- ... ---
        if (preg_match('/^---\s*\n(.*?)\n---\s*\n(.*)/s', $content, $matches)) {
            $frontmatter = $matches[1];
            $markdownContent = $matches[2];

            foreach (explode("\n", $frontmatter) as $line) {
                $parts = explode(':', $line, 2);
                if (count($parts) === 2) {
                    $key = trim($parts[0]);
                    $value = trim($parts[1], " \"'\t\n\r\0\x0B");

                    // Tableau JSON / Array
                    if (str_starts_with($value, '[') && str_ends_with($value, ']')) {
                        $items = explode(',', trim($value, '[]'));
                        $value = array_map(fn($item) => trim($item, " \"'"), $items);
                    }

                    $meta[$key] = $value;
                }
            }
        }

        // Transformation Markdown basique vers HTML pour la lecture
        $htmlContent = self::markdownToHtml($markdownContent);

        return [
            'slug' => $meta['slug'] ?? basename($filePath, '.md'),
            'title' => $meta['title'] ?? 'Article sans titre',
            'date' => $meta['date'] ?? date('Y-m-d'),
            'author' => $meta['author'] ?? 'Alexandre CHARLIER',
            'tags' => is_array($meta['tags'] ?? null) ? $meta['tags'] : ['Data Science'],
            'summary' => $meta['summary'] ?? '',
            'read_time' => $meta['read_time'] ?? '3 min',
            'content_raw' => $markdownContent,
            'content_html' => $htmlContent,
        ];
    }

    private static function markdownToHtml(string $markdown): string
    {
        // Titres #, ##, ###
        $html = preg_replace('/^### (.*?)$/m', '<h3 class="text-xl font-bold text-slate-100 mt-6 mb-3">$1</h3>', $markdown);
        $html = preg_replace('/^## (.*?)$/m', '<h2 class="text-2xl font-bold text-emerald-400 mt-8 mb-4 border-b border-slate-800 pb-2">$1</h2>', $html);
        $html = preg_replace('/^# (.*?)$/m', '<h1 class="text-3xl font-extrabold text-slate-100 mt-4 mb-6">$1</h1>', $html);

        // Gras & Italique
        $html = preg_replace('/\*\*(.*?)\*\*/s', '<strong class="text-emerald-300 font-semibold">$1</strong>', $html);
        $html = preg_replace('/\*(.*?)\*/s', '<em class="text-slate-300">$1</em>', $html);

        // Listes - ...
        $html = preg_replace('/^\- (.*?)$/m', '<li class="ml-4 list-disc text-slate-300 mb-1">$1</li>', $html);

        // Liens Markdown
        $html = preg_replace('/\[(.*?)\]\((.*?)\)/s', '<a href="$2" target="_blank" class="text-emerald-400 hover:underline font-medium">$1</a>', $html);

        // Paragraphes
        $paragraphs = explode("\n\n", $html);
        $formattedParagraphs = [];
        foreach ($paragraphs as $p) {
            $p = trim($p);
            if (empty($p)) continue;
            if (str_starts_with($p, '<h') || str_starts_with($p, '<li')) {
                $formattedParagraphs[] = $p;
            } else {
                $formattedParagraphs[] = '<p class="text-slate-300 leading-relaxed mb-4">' . nl2br($p) . '</p>';
            }
        }

        return implode("\n", $formattedParagraphs);
    }
}
