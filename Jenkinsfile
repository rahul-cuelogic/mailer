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
    stage('Sanity check') {
             steps {
                 input "Does the staging environment for cuelab look ok?"
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
