#!/bin/bash
for i in $( ls All_bugs )
do
	cat All_bugs/$i >> bug-titles/$i
done