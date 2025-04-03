            <h2 id="form-progress">Progress</h2>
            <progress></progress> (no value)<br>
<?php
for ($i = 0; $i <= 100; $i+=20) {
    echo indent(3).'<progress max="100" value="'.$i.'">'.$i.'%</progress><br>'."\n";
}
?> 

            <h2 id="form-meter">Meter</h2>
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

            <h2 id="form-elements">Form elements</h2>
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
                <fieldset>
                    <p>
                        <label for="input-type-text-readonly">Input Text read only</label><br>
                        <input id="input-type-text-readonly" type="text" readonly="" value="Read only input text">
                    </p>
                </fieldset>
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
                        <label><input type="radio" name="input-radio" value="2"> Input radio option 2</label><br>
                        <label><input type="radio" name="input-radio" value="3" checked="checked"> Input radio option 3 checked</label>
                    </p>
                    <p>
                        <label><input type="radio" name="input-radio-disabled" value="1" disabled=""> Input radio option 1</label><br>
                        <label><input type="radio" name="input-radio-disabled" value="2" disabled=""> Input radio option 2</label><br>
                        <label><input type="radio" name="input-radio-disabled" value="3" checked="checked" disabled=""> Input radio option 3 checked, disabled</label>
                    </p>
                    <p>
                        <label><input type="checkbox"> Input checkbox 1</label><br>
                        <label><input type="checkbox"> Input checkbox 2</label><br>
                        <label><input type="checkbox" checked="checked"> Input checkbox 3 checked</label>
                    </p>
                    <p>
                        <label><input type="checkbox" disabled=""> Input checkbox 1</label><br>
                        <label><input type="checkbox" disabled=""> Input checkbox 2</label><br>
                        <label><input type="checkbox" checked="checked" disabled=""> Input checkbox 3 checked, disabled</label>
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

            <h3 id="form-validation-pseudoclass">Form with validation status</h3>
            <form onsubmit="return false;">
                <fieldset>
                    <p>
                        <label for="form-validation-pseudoclass-inputtext">Input text (required)</label><br>
                        <input id="form-validation-pseudoclass-inputtext" type="text" required="">
                    </p>
                    <p>
                        <label for="form-validation-pseudoclass-inputemail">Email (required)</label><br>
                        <input id="form-validation-pseudoclass-inputemail" type="email" required="">
                    </p>
                    <p>
                        <label for="form-validation-pseudoclass-inputemail-optional">Email (optional)</label><br>
                        <input id="form-validation-pseudoclass-inputemail-optional" type="email">
                    </p>
                    <p>
                        <label><input type="radio" name="form-validation-pseudoclass-radio1" value="1" required=""> Input radio 1</label><br>
                        <label><input type="radio" name="form-validation-pseudoclass-radio1" value="2"> Input radio 2</label><br>
                    </p>
                    <p>
                        <label><input type="checkbox" name="form-validation-pseudoclass-checkbox1" value="1" required=""> Input check box 1 (required)</label><br>
                        <label><input type="checkbox" name="form-validation-pseudoclass-checkbox1" value="2"> Input check box 2</label><br>
                    </p>
                    <p>
                        <label for="form-validation-pseudoclass-textarea">Textarea (required)</label><br>
                        <textarea id="form-validation-pseudoclass-textarea" required=""></textarea>
                    </p>
                    <p>
                        <label for="form-validation-pseudoclass-selectbox">Select box (required)</label><br>
                        <select id="form-validation-pseudoclass-selectbox" required="">
                            <option disabled="disabled" selected="selected" value="">Please select</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </p>
                    <button type="submit">Submit</button>
                </fieldset>
            </form>

            <h3 id="form-datalist">Datalist</h3>
            <fieldset>
                <p>
                    Type <kbd>c</kbd> to search.<br>
                    <label for="form-datalist">Datalist</label><br>
                    <input id="form-datalist" type="text" list="form-datalist-example">
                    <datalist id="form-datalist-example">
                        <option value="Chocolate">
                        <option value="Coconut">
                        <option value="Mint">
                        <option value="Strawberry">
                        <option value="Vanilla">
                    </datalist>
                </p>
            </fieldset>
            <h3 id="form-output">Output</h3>
            <form oninput="result.value=parseInt(a.value)+parseInt(b.value)">
                <fieldset>
                    <input id="a" type="number" value="10"> +
                    <input id="b" type="number" value="20"> =
                    <output id="result">30</output>
                </fieldset>
            </form>