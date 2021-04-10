<p>Hello</p>
<form method="post" action="filter.php">
<label for="order-rating">Order by rating:</label>
    <select id="order-rating" name="order-rating">
        <option value="highest">Highest First</option>
        <option value="lowest">Lowest First</option>
    </select>

    <label for="minimum-rating">Minimum rating:</label>
    <select id="minimum-rating" name="minimum-rating">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>

    <label for="order-date">Order by date:</label>
    <select id="order-date" name="order-date">
        <option value="newest">Newest First</option>
        <option value="oldest">Oldest First</option>
    </select>

    <label for="prioritize">Prioritize by text:</label>
    <select id="prioritize" name="prioritize">
        <option value="yes">Yes</option>
        <option value="no">No</option>
    </select>
    <input type="submit" name="submit" value="Filter" />
</form>