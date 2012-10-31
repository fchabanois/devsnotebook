#!/bin/bash

#Compress les image png dans un repertoire gz
rm -rf ../../themes/giacomo/images/gz/*
lib/pngcrush -d ../../themes/giacomo/images/gz ../../themes/giacomo/images/*png

rm -rf ../../public/Billets/gz/* 
lib/pngcrush -d ../../public/Billets/gz ../../public/Billets/*png