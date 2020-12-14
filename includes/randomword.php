<?php
$dico_file = "https://bbs-queen.neant.be/includes/american-english";
// Convert the text fle into array and get text of each line in each array index
$file_arr = file($dico_file);
// Total number of linesin file
$num_lines = count($file_arr);
// Getting the last array index number by subtracting 1 as the array index starts from 0
$last_arr_index = $num_lines - 1;
// Random index number
$rand_index = rand(0, $last_arr_index);
// random text from a line. The line will be a random number within the indexes of the array
$rand_word_ans = $file_arr[$rand_index];
// echo $rand_word_ans;
?>