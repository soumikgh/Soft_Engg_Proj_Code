#!/bin/bash
for i in $( ls $1 )
do
	if grep -q FTBFS $1/$i
	then
		cp $1/$i $2/
		echo "$i - File copied."
	else
		echo "$i - FTBFS not present"
	fi

done
