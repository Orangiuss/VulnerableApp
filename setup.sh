#!/bin/bash

# Set build type
if [ "$1" == "rebuild" ]; then
  docker compose up -d --no-deps --build --remove-orphans
else
  docker compose up -d
fi

# Prepare the exploit
#!/bin/bash
touch /tmp/pom.xml 
curl -v -u admin:admin123 --upload-file /tmp/pom.xml http://localhost:8081/repository/maven-releases/org/foo/1.0/foo-1.0.po > /dev/null 2>&1