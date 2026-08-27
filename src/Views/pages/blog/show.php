<article class="py-8 max-w-3xl mx-auto">
    <!-- Fil d'ariane -->
    <a href="/blog" class="inline-flex items-center gap-2 text-xs font-mono text-emerald-400 hover:underline mb-6">
        ← Retour aux articles
    </a>

    <!-- En-tête de l'article -->
    <header class="mb-8 border-b border-slate-800 pb-6">
        <div class="flex flex-wrap items-center gap-2 text-xs font-mono text-slate-400 mb-3">
            <span class="text-emerald-400"><?= htmlspecialchars($article['author']) ?></span>
            <span>•</span>
            <span><?= htmlspecialchars($article['date']) ?></span>
            <span>•</span>
            <span>⏱️ Temps de lecture : 15 min</span>
        </div>

        <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-100 mb-4 leading-tight">
            <?= htmlspecialchars($article['title']) ?>
        </h1>

        <div class="flex flex-wrap gap-2 mt-4">
            <?php foreach ($article['tags'] as $tag): ?>
                <span class="blog-tag"><?= htmlspecialchars($tag) ?></span>
            <?php endforeach; ?>
        </div>
    </header>

    <!-- Contenu HTML rendu du Markdown -->
    <div class="prose prose-invert max-w-none text-slate-300 leading-relaxed font-sans">
        <?= $article['content_html'] ?>
    </div>

    <!-- Pied de l'article -->
    <footer class="mt-12 pt-6 border-t border-slate-800 flex items-center justify-between text-xs font-mono text-slate-400">
        <a href="/blog" class="text-emerald-400 hover:underline">← Tous les articles</a>
        <a href="mailto:<?= htmlspecialchars($config['profile']['email']) ?>" class="hover:text-slate-100">Discuter de cet article avec Alexandre</a>
    </footer>
</article>
