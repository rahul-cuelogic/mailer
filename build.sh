#!/bin/bash

mkdir $JENKINS_HOME/deployment

tar -cvzf $JENKINS_HOME/deployment/cuelab.tar.gz-$(date +\%d-\%m-\%Y-%H:%M:%S) .
