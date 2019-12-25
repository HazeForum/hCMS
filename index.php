<?php

require 'init.php';

$Decrypt = new \Cryptography\Decrypt();


//Cryptography\JWT::generate(['name'  => 'iJhefe', 'id' => 1, 'rank'  => 4]);

echo '<br>';

Cryptography\JWT::get_token_data('MfCSucCmFJkn2NJpmInzi59fbMEjwdvXD00fAZxAceBmQGUtw/WYc0LCSUgUNFr3lOeOSvEcmjoMFweU1Sma/sxGyyt+xfPhVKaH2O6uWPsMj5lrumpVjM2knh6oLYNl.7vWVbrN1N02MLZ2grGd9rw6mrL5OnH3M3BHlW1vcvVVQdMJRE50Ni7S2IQeBzUBZdCj5bVaRIcfbUtLOl1ZX4uIGsAo4WwY7+IJ1/OO+CH8R9Zqb438vdpAunmDZ4tyw.Y8wPoggf6WKV7ZB7NBl0w/dS968n2VBP3PnDXZrRCjNV9hFbhEiuJh51Kol3faKndYHbexLZErpnnX5xzeoRVAi73r1Znis7zQJVLSXgYA07TrwnCuVz7t3ZEJ+Bipp1#!#Fpj2zLclUganlSdVzRztjD3AKiPTEBELm32XIKVzk6vvsnmej56UQcDKoZmglT690hzCVb1xzrld96OaayRTSeQUCy3SYOAmASicgvlEOQyISbSFyJRZjBoueI4X8S86.7SLCWA3/gJJbBSLyiWmmvqIb8wRJZ7mJksG3JglB3joe0qkPlbuylF1WgF24PDH0pSkiiFJRjP8jKU08lcCtuR7iAtb4F9sB20zC9hfcF5nFYZbnbiazOIw6STBztoQz#!#TYPQjSxNwhUVN/3tm4pepunCs8ksFDR0JTSWbJpn5xj99rW/7k7WNK3ppteeqhUTLw+NNVl6H4S3tQ8SWBC3JUCQdNBaesMcF2E32gf/EpYVS5ey9ngtyG07k9OgpYJo.kmvvy2D3bBkADV6r0wCb52rDm770XLaGCDgae//pOiWF8kx+D+c6P1zve/YIdwkCsJ9a3LR6RoRjqTaRRGjU/i9i2k9X8GmHPZVSgtS2PoJSv72tqmPixzP8P+OW9sRm#!#kT4SDTIY/N6jEqIavPHpROw3j2ixwl8e6oDxGxfPhQoCexm+vwt1W7A2440iGDnHi9C7qfsl3+l4A6Z486CFlxzTyl8Vro6bNoAh0r4s+RkssFPZVc0WoCYOJld1G5cF');

$Decrypt->cipher = 'MfCSucCmFJkn2NJpmInzi59fbMEjwdvXD00fAZxAceBmQGUtw/WYc0LCSUgUNFr3lOeOSvEcmjoMFweU1Sma/sxGyyt+xfPhVKaH2O6uWPsMj5lrumpVjM2knh6oLYNl';

echo 'Criado:' . $Decrypt->aes();

echo '<br>';

$Decrypt->cipher = '7vWVbrN1N02MLZ2grGd9rw6mrL5OnH3M3BHlW1vcvVVQdMJRE50Ni7S2IQeBzUBZdCj5bVaRIcfbUtLOl1ZX4uIGsAo4WwY7+IJ1/OO+CH8R9Zqb438vdpAunmDZ4tyw';

echo 'Expira em:' . $Decrypt->aes();