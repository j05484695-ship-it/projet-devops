pipeline {
    agent any

    environment {
        PC_IP = "192.168.8.104" 
        USER_WIN = "SMART"
        // Le dossier racine où seront rangés tous tes backups sur ton Bureau
        BASE_DIR = "C:/Users/SMART/Desktop/MES_BACKUPS"
    }

    stages {
        stage('1. Récupération du Code') {
            steps {
                checkout scm
                echo "Code récupéré depuis GitHub avec succès."
            }
        }

        stage('2. Backup Automatique') {
            steps {
                // On récupère tes accès SMART enregistrés dans Jenkins
                withCredentials([usernamePassword(credentialsId: 'mon-pc-win10', passwordVariable: 'PASS', usernameVariable: 'USER')]) {
                    script {
                        // Création du nom de dossier : backup_2026-04-20_17h15
                        def horodatage = new Date().format("yyyy-MM-dd_HH'h'mm")
                        def dossierBackup = "backup_${horodatage}"
                        
                        echo "Tentative de connexion à ton PC physique..."

                        // Commande 1 : Créer le dossier MES_BACKUPS et le sous-dossier daté
                        // On utilise 'powershell' à distance pour être sûr que Windows comprenne bien
                        sh "sshpass -p '$PASS' ssh -o StrictKeyChecking=no ${USER}@${PC_IP} 'powershell mkdir ${BASE_DIR}/${dossierBackup}'"

                        echo "Dossier créé. Transfert des fichiers en cours..."

                        // Commande 2 : Copier tout le projet de la VM Jenkins vers ton Bureau
                        sh "sshpass -p '$PASS' scp -r ./* ${USER}@${PC_IP}:${BASE_DIR}/${dossierBackup}/"
                    }
                }
            }
        }
    }

    post {
        success {
            echo "-------------------------------------------------------"
            echo "✅ SUCCÈS : Ton backup est disponible sur ton Bureau !"
            echo "-------------------------------------------------------"
        }
        failure {
            echo "❌ ÉCHEC : Vérifie les logs de la console Jenkins."
        }
    }
}