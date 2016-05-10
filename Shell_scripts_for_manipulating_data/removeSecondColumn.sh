#!/bin/bash
while read line
do
	echo $line | awk '{print $1;}' >> ftbfs_bugids.txt
done <ftbfs.txt
