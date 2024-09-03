#!/bin/bash

# Function to setup tomcat

cd java_app
mvn clean package
cp target/webapp.war ../tomcat/target/