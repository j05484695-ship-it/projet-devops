pipeline {
    agent any

    environment {
        // Définition de variables pour éviter les répétitions
        SCAN_RESULTS = 'results'
    }

    options {
        // Conserve les logs, ajoute des horodatages et évite les builds simultanés
        timestamps()
        disableConcurrentBuilds()
        timeout(time: 1, unit: 'HOURS')
    }

    stages {
        stage('Cleanup') {
            steps {
                cleanWs() // Nettoie le dossier de travail avant de commencer
            }
        }

        stage('Checkout') {
            steps {
                // Utilisation de la méthode complète pour plus de contrôle
                checkout scm
            }
        }

        stage('Install Dependencies') {
            steps {
                echo 'Installation des dépendances...'
                // Exemple pour un projet Node.js. À adapter selon votre langage (mvn, pip, etc.)
                sh 'npm install'
            }
        }

        stage('Unit Tests') {
            steps {
                echo 'Exécution des tests unitaires...'
                sh 'npm test' 
            }
            post {
                always {
                    // Archive les rapports de tests même si un test échoue
                    junit '**/test-reports/*.xml' 
                }
            }
        }

        stage('Security Scan') {
            steps {
                echo 'Analyse de vulnérabilités...'
                // Simulation d'un scan de sécurité
                sh 'npm audit || true' 
            }
        }

        stage('Deploy to SCB') {
            // On ne déploie que si on est sur la branche 'main'
            when { branch 'main' }
            steps {
                echo 'Déploiement en cours sur le serveur SCB...'
                // Utilisation de SSH avec des identifiants sécurisés configurés dans Jenkins
                withCredentials([sshUserPrivateKey(credentialsId: 'scb-server-ssh', keyFileVariable: 'SSH_KEY')]) {
                    sh 'scp -i $SSH_KEY -r . user@scb-server:/var/www/html'
                }
            }
        }
    }

    post {
        success {
            echo '✅ Pipeline réussie !'
        }
        failure {
            echo '❌ Le build a échoué. Vérifiez les logs.'
            // Ici, vous pourriez ajouter un envoi d'email ou Slack
        }
    }
}