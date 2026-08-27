<!-- Section Hero -->
<section class="py-12 md:py-20 border-b border-slate-900">
    <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
        <!-- Textes -->
        <div class="md:col-span-8 space-y-6">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-950/60 border border-emerald-800/50 text-emerald-400 font-mono text-xs font-medium">
                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                <?= htmlspecialchars($config['profile']['status']) ?>
            </div>

            <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight text-slate-100 leading-tight">
                Bonjour, je suis <span class="text-emerald-400">Alexandre CHARLIER</span>
            </h1>

            <p class="text-lg text-slate-300 leading-relaxed">
                <?= htmlspecialchars($config['profile']['bio']) ?>
            </p>

            <div class="flex flex-wrap gap-4 pt-4">
                <a href="/projects" class="btn-primary">
                    🚀 Découvrir mes Projets
                </a>
                <a href="<?= htmlspecialchars($config['profile']['cv_pdf']) ?>" target="_blank" class="btn-secondary">
                    📄 Voir mon CV (PDF)
                </a>
                <a href="/contact" class="btn-secondary">
                    ✉️ Me Contacter
                </a>
            </div>
        </div>

        <!-- Profil Card / Badge -->
        <div class="md:col-span-4">
            <div class="glass-card text-center space-y-4 relative overflow-hidden">
                <div class="w-28 h-28 mx-auto rounded-full bg-slate-800 border-2 border-emerald-400/80 p-1 shadow-lg overflow-hidden">
                    <!-- Photo par défaut ou du CV -->
                    <img src="/images/maPhoto.jpg" 
                         alt="Alexandre Charlier" 
                         class="w-full h-full object-cover rounded-full">
                </div>
                <div>
                    <h3 class="font-bold text-slate-100 text-lg"><?= htmlspecialchars($config['profile']['name']) ?></h3>
                    <p class="text-xs text-emerald-400 font-mono">Ynov Aix-en-Provence</p>
                </div>
                <div class="text-xs text-slate-400 space-y-1 font-mono pt-2 border-t border-slate-800">
                    <p>🎓 Bachelor 2ème année</p>
                    <p>🔮 Majeure IA & Data Science</p>
                    <p>📍 Lançon-Provence (13)</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Projets à la Une (Direct GitHub) -->
<section class="py-16 border-b border-slate-900">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-2xl font-bold text-slate-100">Projets & Réalisations</h2>
            <p class="text-sm text-slate-400 font-mono">Sélection de projets récents • Cliquez pour ouvrir le code sur GitHub</p>
        </div>
        <a href="/projects" class="text-sm font-mono text-emerald-400 hover:underline hidden sm:block">
            Voir tous les projets (<?= count($projects) ?>) →
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <?php foreach ($projects as $project): ?>
            <?php include __DIR__ . '/../components/project-card.php'; ?>
        <?php endforeach; ?>
    </div>
</section>

<!-- Section Grille de Compétences -->
<section class="py-16 border-b border-slate-900">
    <h2 class="text-2xl font-bold text-slate-100 mb-2">Compétences Techniques</h2>
    <p class="text-sm text-slate-400 font-mono mb-8">Technologies et outils maîtrisés au cours de mes études chez Ynov et de mes projets</p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <?php foreach ($skillGroups as $groupName => $skills): ?>
            <div class="space-y-3">
                <h3 class="text-sm font-bold text-emerald-400 uppercase tracking-wider font-mono border-b border-slate-800 pb-2">
                    <?= htmlspecialchars($groupName) ?>
                </h3>
                <div class="space-y-2">
                    <?php foreach ($skills as $skill): ?>
                        <?php include __DIR__ . '/../components/skill-badge.php'; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- Section Derniers Articles du Blog -->
<?php if (!empty($latestArticles)): ?>
<section class="py-16">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-2xl font-bold text-slate-100">Derniers Articles & Retours d'Expérience</h2>
            <p class="text-sm text-slate-400 font-mono">Articles rédigés au format Markdown</p>
        </div>
        <a href="/blog" class="text-sm font-mono text-emerald-400 hover:underline hidden sm:block">
            Voir le blog complet →
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <?php foreach ($latestArticles as $article): ?>
            <?php include __DIR__ . '/../components/article-card.php'; ?>
        <?php endforeach; ?>
    </div>
</section>
<?php endif; ?>
