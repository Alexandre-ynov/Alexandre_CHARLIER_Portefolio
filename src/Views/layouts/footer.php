<footer class="mt-auto bg-slate-950 border-t border-slate-800/80 py-12 text-slate-400 text-sm">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
            <!-- Col 1: Bio -->
            <div>
                <h4 class="text-slate-100 font-bold mb-3 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                    Alexandre CHARLIER
                </h4>
                <p class="text-xs leading-relaxed text-slate-400">
                    Étudiant en Bachelor Informatique chez <strong>Ynov Aix-en-Provence</strong>, futur Master Data Science & Intelligence Artificielle. Passionné par le développement, les algorithmes et l'analyse de données.
                </p>
            </div>

            <!-- Col 2: Navigation rapide -->
            <div>
                <h4 class="text-slate-100 font-bold mb-3">Navigation</h4>
                <ul class="space-y-2 text-xs">
                    <li><a href="/" class="hover:text-emerald-400 transition-colors">Accueil</a></li>
                    <li><a href="/projects" class="hover:text-emerald-400 transition-colors">Projets GitHub</a></li>
                    <li><a href="/blog" class="hover:text-emerald-400 transition-colors">Blog & Articles</a></li>
                    <li><a href="/about" class="hover:text-emerald-400 transition-colors">À Propos & Cursus</a></li>
                    <li><a href="/contact" class="hover:text-emerald-400 transition-colors">Contact</a></li>
                </ul>
            </div>

            <!-- Col 3: Contact & Liens -->
            <div>
                <h4 class="text-slate-100 font-bold mb-3">Contact & Liens</h4>
                <ul class="space-y-2 text-xs">
                    <li>📧 <a href="mailto:<?= htmlspecialchars($config['profile']['email']) ?>" class="hover:text-emerald-400 transition-colors"><?= htmlspecialchars($config['profile']['email']) ?></a></li>
                    <li>📍 <span>Lançon-Provence (13680)</span></li>
                    <li>🐙 <a href="<?= htmlspecialchars($config['profile']['github']) ?>" target="_blank" rel="noopener" class="hover:text-emerald-400 transition-colors">GitHub (Alexandre-ynov)</a></li>
                </ul>
            </div>
        </div>

        <div class="border-t border-slate-900 pt-6 flex flex-col md:flex-row items-center justify-between text-xs text-slate-500">
            <p>© <?= date('Y') ?> Alexandre Charlier. Tous droits réservés.</p>
            <p class="mt-2 md:mt-0 font-mono">Conçu en PHP MVC Native & Tailwind CSS (Option B Minimalist)</p>
        </div>
    </div>
</footer>
