#!/bin/bash

kali_start() {
    docker run -d -t --name kali_vulnapp vulnapp/kali
}

kali_exec() {
    docker exec -it kali_vulnapp bin/bash
}

kali_build() {
    # Build the Kali image
    # Get the path of the current directory
    DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" &> /dev/null && pwd )"
    # Change the directory to the Kali folder
    cd $DIR
    echo "Building Kali image..."
    docker build -t vulnapp/kali .
    # Change the directory back to the root
    cd ..
}

kali_change() {    
    # Change the Dockerfile
    DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" &> /dev/null && pwd )"
    cd $DIR
    nano Dockerfile
}

kali_stop() {
    docker rm kali_vulnapp -f
}

# Check the argument passed by the user
if [ "$1" == "start" ]; then
    kali_start
elif [ "$1" == "exec" ]; then
    kali_exec
elif [ "$1" == "build" ]; then
    kali_build
elif [ "$1" == "change" ]; then
    kali_change
elif [ "$1" == "stop" ]; then
    kali_stop
else
    echo "Invalid argument. Please specify one of the following: start, exec, build, change, stop."
fi