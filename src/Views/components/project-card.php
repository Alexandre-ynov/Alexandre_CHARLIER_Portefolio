<?php
/**
 * Carte de projet réutilisable
 * Paramètre attendu : $project
 */
?>
<a href="<?= htmlspecialchars($project['github_url']) ?>" 
   target="_blank" 
   rel="noopener" 
   class="glass-card group block overflow-hidden">
    <!-- Vignette / Photo de projet -->
    <div class="aspect-video w-full overflow-hidden rounded-lg bg-slate-800 mb-5 relative">
        <img src="<?= htmlspecialchars($project['image']) ?>" 
             alt="<?= htmlspecialchars($project['title']) ?>" 
             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
        
        <!-- Overlay GitHub au survol -->
        <div class="absolute inset-0 bg-slate-950/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center gap-2 text-emerald-400 font-mono text-sm font-semibold">
            <span>Voir le code sur GitHub</span>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
            </svg>
        </div>
    </div>

    <!-- Catégorie & Date -->
    <div class="flex flex-wrap items-center justify-between gap-y-1 text-xs text-slate-400 font-mono mb-2">
        <span class="text-emerald-400 font-medium"><?= htmlspecialchars($project['category']) ?></span>
        <span><?= htmlspecialchars($project['date']) ?></span>
    </div>

    <!-- Titre -->
    <h3 class="text-xl font-bold text-slate-100 group-hover:text-emerald-400 transition-colors flex items-center justify-between gap-2 mb-2">
        <span><?= htmlspecialchars($project['title']) ?></span>
    </h3>

    <!-- Description -->
    <p class="text-sm text-slate-400 leading-relaxed line-clamp-3 mb-4">
        <?= htmlspecialchars($project['description']) ?>
    </p>

    <!-- Badges de technologies -->
    <div class="flex flex-wrap gap-2 pt-2 border-t border-slate-800/80">
        <?php foreach ($project['tags'] as $tag): ?>
            <span class="tech-badge"><?= htmlspecialchars($tag) ?></span>
        <?php endforeach; ?>
    </div>
</a>
