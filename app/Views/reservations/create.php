<?php

echo <<<HTML
        <form method='post' action='/reservations'>
            <fieldset>
                <label for="name">Foglalás</label>
                <input type="text" name="room_id" id="room_id">
                <input type="text" name="guest_id" id="guest_id">
                <input type="text" name="days" id="days">
                <input type="text" name="date" id="date">
                <hr>
                <button type="submit" name="btn-save">
                     <i class="fa fa-save"></i>&nbsp;Mentés
                </button>
                <a href="/reservations"><i class="fa fa-cancel">
                    </i>&nbsp;Mégse
                </a>
            </fieldset>
        </form>
    HTML;