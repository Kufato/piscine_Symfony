#!/bin/bash

if [ -z "$1" ]; then
    echo "You have to enter: $0 <URL in bit.ly format>"
    exit 1
fi

FINAL_URL=$(curl -I -s -L "$1" | grep -i "^Location" | cut -d ' ' -f2)

SHORT_FINAL_URL=$()

if [ -z "FINAL_URL" ]; then
    echo "The URL is empty"
else
    echo "$FINAL_URL"
fi