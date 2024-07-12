#!/bin/bash

# Set build type
if [ "$1" == "-r" ]; then
  docker compose up -d --no-deps --build --remove-orphans
  # Prepare the exploit
  touch /tmp/pom.xml 
  sleep 5
  curl -v -u admin:admin123 --upload-file /tmp/pom.xml http://localhost:8081/repository/maven-releases/org/foo/1.0/foo-1.0.po > /dev/null 2>&1
elif [ "$1" == "-d" ]; then
  docker compose down
elif [ "$1" == "-h" ]; then
  echo "Usage: setup.sh [option]"
  echo "Options:"
  echo "  -r  Rebuild the Docker containers"
  echo "  -d  Stop and remove the Docker containers"
  echo "  -h  Show this help message"
else
  docker compose up -d
  # Prepare the exploit
  touch /tmp/pom.xml 
  sleep 5
  curl -v -u admin:admin123 --upload-file /tmp/pom.xml http://localhost:8081/repository/maven-releases/org/foo/1.0/foo-1.0.po > /dev/null 2>&1
fi