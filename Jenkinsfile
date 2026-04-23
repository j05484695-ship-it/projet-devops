pipeline {
    agent { label 'agent' } // Remplace par le nom de ton agent Windows

    environment {
        PROD_DIR = 'C:\\xampp\\htdocs\\APP'
        BACKUP_DIR = 'C:\\jenkins\\backups_app'
    }

    stages {
        stage('Backup and Deploy') {
            steps {
                script {
                    // 1. Identifier les fichiers modifiés dans ce commit
                    def changedFiles = sh(script: 'git diff --name-only HEAD~1 HEAD', returnStdout: true).trim().split('\n')

                    for (file in changedFiles) {
                        if (file.trim() == "") continue

                        // Chemins complets
                        def sourceFile = "${WORKSPACE}\\${file}"
                        def targetFile = "${PROD_DIR}\\${file}"
                        
                        // Préparer le nom de sauvegarde (date_heure)
                        def timestamp = new Date().format("yyyyMMdd_HHmmss")
                        def fileBaseName = file.split('\\.')[0]
                        def extension = file.contains('.') ? file.tokenize('.').last() : ""
                        def backupName = "${fileBaseName}_${timestamp}.${extension}"

                        // 2. SAUVEGARDE : Si le fichier existe en prod, on le copie dans backup
                        if (fileExists(targetFile)) {
                            echo "Sauvegarde de ${file} vers ${BACKUP_DIR}"
                            bat "copy \"${targetFile}\" \"${BACKUP_DIR}\\${backupName}\""
                        }

                        // 3. DEPLOIEMENT : On remplace le fichier en prod
                        echo "Mise à jour de ${file} dans la Prod"
                        // On s'assure que le sous-dossier existe si c'est un projet structuré
                        bat "xcopy \"${sourceFile}\" \"${PROD_DIR}\" /Y /S"
                    }
                }
            }
        }
    }
}
