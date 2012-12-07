#!/bin/bash

# Compression des images JPG et PNG d'un repertoire donné
#	Prend en compte les fichiers cachés et les différences de casse dans l'extension (coucou.JPG ou coucou.jpg)

IMAGES_DIR="../../themes/giacomo/images ../../public/Billets ../.."

for imgDir in $IMAGES_DIR
do
	#compress PNG
	for image in `ls -a $imgDir/ | grep -i png`
	do
		lib/pngcrush -ow $imgDir/$image
	done

	#compress JPG
 	for image in `ls -a $imgDir/ | grep -i jpg`
	do
		lib/jpegoptim --strip-all $imgDir/$image
	done
done
