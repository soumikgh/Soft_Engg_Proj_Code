#!/bin/bash

file=$1
echo $1
echo $2

for ((i=1; i<=$2; i++)); do
	sort -k$((i+2)),$((i+2))rn $1 > sorted-results/col$i.txt
	#head -n10 sorted-results/col$((i+2)).txt > sorted-results/col$((i+2)).txt
	echo "col$((i+1)).txt written."
done