<?php

namespace Models;

class Experience
{
    public static function getEducation(): array
    {
        return [
            [
                'period' => '2025 - 2026',
                'title' => '2ème année de Bachelor en Informatique (Majeure IA & Data en 3e année)',
                'institution' => 'École Ynov Aix-en-Provence',
                'description' => 'Formation spécialisée en informatique avec orientation vers l\'Intelligence Artificielle et la Data Science pour préparer l\'intégration en Cycle Master.',
                'tags' => ['Python', 'Data Science', 'IA', 'Bases de Données', 'Web'],
            ],
            [
                'period' => '2022 - 2024',
                'title' => 'Classes Préparatoires aux Grandes Écoles d\'Ingénieurs (1ère & 2ème année)',
                'institution' => 'ESILV (École Supérieure d\'Ingénieur Léonard de Vinci) — Paris La Défense',
                'description' => 'Formation scientifique exigente axée sur les mathématiques, la physique et l\'informatique. Formation Soft Skills à l\'organisation de l\'équipe et aux méthodes de travail collectif.',
                'tags' => ['Mathématiques', 'Physique', 'Informatique', 'Soft Skills'],
            ],
            [
                'period' => '2021',
                'title' => 'Baccalauréat Général avec Mention',
                'institution' => 'Lycée',
                'description' => 'Spécialités Mathématiques, Physique-Chimie et Informatique — Option Mathématiques Expertes.',
                'tags' => ['Maths Expertes', 'Informatique', 'Physique'],
            ]
        ];
    }

    public static function getProfessional(): array
    {
        return [
            [
                'period' => 'Depuis Septembre 2025',
                'role' => 'Professeur de Badminton',
                'company' => 'Club de Lançon-Provence',
                'description' => 'Encadrement et entraînement de jeunes adolescents. Développement du sens de la pédagogie, du leadership et de l\'organisation.',
            ],
            [
                'period' => 'Été 2025',
                'role' => 'Employé de Restauration',
                'company' => 'Smash Burger — La Ciotat',
                'description' => 'Accueil des clients, service en salle et gestion de la caisse dans un environnement dynamique.',
            ],
            [
                'period' => 'Été 2023',
                'role' => 'Employé Polyvalent',
                'company' => 'E. Leclerc — Salon-de-Provence',
                'description' => 'Gestion de rayon, logistique et relation client.',
            ],
            [
                'period' => '2017',
                'role' => 'Stagiaire en Développement Python',
                'company' => 'JoAltech Consulting — Plabennec',
                'description' => 'Stage de découverte et développement complet d\'un jeu informatique en langage Python.',
            ],
            [
                'period' => '2017',
                'role' => 'Gestionnaire Budgétaire & Ventes',
                'company' => 'Projet Mini-entreprise',
                'description' => 'Création d\'une mini-entreprise : gestion des budgets, suivi financier et commercialisation.',
            ]
        ];
    }
}
