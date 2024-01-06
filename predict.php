<?php

class LinearRegression
{
    protected $slope;
    protected $intercept;

    public function train($x, $y)
    {
        // Calculate slope and intercept using linear regression formulas
        $n = count($x);
        $sumX = array_sum($x);
        $sumY = array_sum($y);
        $sumXY = 0;
        $sumXX = 0;

        for ($i = 0; $i < $n; $i++) {
            $sumXY += ($x[$i] * $y[$i]);
            $sumXX += ($x[$i] * $x[$i]);
        }

        $this->slope = ($n * $sumXY - $sumX * $sumY) / ($n * $sumXX - $sumX * $sumX);
        $this->intercept = ($sumY - $this->slope * $sumX) / $n;
    }

    public function predict($x)
    {
        return $this->slope * $x + $this->intercept;
    }
}

// Sample dataset (week number => job count)
$dataset = [
    1 => 120,
    2 => 130,
    3 => 150,
    4 => 160,
    5 => 100,
    6 => 180,
    7 => 190,
    8 => 210,
    9 => 300
];

// Input week for prediction
$predictWeek = 10;

// Prepare data for linear regression
$weeks = array_keys($dataset);
$jobCounts = array_values($dataset);

// Initialize the linear regression model
$regression = new LinearRegression();
$regression->train($weeks, $jobCounts);

// Perform the prediction
$predictedJobCount = $regression->predict($predictWeek);

echo "Predicted job count for week $predictWeek: " . round($predictedJobCount) . "\n";
print_r($predictedJobCount);
