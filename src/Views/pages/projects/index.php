<section class="py-8">
    <div class="mb-10">
        <h1 class="text-3xl font-extrabold text-slate-100 mb-2">Tous mes Projets</h1>
        <p class="text-slate-400">
            Retrouvez l'ensemble de mes travaux académiques, projets personnels et réalisation d'ingénierie. 
            <span class="text-emerald-400 font-mono text-sm block mt-1">👉 Cliquez sur n'importe quelle carte pour accéder directement au dépôt GitHub.</span>
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php foreach ($projects as $project): ?>
            <?php include __DIR__ . '/../../components/project-card.php'; ?>
        <?php endforeach; ?>
    </div>
</section>
