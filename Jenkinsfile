pipeline {
  agent {
    node {
      label 'master'
    }
    
  }
  stages {
    stage('Start') {
      steps {
        slackSend(color: '#FFFF00', message: '"STARTED: Job \'${env.JOB_NAME} [${env.BUILD_NUMBER}]\' (${env.BUILD_URL})"')
      }
    }
    stage('build') {
      steps {
        echo 'start building...'
      }
    }
    stage('Test') {
      steps {
        parallel(
          "test1": {
            echo 'test parallel 1'
            
          },
          "test2": {
            sh 'echo "test parallel 2"'
            
          }
        )
      }
    }
    stage('Sanity check...') {
      steps {
        parallel(
          "Sanity check...": {
            input 'Does the staging environment for cuelab look ok?'
            
          },
          "commit id": {
            sh '''sudo git rev-parse --short HEAD > current.txt
sudo git rev-parse --short HEAD~1 > prev.txt
'''
            
          }
        )
      }
    }
    stage('Deploy - production') {
      steps {
        sh './build.sh'
      }
    }
  }
  post {
    success {
      slackSend(color: '#00FF00', message: "SUCCESSFUL: Job '${env.JOB_NAME} [${env.BUILD_NUMBER}]' (${env.BUILD_URL})")
      
    }
    
    failure {
      slackSend(color: '#FF0000', message: "FAILED: Job '${env.JOB_NAME} [${env.BUILD_NUMBER}]' (${env.BUILD_URL})")
      
    }
    
  }
}