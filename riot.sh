#!/bin/bash

# script file for alerts

body=$1
cd /scripts
/usr/bin/php riot.php "$body"

