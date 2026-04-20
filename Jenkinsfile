pipeline {
    agent any
    stages {
        stage('Checkout') {
            steps {
                git 'https://github.com/j05484695-ship-it/projet-devops.git'
            }
        }
        stage('Test') {
            steps {
                echo 'Vérification des fichiers...'
                sh 'ls -la' // Sur Windows, utilise 'dir' à la place de 'sh ls -la'
            }
        }
        stage('Deploy') {
            steps {
                echo 'Déploiement en cours sur le serveur SCB...'
                // Ici on simulera le succès pour le moment
            }
        }
    }
}