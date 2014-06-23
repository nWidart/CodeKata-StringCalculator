<?php

class StringCalculator
{
    public function add($argument = '')
    {
        $result = $this->checkForArguments($argument);

        // If the string starts with double slash check for delimiter
        if (substr($argument, 0, 2) === "//") {
            $delimiter = substr($argument, 2, 1);
            // and start after first \n
            $argument = substr($argument, 4);
            // Explode using that delimiter
            $numbers = explode($delimiter, $argument);
        } else {
            // explode with , or \n
            $numbers = preg_split('/(,|\R)/', $argument);
        }

        if (count($numbers) == 1) {
            $result = (int)$numbers[0];
        } else {
            foreach ($numbers as $number) {
                $result += $number;
            }
        }

        return $result;
    }

    /**
     * @param $argument
     * @return int
     */
    protected function checkForArguments($argument)
    {
        if (empty($argument)) {
            return $result = 0;
        }
    }
}
