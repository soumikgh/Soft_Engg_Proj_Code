#!/bin/bash
# $1 - directory in which the files are there
for i in $( ls $1 )
do
	head -n1 $1/$i >> packages.txt
done
