# Sentimental Graffiti 1 Unpack 

-----------------------------------------------------------
## 1. Intro
The code create by sangtaik on 2022.02.24
It was re-created based on the contents analyzed by D.

I found code what D was upload. but it is not worked because "array * int errors"
And I checked Sega Seturn Script file is not use file size pattern.
only divided by 0x800 offset each characters message script.
I fix the code and it was worked PHP 8 version
It was worked!

if you want to know how to get information 
please visit hear

https://github.com/sangtaik/sg1unpack

-----------------------------------------------------------
## 2. How to Use
please download and install php7 or 8 version
open command on windows

copy script.pack file on Sega Seturn to PHP /bin folder 
```
cd <Where you installed php>
php.exe script_unpack.php
```

it will be worked 


-----------------------------------------------------------
## 3. what is message and information with D

if you want to more information please read behind

```
NEC Interchannel Package Format

Archived from http://www.cinnamonpirate.com/docs/neicpak on 2006/2/7
Grudgingly copied and pasted from his browser by D
NEC Interchannel’s package format is used in the Sentimental Graffiti games to store scripts and other data. The format appears in both Sentimental Graffiti on Sega Saturn and Sentimental Graffiti 2 on Dreamcast (I think, it’s been a long time since I lost the CD-ROM dump I made of the later).

The format is similar to Fastfile in that it is done to cut down on how many open streams the game needs, but it differs in its structure. Instead of running the files together, it arranges the files so all begin at the next sector of the CD-ROM. Since sectors are 0×800 bytes in length, you can multiply the sector count given in the header by 0×800 to get the start offset for each file. The file is padded out to the next sector by 0×00 bytes.

All values are stored in big endian byte order, since the SH2 and SH4 are big endian processors:
```
