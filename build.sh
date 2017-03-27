#!/bin/bash

#mkdir $JENKINS_HOME/deployment

tar -cvzf $JENKINS_HOME/deployment/cuelab-$(date +\%d-\%m-\%Y-%H:%M:%S).tar.gz .
