pipeline {
  agent {
    node {
      label 'master'
    }
    
  }
  stages {
    stage('build') {
      steps {
        echo 'start building'
      }
    }
    stage('deploy') {
      steps {
        parallel(
          "deploy": {
            sh './build.sh'
            
          },
          "test": {
            sh 'echo "test parallel"'
            
          }
        )
      }
    }
    stage('Sanity check') {
      steps {
        input 'Does the staging environment for cuelab look ok?'
      }
    }
  }
}