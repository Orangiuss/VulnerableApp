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
# Elif the user wants to get kali docker container
elif [ "$1" == "kali" ]; then
  # Execute the kali.sh
  ./kali/kali.sh $2
elif [ "$1" == "-h" ]; then
  echo "Usage: setup.sh [option]"
  echo "Commands:"
  echo "  kali  Execute the Kali script"
  echo "    - start  Start the Kali container"
  echo "    - exec   Get a shell in the Kali container"
  echo "    - build  Build the Kali image"
  echo "    - change Change the Kali Dockerfile"
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