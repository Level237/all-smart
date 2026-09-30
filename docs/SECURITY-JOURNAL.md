# Journal de sécurité — tenu par Paul

| Date | Gravité | Faille | Où | Correction à appliquer | Statut |
|------|---------|--------|----|------------------------|--------|
| 30/09 | Faible | URL d'administration prédictible (/admin/login) exposée aux scanners automatiques | routes/web.php | Rendre le slug d'administration configurable via .env (ex: ADMIN_PATH=studio-prive) et renvoyer une 404 sur /admin | Ouvert |
