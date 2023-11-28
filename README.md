# projet_gestion_evenement_reservation
Une entreprise souhaiterait développer une plateforme complète de gestion réservations à des événements. Cette application sera destinée, dans un premier temps, d’offrir une expérience fluide aux utilisateurs qui souhaitent effectuer une réservation de place à divers événement.s crée.s par des organismes ou des associations, et d’autre part, permettre à ces derniers, de pouvoir gérer leurs événements via cette application.
##Les clients
Les utilisateurs peuvent explorer la liste des événements publiés par les associations sans avoir à créer un compte. 
En revanche, pour effectuer une réservation par rapport à un événement, ils doivent impérativement être authentifiés.
##Les associations 
Les associations peuvent publier des événements en spécifiant des détails tels que : le nom de l’événement, la date de l’événement, le lieu, la description et la date limite d’inscription
En plus de pouvoir gérer leurs événements (CRUD), les associations ont accès à la liste des utilisateurs inscrits à leurs événements et de pouvoir accepter ou décliner la réservation
Enfin, ils ont la possibilité de décliner une réservation effectuée par un client. Dans ce cas, le client doit être notifié via un courrier mail.

## À faire :  

Réaliser une telle application avec le framework Laravel, devant répondre aux besoins spécifiques du client et offrir une gestion efficace des événements pour les associations.
La gestion d’envoi d’emails : pour assurer la non-répudiation, les utilisateurs doivent recevoir un mail automatiquement après avoir effectué une réservation 
