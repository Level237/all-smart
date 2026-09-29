# Backlog du Projet AllSmart

Ce fichier recense l'ensemble des tâches et fonctionnalités ordonnées.
**Marco** lit ce fichier avant de construire ou modifier quoi que ce soit.

---

## En cours
- [ ] **Sprint 1.1** : Revue design exhaustive de l'existant vs Figma (Accueil, À propos, Services, Pack Visibilité) avec Louis.

---

## À faire

### Phase 1 — Front-Office & Alignement Figma
- [x] **B-01** : Application des ajustements design de Louis sur la page d'accueil (`Homepage.blade.php`) pour correspondre au frame Figma `#2:2`.
- [x] **B-02** : Application des ajustements design de Louis sur la page "Qui Sommes-Nous" (`AboutUs.blade.php`, frame `#48:40`).
- [x] **B-03** : Alignement design et composants des 7 pages Services (`Services.blade.php`, `ServicesPage.blade.php` & configs).
- [x] **B-04** : Intégration des pages Packs restantes : Pack Croissance (frame `#316:118`) et Pack Image Premium (`#316:191`).
- [ ] **B-05** : Intégration de l'interface "Liste des Influenceurs partenaires" avec filtres catégories/plateformes (frames Figma `#321:432` et `#327:599`).
- [ ] **B-06** : Formulaire public de prise de rendez-vous & contact (champs : nom, email, téléphone, service concerné, date/créneau souhaité, message).
- [ ] **B-07** : Validation responsive mobile (375px) sur toutes les vues publiques.

### Phase 2 — Back-Office & Administration
- [ ] **B-08** : Modèle, migration et seeder pour l'administrateur (`User` / rôle `admin`).
- [ ] **B-09** : Authentification Admin sécurisée : route `/admin/login`, contrôleur d'auth, rate-limiting, protection CSRF, déconnexion.
- [ ] **B-10** : Layout de l'administration (`resources/views/admin/layouts/app.blade.php`) et dashboard d'accueil admin.
- [ ] **B-11** : Module Rendez-vous Admin : migration `appointments`, tableau de bord avec listing des demandes, filtres par statut (*Nouveau*, *Confirmé*, *Terminé*, *Annulé*) et détails.
- [ ] **B-12** : Module Équipe Admin : migration `team_members`, CRUD complet (nom, fonction, bio, ordre d'affichage, réseaux sociaux, upload photo).
- [ ] **B-13** : Module Réalisations Admin : migration `portfolio_projects`, CRUD complet (titre, client, description, service lié, upload d'images).
- [ ] **B-14** : Sécurisation du stockage et uploads d'images (`storage:link`, validation MIME/taille).

### Phase 3 — Dynamisation Front & Recette
- [ ] **B-15** : Dynamisation de la section Équipe sur la page "Qui Sommes-Nous" (consommation des données BDD).
- [ ] **B-16** : Dynamisation du slider/grille de Réalisations sur l'Accueil et les pages Services correspondantes.
- [ ] **B-17** : Audit de sécurité complet par Paul (vérification des accès admin, inputs, headers) → rapport dans `docs/SECURITY-JOURNAL.md`.
- [ ] **B-18** : Recette QA de bout en bout par Emile (parcours public + gestion admin) → journal `docs/BUG-JOURNAL.md`.
- [ ] **B-19** : Optimisation SEO et méta-données par Emilie (balises Hn, OpenGraph, title/descriptions).

---

## Terminé
- [x] Initialisation du repository Laravel et structure de l'équipe d'agents (`.github/agents/`).
- [x] Connexion et test de validation du serveur Figma Developer MCP (`http://127.0.0.1:3333/mcp`).
- [x] Personnalisation de la feuille de route (`docs/ROADMAP.md`).
