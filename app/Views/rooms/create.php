<?php

echo <<<HTML
        <form method='post' action='/rooms'>
            <fieldset>
                <label for="name">Osztály</label>
                <input type="text" name="floor" id="floor">
                <input type="text" name="number" id="number">
                <input type="text" name="capacity" id="capacity">
                <input type="text" name="price" id="price">
                <input type="text" name="comment" id="comment">
                <hr>
                <button type="submit" name="btn-save">
                     <i class="fa fa-save"></i>&nbsp;Mentés
                </button>
                <a href="/rooms"><i class="fa fa-cancel">
                    </i>&nbsp;Mégse
                </a>
            </fieldset>
        </form>
    HTML;