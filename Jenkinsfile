pipeline {
    agent any

    environment {
        DEST_DIR = '/var/www/html'
    }

    stages {
        stage('Récupération du Code') {
            steps {
                echo '📥 Téléchargement depuis GitHub...'
                checkout scm
            }
        }

        stage('Vérification Syntaxe') {
            steps {
                echo '🔍 Analyse du code PHP...'
                // On a simplifié la commande pour éviter l'erreur de caractère
                sh 'find . -name "*.php" -exec php -l {} + '
            }
        }

        stage('Déploiement') {
            steps {
                echo '🚀 Transfert vers Apache...'
                sh "sudo rsync -av --delete . ${DEST_DIR}"
                
                echo '🔐 Réglage des permissions...'
                sh "sudo chown -R www-data:www-data ${DEST_DIR}"
            }
        }
    }

    post {
        success {
            echo '✅ Succès ! SCB Cameroun est en ligne.'
        }
        failure {
            echo '❌ Échec. Vérifie la console.'
        }
    }
}