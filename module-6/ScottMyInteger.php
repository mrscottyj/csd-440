<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ScottMyInteger</title>
</head>
<body>
 
<?php
 
// This class holds one integer and lets us check things about it
class ScottMyInteger {
 
    // The number we are storing
    private $value;
 
    // Constructor sets the number when we create the object
    public function __construct($value) {
        $this->value = $value;
    }
 
    // Returns the stored number
    public function getValue() {
        return $this->value;
    }
 
    // Changes the stored number to something new
    public function setValue($value) {
        $this->value = $value;
    }
 
    // Returns true if the number passed in is even
    public function isEven($num) {
        if ($num % 2 == 0) {
            return true;
        } else {
            return false;
        }
    }
 
    // Returns true if the number passed in is odd
    public function isOdd($num) {
        if ($num % 2 != 0) {
            return true;
        } else {
            return false;
        }
    }
 
    // Checks if the stored number is prime
    public function isPrime() {
        $num = $this->value;
 
        // Numbers less than 2 are not prime
        if ($num < 2) {
            return false;
        }
 
        // Check if anything divides evenly into the number
        for ($i = 2; $i < $num; $i++) {
            if ($num % $i == 0) {
                return false;
            }
        }
 
        return true;
    }
}
 
// --- Testing instance 1 with the number 9 ---
$first = new ScottMyInteger(9);
 
echo "<h2>First Number: " . $first->getValue() . "</h2>";
echo "<p>Even: "  . ($first->isEven($first->getValue()) ? "Yes" : "No") . "</p>";
echo "<p>Odd: "   . ($first->isOdd($first->getValue())  ? "Yes" : "No") . "</p>";
echo "<p>Prime: " . ($first->isPrime() ? "Yes" : "No") . "</p>";
 
// Use the setter to change the value and test again
$first->setValue(3);
echo "<h3>Changed to: " . $first->getValue() . "</h3>";
echo "<p>Even: "  . ($first->isEven($first->getValue()) ? "Yes" : "No") . "</p>";
echo "<p>Odd: "   . ($first->isOdd($first->getValue())  ? "Yes" : "No") . "</p>";
echo "<p>Prime: " . ($first->isPrime() ? "Yes" : "No") . "</p>";
 
// --- Testing instance 2 with the number 14 ---
$second = new ScottMyInteger(14);
 
echo "<h2>Second Number: " . $second->getValue() . "</h2>";
echo "<p>Even: "  . ($second->isEven($second->getValue()) ? "Yes" : "No") . "</p>";
echo "<p>Odd: "   . ($second->isOdd($second->getValue())  ? "Yes" : "No") . "</p>";
echo "<p>Prime: " . ($second->isPrime() ? "Yes" : "No") . "</p>";
 
// Use the setter to change the value and test again
$second->setValue(7);
echo "<h3>Changed to: " . $second->getValue() . "</h3>";
echo "<p>Even: "  . ($second->isEven($second->getValue()) ? "Yes" : "No") . "</p>";
echo "<p>Odd: "   . ($second->isOdd($second->getValue())  ? "Yes" : "No") . "</p>";
echo "<p>Prime: " . ($second->isPrime() ? "Yes" : "No") . "</p>";
 
?>
 
</body>
</html>
 