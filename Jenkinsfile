pipeline {
    agent any
    
    stages {
        stage('Checkout') {
            steps {
                echo 'Checkout stage running'
                git branch: 'main', url: 'https://github.com/yourusername/your-first-name.git'
            }
        }
        
        stage('Build') {
            steps {
                echo 'Build stage running'
                sh 'docker-compose build'
            }
        }
        
        stage('Test') {
            steps {
                echo 'Test stage running'
                // Add your test commands here
                sh 'echo "Running tests..."'
            }
        }
        
        stage('Code Quality') {
            steps {
                echo 'Code Quality stage running'
                // Add code quality checks
                sh 'echo "Running code quality checks..."'
            }
        }
        
        stage('Security Scan') {
            steps {
                echo 'Security Scan stage running'
                // Add security scanning
                sh 'echo "Running security scans..."'
            }
        }
        
        stage('Deploy to Staging') {
            steps {
                echo 'Deploy to Staging stage running'
                sh 'docker-compose up -d'
            }
        }
        
        stage('Integration Test') {
            steps {
                echo 'Integration Test stage running'
                // Add integration tests
                sh 'echo "Running integration tests..."'
            }
        }
        
        stage('Deploy to Production') {
            steps {
                echo 'Deploy to Production stage running'
                // Add production deployment commands
                sh 'echo "Deploying to production..."'
            }
        }
    }
    
    post {
        always {
            echo 'Pipeline completed'
            // Cleanup
            sh 'docker-compose down'
        }
        success {
            echo 'Pipeline succeeded!'
        }
        failure {
            echo 'Pipeline failed!'
        }
    }
}