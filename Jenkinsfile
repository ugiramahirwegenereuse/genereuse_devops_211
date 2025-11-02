pipeline {
    agent any

    environment {
        PROJECT_DIR = '/var/www/html'   // Path where code will be deployed
    }

    stages {

        stage('Checkout') {
            steps {
                echo '📥 Cloning repository...'
                git branch: 'main', url: 'https://github.com/ugiramahirwegenereuse/genereuse_devops_211.git'
            }
        }

        stage('Build Docker Images') {
            steps {
                echo '🏗️ Building Docker images...'
                sh 'docker-compose build'
            }
        }

        stage('Start Services') {
            steps {
                echo '🚀 Starting Docker containers...'
                sh 'docker-compose up -d'
            }
        }

        stage('Run Database Initialization') {
            steps {
                echo '🗄️ Initializing database...'
                sh 'docker exec -i $(docker ps -q -f name=group1_db) mysql -u root -prootpassword group1_shareride_db < init.sql'
            }
        }

        stage('Test PHP Connection') {
            steps {
                echo '🧪 Testing database connection with PHP...'
                sh '''
                docker exec -i $(docker ps -q -f name=group1_web) php -r "require 'src/config/database.php'; echo 'DB Connection OK';"
                '''
            }
        }

        stage('Deploy') {
            steps {
                echo '✅ Deployment completed!'
                echo 'Project is running at http://localhost:8080'
            }
        }
    }

    post {
        success {
            echo '🎉 Build and deployment successful!'
        }
        failure {
            echo '❌ Build failed. Check Jenkins console output for details.'
        }
    }
}
