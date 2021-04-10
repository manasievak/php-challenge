<?php include 'json.php'; 


$orderRating = $_POST['order-rating'];
$orderMinimum = $_POST['minimum-rating'];
$orderDate = $_POST['order-date'];
$prioritizeText = $_POST['prioritize'];

function sortByRating($orderRating, $arr) {
    if($orderRating == 'highest') {            
        usort($arr, 'sortByOrderDesc');
    } else {
        usort($arr, 'sortByOrder');
    }

    return $arr;
}

function sortByOrder($a, $b) {
        return $a['rating'] - $b['rating'];
    }
function sortByOrderDesc($a, $b) {
        return $b['rating'] - $a['rating'];
    }

function filterByMinimumRating($orderMinimum, $arr) {
        $result = [];
        foreach($arr as $element ){
            if($element['rating'] >= $orderMinimum)
                array_push($result, $element);
            }
        return $result;
} 

function orderByDate($orderDate, $arr) {
    if($orderDate == 'newest') {            
        usort($arr, 'sortByDateDesc');
    } else {
        usort($arr, 'sortByDate');
    }

    return $arr;
}

function sortByDate($a, $b) {
        return strtotime($a['reviewCreatedOnDate']) - strtotime($b['reviewCreatedOnDate']);
    }
function sortByDateDesc($a, $b) {
        return strtotime($b['reviewCreatedOnDate']) - strtotime($a['reviewCreatedOnDate']);
    }

function prioritize($prioritizeText, $arr) {
    if($prioritizeText == 'no') {
        usort($arr, 'sortByText');
    }
    else {
        usort($arr, 'sortByTextDesc');
    }
    return $arr;
}

function sortByText($a, $b) {
    return $a['reviewText'] - $b['reviewText'];
}
function sortByTextDesc($a, $b) {
    return $b['reviewText'] - $a['reviewText'];
}

$filterResult = filterByMinimumRating($orderMinimum, $json);
$reviewsWithText = [];
$reviewsWithoutText = [];

foreach($filterResult as $element ){
    if($element['reviewText'] == '')
        array_push($reviewsWithoutText, $element);
    else {
        array_push($reviewsWithText, $element);
    }
}

$reviewsWithText = orderByDate($orderDate, $reviewsWithText);
$reviewsWithoutText = orderByDate($orderDate, $reviewsWithoutText);
$reviewsWithText = sortByRating($orderRating, $reviewsWithText);
$reviewsWithoutText = sortByRating($orderRating, $reviewsWithoutText);


//$filter = sortByRating($orderRating, $json);
//$filter = filterByMinimumRating($orderMinimum, $json);
//$filter = orderByDate($orderDate, $json);
//$filter = prioritize($prioritizeText, $json);

if($prioritizeText == 'no') {
    echo '<pre>';
    print_r($reviewsWithoutText);
    print_r($reviewsWithText);
    echo '</pre>';
} else {
    echo '<pre>';
    print_r($reviewsWithText);
    print_r($reviewsWithoutText);
    echo '</pre>';
}
 ?>