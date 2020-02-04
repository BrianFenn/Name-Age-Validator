<?php
    // get the data from the form
    $First_Name = $_POST['First_Name'];
    $Last_Name = $_POST['Last_Name'];
    $Age = $_POST['Age'];
            
    
    // escape the unformatted input
    $First_Name_escaped = htmlspecialchars($First_Name);
    $Last_Name_escaped = htmlspecialchars($Last_Name);
    $Age_escaped = htmlspecialchars($Age);

    $Age = filter_input(INPUT_POST, 'Age', 
    FILTER_VALIDATE_INT);
    
    //if $Age is less than 18
	//	display "You are not able to vote"
	
	//else if $Age is >= 18 
	//	display "you are able to vote"

	//if Age is not a number 
	//	return to index.php //1st(main) page
	//	display "Please enter a valid number"

	//$Age_escaped = filter_input(INPUT_POST, 'Age', FILTER_VALIDATE_INT); 
	// NULL if 'Age' has not been set in the $_POST array 
	// FALSE if 'Age' is not a valid integer value
	
	//if $Age_escaped is NULL or FALSE
	//	return to index.php //1st(main) page
        
    //set default value of variables for initial page laod
    if (!isset($First_Name)) { $First_Name = ''; }
    if (!isset($Last_Name)) { $Last_Name = ''; }
    if (!isset($Age)) {$Age = ''; }
    
    if ($First_Name === FALSE) {
        $error_message = 'Please enter a valid name.';
    } else if ($Last_Name === FALSE) {
        $error_message = 'Please enter a valid last name';
    } elseif ($Age <= 0) {
        $error_message = 'Please enter a valid age';
    } elseif ($Age >= 18) {
        $vote_Message = 'I am old enough to vote in the United States.';
    } elseif ($Age <= 17) {
        $vote_Message = 'I am not old enough to vote in the United States.';
    } else {
        $error_message = '';
    }
    
    //if an error message exists go to the index page
   // if ($error_message != '') {
     //   include('index.php')
       // exit();
    //}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Name & Age Validator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <main>
        <h1>Name & Age Validator</h1>


        <h2><?php echo "Hello, my name is {$First_Name_escaped} {$Last_Name_escaped}"?></h2>
        <h2><?php echo "I am {$Age_escaped} years Old"?></h2>
        <h2><?php echo "{$vote_Message}"?></h2>
            
    </main>
</body>
</html>