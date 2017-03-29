#!/bin/bash

#mkdir $JENKINS_HOME/deployment1

#tar -cvzf $JENKINS_HOME/deployment/cuelab-$(date +\%d-\%m-\%Y-%H:%M:%S).tar.gz .

ssh -i $JENKINS_HOME/riot-demo.pem ubuntu@54.194.154.163 "echo deploy success..!!"
