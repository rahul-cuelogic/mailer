pipeline {
  agent {
    node {
      label 'master'
    }
    
  }
  stages {
    stage('build') {
      steps {
        echo 'build step'
      }
    }
    stage('deploy') {
      steps {
        sh 'pwd'
        sh './build.sh'
      }
    }
  }
}