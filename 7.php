<?php
    echo '<table border=1 align=\'center\'>';
    echo '<tr>';
    echo '<td width = \'100px\'>';
    for ($i = 0; $i < 3; $i++) 
    {
        for ($j = 0; $j <= $i; $j++) 
        {
            echo '*';
        }
        echo '<br>';
    }
    echo '</td>';

    echo '<td width = \'100px\'>';
    for ($i = 3; $i > 0; $i--) 
    {
        for ($j = 1; $j <= $i; $j++) 
        {
            echo "{$j} ";
        }
        echo '<br>';
    }
    echo '</td>';

    echo '<td width = \'100px\'>';
    $char = 'A';
    for ($i = 0; $i < 3; $i++) 
    {
        for ($j = 0; $j <= $i; $j++) 
        {
            echo $char . ' ';
            $char++;
        }
        echo '<br>';
    }

    echo '</td>';
    echo '</tr>';
    echo '</table>';
?>
