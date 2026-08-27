<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($metaTitle) ?></title>
    <meta name="description" content="<?= htmlspecialchars($config['site']['description']) ?>">
    <meta name="author" content="<?= htmlspecialchars($config['site']['author']) ?>">
    
    <!-- Polices Google Fonts (Inter & JetBrains Mono) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    
    <!-- Devicon (Logos et icônes officielles des technologies) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/devicon@2.16.0/devicon.min.css">
    
    <!-- Tailwind CSS (via CDN avec configuration unifiée) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        mono: ['JetBrains Mono', 'monospace'],
                    },
                    colors: {
                        slate: {
                            950: '#030712',
                            900: '#0F172A',
                            800: '#1E293B',
                        },
                        emerald: {
                            400: '#10B981',
                            500: '#059669',
                        },
                        indigo: {
                            400: '#818CF8',
                            600: '#4F46E5',
                        }
                    }
                }
            }
        }
    </script>
    
    <!-- Fichier CSS custom avec composants du Design System -->
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
