#!/bin/bash

log_file='logs/signonsite.log'
docker build . -t signonsite-technical-test >> $log_file
docker run -d -p 8080:8080 signonsite-technical-test >> $log_file
