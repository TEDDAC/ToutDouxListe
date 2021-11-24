<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Tâches</title>
    </head>

    <body>
        <div class="">
            <form method="post" action="index.php?action=addedit">
                <button type="button" name="quit">X</button>
                <div class="">
                    <input type="checkbox" name="button"></input>
                    <p>
                        <input type="text" name="taskname" placeholder="Program a meeting with John">
                    </p>
                </div>
                <p>
                    <label for="categories">Categories</label>
                    <select name="categories"></select>
                </p>
                <p>
                    <label for="categories">Categories</label>
                    <input type="date" name="date">
                </p>
                <p>
                    <textarea name="note" rows="8" cols="80"></textarea>
                </p>
                <div class="">
                    <button type="button" name="droptask">Delete</button>
                    <button type="button" name="saveandquit">Save and Quit</button>
                </div>
            </form>

        </div>
    </body>
