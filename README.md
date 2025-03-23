XLSX Formating to txt example
Variable called $desiredColumns takes an array of integers, which is number row that you wanna see in formatted file.

Example:
Currently it takes the price.xlsx file that has 6 rows, and uses array [1,5,4,6] to keep the first row, cut the second, then put in the fifth and etc.

Also there is hyperlinks workaround. If your text is an hyperlink, it will be converted to an url.

 Used:
php_engine   = PHP-8.1
nginx_engine = Nginx-1.26
composer > ffice/phpspreadsheet": "1.23"

U`ll need php 7.1+ and an ffice/phpspreadsheet": "1.23"

Usage:
1. move xlsx file to project folder
2. open the index.php
3. xlsx file will be formatted and result will be given via output.txt file in the project folder