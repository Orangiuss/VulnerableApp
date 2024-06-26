#!/bin/bash

# Set build type
if [ "$1" == "rebuild" ]; then
  docker compose up -d --no-deps --build --remove-orphans
elif [ "$1" == "down" ]; then
  docker compose down
else
  docker compose up -d
fi

# Prepare the exploit
#!/bin/bash
touch /tmp/pom.xml 
sleep 5
curl -v -u admin:admin123 --upload-file /tmp/pom.xml http://localhost:8081/repository/maven-releases/org/foo/1.0/foo-1.0.po > /dev/null 2>&1