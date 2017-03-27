pipeline {
  agent {
    node {
      label 'master'
    }
    
  }
  stages {
    stage('build') {
      steps {
        sh 'start build'
      }
    }
   
    stage('deploy') {
      steps {
        sh './build.sh'
      }
    }
     stage('Sanity check') {
             steps {
                 input "Does the staging environment for cuelab look ok?"
             }
         }
  }
}
