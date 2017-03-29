pipeline {
  agent {
    node {
      label 'master'
    }
    
  }
  stages {
    stage('build..') {
      steps {
        echo 'start building...'
      }
    }
    stage('deploy..') {
      steps {
        parallel(
          "deploy": {
            echo 'Deploying'
            
          },
          "test": {
            sh 'echo "test parallel"'
            
          }
        )
      }
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
