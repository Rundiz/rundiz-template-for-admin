            <h2>Progress</h2>
            <progress></progress> (no value)<br>
<?php
for ($i = 0; $i <= 100; $i+=20) {
    echo indent(3).'<progress max="100" value="'.$i.'">'.$i.'%</progress><br>'."\n";
}
?> 

            <h2>Meter</h2>
            <p>This meter have just value.</p>
            <meter value="0.6">60%</meter>
            <p>This meter attributes are: min 0, max 10.</p>
            <meter min="0" max="10" value="2">2 out of 10</meter>
            <p>These meter attributes are: min 0, max 10, low 3, high 8.</p>
            <meter min="0" max="10" low="3" high="8" value="2">2 out of 10</meter> value 2<br>
            <meter min="0" max="10" low="3" high="8" value="5">5 out of 10</meter> value 5<br>
            <meter min="0" max="10" low="3" high="8" value="9">9 out of 10</meter> value 9<br>
            <h3>Meter with optimum</h3>
            <p>These meter attributes are: min 0, max 10, low 3, high 8.</p>
            Optimum &lt; low &lt; high (optimum 2)<br>
            <meter min="0" max="10" low="3" high="8" optimum="2" value="1">1 out of 10</meter> value 1<br>
            <meter min="0" max="10" low="3" high="8" optimum="2" value="2">2 out of 10</meter> value 2<br>
            <meter min="0" max="10" low="3" high="8" optimum="2" value="4">4 out of 10</meter> value 4<br>
            <meter min="0" max="10" low="3" high="8" optimum="2" value="9">9 out of 10</meter> value 9<br>
            Low &lt; optimum &lt; high (optimum 4)<br>
            <meter min="0" max="10" low="3" high="8" optimum="4" value="2">2 out of 10</meter> value 2<br>
            <meter min="0" max="10" low="3" high="8" optimum="4" value="3">3 out of 10</meter> value 3<br>
            <meter min="0" max="10" low="3" high="8" optimum="4" value="5">5 out of 10</meter> value 5<br>
            <meter min="0" max="10" low="3" high="8" optimum="4" value="9">9 out of 10</meter> value 9<br>
            Low &lt; high &lt; optimum (optimum 9)<br>
            <meter min="0" max="10" low="3" high="8" optimum="9" value="2">2 out of 10</meter> value 2<br>
            <meter min="0" max="10" low="3" high="8" optimum="9" value="3">3 out of 10</meter> value 3<br>
            <meter min="0" max="10" low="3" high="8" optimum="9" value="5">5 out of 10</meter> value 5<br>
            <meter min="0" max="10" low="3" high="8" optimum="9" value="10">10 out of 10</meter> value 10<br>

            <h2>Form elements</h2>
            <form>
                <fieldset>
                    <legend>Input types</legend>
<?php
$input_types = ['color', 'date', 'datetime-local', 'email', 'file', 'hidden', 'month', 'number', 'password', 'range', 'search', 'tel', 'text', 'time', 'url', 'week'];
foreach ($input_types as $input_type) {
    echo indent(5).'<p>'."\n";
    echo indent(6).'<label for="input-type-'.$input_type.'">Input '.ucwords($input_type).'</label><br>'."\n";
    echo indent(6).'<input id="input-type-'.$input_type.'" type="'.$input_type.'">'."\n";
    echo indent(5).'</p>'."\n";
}
unset($input_type, $input_types);
?> 
                </fieldset>
                <p>
                    <label for="input-type-text-readonly">Input Text read only</label><br>
                    <input id="input-type-text-readonly" type="text" readonly="">
                </p>
                <fieldset>
                    <legend>Input file</legend>
                    <p>
                        <label for="input-file-single">Input single file</label><br>
                        <input id="input-file-single" type="file" name="input-file">
                    </p>
                    <p>
                        <label for="input-file-disabled">Input file disabled</label><br>
                        <input id="input-file-disabled" type="file" name="input-file_disabled" disabled="">
                    </p>
                    <p>
                        <label for="input-file-multiple">Input multiple files</label><br>
                        <input id="input-file-multiple" type="file" name="input-file_multiple[]" multiple="">
                    </p>
                </fieldset>
                <fieldset>
                    <legend>Input checkbox/radio</legend>
                    <p>
                        <label><input type="radio" name="input-radio" value="1"> Input radio option 1</label><br>
                        <label><input type="radio" name="input-radio" value="2"> Input radio option 2</label>
                    </p>
                    <p>
                        <label><input type="radio" name="input-radio-disabled" value="1" disabled=""> Input radio option 1</label><br>
                        <label><input type="radio" name="input-radio-disabled" value="2" disabled=""> Input radio option 2</label>
                    </p>
                    <p>
                        <label><input type="checkbox"> Input checkbox 1</label><br>
                        <label><input type="checkbox"> Input checkbox 2</label>
                    </p>
                    <p>
                        <label><input type="checkbox" disabled=""> Input checkbox 1</label><br>
                        <label><input type="checkbox" disabled=""> Input checkbox 2</label>
                    </p>
                </fieldset>
                <fieldset>
                    <legend>Textarea</legend>
                    <p>
                        <label for="input-textarea">Textarea</label><br>
                        <textarea id="input-textarea"></textarea>
                    </p>
                    <p>
                        <label for="input-textarea-disabled">Textarea disabled</label><br>
                        <textarea id="input-textarea-disabled" disabled=""></textarea>
                    </p>
                    <p>
                        <label for="input-textarea-readonly">Textarea readonly</label><br>
                        <textarea id="input-textarea-readonly" readonly=""></textarea>
                    </p>
                </fieldset>
                <fieldset>
                    <legend>Select box</legend>
                    <p>
                        <label for="input-select">Select box</label><br>
                        <select id="input-select">
                            <optgroup label="Group1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                            </optgroup>
                            <optgroup label="Group2">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                            </optgroup>
                            <option>out of optgroup</option>
                        </select>
                    </p>
                    <p>
                        <label for="input-select-multiple">Select multiple</label><br>
                        <select id="input-select-multiple" multiple="">
                            <option>Use Ctrl+click to select multiple options</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                    </p>
                    <p>
                        <label for="input-select-disabled">Select disabled</label><br>
                        <select id="input-select-disabled" disabled="">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                        </select>
                    </p>
                </fieldset>
            </form>
            <fieldset>
                <legend>Button types</legend>
                <p>
                    <button type="button">Normal button</button>
                    <button type="submit" onclick="return false;">Submit button</button>
                    <button type="reset" onclick="return false;">Reset button</button>
                    <button type="button" disabled="">Disabled button</button>
                </p>
                <p>
                    <input type="image" src="assets/images/button.png" value="Input image button">
                    <input type="image" src="assets/images/button.png" value="Input disabled image button" disabled="">
                </p>
                <p>
                    <input type="button" value="Input normal button">
                    <input type="submit" value="Input submit button" onclick="return false;">
                    <input type="reset" value="Input reset button" onclick="return false;">
                    <input type="button" value="Input disabled button" disabled="">
                </p>
            </fieldset>