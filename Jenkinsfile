pipeline {
    agent any

    environment {
        // Le dossier où Apache affiche les sites web
        DEST_DIR = '/var/www/html'
    }

    stages {
        stage('Récupération du Code') {
            steps {
                echo '📥 Téléchargement du code depuis GitHub...'
                checkout scm
            }
        }

        stage('Vérification Sécurité & Syntaxe') {
            steps {
                echo '🔍 Analyse du code PHP...'
                // Vérifie s'il y a des erreurs de frappe en PHP
                sh 'find . -name "*.php" -exec php -l {} \;'
            }
        }

        stage('Déploiement sur le Serveur') {
            steps {
                echo '🚀 Transfert des fichiers vers le serveur Apache...'
                // On utilise sudo car on a configuré le visudo avant
                // On déploie le contenu du dépôt dans /var/www/html
                sh "sudo rsync -av --delete . ${DEST_DIR}"
                
                echo '🔐 Ajustement des permissions...'
                sh "sudo chown -R www-data:www-data ${DEST_DIR}"
                sh "sudo chmod -R 755 ${DEST_DIR}"
            }
        }
    }

    post {
        success {
            echo '✅ Succès ! L\'application SCB Cameroun est à jour et en ligne.'
        }
        failure {
            echo '❌ Échec du déploiement. Regarde les logs pour comprendre l\'erreur.'
        }
    }
}