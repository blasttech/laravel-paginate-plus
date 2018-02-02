# Extra functionality for Laravel pagination

[![Latest Version](https://img.shields.io/github/release/blasttech/laravel-paginate-plus.svg?style=flat-square)](https://github.com/blasttech/laravel-paginate-plus/releases)
[![SensioLabsInsight](https://img.shields.io/sensiolabs/i/fb7765b9-7632-4897-8054-22d85b41ffda.svg)](https://insight.sensiolabs.com/projects/fb7765b9-7632-4897-8054-22d85b41ffda)
[![Build Status](https://img.shields.io/travis/blasttech/laravel-paginate-plus.svg?style=flat-square)](https://travis-ci.org/blasttech/laravel-paginate-plus)
[![Quality Score](https://img.shields.io/scrutinizer/g/blasttech/laravel-paginate-plus.svg?style=flat-square)](https://scrutinizer-ci.com/g/blasttech/laravel-paginate-plus)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![StyleCI](https://styleci.io/repos/119760533/shield?branch=master)](https://styleci.io/repos/119760533)
[![Total Downloads](https://img.shields.io/packagist/dt/blasttech/laravel-paginate-plus.svg?style=flat-square)](https://packagist.org/packages/blasttech/laravel-paginate-plus)

This package provides a trait that adds the ability to paginate complex models.

## Installation

This package can be installed through Composer.

```
$ composer require blasttech/laravel-paginate-plus
```

## Usage

To add complex pagination behaviour to your model you must:<br />
1. specify that the model will conform to ```Blasttech\PaginatePlus\PaginatePlus```<br />
2. use the trait ```Blasttech\PaginatePlus\PaginatePlusTrait```<br />
3. specify the number of rows to paginate<br />

### Example

```php
use Blasttech\PaginatePlus\PaginatePlus;
use Blasttech\PaginatePlus\PaginatePlusTrait;

class MyModel extends Eloquent implements PaginatePlus
{
    use PaginatePlusTrait;
    
    public function getCustomers()
    {
        return Customer::addSelect(DB::raw('REPLACE(customer_name, 'Pty Ltd', '') AS customer'))
            ->groupBy('customer')
            ->paginatePlus(25); 
    }
    
    ...
}
```

This will create a LengthAwarePaginator of 25 records. If no value is provided for the number of records to show, the model's per_page value (defaults to 15) will be used.

Normally, you wouldn't be able to paginate when there is a grouped calculated field, but with this package you can.


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
