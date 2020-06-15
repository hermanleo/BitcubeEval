<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            
            #output li:nth-child(odd){
                background-color: #333333;
                color: white;
                
                
            }
            
            #output ol{
                list-style: none;
            }
            #output li{
                margin: 5px;
            }
            
            #output a{
                
               display: inline-block;
               width: 200px;
              
            }
            .leftAnchor{
                position: absolute;
               left: 600px; 
            }
            
            
        </style>
    </head>
    <body>
        
        <section id="output">
        <ol>
        <?php
        require './conn.php';
        $conn->DisplayEMployees();
        ?>
        </ol>
        </section>
    </body>
</html>
