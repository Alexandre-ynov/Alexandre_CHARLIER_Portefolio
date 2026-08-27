<?php
$isSent = isset($_GET['sent']) && $_GET['sent'] === 'true';
?>
<section class="py-8 max-w-2xl mx-auto">
    <div class="mb-8 text-center">
        <h1 class="text-3xl font-extrabold text-slate-100 mb-2">Me Contacter</h1>
        <p class="text-slate-400">
            Une opportunité de stage, d'alternance ou un projet à me proposer ? Écrivez-moi directement !
        </p>
    </div>

    <!-- Banner Succès après redirection -->
    <?php if ($isSent): ?>
        <div class="p-4 rounded-xl bg-emerald-950/80 border border-emerald-500/50 text-emerald-300 text-center mb-8 font-medium">
            🎉 Merci pour votre message ! Il a bien été transmis et envoyé sur la boîte e-mail d'Alexandre.
        </div>
    <?php endif; ?>

    <div class="glass-card mb-8">
        <form action="https://api.web3forms.com/submit" method="POST" class="space-y-5">
            <!-- Clé d'accès Web3Forms -->
            <input type="hidden" name="access_key" value="<?= htmlspecialchars($config['contact']['web3forms_access_key']) ?>">
            <input type="hidden" name="subject" value="▶ Nouveau message Portfolio d'Alexandre CHARLIER">
            <input type="hidden" name="from_name" value="Portfolio Alexandre CHARLIER">
            <input type="hidden" name="redirect" value="http://localhost:8000/contact?sent=true">
            <input type="checkbox" name="botcheck" class="hidden" style="display: none;">

            <div>
                <label for="name" class="block text-xs font-mono text-slate-300 mb-1">Votre Nom & Prénom *</label>
                <input type="text" id="name" name="name" required class="w-full px-4 py-2.5 rounded-lg bg-slate-950 border border-slate-800 text-slate-100 focus:outline-none focus:border-emerald-400 font-sans text-sm transition-colors" placeholder="Ex: Jean Dupont">
            </div>

            <div>
                <label for="email" class="block text-xs font-mono text-slate-300 mb-1">Votre Email *</label>
                <input type="email" id="email" name="email" required class="w-full px-4 py-2.5 rounded-lg bg-slate-950 border border-slate-800 text-slate-100 focus:outline-none focus:border-emerald-400 font-sans text-sm transition-colors" placeholder="jean.dupont@entreprise.com">
            </div>

            <div>
                <label for="message" class="block text-xs font-mono text-slate-300 mb-1">Votre Message *</label>
                <textarea id="message" name="message" rows="5" required class="w-full px-4 py-2.5 rounded-lg bg-slate-950 border border-slate-800 text-slate-100 focus:outline-none focus:border-emerald-400 font-sans text-sm transition-colors" placeholder="Bonjour Alexandre..."></textarea>
            </div>

            <button type="submit" class="w-full btn-primary py-3">
                <span>Envoyer le Message ✉️</span>
            </button>
        </form>
    </div>

    <!-- Coordonnées directes -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 font-mono text-xs">
        <div class="p-4 rounded-xl bg-slate-900 border border-slate-800/80 text-center">
            <span class="block text-slate-400 mb-1">Email Direct</span>
            <a href="mailto:<?= htmlspecialchars($config['profile']['email']) ?>" class="text-emerald-400 font-semibold hover:underline">
                <?= htmlspecialchars($config['profile']['email']) ?>
            </a>
        </div>
        <div class="p-4 rounded-xl bg-slate-900 border border-slate-800/80 text-center">
            <span class="block text-slate-400 mb-1">Téléphone</span>
            <a href="tel:0619948461" class="text-emerald-400 font-semibold hover:underline">
                <?= htmlspecialchars($config['profile']['phone']) ?>
            </a>
        </div>
    </div>
</section>
