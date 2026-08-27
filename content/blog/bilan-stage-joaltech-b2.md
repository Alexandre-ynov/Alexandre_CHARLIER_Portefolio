---
slug: bilan-stage-joaltech-b2
title: "Bilan de mon stage de Bachelor 2 chez JOALTECH : Data Engineering pour Wikimédia"
date: "2026-08-27"
author: Alexandre CHARLIER
tags: [Stage B2, Data Engineering, Python, Spark, Kafka, Docker]
summary: "Retour d'expérience sur mes 5 semaines de stage chez JOALTECH. Au programme : migration d'une architecture d'ingestion de données de Goblin vers Spark pour la Wikimedia Foundation."
read_time: "5 min"
---

Dans le cadre de ma deuxième année de Bachelor Informatique (B2), j'ai eu l'opportunité d'effectuer un stage de fin d'année particulièrement formateur au sein de la société **[JOALTECH](http://joaltech.com)**. À l'aube de ma spécialisation en Data Science & IA, cette expérience m'a plongé au cœur des problématiques réelles d'ingénierie de la donnée à grande échelle.

Ce blog retrace mon parcours, de la découverte du métier à la résolution de problématiques de production complexes.

## 1. Cadre général de mon expérience

### L'entreprise JOALTECH et son marché
JOALTECH est une Société par Actions Simplifiée à Associé Unique (SASU) dirigée par **Monsieur Joseph Allemandou**. Basée à **Plabennec (Bretagne)**, l'entreprise évolue dans le secteur du **conseil en systèmes et logiciels informatiques**. Son marché principal s'articule autour de l'expertise en ingénierie de la donnée. Son client majeur est la célèbre **Wikimedia Foundation** (l'organisation derrière Wikipédia). Par ailleurs, Monsieur Allemandou partage son expertise en donnant des cours d'informatique à l'école d'ingénieurs **ENSTA Bretagne**.

### Déroulement et organisation du stage
Le stage s'est déroulé sur une durée de **5 semaines**, du **22 juin au 24 juillet 2026**. 
- **1ère semaine en présentiel :** Immersion totale en Bretagne pour observer les méthodes de travail, participer aux réunions et découvrir mon environnement de travail.
- **4 semaines en distanciel :** Nous avons adopté une méthodologie agile avec une **réunion quotidienne de synchronisation à 10h00**. Les réunions étaient placées sur Google Agenda et se déroulaient via Google Meet, complétées par un espace de discussion asynchrone sur Google Chat pour une communication fluide. Joseph Allemandou étant la seule personne dans son entreprise, j'ai été directement rattaché à lui, ce qui m'a garanti un suivi de proximité tout en me responsabilisant. J'ai également eu l'occasion d'interagir indirectement avec des membres de l'équipe SRE Data Engineering de Wikimédia.

## 2. Ma mission et les compétences mises en œuvre

L'objectif principal de mon stage était la modernisation d'une architecture Lambda d'ingestion de données (faisant le pont entre les données stream et batch de Wikimédia).

**Le défi :** Le lien entre les données stream et batch de Wikimédia se fait actuellement sur Apache Goblin. Cependant, ce logiciel n’a plus été mis à jour depuis août 2023 (le projet est délaissé) et est trop complexe pour l’utilisation qu’ils en font actuellement.
**Ma tâche :** Remplacer Goblin par **Apache Spark** et l'intégrer à l'architecture existante avec **Apache Kafka**.

### Outils et technologies exploités
Pour mener à bien cette mission, j'ai dû me former et utiliser un ensemble de technologies avancées (Big Data) :
- **Docker** : m'a permis de virtualiser des environnements et de faire interagir un conteneur Kafka et un conteneur PySpark ensemble sur un même réseau local, tout ça depuis ma propre machine de développement.
- **Apache Kafka** : utilisé pour la gestion de la file de messages et le traitement de données en streaming en temps réel.
- **Apache Spark / PySpark** : choisi pour récupérer les topics partitionnés par Kafka et exécuter des calculs massivement parallélisés sur de gros volumes de données en mode lot/batch.

### Projet pipeline.py avec Spark et Kafka
Tout d’abord, j'ai dû recréer l’environnement dans lequel le logiciel était censé fonctionner : une machine avec Kafka qui créait et mettait à disposition des topics, et une autre avec PySpark qui récupérait les topics partitionnés par Kafka et exécutait en parallèle le code `pipeline.py` sur toutes les partitions.

Je me suis servi des conteneurs Docker pour créer ces deux environnements. Les deux conteneurs étaient placés sur le même réseau `cluster-network` pour communiquer entre eux.

Pour le conteneur de mon broker Kafka, j'ai utilisé la dernière image d’Apache Kafka. J'ai également nommé trois volumes générés par Kafka (`kafka_secrets` / `shared_config` / `kafka_data`) pour garder une cohérence et éviter que les volumes ne soient recréés avec un nom différent généré aléatoirement à chaque fois que j'arrêtais le conteneur.

Pour le conteneur Jupyter / PySpark, j'ai utilisé la dernière image `quay.io/jupyter/all-spark-notebook`, avec une commande pour installer `confluent-kafka`.

### Autonomie, investigation et résolution de problèmes
Cette configuration était cependant une version simplifiée de l’environnement de Wikimédia, composé de plusieurs clusters comprenant eux-mêmes plusieurs brokers. Le fait de n’avoir qu’un broker a causé un problème avec les paramètres par défaut de Kafka qui appliquait par sécurité 3 réplications des offsets sur 3 machines différentes (`KAFKA_OFFSETS_TOPIC_REPLICATION_FACTOR`).

Mon environnement n’ayant qu’un seul broker Kafka, il n'arrivait pas à répliquer les offsets des topics dans deux autres brokers et les topics créés n’étaient donc pas publiés. Il m'était donc impossible de les lire et d’exécuter `pipeline.py` dessus. 
La solution que j’ai appliquée pour éviter ce blocage en n'ayant qu’un broker a été de changer les paramètres par défaut de Kafka :
- `KAFKA_OFFSETS_TOPIC_REPLICATION_FACTOR: 1`
- `KAFKA_TRANSACTION_STATE_LOG_REPLICATION_FACTOR: 1`
- `KAFKA_TRANSACTION_STATE_LOG_MIN_ISR: 1`

Tous les réglages ont été réunis dans le fichier `docker-compose.yml`. Pour le lancer, il me suffisait d’ouvrir un terminal dans le dossier contenant mon fichier docker-compose et d’exécuter la commande : `docker compose up -d` (et pour l’arrêter : `docker compose down`).

*👉 Vous pouvez retrouver le code de mon projet sur ce dépôt : [kafka-spark-batch-pipeline](https://github.com/Alexandre-ynov/kafka-spark-batch-pipeline)*

## 3. Immersion au sein de l'équipe SRE Data Engineering

Au-delà du développement pur, j'ai pu observer de l'intérieur le fonctionnement des équipes de Wikimédia. Ci-dessous quelques exemples représentatifs :

### Réunion 1
J’ai assisté à l’une des réunions hebdomadaires de l’équipe SRE Data Engineering du groupe Wikimédia.
Dans cette réunion l’équipe composée de 4 membres fait le point sur leurs avancées, les éventuels problèmes rencontrés ou à venir et ce qu'ils comptent faire pour la suite :
- **Guillaume Lederrey**, 20 ans d’ancienneté, manager de l’équipe.
- **Atsuko Ito**, 6 mois d’ancienneté, qui gère les clusters et le moteur de recherche.
- **Ben Tullis**, 10 ans d’ancienneté, qui a alerté sur le manque d'adresses IPV4 disponibles.
- Et **Joseph Allemandou**, 12 ans d’ancienneté, qui résout les problèmes lors de l’exécution de jobs, comme une alerte *data skew*.

### Réunion 2 : Résolution d'un problème de synchronisation (Architecture Lambda)
Il s'agissait d'une discussion entre Joseph Allemandou et Gabriele Modena.

**But :** Résoudre un problème de synchronisation sur une architecture lambda (Stream/Batch/Service).

Pour optimiser les calculs, l’indexation se fait avec les données du Batch. Cependant, en même temps que le calcul est réalisé avec les données du Batch, le Stream continue de recevoir de nouvelles informations. Quand les calculs se terminent, les événements Stream reçus pendant cette période vont être rattrapés et recalculés avec le nouvel index optimisé. 

**Problème :** Pour avoir le timestamp exact auquel le Batch utilise les données du Stream, il faut stocker le timestamp dans le fichier du Batch (ce qui représente énormément de données), puis le retrouver pour faire la synchronisation, ce qui est complexe et lent.

La solution pensée pour tout bonnement éviter ce problème était de prendre la date théorique du lancement du Batch et de s'en servir pour la synchronisation. Il y aura quelques doublons dus au décalage qu’il faudra supprimer. Cette solution a aussi son revers : plus le décalage est important, plus il y aura de doublons à supprimer, ralentissant de fait le traitement.

### Observation d'une résolution de problème (Data Skew)
J’ai observé Joseph Allemandou travailler, il m'a montré le logiciel Airflow où il reçoit toutes les alertes liées aux jobs. Le problème qu’il a résolu était dû à un **data skew**. Spark permet de paralléliser les calculs sur différents clusters pour optimiser le traitement des informations et un *data skew* survient quand une partition se retrouve avec une quantité disproportionnée de données et n’utilise donc pas le plein potentiel de la parallélisation, ralentissant fortement l’avancée du job et pouvant conduire à l'annulation de celui-ci.

Pour résoudre ce problème, plusieurs solutions simples existent : augmenter le nombre de noeuds traitant les données et/ou augmenter la quantité de RAM attribuée par machine. Cependant les solutions simples peuvent ne pas être suffisantes, il y a une limite de RAM et de noeuds qu’on peut attribuer pour la réalisation d’un job. Dans cette situation, la solution est de modifier le programme de traitement des données pour favoriser la parallélisation pour ce job en particulier, ce qui est bien sûr beaucoup plus complexe.

Après avoir résolu le problème en doublant la RAM il a testé dans son interface de développement une nouvelle version de PySpark (3.5.8) qui a réussi à exécuter le job dans le même laps de temps, et ce sans doubler la RAM.
Le projet de transition de tous les jobs sur la nouvelle version de PySpark 3.5.8 (qui gère mieux le data skew) va se faire progressivement, la réussite sur un job ne garantissant pas une réussite sur les autres.

## 4. Bilan personnel

### Ressenti et progression
Ce stage a été une expérience technique extrêmement stimulante. Il m'a permis de démystifier les infrastructures Big Data de niveau mondial (comme celle de Wikimédia) et de comprendre l'exigence du métier de Data Engineer. J'ai énormément progressé sur ma maîtrise de la conteneurisation Docker, la compréhension de l'architecture Lambda, et surtout, sur le "Debug" de systèmes distribués complexes.

### Forces et faiblesses
Cette mission a mis en évidence une faiblesse initiale : mon manque d'expérience pratique sur des outils très spécifiques (Kafka, KRaft) dont la configuration est exigeante. Cependant, elle a surtout révélé mes principales forces : **mon esprit d'analyse et ma persévérance**. Face aux bugs, mon approche méthodique (isolation des processus, vérification des buffers, analyse des logs d'erreurs) m'a permis d'apporter des solutions concrètes et autonomes.

## Découverte de quelques sites web Wikimédia intéressants
- [Wikipedia:Pageview statistics - Wikipedia](https://en.wikipedia.org/wiki/Wikipedia:Pageview_statistics)
- [Wikimedia infrastructure](https://wikitech.wikimedia.org/wiki/Wikimedia_infrastructure)
- [Wikimedia Statistics](https://stats.wikimedia.org/#/all-projects)
- [Wikidata Query Help](https://www.wikidata.org/wiki/Wikidata:SPARQL_query_service/Wikidata_Query_Help)

## Conclusion : Impact sur mon projet professionnel

Mon immersion chez [JOALTECH](http://joaltech.com) a été un véritable catalyseur. Ce stage confirme de manière très concrète ma volonté de m'orienter vers la **Data Science et l'Intelligence Artificielle**. J'aborde ainsi mon Bachelor 3, avec la majeure IA & Data, avec une motivation décuplée. Comprendre les fondations de l'ingénierie des données (le nettoyage, l'ingestion, le pipeline) est un prérequis fondamental pour devenir un excellent ingénieur Data/IA. Fort de cette réussite, je suis désormais prêt et impatient de rechercher ma future alternance !
