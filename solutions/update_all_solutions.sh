#!/bin/bash

# Create an array of directory names
directories=(A01 A02 A03 A04 A05 A06 A07 A08 A09 A10)

# If the file already exists, remove it
if [ -f solutions.md ]; then
    rm solutions.md
fi

# Create an empty solutions.md file
touch solutions.md

# Loop through each directory
for dir in "${directories[@]}"; do
    # Concatenate all .md files in the directory and append to solutions.md
    cat "$dir"/*.md >> solutions.md
    # Return carriage
    echo "" >> solutions.md
    echo "" >> solutions.md
done