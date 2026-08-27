<section class="py-8 space-y-12">
    <!-- En-tête À Propos -->
    <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center border-b border-slate-900 pb-10">
        <div class="md:col-span-8 space-y-4">
            <h1 class="text-3xl font-extrabold text-slate-100">À Propos de Moi</h1>
            <p class="text-slate-300 leading-relaxed">
                <?= htmlspecialchars($config['profile']['bio']) ?>
            </p>
            <div class="flex flex-wrap gap-3 pt-2">
                <a href="<?= htmlspecialchars($config['profile']['cv_pdf']) ?>" target="_blank" class="btn-primary">
                    📄 Télécharger le CV Complet (PDF)
                </a>
            </div>
        </div>

        <div class="md:col-span-4">
            <div class="glass-card space-y-3 font-mono text-xs">
                <h3 class="font-bold text-slate-100 text-sm border-b border-slate-800 pb-2">Informations Clés</h3>
                <p><span class="text-slate-400">Statut :</span> <span class="text-emerald-400">Recherche Stage / Alternance</span></p>
                <p><span class="text-slate-400">École :</span> <span>Ynov Aix-en-Provence</span></p>
                <p><span class="text-slate-400">Langues :</span> <span>Français (C2), Anglais (B2)</span></p>
                <p><span class="text-slate-400">Permis :</span> <span>Permis B (Véhiculé)</span></p>
                <p><span class="text-slate-400">Localisation :</span> <span>Lançon-Provence / Aix</span></p>
            </div>
        </div>
    </div>

    <!-- Timeline Formations -->
    <div>
        <h2 class="text-2xl font-bold text-slate-100 mb-6 flex items-center gap-2">
            <span>🎓</span> Formations & Diplômes
        </h2>
        <div class="space-y-6 relative border-l-2 border-slate-800 ml-4 pl-6">
            <?php foreach ($education as $edu): ?>
                <div class="relative group">
                    <!-- Dot -->
                    <div class="absolute -left-[31px] top-1.5 w-4 h-4 rounded-full bg-slate-900 border-2 border-emerald-400 group-hover:scale-125 transition-transform"></div>
                    <span class="text-xs font-mono text-emerald-400 font-medium"><?= htmlspecialchars($edu['period']) ?></span>
                    <h3 class="text-lg font-bold text-slate-100 mt-1"><?= htmlspecialchars($edu['title']) ?></h3>
                    <p class="text-xs font-mono text-slate-400 mb-2"><?= htmlspecialchars($edu['institution']) ?></p>
                    <p class="text-sm text-slate-300 mb-3"><?= htmlspecialchars($edu['description']) ?></p>
                    <div class="flex flex-wrap gap-1.5">
                        <?php foreach ($edu['tags'] as $t): ?>
                            <span class="tech-badge text-[10px]"><?= htmlspecialchars($t) ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Timeline Expériences & Engagements -->
    <div>
        <h2 class="text-2xl font-bold text-slate-100 mb-6 flex items-center gap-2">
            <span>💼</span> Expériences & Engagements
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <?php foreach ($experience as $exp): ?>
                <div class="glass-card">
                    <span class="text-xs font-mono text-emerald-400 font-medium"><?= htmlspecialchars($exp['period']) ?></span>
                    <h3 class="text-base font-bold text-slate-100 mt-1"><?= htmlspecialchars($exp['role']) ?></h3>
                    <p class="text-xs font-mono text-slate-400 mb-2"><?= htmlspecialchars($exp['company']) ?></p>
                    <p class="text-xs text-slate-300"><?= htmlspecialchars($exp['description']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Centres d'intérêt -->
    <div class="border-t border-slate-900 pt-8">
        <h2 class="text-2xl font-bold text-slate-100 mb-4">⚽ Centres d'Intérêt & Hobbies</h2>
        <div class="flex flex-wrap gap-3">
            <span class="glass-card text-xs font-medium text-slate-200 py-2 px-4">🏸 Badminton (Tournois)</span>
            <span class="glass-card text-xs font-medium text-slate-200 py-2 px-4">♟️ Échecs</span>
            <span class="glass-card text-xs font-medium text-slate-200 py-2 px-4">📚 Lecture</span>
            <span class="glass-card text-xs font-medium text-slate-200 py-2 px-4">🛼 Roller (6h de Troyes)</span>
            <span class="glass-card text-xs font-medium text-slate-200 py-2 px-4">🎾 Tennis</span>
            <span class="glass-card text-xs font-medium text-slate-200 py-2 px-4">✈️ Voyages (Californie, Mayotte, Madagascar, Italie, Espagne)</span>
        </div>
    </div>
</section>
