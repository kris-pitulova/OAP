<?php
include __DIR__ . '/6/Gym.php';
include __DIR__ . '/7/BigArrays.php';

use oap\Gym;
use oap\BigArrays;

start:
echo 'What task is about to be checked? (6/7)' . PHP_EOL;
$taskNum = readline();
if($taskNum == 6) {
  $isValid = false;
  while(!$isValid) {
    $count = readline('Enter visitors amount: ');
    if((int)$count > 0) {
      $isValid = true;
    }
  }

  echo 'Enter visitors\' age' . PHP_EOL;
  $visitors = Array();
  for($i = 0; $i < $count; $i++) {
    array_push($visitors, (int)readline('Visitor #' . ($i + 1) . ': '));
  }

  try {
    $gym = new Gym($visitors);
    echo 'Average visitor\'s age is ' . $gym->findAvg() . ' years' . PHP_EOL;
    echo 'The oldest visitor today is ' . $gym->findOldest() . ' years old' . PHP_EOL;
    echo 'The younges visitor today is ' . $gym->findYoungest() . ' years old' . PHP_EOL;
  } catch(InvalidArgumentException $e) {
    echo $e->message . PHP_EOL;
    goto start;
  }

}
else if($taskNum == 7) {
  $length = readline('Enter inner arrays\' length: ');
  $bigArrays = new BigArrays((int)$length);
  echo 'Array #1 is:' . PHP_EOL;
  print_r($bigArrays->getArr1());
  echo PHP_EOL . 'Array #2 is:' . PHP_EOL;
  print_r($bigArrays->getArr2());

  do {
    echo 'What action do you want to perform with them? (enter the action\'s number)' . PHP_EOL;
    echo '1 Sum arrays' . PHP_EOL;
    echo '2 Diff arrays' . PHP_EOL;
    echo '3 Multiply by a number (any float different from zero)' . PHP_EOL;
    echo '4 Sum elements and find the biggest one' . PHP_EOL;
    echo '5 exit' . PHP_EOL;

    switch(readline()) {
      case '1':
        echo 'Arrays sum result is: ' . PHP_EOL;
        print_r($bigArrays->sumArrays());
        readline(PHP_EOL . 'Press enter to perform another action...');
        break;
      case '2':
        $minuend = (int)readline('What array is going to be substracted from? (1/2) ');
        $subtrahend = ($minuend == 1) ? 2 : 1;
        echo 'Array #' . $minuend . ' - array #' . $subtrahend . ' equals to: ' . PHP_EOL;
        print_r($bigArrays->diffArrays($minuend));
        readline(PHP_EOL . 'Press enter to perform another action...');
        break;
      case '3':
        $multiplier = (float)readline('Enter the multiplier: ');
        $result = $bigArrays->multiplyBy($multiplier);
        echo 'First array multiplied by ' . $multiplier . ' is:' . PHP_EOL;
        print_r($result[0]);
        echo 'Second array multiplied by ' . $multiplier . ' is:' . PHP_EOL;
        print_r($result[1]);
        readline(PHP_EOL . 'Press enter to perform another action...');
        break;
      case '4':
        $results = $bigArrays->findBiggestElemSum();
        if($results[0] != 0) {
          echo 'Array #1 elemets sum is ' . $results[1] . PHP_EOL;
          echo 'Array #2 elemets sum is ' . $results[2] . PHP_EOL;
          echo 'Array #' . $results[0] . ' has the bigger elements\' sum with a total of ' . $results[$results[0]];
        } else {
          echo 'Arrays\' elements sum is equal and makes up ' . $results[1];
        }
        readline(PHP_EOL . 'Press enter to perform another action...');
        break;
      case '5':
        exit();
    }
  } while(true);


} else {
  echo 'Choose the correct task number' . PHP_EOL;
  goto start;
}
?>
