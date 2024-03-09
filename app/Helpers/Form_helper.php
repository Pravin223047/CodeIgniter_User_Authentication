<?php

function display_error($validation, $field)
{
    return $validation->hasError($field) ? $validation->getError($field) : false;
}

?>