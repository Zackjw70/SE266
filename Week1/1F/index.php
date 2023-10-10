<?php

require 'function.php';

if (ageCheck(15)){
    echo 'You are too young to enter';
} else {
    echo 'You are old enough to enter';
}