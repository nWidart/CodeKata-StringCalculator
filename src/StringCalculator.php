<?php

class StringCalculator
{
    /**
     * @param string $argument
     * @return int
     */
    public function add($argument = '')
    {
        $result = $this->checkForEmptyArguments($argument);

        $numbers = $this->returnNumbersBasedOnDelimiter($argument);

        return $this->calculateNumbers($numbers);
    }

    /**
     * @param $argument
     * @return int
     */
    protected function checkForEmptyArguments($argument)
    {
        if (empty($argument)) {
            return $result = 0;
        }
    }

    /**
     * @param $numbers
     * @return int
     */
    private function calculateNumbers($numbers)
    {
        $result = 0;
        if (count($numbers) == 1) {
            $result = (int)$numbers[0];
        } else {
            foreach ($numbers as $number) {
                if ($number < 0) {
                    throw new InvalidArgumentException('No negative numbers allowed');
                }
                $result += $number;
            }
        }

        return $result;
    }

    /**
     * @param $argument
     * @return array
     */
    protected function returnNumbersBasedOnDelimiter($argument)
    {
        // If the string starts with double slash check for delimiter
        if (substr($argument, 0, 2) === "//") {
            $delimiter = substr($argument, 2, 1);
            // and start after first \n
            $argument = substr($argument, 4);
            // Explode using that delimiter
            $numbers = explode($delimiter, $argument);
            return $numbers;
        } else {
            // explode with , or \n
            $numbers = preg_split('/(,|\R)/', $argument);
            return $numbers;
        }
    }
}
