require_once '../src/ArrayList.php';

$myArray = new Jaquarh\ArrayList\ArrayList([
    ['id' => 1, 'username' => 'foo', 'privilidges' => ['can_read' => 1, 'can_write' => 0], 'incomming' => ''],
    ['id' => 2, 'username' => 'bar', 'privilidges' => ['can_read' => 1, 'can_write' => 1], 'incomming' => 'Hi everyone!']
]);

$myArray->where(function($x) {
    $privilidges = (object) $x['privilidges'];
    return $privilidges->can_write;
})->getFirstOrDefault()
  ->ifPresent(function($x) {
      if(!empty(($incomming = $x['incomming']))) echo $incomming;
  });
