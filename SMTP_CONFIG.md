# Configuration SMTP — Eurovitas Finanzen

## Où renseigner les identifiants ?

### Option 1 — Panneau Admin (recommandé)
1. Connecte-toi sur `https://eurovitas.de/admin`
2. Aller dans **Settings → Mail Settings**
3. Remplir les champs ci-dessous et sauvegarder

### Option 2 — Directement en base (pour le déploiement)
Modifier les valeurs dans `database/seed_data.sql` à la section `settings` :
- `mail_host`
- `mail_port`
- `mail_secure`
- `mail_username`
- `mail_password`

---

## Fournisseurs SMTP recommandés

### OVH / Infomaniak (hébergeur habituel)
| Champ          | Valeur                        |
|----------------|-------------------------------|
| Email From     | contact@eurovitas.de          |
| From Name      | Eurovitas Finanzen            |
| Driver         | smtp                          |
| SMTP Host      | ssl0.ovh.net                  |
| SMTP Port      | 465                           |
| SMTP Secure    | ssl                           |
| Username       | contact@eurovitas.de          |
| Password       | [ton mot de passe email]      |

### Gmail (compte Google)
| Champ          | Valeur                        |
|----------------|-------------------------------|
| SMTP Host      | smtp.gmail.com                |
| SMTP Port      | 587                           |
| SMTP Secure    | tls                           |
| Username       | ton.email@gmail.com           |
| Password       | [mot de passe d'application]  |

> Gmail : activer "Authentification à 2 facteurs" puis créer un "Mot de passe d'application"
> dans Compte Google → Sécurité → Mots de passe des applications

### Brevo (ex-Sendinblue) — gratuit 300 emails/jour
| Champ          | Valeur                        |
|----------------|-------------------------------|
| SMTP Host      | smtp-relay.brevo.com          |
| SMTP Port      | 587                           |
| SMTP Secure    | tls                           |
| Username       | ton.email@domaine.com         |
| Password       | [clé SMTP Brevo]              |

### Mailgun
| Champ          | Valeur                        |
|----------------|-------------------------------|
| SMTP Host      | smtp.mailgun.org              |
| SMTP Port      | 587                           |
| SMTP Secure    | tls                           |
| Username       | postmaster@mg.eurovitas.de    |
| Password       | [clé SMTP Mailgun]            |

---

## Tester la configuration
Après avoir sauvegardé, utiliser le bouton **"Connection Check"** dans Admin → Mail Settings
pour envoyer un email de test.
