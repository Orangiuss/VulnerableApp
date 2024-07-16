FROM kalilinux/kali-rolling:latest as kali_linux

RUN apt update && apt -y install kali-linux-core
RUN apt -y install kali-tools-top10
RUN apt -y install kali-tools-web
RUN apt -y install kali-tools-fuzzing

# Tout les scanners de vulnérabilités wapiti, exploitdb, zap, spiderfoot...
RUN apt -y install kali-tools-identify

# Passwords crack with hashcat, john, seclists...
RUN apt -y install kali-tools-passwords

# Update
RUN apt -y update
RUN apt -y upgrade
RUN apt -y install inetutils-ping

# Ajout de pip3
RUN apt -y install python3-pip

# Add JWT_Tool
RUN git clone https://github.com/ticarpi/jwt_tool
RUN python3 -m pip install termcolor cprint pycryptodomex requests

# Dezip rockyou.txt
RUN gzip -d /usr/share/wordlists/rockyou.txt.gz

# Go for projectdiscovery tools
RUN apt-get -y update
RUN apt-get -y install golang

RUN apt -y install gccgo-go

RUN apt -y install nuclei

RUN nuclei

# Install Dalfox
RUN apt -y install golang
RUN git clone https://github.com/hahwul/dalfox
WORKDIR /dalfox
RUN go install
RUN go build 
RUN cp dalfox /usr/bin/
RUN dalfox version

# Install SQLTimeProbe
RUN git clone https://github.com/Orangiuss/SQLTimeProbe.git

WORKDIR /
COPY CVE-2019-7238.py /CVE-2019-7238.py
RUN git clone https://github.com/wallarm/jwt-secrets.git

RUN cp jwt-secrets/jwt.secrets.list /usr/share/wordlists/
COPY jwt_token.txt /jwt_token.txt

RUN apt -y install nano
RUN apt-get -y update