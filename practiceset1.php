<?php

/**
 * Calculates the total price of items in a shopping cart.
 *
 * @param array $items An array of items with 'name' and 'price' keys.
 * @return float The total price of all items.
 */
function calculateTotalPrice(array $items): float {
    $total = 0;
    foreach ($items as $item) {
        $total += $item['price'];
    }
    return $total;
}

/**
 * Performs a series of string manipulations: remove spaces and convert to lowercase.
 *
 * @param string $inputString The input string for manipulation.
 * @return string The modified string.
 */
function manipulateString(string $inputString): string {
    $string = str_replace(' ', '', $inputString);
    return strtolower($string);
}

/**
 * Checks if a number is even or odd.
 *
 * @param int $number The number to be checked.
 * @return string A message indicating if the number is even or odd.
 */
function checkEvenOdd(int $number): string {
    if ($number % 2 == 0) {
        return "The number $number is even.";
    } else {
        return "The number $number is odd.";
    }
}

// Calculate total price
$items = [
    ['name' => 'Widget A', 'price' => 10],
    ['name' => 'Widget B', 'price' => 15],
    ['name' => 'Widget C', 'price' => 20],
];
$totalPrice = calculateTotalPrice($items);
echo "Total price: $" . $totalPrice;

// Perform string manipulations
$inputString = "This is a poorly written program with little structure and readability.";
$modifiedString = manipulateString($inputString);
echo "\nModified string: " . $modifiedString;

// Check if a number is even or odd
$number = 42;
$resultMessage = checkEvenOdd($number);
echo "\n" . $resultMessage;

?>
