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
$filterResultTable = [];
if($prioritizeText == 'no') 
    $filterResultTable = array_merge($reviewsWithoutText,$reviewsWithText);
else 
    $filterResultTable = array_merge($reviewsWithText,$reviewsWithoutText);
    // echo '<pre>';
    // print_r($filterResultTable);
    // echo '</pre>';
    // echo '<pre>';
    // print_r($reviewsWithoutText);
    // print_r($reviewsWithText);
    // echo '</pre>';

?>
<table class="table table-bordered mx-auto" style="width: 900px;">
            <thead class="thead-light"> 
                <tr>
                    <th> ID </th>
                    <th> Rating </th>
                    <th> Date </th>
                    <th> Time </th>
                    <th> Text </th>
                </tr>
            </thead>
            <tbody> 
                <?php foreach ($filterResultTable as $element) : ?>
                    <tr>
                        <td> <?php echo $element['id']; ?> </td>
                        <td> <?php echo $element['rating']; ?> </td>
                        <td> <?php echo $element['reviewCreatedOnDate']; ?> </td>
                        <td> <?php echo $element['reviewCreatedOnTime']; ?> </td>
                        <td> <?php echo $element['reviewText']; ?> </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>