# Demo Web Security

This project and this readme is WIP.

List of common Application Security Risks:
https://www.owasp.org/index.php/Top_10_2017-Top_10

## Run

Start mariadb, phpmyadmin and apache with docker-Compose
```bash
docker-compose up -d
```

Create and run only the webserver without mariadb.
```bash
docker build -t web-security .
docker run -d -p 5100:80 web-security
```

## Docs
 * [XSS](docs/XSS.md)
 * [SQL Injection](docs/sqli.md)
 * [Command Injection](docs/ci.md)
 * [File Injection](docs/fi.md)
