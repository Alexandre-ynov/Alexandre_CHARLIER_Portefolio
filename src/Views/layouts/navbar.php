<?php
$navItems = [
    '/' => 'Accueil',
    '/projects' => 'Projets',
    '/skills' => 'Compétences',
    '/blog' => 'Blog',
    '/about' => 'À Propos',
    '/contact' => 'Contact',
    '/styleguide' => 'Charte graphique',
];
?>
<header class="sticky top-0 z-50 bg-slate-950/80 backdrop-blur-md border-b border-slate-800/80">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Brand / Logo -->
            <a href="/" class="flex items-center gap-2 group">
                <span class="w-3 h-3 rounded-full bg-emerald-400 group-hover:scale-125 transition-transform duration-200"></span>
                <span class="font-bold text-lg text-slate-100 group-hover:text-emerald-400 transition-colors">
                    Alexandre <span class="text-slate-400 font-mono text-sm">CHARLIER</span>
                </span>
            </a>

            <!-- Navigation Desktop -->
            <nav class="hidden md:flex items-center gap-6">
                <?php foreach ($navItems as $url => $label): ?>
                    <?php 
                        $isActive = ($activeRoute === $url) || ($url !== '/' && str_starts_with($activeRoute, $url));
                    ?>
                    <a href="<?= $url ?>" 
                       class="text-sm font-medium transition-colors duration-200 <?= $isActive ? 'text-emerald-400 font-semibold border-b-2 border-emerald-400 pb-1' : 'text-slate-300 hover:text-slate-100' ?>">
                        <?= $label ?>
                    </a>
                <?php endforeach; ?>
            </nav>

            <!-- Action CV -->
            <div class="hidden md:flex items-center gap-3">
                <a href="<?= htmlspecialchars($config['profile']['cv_pdf']) ?>" target="_blank" class="btn-primary text-xs py-2 px-4">
                    📄 Mon CV PDF
                </a>
            </div>

            <!-- Hamburger Button Mobile -->
            <button id="mobile-menu-btn" class="md:hidden p-2 rounded-lg text-slate-400 hover:text-slate-100 hover:bg-slate-900">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Navigation Drawer -->
    <div id="mobile-menu" class="hidden md:hidden bg-slate-900 border-b border-slate-800 px-4 pt-2 pb-4 space-y-2">
        <?php foreach ($navItems as $url => $label): ?>
            <?php $isActive = ($activeRoute === $url); ?>
            <a href="<?= $url ?>" class="block px-3 py-2 rounded-md text-base font-medium <?= $isActive ? 'bg-slate-800 text-emerald-400' : 'text-slate-300 hover:bg-slate-800 hover:text-slate-100' ?>">
                <?= $label ?>
            </a>
        <?php endforeach; ?>
        <a href="<?= htmlspecialchars($config['profile']['cv_pdf']) ?>" target="_blank" class="block text-center btn-primary text-sm py-2 mt-4">
            📄 Télécharger mon CV (PDF)
        </a>
    </div>
</header>
