<?php

namespace Models;

class Project
{
    public static function getAll(): array
    {
        return [
            [
                'id' => 1,
                'slug' => 'pipeline-ingestion-kafka-spark-batch',
                'title' => 'Pipeline Ingestion Batch Distribuée (Kafka & Spark)',
                'category' => 'Data Engineering & Big Data',
                'description' => 'Conception d\'un pipeline Big Data distribué en Python (PySpark & Confluent-Kafka). Calcul déterministe des offsets sans cache, tolérance aux pannes, stockage partitionné et collecte de métriques d\'observabilité en temps réel.',
                'image' => '/images/kafka_spark_pipeline.png',
                'tags' => ['PySpark', 'Apache Kafka', 'Docker', 'Big Data', 'Python'],
                'github_url' => 'https://github.com/Alexandre-ynov/kafka-spark-batch-pipeline',
                'featured' => true,
                'date' => '2026',
            ],
            [
                'id' => 2,
                'slug' => 'projet-fil-rouge-immobilier-b2',
                'title' => 'Plateforme Immobilière Fil Rouge MVC',
                'category' => 'Web Application & MVC',
                'description' => 'Application web d\'agence immobilière développée en PHP MVC natif. Gestion des rôles (Utilisateurs, Agents, Administrateurs), catalogue de biens avec filtres/pagination et requêtes SQL préparées sécurisées.',
                'image' => '/images/Projet_Fil_Rouge_B2.png',
                'tags' => ['PHP MVC', 'MySQL', 'Architecture', 'Sécurité', 'Projet Fil Rouge'],
                'github_url' => 'https://github.com/7n4xt/Fil-rouge-b2',
                'featured' => true,
                'date' => '2026',
            ],
            [
                'id' => 3,
                'slug' => 'reservation-cinema-php-b2',
                'title' => 'Plateforme de Réservation de Cinéma PHP',
                'category' => 'Développement Web PHP',
                'description' => 'Développement d\'une application web MVC de réservation de places de cinéma inspirée de Pathé. Module complet de gestion des détails de films, réservation de séances, administration et gestion de base de données MySQL.',
                'image' => '/images/Reservation_Cinema_PHP_B2.png',
                'tags' => ['PHP', 'MySQL', 'MVC', 'HTML5/CSS3', 'Projet B2'],
                'github_url' => 'https://github.com/Alexandre-ynov/Reservation_Cinema_PHP_B2',
                'featured' => true,
                'date' => '2026',
            ],
            [
                'id' => 4,
                'slug' => 'base-de-donnees-magasin-csharp-mysql',
                'title' => 'Base de Données Magasin & Interface C#',
                'category' => 'Database & Software',
                'description' => 'Conception d\'une base de données relationnelle MySQL optimisée pour la gestion des stocks, clients et ventes d\'un magasin fictif, avec interface graphique développée en C#.',
                'image' => 'https://images.unsplash.com/photo-1544383835-bda2bc66a55d?auto=format&fit=crop&w=800&q=80',
                'tags' => ['C#', 'MySQL', 'SQL', 'Visual Studio', 'Architecture MVC'],
                'github_url' => 'https://github.com/Alexandre-ynov',
                'featured' => false,
                'date' => '2023',
            ],
            [
                'id' => 5,
                'slug' => 'jeu-python-joaltech-consulting',
                'title' => 'Développement de Jeu en Python',
                'category' => 'Python & Algorithmique',
                'description' => 'Projet réalisé durant mon stage chez JoAltech Consulting : conception et programmation intégrale d\'un jeu interactif en Python, implémentant des boucles de jeu complexes et des algorithmes d\'IA simples.',
                'image' => 'https://images.unsplash.com/photo-1550745165-9bc0b252726f?auto=format&fit=crop&w=800&q=80',
                'tags' => ['Python', 'Algorithmique', 'Game Dev', 'Stage'],
                'github_url' => 'https://github.com/Alexandre-ynov',
                'featured' => false,
                'date' => '2017',
            ],
            [
                'id' => 6,
                'slug' => 'robotique-iter-techno-robot',
                'title' => 'Programmation Robotique ITER Techno-Robot',
                'category' => 'Robotique & Systèmes',
                'description' => 'Programmation et simulation d\'un robot autonome sur Lego Digital Designer. Projet ayant remporté la 2ème place au concours régional ITER Techno-Robot.',
                'image' => 'https://images.unsplash.com/photo-1485827404703-89b55fcc595e?auto=format&fit=crop&w=800&q=80',
                'tags' => ['Robotique', 'Lego Digital Designer', 'Algorithmique', 'Concours'],
                'github_url' => 'https://github.com/Alexandre-ynov',
                'featured' => false,
                'date' => '2016',
            ],
            [
                'id' => 7,
                'slug' => 'vehicule-aero-pousse-1re-annee',
                'title' => 'Objet Roulant Aéro-poussé (Ingénierie)',
                'category' => 'Projet Ingénierie ESILV',
                'description' => 'Projet d\'imagination et d\'exploration technique en 1ère année d\'ingénieur : dimensionnement physique et conception mécanique d\'un véhicule à propulsion aérodynamique.',
                'image' => 'https://images.unsplash.com/photo-1581092160607-ee22621dd758?auto=format&fit=crop&w=800&q=80',
                'tags' => ['Ingénierie', 'Physique', 'Modelisation', 'ESILV'],
                'github_url' => 'https://github.com/Alexandre-ynov',
                'featured' => false,
                'date' => '2022',
            ]
        ];
    }

    public static function getFeatured(): array
    {
        return array_filter(self::getAll(), fn($p) => $p['featured']);
    }

    public static function getBySlug(string $slug): ?array
    {
        foreach (self::getAll() as $project) {
            if ($project['slug'] === $slug) {
                return $project;
            }
        }
        return null;
    }
}
