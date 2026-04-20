pipeline {
    agent any

    stages {
        stage('Preparation') {
            steps {
                // On nettoie pour repartir de zéro
                deleteDir()
                checkout scm
            }
        }
        stage('Test') {
            steps {
                echo 'Verification du code...'
                // Ici on liste les fichiers pour vérifier que tout est là
                sh 'ls -la' 
            }
        }
        stage('Deploy') {
            steps {
                echo 'Deploiement automatique en cours...'
                // C'est ici qu'on placera plus tard la connexion au serveur
                sh 'echo "Le code est deployé !"'
            }
        }
    }
    
    post {
        success {
            echo 'Bravo ! Le robot Jenkins a fini son travail avec succès.'
        }
    }
}