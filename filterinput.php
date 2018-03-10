<?php
function filter_text($unsafeText)
{
    $safeText = htmlspecialchars($unsafeText);
    return $safeText;
}
