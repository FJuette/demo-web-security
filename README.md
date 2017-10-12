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

### Demo 1

```javascript
?name=guest<script>alert('XSS!')</script>
```
