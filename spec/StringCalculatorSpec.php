<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StringCalculatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('StringCalculator');
    }

    /**
     * should_return_zero_for_empty_string
     */
    function it_should_return_zero_for_empty_string()
    {
        $this->add()->shouldReturn(0);
    }

    /**
     * should same number if one is sent
     */
    function it_should_return_same_number_if_one_is_sent()
    {
        $this->add('1')->shouldReturn(1);
    }

    /**
     * should add two numbers seperated by comma
     */
    function it_should_add_two_numbers_seperated_by_comma()
    {
        $this->add('1,2')->shouldReturn(3);
    }

    /**
     * should accept any amount of args
     */
    function it_should_accept_any_amount_of_args()
    {
        $this->add('1,2,3')->shouldReturn(6);
    }

    /**
     * should accept return line separator
     */
    function it_should_accept_return_line_separator()
    {
        $this->add("1\n2,3")->shouldReturn(6);
    }

    /**
     * should accept any delimiter
     */
    function it_should_accept_any_delimiter()
    {
        $this->add("//;\n1;2")->shouldReturn(3);
    }
}
