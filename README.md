# laravel-paginate-plus
Extra functionality for laravel pagination

Functions: 
 * paginatePlus($per_page = null)


## paginatePlus

Use this scope to return a LengthAwarePaginator which works with calculated SQL fields.

Normally with Laravel paginate, the select fields are stripped out of the pagination. But, if you groupBy a field in the select statement, you won't be able to and an error will be generated. This scope allows you to paginate with a groupBy. 

Examples:
```
$query->paginatePlus(25);
```
This will create a LengthAwarePaginator of 25 records. If no value is provided for the number of records to show, the model's per_page value will be used.

 


