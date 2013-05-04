# Simple CSV class

This class is a trivial demo of the CSV functionality built into PHP's `SPLFileObject` class. It adds the ability to return rows as associative arrays, with the keys set from the file's header row.

## Using it

```php
$csv = new Inanimatt\File\CSVFile('filename.csv');

foreach ($csv as $row) {
    print_r($row);
}
```

## Installing it

Either copy the file where you want it, or use Composer. Add this repository to your `composer.json` then `require` the package name:

```json
{
    "name": "vendorname/projectname",
    "authors": [
        {
            "name": "Your Name",
            "email": "you@example.com"
        }
    ],
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/inanimatt/csv-file.git"
        }
    ],
    "require": {
        "inanimatt/csv-file": "~1.0"
    }
}
```

Then run `composer install` to download the package and build the autoloader.
