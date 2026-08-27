# 🚀 Portfolio Alexandre CHARLIER - Data Science, IA & Software Engineering

> **Site Web en Ligne (GitHub Pages) :** [https://alexandre-ynov.github.io/Alexandre_CHARLIER_Portefolio/](https://alexandre-ynov.github.io/Alexandre_CHARLIER_Portefolio/)

Bienvenue sur le dépôt du portfolio d'**Alexandre CHARLIER**, étudiant en 3ème année de Bachelor Informatique (Majeure IA & Data Science) chez **Ynov Aix-en-Provence**.

---

## 🛠️ Stack Technique

- **Architecture :** PHP 8.x MVC (Model-View-Controller) & Flat-File Markdown Blog.
- **Frontend :** HTML5, Vanilla CSS / Tailwind CSS, Devicon (Logos officiels).
- **Formulaire de Contact :** Intégration API Web3Forms.
- **Publication Statique :** Script d'export automatisé pour **GitHub Pages** (dans `/docs`).

---

## 📁 Structure du Projet

```text
├── config/             # Configuration globale du site et routage
├── content/            # Articles du blog au format Markdown (.md)
├── docs/               # Version HTML statique générée pour GitHub Pages
├── public/             # Assets publics (images, PDF du CV, CSS)
├── src/
│   ├── Controllers/    # Contrôleurs PHP MVC
│   ├── Models/         # Modèles de données (Projets, Skills, Articles)
│   └── Views/          # Vues HTML & composants réutilisables
├── export.php          # Script de génération du site statique
└── index.php           # Front Controller (mode serveur local PHP)
```

---

## 🚀 Lancer le projet en local

1. Cloner le dépôt :
   ```bash
   git clone https://github.com/Alexandre-ynov/Alexandre_CHARLIER_Portefolio.git
   cd Alexandre_CHARLIER_Portefolio
   ```

2. Lancer le serveur local PHP :
   ```bash
   php -S localhost:8000 -t public
   ```

3. Ouvrir votre navigateur sur `http://localhost:8000`.

---

## 🌐 Générer / Mettre à jour l'export GitHub Pages

Pour régénérer la version statique publiée sur GitHub Pages après modification :
```bash
php export.php
git add .
git commit -m "Mise à jour du site et de l'export statique"
git push origin main
```
