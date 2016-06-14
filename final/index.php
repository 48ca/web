<!DOCTYPE html>
<html>
    <head>
        <title>Sudoku Solver</title>
        <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.amber-blue.min.css">
        <script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>
        <script src="sudoku.js"></script>
        <style>
            input.grid {
                text-align:center;
            }
        </style>
    </head>
    <body>
        <table class="board">
            <?php
                for($i=0;$i<9;$i++) {
                    $str = "<tr class='r$i'>";
                    for($j=0;$j<9;$j++) {
                            $str .= "
                                <td>
                                    <input type='text' class='grid c$j mdl-textfield__input' maxlength='1' size='4'>
                                </td>
                            ";
                    }
                    $str .= "</tr>";
                    echo $str;
                }
            ?>
        </table>
        <button type="submit" id="submit">Submit</button>
        <form>
             <input type="file" accept="image/*" capture="camera">
        </form>
    </body>
</html>
