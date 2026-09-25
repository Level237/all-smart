# DECISIONS — journal des choix du projet

Règles d'utilisation :
- Toute décision importante est écrite ici LE JOUR où elle est prise, avec
  sa raison.
- On ne supprime JAMAIS une ligne : une décision annulée est suivie d'une
  nouvelle ligne marquée "ANNULE D-00X".
- Marco et Julio doivent relire ce fichier avant de proposer ou juger une
  solution technique — ça évite de rediscuter dix fois le même choix.

| ID | Date | Décision | Raison | Alternative écartée |
|----|------|----------|--------|----------------------|
| D-001 | 25/09 | Stack : Laravel 13 + SQLite pour démarrer | Zéro configuration, on se concentre sur le contenu du site | MySQL dès le départ : mise en place inutile à ce stade |
| D-002 | 25/09 | Espace Admin intégré (Auth standard, CRUD Équipe, Réalisations, RDV) | Autonomie du client pour gérer son équipe et ses projets sans toucher au code | Formulaires statiques ou CMS tiers lourd (WordPress, Strapi) |
| D-003 | 25/09 | Charte visuelle : Police Ubuntu, Orange #F5791F, Noir #1A1A1A | Source de vérité stricte tirée de la maquette Figma officielle | Choix de palette libre par l'IA |
| D-004 | 25/09 | Revue de Louis préalable sur chaque vue avant dynamisation | Garantit la conformité Figma avant de complexifier avec Eloquent | Coder l'admin et le front simultanément en désordre |
| D-005 | 25/09 | Typographie double : Ubuntu (principal) + Zeyada (titres accentués/signatures) | Reflet fidèle de l'identité de marque Figma AllSmart | Police unique générique sans personnalité |

## Décisions à prendre plus tard (en attente)
- [ ] Choix du driver d'envoi d'e-mails pour les notifications de rendez-vous (Resend, Mailgun, SMTP).
- [ ] Migration vers MySQL / PostgreSQL pour la production finale.
