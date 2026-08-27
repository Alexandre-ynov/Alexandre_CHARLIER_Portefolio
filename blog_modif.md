Fais les ajouts et modifications les une après les autres pour réster précis.
Points à modifier :
1. Mettre le lien joaltech.com sur le premier JOAlTECH après celui du titre.
2. Joseph Allemandou et la seul personne dans sont entreprise. Il faut changer la phrase "J'ai été directement rattaché à Joseph Allemandou, ce qui m'a garanti un suivi de proximité tout en me responsabilisant.".
3. Autonomie, investigation et résolution de problèmes : "Tout d’abord il faut recréer l’environnement dans lequel le logiciel est sensé fonctionner, une machine avec Kafka qui créer et met à disposition des topics et une autre avec pyspark qui récupère les topics partitionner par Kafka et exécute en parallèle le code pipeline.py sur toutes les partitions.
 On se sert des containers docker pour créer ces deux environnements, les deux containers sont sur le même réseaux cluster-network pour communiquer entre eux.
Pour le container de notre broker Kafka on utilise la dernière image d’apache Kafka, on nomme aussi trois volumes générés par Kafka (kafka_secrets / shared_config / kafka_data) pour garder une cohérence est éviter que les volumes soient re créés avec un nom différent généré aléatoirement à chaque fois qu’on arrête le container.

Pour le container Jupyter / PySpark on utilise la dernière image quay.io/jupyter/all-spark-notebook, une commande pour installer confluent-kafka 
Cette configuration est cependant une version simplifiée de l’environnement de Wikimédia composé de plusieurs clusters composés eux même de plusieurs brokers. Le fait de n’avoir qu’un broker a causé un problème avec les paramètres par défaut de Kafka qui applique par sécurité 3 réplications des offsets sur 3 machine différentes (KAFKA_OFFSETS_TOPIC_REPLICATION_FACTOR).
Mon environnement n’ayant qu’un seul broker Kafka, n’arriver pas à répliquer les offsets des topics dans deux autres brokers et les topics créés n’étaient donc pas publiés, impossible donc de les lire et d’exécuter pipeline.py dessus. La solution que j’ai appliqué pour éviter ce blocage en ayant qu’un broker est de changer les paramètres par défaut de Kafka ;
KAFKA_OFFSETS_TOPIC_REPLICATION_FACTOR: 1
KAFKA_TRANSACTION_STATE_LOG_REPLICATION_FACTOR: 1
KAFKA_TRANSACTION_STATE_LOG_MIN_ISR: 1

Tous les réglages sont réunis dans le fichier docker-compose.yml pour le lancer il suffit d’ouvrir un terminal dans le dossier contenant notre fichier docker-compose et d’exécuter la commande : docker compose up -d et pour l’arrêter : docker compose down
"
4. dévellope un peu plus les 3 logicielles par exemple docker ma permis de faire avec une machine interagir un contener kafka et un pyspark ensemble sur un même réseau.

5. modifier le défi : "Le lien entre les données stream et batch de Wikimédia ce fait actuellement sur Apache Goblin. Cependant ce logicielle n’a plus était mis à jour depuis août 2023(le projet est délaissé) et est trop complexe pour l’utilisation qu’ils en font actuellement."

Points à ajouter :
1. rajouter les 2 réunions et la resolution du problème : "Réunion 1
J’ai assisté à l’une des réunions hebdomadaires de l’équipe SRE Data Engineering du groupe wiki media.
Dans cette réunion l’équipe composé de 4 membres fait le point sur leurs avancés, les éventuels problèmes rencontrer ou à venir et ce qu’il compte faire pour la suite.
Guillaume Lederrey 20 ans d’ancienneté manager de l’équipe.
Atsuko Ito 6 mois d’ancienneté qui gère les clusters, le moteur de recherche.
 Ben Tullis 10 ans d’ancienneté qui à alerté sur le manque de port IPV4 disponible.
Et Joseph Allemandou 12 ans d’ancienneté qui résout les problèmes lors de l’exécution de job, comme une alerte data skew.
Réunion 2
Discussion entre Joseph Allemandou et Gabriele Modena.
But : Résoudre un problème de synchronisation sur une architecture lambda (Stream/Batch/Service).
Pour optimiser les calculs l’indexation se fait avec les données du batch.
Cependant en même temps que le calcul est réalisé avec les données du batch, le Stream continue de recevoir de nouvelles informations.
Quand les calculs se terminent, les Stream reçue pendant cette période vont être rattraper, recalculer avec le nouvel index optimiser. 
Problème 1 : Pour avoir le timestamp exacte à laquel le Batch utilise les données du Stream il faut stocker le timestamp dans le fichier du Batch ce qui représente énormément de donné, puis le retrouver pour faire la synchronisation, ce qui est complexe et lent.
La solution pensée pour tout bonnement éviter ce problème était de prendre la date théorique du lancement du Batch et sens servir pour la synchronisation. Il y aura quelques doublons du au décalage qu’il faudra supprimer. Cette solution a aussi son revers, plus le décalage est important plus il y aura de doublon à supprimer ralentissant de fait le traitement. 
Résolution de problème
J’ai observé Joseph Allemandou travailler, il ma montrer le logicielle Airflow ou il reçoie toutes les alertes liées au job. Le problème qu’il a résolu était dû à un data skew, spark permet de paralléliser les calculs sur différents clusters pour optimiser le traitement des informations et un data skew c’est quand un parti se retrouve avec une quantité disproportionnée de données et n’utilise donc pas le pleins potentiel de la parallélisation ralentissant fortement l’avancer du job et pouvant conduire à l’annulation de celui-ci. Pour résoudre ce problème plusieurs solution simple existe augmenter le nombre de cœur traitent les données et/ou augmenter la quantité de RAM attribuer par machines. Cependant les solutions simples peuvent ne pas être suffisante, il y a une limite au nombre de RAM et quantité de cœur qu’on peut attribuer pour la réalisation d’un job. Dans cette situation la solution est de modifier le programme de traitement des données pour favoriser la parallélisation pour ce job en particulier, ce qui est bien sûr beaucoup plus complexe.
Après avoir résolue le problème en doublant la RAM il a testé dans son interface de développement une nouvelle version de pyspark 3.5.8 qui a réussi à exécuter le job dans la même quantité de temps et ce sans doublé la RAM.
Projet de transition de tous les jobs sur la nouvelle version de pyspark 3.5.8 qui gère mieux le data skew. Ce projet va ce faire progressivement la réussit sur un job ne garantissant pas une réussite sur les autres.
"
2. sur Déroulement et organisation du stage : Reunion placer sur google Agenda et reunion sur google Meet.
3. utilise la partie entre "" de Points à modifier : 3. pour ajouter une partie sur Projet pipeline.py avec spark et kafka

4. si pas trop lourd peut rajouter les sites wiki sympa : "Découverte de quelques sites web Wikipédia intéressant
[Wikipedia:Pageview statistics - Wikipedia](https://en.wikipedia.org/wiki/Wikipedia:Pageview_statistics)
https://wikitech.wikimedia.org/wiki/Wikimedia_infrastructure
https://stats.wikimedia.org/#/all-projects
https://www.wikidata.org/wiki/Wikidata:SPARQL_query_service/Wikidata_Query_Help
"