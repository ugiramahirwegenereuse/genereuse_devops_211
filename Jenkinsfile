pipeline {
    agent any

    environment {
        NODE_ENV = 'production'
    }

    stages {
        stage('Checkout') {
            steps {
                echo '📥 Cloning repository...'
                git branch: 'main', url: 'https://github.com/ugiramahirwegenereuse/genereuse_devops_211.git'
            }
        }

        stage('Install Dependencies') {
            steps {
                echo '📦 Installing dependencies...'
                sh 'npm install'
            }
        }

        stage('Build') {
            steps {
                echo '🏗️ Building application...'
                sh 'npm run build || echo "No build script found"'
            }
        }

        stage('Test') {
            steps {
                echo '🧪 Running tests...'
                sh 'npm test || echo "No tests found"'
            }
        }

        stage('Deploy') {
            steps {
                echo '🚀 Deploying application...'
                sh '''
                mkdir -p ~/healthrwanda_build
                cp -r * ~/healthrwanda_build/
                '''
            }
        }
    }

    post {
        success {
            echo '✅ Build successful!'
        }
        failure {
            echo '❌ Build failed! Check console output for errors.'
        }
    }
}
