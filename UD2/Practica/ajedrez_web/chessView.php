<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajedrez</title>
    <link rel="stylesheet" href="chess_game_styles.css">
    
</head>

<body>

    <div class="container">
        <table>
            <?php
            ini_set('display_errors', 'On');
            ini_set('html_errors', 0);

            function DrawChessGame($board)
            {
                $pieces = explode(",", $board);
                $piece = 0;
                $pos = 64;
                for ($i = 0; $i < 2; $i++) {
                    echo "<tr>";
                    for ($f = 0; $f < 8; $f++) {
                        echo "<td class='dead'>";
                        if ($pieces[$pos] !== "NP") {
                            echo '<div class="piece">';
                            echo '<img src="img/' . $pieces[$pos] . '.png">';
                            echo '</div>';
                        }
                        echo "</td>";
                        $pos++;
                    }
                    echo "</tr>";
                }
                for ($i = 0; $i < 8; $i++) {
                    echo "<tr>";
                    for ($f = 0; $f < 8; $f++) {

                        if (($i + $f) % 2 == 0) {
                            echo '<td class="white">';
                        } else {
                            echo '<td class="black">';
                        }
                        if ($pieces[$piece] !== "NP") {
                            echo '<div class="piece">';
                            echo '<img src="img/' . $pieces[$piece] . '.png">';
                            echo '</div>';
                        }
                        echo '</td>';
                        $piece++;
                    }
                    echo "</tr>";
                }

                for ($i = 0; $i < 2; $i++) {
                    echo "<tr>";
                    for ($f = 0; $f < 8; $f++) {
                        echo "<td class='dead'>";
                        if ($pieces[$pos] !== "NP") {
                            echo '<div class="piece">';
                            echo '<img src="img/' . $pieces[$pos] . '.png">';
                            echo '</div>';
                        }
                        echo "</td>";
                        $pos++;
                    }
                    echo "</tr>";
                }
            }
            DrawChessGame("RW,NW,BW,QW,KW,BW,NW,RW,PW,PW,NP,PW,PW,PW,PW,PW,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,PW,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,p,p,p,p,p,p,p,p,r,n,b,q,k,b,n,r,PW,PW,PW,RW,QW,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,BB,WB,QB,RB,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP");
            ?>
        </table>

        <?php
            
        
        ?>
    </div>
    

</body>

</html>