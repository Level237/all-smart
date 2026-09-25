# Roadmap du Projet AllSmart

## Phase 1 — Revue Design & Finalisation du Front-Office (Figma)

### Séance 1 — Revue Design exhaustive de l'existant vs Figma
- **Objectif** : Comparer chaque écran codé avec la maquette Figma (`AyNCO2WerjbL0hjYridukN`).
- **Agents impliqués** : Louis (revue UI/UX visuelle), Marco (application des retouches).
- **Fini quand** : 
  - La palette `#F5791F`, les typographies `Ubuntu`, les paddings et les composants sont 100% alignés.
  - Le rapport de revue de Louis sur Accueil (`Homepage`), Qui sommes-nous (`AboutUs`), Services et Packs est arbitré et appliqué.

### Séance 2 — Finalisation des pages publiques manquantes & Responsive
- **Objectif** : Coder ou finaliser les pages restantes de la maquette Figma.
- **Périmètre** :
  - Détail des services et packs restants (Pack Croissance, Pack Image Premium).
  - Page & composants "Liste des influenceurs partenaires" et filtres (maquettes `#321:432` et `#327:599`).
  - Validation du responsive mobile (375px) sur toutes les pages publiques.
- **Fini quand** : L'ensemble du parcours visiteur public est navigable, fidèle à Figma et validé par Louis.

### Séance 3 — Formulaires publics & Prise de rendez-vous
- **Objectif** : Permettre aux prospects de réserver un rendez-vous ou faire une demande de devis/contact depuis le site.
- **Périmètre** :
  - Formulaire de prise de rendez-vous / contact avec sélection du service, date souhaitée, coordonnées et message.
  - Validation côté client et serveur (FormRequest).
  - Enregistrement en base de données (`appointments`) et envoi d'email de notification.
- **Fini quand** : Un visiteur peut soumettre un rendez-vous, la requête est validée, sécurisée (Paul) et persistée en BDD.

---

## Phase 2 — Socle Technique & Espace Administration (Back-Office)

### Séance 4 — Authentification Admin & Sécurité d'accès
- **Objectif** : Mettre en place la connexion sécurisée pour l'administrateur.
- **Périmètre** :
  - Migrations BDD (`users`/`admins`), middleware d'authentification (`auth`).
  - Page de connexion sobre et sécurisée (`/admin/login`), déconnexion, protection contre le brute-force (rate limiting).
  - Audit de sécurité immédiat par Paul (gestion des sessions, hachage bcrypt, pas de fuite d'erreurs).
- **Fini quand** : L'administrateur peut se connecter/déconnecter, et les URLs `/admin/*` sont inaccessibles aux visiteurs non authentifiés.

### Séance 5 — Gestion des Prises de Rendez-vous (Back-office)
- **Objectif** : Permettre à l'administrateur de consulter et gérer les demandes entrantes.
- **Périmètre** :
  - Tableau de bord admin avec liste des rendez-vous reçus (nom, email, téléphone, service, date, statut).
  - Filtres par statut (*Nouveau*, *Confirmé*, *Terminé*, *Annulé*).
  - Possibilité de changer le statut ou d'ajouter une note interne.
- **Fini quand** : L'administrateur a une vue claire de ses rendez-vous et peut les traiter au quotidien.

### Séance 6 — Gestion de l'Équipe & des Réalisations (CRUD Dynamique)
- **Objectif** : Rendre le contenu du site modifiable par l'admin sans toucher au code.
- **Périmètre** :
  - **Module Équipe** : Ajout, modification, suppression des membres (nom, rôle/poste, photo, ordre d'affichage, réseaux sociaux).
  - **Module Réalisations (Portfolio)** : Ajout, modification, suppression des projets (titre, client, description, catégorie de service, images).
  - Upload d'images sécurisé (`Storage::disk('public')`, validation stricte format/taille).
- **Fini quand** : L'admin peut ajouter ou modifier un membre ou un projet complet avec ses photos depuis son panel.

---

## Phase 3 — Dynamisation du Front-Office & Recette

### Séance 7 — Liaison dynamique Front-Office
- **Objectif** : Remplacer les données codées en dur sur le site public par les données administrées.
- **Périmètre** :
  - Affichage dynamique de l'équipe sur la page "Qui Sommes-Nous".
  - Affichage dynamique des réalisations sur l'Accueil et les pages Services correspondantes.
- **Fini quand** : Toute modification effectuée dans l'admin se répercute instantanément sur le site public sans casser le design de Louis.

### Séance 8 — Audit Global Sécurité, QA & SEO
- **Objectif** : Blindage complet avant mise en ligne.
- **Audits** :
  - **Paul (Sécurité)** : Audit complet du back-office, des formulaires et des uploads de fichiers $\rightarrow$ `docs/SECURITY-JOURNAL.md`.
  - **Emile (QA)** : Parcours utilisateur complet (visiteur + admin), détection des bugs $\rightarrow$ `docs/BUG-JOURNAL.md`.
  - **Emilie (SEO)** : Balises OpenGraph, méta-titres, hiérarchie sémantique Hn pour Google et les IA.
- **Fini quand** : Zéro faille critique ouverte dans `SECURITY-JOURNAL.md`, bugs corrigés par Marco, checklist de `docs/QA.md` validée.

---

## Phase 4 — Mise en Production

### Séance 9 — Déploiement & Livraison
- **Objectif** : Passage en production sur serveur public (hébergement, SSL, BDD de production, configuration des emails).
- **Fini quand** : Le site AllSmart et son espace d'administration sont pleinement fonctionnels en ligne avec un certificat HTTPS valide.