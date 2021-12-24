#!/bin/bash

if [ -n "$1" ]
then
	sed -i '' 's/\/font\//\/wp-content\/themes\/igenomix_store\/assets\/font\//g' $1
else
	echo "Path not found"
fi