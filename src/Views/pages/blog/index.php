<section class="py-8">
    <div class="mb-10">
        <h1 class="text-3xl font-extrabold text-slate-100 mb-2">Blog & Retours d'Expérience</h1>
        <p class="text-slate-400">
            Espace d'écriture où je partage mes apprentissages, le bilan de mes stages et mes analyses sur la Data Science et l'IA.
        </p>
    </div>

    <?php if (empty($articles)): ?>
        <div class="glass-card text-center py-12">
            <p class="text-slate-400 font-mono">Aucun article publié pour le moment. Déposez un fichier .md dans content/blog/ !</p>
        </div>
    <?php else: ?>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <?php foreach ($articles as $article): ?>
                <?php include __DIR__ . '/../../components/article-card.php'; ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>
