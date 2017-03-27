pipeline {
  agent {
    docker {
      image 'ubuntu'
    }
    
  }
  stages {
    stage('build') {
      steps {
        sh '''#!/bin/bash

echo "Test project ${env.PROJECT}"
touch cuelab.txt'''
      }
    }
    stage('deploy') {
      steps {
        dir(path: '/var/jenkins_home') {
          sh '''#!/bin/bash

touch buildsuccess
touch buildsuccess2'''
        }
        
      }
    }
    stage('cleanup') {
      steps {
        sh '''#!/bin/bash

ls -l /var/jenkins_home | grep -i buildsuccess

if [ $? -eq 0 ]; then

rm /var/jenkins_home/$FILE'''
      }
    }
  }
  environment {
    PROJECT = 'CUELABS'
  }
}