# Aide-mémoire Go (Cheat Sheet)

Guide de démarrage rapide pour initialiser, exécuter, compiler et maintenir un projet en Go.

---

## 1. Démarrer un projet (Gestion des modules)

Chaque projet Go moderne commence par un fichier `go.mod` qui gère le nom du module et ses dépendances.

```bash
# 1. Créer le dossier du projet et s'y déplacer
mkdir mon-projet && cd mon-projet

# 2. Initialiser le module Go
go mod init mon-projet
```

---

## 2. Exécuter du code (Développement)

Pour tester rapidement votre code sans générer de binaire permanent sur le disque :

```bash
# Exécuter un fichier unique
go run main.go

# Exécuter l'ensemble du package du dossier courant (recommandé si plusieurs fichiers .go)
go run .
```

---

## 3. Compiler un exécutable (Production)

Pour produire un binaire autonome qui peut tourner sans que Go ne soit installé sur la machine cible :

```bash
# Compiler dans le dossier courant (génère un binaire portant le nom du module ou du dossier)
go build

# Compiler en spécifiant le nom de sortie
go build -o mon-app

# Lancer le binaire généré
./mon-app
```

---

## 4. Formatage et propreté du code

Go intègre ses propres outils d'analyse et de mise en forme officielle.

```bash
# Formater automatiquement le code du fichier selon la norme officielle
go fmt main.go

# Formater tous les fichiers Go du projet et sous-dossiers
go fmt ./...

# Détecter d'éventuelles erreurs de logique ou bugs courants
go vet ./...
```

---

## 5. Gestion des dépendances externes

Si vous commencez à importer des bibliothèques tierces :

```bash
# Télécharger un package externe
go get github.com/gin-gonic/gin

# Nettoyer les dépendances inutilisées et mettre à jour go.mod / go.sum
go mod tidy
```

---

## 6. Tests unitaires

Pour lancer vos tests automatisés (fichiers terminant par `_test.go`) :

```bash
# Lancer tous les tests du projet
go test ./...

# Lancer les tests en mode verbeux (affiche les logs détaillés)
go test -v ./...
```

---

## 💡 Exemple minimal (`main.go`)

```go
package main

import "fmt"

func main() {
    fmt.Println("Prêt pour la formation Go !")
}
```