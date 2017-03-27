pipeline {
  agent {
    node {
      label 'master'
    }
    
  }
  stages {
    stage('build') {
      steps {
        echo "start building"
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
