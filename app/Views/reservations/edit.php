<?php
echo <<<HTML
        <form method='post' action='/reservations'>
            <input type='hidden' name='_method' value='PATCH'>
            <input type='hidden' name="id" value="{$reservations->id}">
            <fieldset>
                <label for="reservations">Foglalás</label>
        HTML;

echo "<select name='room_id' id='room_id'>";
foreach ($rooms->all() as $room) {
    echo "<option value='{$room->id}'>{$room->number}</option>";
}
echo "</select>";

echo "<select name='guest_id' id='guest_id'>";
foreach ($guests->all() as $guest) {
    echo "<option value='{$guest->id}'>{$guest->name}</option>";
}
echo "</select>";

echo <<<HTML
                 <input type="text" name="days" id="days" value="{$reservations->days}">
                <input type="date" name="date" id="date" value="{$reservations->date}">
                <hr>
                <button type="submit" name="btn-update"><i class="fa fa-save">                    
                    </i>&nbsp;Mentés
                </button>
                <a href="/reservations"><i class="fa fa-cancel"></i>&nbsp;Mégse
                </a>
            </fieldset>
        </form>
    HTML;
