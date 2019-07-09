
<?php
$student_one = [];

$student_one['student'] = ['software', ['itse' => 90 , 'web'=>100]];

//var_dump($student_one);

foreach ($student_one as $item => $genre) {
    echo "Item: " . $item . "<br>";
    var_dump($genre);
//    foreach ($genre as $count => $department){
//        echo "Department: " . $department ."\t";
//        foreach ($department as $countDepartment => $marks)
//            echo  "<br>Subject: " . $countDepartment . "  Marks: " . $marks;
//    }
}