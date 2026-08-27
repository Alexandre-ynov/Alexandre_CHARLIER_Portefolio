<!DOCTYPE html>
<html lang="fr" class="dark">
<?php include __DIR__ . '/head.php'; ?>
<body class="bg-slate-950 text-slate-100 font-sans antialiased min-h-screen flex flex-col selection:bg-emerald-500/30 selection:text-emerald-300">
    <!-- Navbar globale -->
    <?php include __DIR__ . '/navbar.php'; ?>

    <!-- Contenu dynamique de la page -->
    <main class="flex-grow max-w-6xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <?= $content ?>
    </main>

    <!-- Footer global -->
    <?php include __DIR__ . '/footer.php'; ?>

    <!-- JS principal -->
    <script src="/assets/js/main.js"></script>
</body>
</html>
