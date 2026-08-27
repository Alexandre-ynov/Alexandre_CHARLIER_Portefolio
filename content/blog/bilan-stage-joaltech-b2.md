---
slug: bilan-stage-joaltech-b2
title: "Bilan de mon stage de Bachelor 2 chez JOALTECH : Data Engineering pour Wikimédia"
date: "2026-08-27"
author: Alexandre CHARLIER
tags: [Stage B2, Data Engineering, Python, Spark, Kafka, Docker]
summary: "Retour d'expérience sur mes 5 semaines de stage chez JOALTECH. Au programme : migration d'une architecture d'ingestion de données de Goblin vers Spark pour la Wikimedia Foundation."
read_time: "5 min"
---

Dans le cadre de ma deuxième année de Bachelor Informatique (B2), j'ai eu l'opportunité d'effectuer un stage de fin d'année particulièrement formateur au sein de la société **JOALTECH**. À l'aube de ma spécialisation en Data Science & IA, cette expérience m'a plongé au cœur des problématiques réelles d'ingénierie de la donnée à grande échelle.

Ce blog retrace mon parcours, de la découverte du métier à la résolution de problématiques de production complexes.

## 1. Cadre général de mon expérience

### L'entreprise JOALTECH et son marché
JOALTECH est une Société par Actions Simplifiée à Associé Unique (SASU) dirigée par **Monsieur Joseph Allemandou**. Basée à **Plabennec (Bretagne)**, l'entreprise évolue dans le secteur du **conseil en systèmes et logiciels informatiques**. Son marché principal s'articule autour de l'expertise en ingénierie de la donnée. Son client majeur est la célèbre **Wikimedia Foundation** (l'organisation derrière Wikipédia). Par ailleurs, Monsieur Allemandou partage son expertise en donnant des cours d'informatique à l'école d'ingénieurs **ENSTA Bretagne**.

### Déroulement et organisation du stage
Le stage s'est déroulé sur une durée de **5 semaines**, du **22 juin au 24 juillet 2026**. 
- **1ère semaine en présentiel :** Immersion totale en Bretagne pour observer les méthodes de travail, participer aux réunions et découvrir mon environnement de travail.
- **4 semaines en distanciel :** Nous avons adopté une méthodologie agile avec une **réunion quotidienne de synchronisation à 10h00**, complétée par un espace de discussion asynchrone sur Google Chat pour une communication fluide. J'ai été directement rattaché à Joseph Allemandou, ce qui m'a garanti un suivi de proximité tout en me responsabilisant. J'ai également eu l'occasion d'interagir indirectement avec des membres de l'équipe SRE Data Engineering de Wikimédia (comme Gabriele Modena).

## 2. Ma mission et les compétences mises en œuvre

L'objectif principal de mon stage était la modernisation d'une architecture Lambda d'ingestion de données (faisant le pont entre les données stream et batch de Wikimédia).

**Le défi :** L'ancien système reposait sur Apache Goblin, un outil obsolète depuis août 2023 et devenu trop lourd pour leurs besoins actuels.
**Ma tâche :** Remplacer Goblin par **Apache Spark** et l'intégrer à l'architecture existante avec **Apache Kafka**.

### Outils et technologies exploités
Pour mener à bien cette mission, j'ai dû me former et utiliser un ensemble de technologies avancées (Big Data) :
- **Apache Kafka** (pour la file de messages et le streaming)
- **Apache Spark / PySpark** (pour le traitement distribué des données par lot/batch)
- **Docker** (pour la création des environnements et l'isolation réseau des brokers)
- Sensibilisation aux technologies de l'écosystème comme Hadoop, Flink ou Airflow.

### Autonomie, investigation et résolution de problèmes
L'un des moments forts du stage a été ma confrontation à un problème de blocage sur l'environnement Kafka. Le flux de données (pipeline.py) ne parvenait pas à lire les informations, bloquant mon consumer Python. 

*Comment ai-je fait preuve d'autonomie et de curiosité ?*
Face à ce silence de l'application, j'ai isolé le script de production, exécuté des tests en ligne de commande Docker et plongé dans les logs profonds du broker Kafka. J'ai découvert que l'erreur silencieuse provenait du facteur de réplication : `INVALID_REPLICATION_FACTOR`. 

L'architecture locale ne disposant que d'un seul nœud (broker) avec le protocole KRaft, Kafka refusait de valider l'écriture par sécurité (qui exige 3 nœuds par défaut). J'ai fait preuve de créativité et d'initiative en détruisant le conteneur défaillant, puis en réécrivant le fichier `docker-compose` pour forcer le mode "Standalone" (`KAFKA_OFFSETS_TOPIC_REPLICATION_FACTOR=1`). Résultat : le système s'est débloqué et a pu ingérer le flux par lots de 200 messages parfaitement formatés.

*👉 Vous pouvez retrouver le code de mon projet sur ce dépôt : [kafka-spark-batch-pipeline](https://github.com/Alexandre-ynov/kafka-spark-batch-pipeline)*

## 3. Bilan personnel

### Ressenti et progression
Ce stage a été une expérience technique extrêmement stimulante. Il m'a permis de démystifier les infrastructures Big Data de niveau mondial (comme celle de Wikimédia) et de comprendre l'exigence du métier de Data Engineer. J'ai énormément progressé sur ma maîtrise de la conteneurisation Docker, la compréhension de l'architecture Lambda, et surtout, sur le "Debug" de systèmes distribués complexes.

### Forces et faiblesses
Cette mission a mis en évidence une faiblesse initiale : mon manque d'expérience pratique sur des outils très spécifiques (Kafka, KRaft) dont la configuration est exigeante. Cependant, elle a surtout révélé mes principales forces : **mon esprit d'analyse et ma persévérance**. Face aux bugs, mon approche méthodique (isolation des processus, vérification des buffers, analyse des logs d'erreurs) m'a permis d'apporter des solutions concrètes et autonomes.

## Conclusion : Impact sur mon projet professionnel

Mon immersion chez [JOALTECH](http://joaltech.com) a été un véritable catalyseur. Ce stage confirme de manière très concrète ma volonté de m'orienter vers la **Data Science et l'Intelligence Artificielle**. J'aborde ainsi mon Bachelor 3, avec la majeure IA & Data, avec une motivation décuplée. Comprendre les fondations de l'ingénierie des données (le nettoyage, l'ingestion, le pipeline) est un prérequis fondamental pour devenir un excellent ingénieur Data/IA. Fort de cette réussite, je suis désormais prêt et impatient de rechercher ma future alternance !
