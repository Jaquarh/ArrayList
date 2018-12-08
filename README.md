# ArrayList
Lambda for PHP within Arrays. See it working over at [3v4l.org](https://3v4l.org/ppcgM);

# Creating your array

```php
$myArray = new ArrayList([1, 2, 3]); // Assoc array
$myArray = new ArrayList(['one' => 1, 'two' => 2, 'three' => 3]); // Multi-Dimensional array supported

$myArray->add(4); // Assoc array
$myArray->add(4, 'four'); // Multi-Dimensional array supported
```

# Querying your array

```php
$myArray = new ArrayList([1,2,3]);
$myArray->where(function($x) { return $x > 2; }); // Returns an ArrayListResult

$myArray = new ArrayList(['one' => 1, 'two' => 2, 'three' => 3]);
$myArray->whereKeys(function($x) { return $x == 'two'; }); # Only with multi-dimensional arrays
```

# Working with your results

```php
$myArray = new ArrayList([1,2,3]);
$myArray->where(function($x) { return $x > 2; })->getFirstOrDefault(); // Returns a new ArrayList containing first or default value

$myArray = new ArrayList([1,2,3]);
$myArray->where(function($x) { return $x > 1; })->getResults(); // Returns a new ArrayList of all results
```

# Tools you can utilize

```php
$myArray = new ArrayList([1,2,3]);

# If present will only execute if where returns a result set
$myArray->where(function($x) { return $x > 2; })->getFirstOrDefault()->ifPresent(function($x) { echo $x * 5; });

$myArray = new ArrayList(['one' => 1, 'two' => 2, 'three' => 3]);

# Get will return the array as an array format and can be type forced if multi-dimensional
$results = (object) $myArray->where(function($x) { return $x > 2; })->getFirstOrDefault()->get();
```
