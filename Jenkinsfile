pipeline {
  agent {
    node {
      label 'master'
    }
    
  }
  stages {
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
    stage('Example') {
      environment { 
        AN_ACCESS_KEY = credentials('my-prefined-secret-text') ③
  }
      steps {
        sh 'printenv'
  }
    stage('Sanity check...') {
      steps {
        input 'Does the staging environment for cuelab look ok?'
      }
    }
    stage('Deploy - production') {
      steps {
        echo "Deploying.."
      }
    }
  }
}
