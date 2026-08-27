<?php
/**
 * Carte d'article de blog réutilisable
 * Paramètre attendu : $article
 */
?>
<a href="/blog/<?= htmlspecialchars($article['slug']) ?>" class="glass-card group block">
    <div class="flex flex-wrap items-center justify-between gap-y-2 text-xs text-slate-400 font-mono mb-3">
        <div class="flex flex-wrap items-center gap-2">
            <?php foreach ($article['tags'] as $tag): ?>
                <span class="blog-tag"><?= htmlspecialchars($tag) ?></span>
            <?php endforeach; ?>
        </div>
        <span><?= htmlspecialchars($article['read_time']) ?> • <?= htmlspecialchars($article['date']) ?></span>
    </div>

    <h3 class="text-xl font-bold text-slate-100 group-hover:text-emerald-400 transition-colors mb-3">
        <?= htmlspecialchars($article['title']) ?>
    </h3>

    <p class="text-sm text-slate-400 leading-relaxed line-clamp-3 mb-4">
        <?= htmlspecialchars($article['summary']) ?>
    </p>

    <div class="flex items-center gap-2 text-xs font-mono text-emerald-400 group-hover:translate-x-1 transition-transform duration-200">
        <span>Lire l'article complet</span>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
        </svg>
    </div>
</a>
