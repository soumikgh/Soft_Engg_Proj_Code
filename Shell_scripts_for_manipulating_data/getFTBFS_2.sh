#!/bin/bash
while read line; do
	cp All_bugs/${line}.txt FTBFS_bugs
done <ftbfs_bugids.txt