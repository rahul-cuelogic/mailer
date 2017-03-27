pipeline {
  agent none
  stages {
    stage('build') {
      steps {
        echo 'build step'
      }
    }
    stage('deploy') {
      steps {
        sh '''echo "create a file"
sudo touch cuelab'''
      }
    }
  }
}