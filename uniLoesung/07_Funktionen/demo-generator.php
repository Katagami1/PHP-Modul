<?php

function wuerfelwertGenerator() {
    for($i=1; $i<=10; $i++)
        yield  rand(1,6);
     }
        
  foreach(wuerfelwertGenerator() as $wert)
            echo "$wert ";
            
/*
            function wuerfelwertGenerator() {
                for($i=1; $i<=10; $i++)
                    return  rand(1,6);
            }
mit foreach funktioniert nicht, und wie unten nur einnmal ausgegeben            
            $wert= wuerfelwertGenerator();
                echo "$wert ";