<?php
/**
 * Badge de compétence réutilisable
 * Paramètre attendu : $skill
 */
?>
<div class="flex flex-wrap items-center justify-between gap-2 p-3 rounded-lg bg-slate-900 border border-slate-800/80 hover:border-slate-700 transition-all">
    <div class="flex items-center gap-3">
        <?php if (str_starts_with($skill['icon'] ?? '', 'devicon-')): ?>
            <i class="<?= htmlspecialchars($skill['icon']) ?> text-2xl"></i>
        <?php else: ?>
            <span class="text-xl"><?= $skill['icon'] ?></span>
        <?php endif; ?>
        <div>
            <h4 class="text-sm font-semibold text-slate-100"><?= htmlspecialchars($skill['name']) ?></h4>
            <span class="text-xs text-slate-400 font-mono"><?= htmlspecialchars($skill['level']) ?></span>
        </div>
    </div>
    <span class="tech-badge text-[10px] whitespace-nowrap"><?= htmlspecialchars($skill['badge']) ?></span>
</div>
