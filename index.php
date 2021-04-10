<body class="align" >
<h3 class="title">Filter reviews</h3>
<form method="post" action="filter.php">
<div class="form-group">
<label for="order-rating">Order by rating:</label>
    <select class="form-control" id="order-rating" name="order-rating">
        <option value="highest">Highest First</option>
        <option value="lowest">Lowest First</option>
    </select>
</div>
<div class="form-group">
    <label for="minimum-rating">Minimum rating:</label>
    <select class="form-control" aria-label=".form-select-sm example" id="minimum-rating" name="minimum-rating">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
    </div>
    <div class="form-group">
    <label for="order-date">Order by date:</label>
    <select class="form-control" id="order-date" name="order-date">
        <option value="newest">Newest First</option>
        <option value="oldest">Oldest First</option>
    </select>
    </div>
    <div class="form-group">
    <label for="prioritize">Prioritize by text:</label>
    <select class="form-control" id="prioritize" name="prioritize">
        <option value="yes">Yes</option>
        <option value="no">No</option>
    </select>
    </div>
    <input class="btn btn-primary mb-2" type="submit" name="submit" value="Filter" />
</form>
</body>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>