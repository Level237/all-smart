# Architecture

⚠️ À personnaliser en séance 1, avant de demander la première page à Marco.

## Stack
Laravel [version] · Blade · SQLite (ou MySQL) · Tailwind (ou CSS simple)

## Où vit quoi
- Pages / routes : `routes/web.php`
- Vues : `resources/views/`
- Logique simple (ex : envoi du formulaire de contact) : `app/Http/Controllers/`
- Styles : [Tailwind via CDN, ou fichier CSS dans `public/`]

## Entités de données
Un site vitrine simple n'a souvent aucune entité (contenu statique dans
les vues Blade). Si un formulaire ou un contenu dynamique existe,
liste-le ici :
- [ex : Message (nom, email, sujet, contenu) — pour le formulaire de contact]

## Conventions
- Une page = une route = une vue Blade dédiée.
- Pas de logique métier dans les vues : ce qui calcule ou décide vit dans
  un contrôleur.
- Nommage des routes en anglais, cohérent (`/contact`, `/about`, `/services`).
