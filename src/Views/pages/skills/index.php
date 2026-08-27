<section class="py-8 space-y-10">
    <!-- En-tête de la page Compétences -->
    <div class="mb-8 border-b border-slate-900 pb-8">
        <h1 class="text-3xl font-extrabold text-slate-100 mb-3">Mes Compétences Techniques</h1>
        <p class="text-slate-400 max-w-3xl leading-relaxed">
            Langages de programmation, frameworks, outils Big Data & IA et logiciels maîtrisés durant mon parcours à <span class="text-emerald-400 font-semibold">Ynov Aix-en-Provence</span>, mes stages et mes projets personnels.
        </p>
    </div>

    <!-- Grille des compétences par catégorie -->
    <div class="space-y-12">
        <?php foreach ($skillGroups as $groupName => $skills): ?>
            <div class="space-y-4">
                <div class="flex items-center gap-3">
                    <h2 class="text-xl font-bold text-slate-100 flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-400"></span>
                        <?= htmlspecialchars($groupName) ?>
                    </h2>
                    <span class="text-xs font-mono text-slate-500 font-normal">
                        (<?= count($skills) ?> technologies)
                    </span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    <?php foreach ($skills as $skill): ?>
                        <?php include __DIR__ . '/../../components/skill-badge.php'; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
