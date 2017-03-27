pipeline {
  agent dockerfile
  stages {
    stage('build') {
      steps {
        sh '''echo "Test project ${env.PROJECT}"
touch cuelab.txt'''
      }
    }
    stage('deploy') {
      steps {
        dir(path: '/var/jenkins_home') {
          sh '''touch buildsuccess
touch buildsuccess2'''
        }
        
      }
    }
    stage('cleanup') {
      steps {
        sh '''ls -l /var/jenkins_home | grep -i buildsuccess

if [ $? -eq 0 ]; then

rm /var/jenkins_home/$FILE'''
      }
    }
  }
  environment {
    PROJECT = 'CUELABS'
  }
}