<?php require 'includes/functions.php'; ?>
<!DOCTYPE html>
<html class="rd-template-admin">
    <head>
<?php
$title = 'Form';
include 'includes/html-head.php'; 
?> 
    </head>
    <body ontouchstart="">
<?php include 'includes/partials/page-header.php'; ?> 
        <div class="rd-page-wrapper">
<?php include 'includes/partials/page-sidebar.php'; ?> 
            <main>
                <?php
                echo renderBreadcrumb(['./' => 'Home', '#' => $title]);
                ?> 
                <div class="rd-page-content">
                    <h1>Form</h1>
                    <p>The form controls</p>
                    <hr>

                    <h2>Examples</h2>
                    <form class="rd-form">
                        <?php
                        echo "\n";
                        $input_types = ['color', 'date', 'datetime-local', 'email', 'file', 'month', 'number', 'password', 'range', 'search', 'tel', 'text', 'time', 'url', 'week'];
                        foreach ($input_types as $input_type) {
                            echo indent(6).'<div class="form-group">'."\n";
                            echo indent(7).'<label class="control-label" for="input-type-'.$input_type.'">Input '.ucwords($input_type).'</label><br>'."\n";
                            echo indent(7).'<div class="control-wrapper">'."\n";
                            echo indent(8).'<input id="input-type-'.$input_type.'" type="'.$input_type.'">'."\n";
                            echo indent(7).'</div>'."\n";
                            echo indent(6).'</div>'."\n";
                        }
                        unset($input_type, $input_types);
                        ?> 
                        <div class="form-group">
                            <label class="control-label" for="input-type-text-readonly">Input text readonly</label>
                            <div class="control-wrapper">
                                <input id="input-type-text-readonly" type="text" readonly="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="input-type-text-disabled">Input text disabled</label>
                            <div class="control-wrapper">
                                <input id="input-type-text-disabled" type="text" disabled="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Input radio</label>
                            <div class="control-wrapper">
                                <label><input type="radio" name="input-radio" value="1"> Input radio option 1</label><br>
                                <label><input type="radio" name="input-radio" value="2"> Input radio option 2</label><br>
                                <label class="disabled"><input type="radio" name="input-radio" value="3" disabled=""> Input radio option 3 disabled</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Input radio inline</label>
                            <div class="control-wrapper">
                                <label><input type="radio" name="input-radio-inline" value="1"> 1</label>
                                <label><input type="radio" name="input-radio-inline" value="2"> 2</label>
                                <label class="disabled"><input type="radio" name="input-radio-inline" value="3" disabled=""> 3 disabled</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Input checkbox</label>
                            <div class="control-wrapper">
                                <label><input type="checkbox"> Input checkbox 1</label><br>
                                <label><input type="checkbox"> Input checkbox 2</label><br>
                                <label class="disabled"><input type="checkbox" disabled=""> Input checkbox 3 disabled</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Input checkbox inline</label>
                            <div class="control-wrapper">
                                <label><input type="checkbox"> 1</label>
                                <label><input type="checkbox"> 2</label>
                                <label class="disabled"><input type="checkbox" disabled=""> 3</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="input-select">Select box</label>
                            <div class="control-wrapper">
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
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="input-select-multiple">Select box multiple</label>
                            <div class="control-wrapper">
                                <select id="input-select-multiple" multiple="">
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
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="input-select-disabled">Select box disabled</label>
                            <div class="control-wrapper">
                                <select id="input-select-disabled" disabled="">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="input-textarea">Textarea</label>
                            <div class="control-wrapper">
                                <textarea id="input-textarea"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="input-textarea-disabled">Textarea disabled</label>
                            <div class="control-wrapper">
                                <textarea id="input-textarea-disabled" disabled=""></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label"></label>
                            <div class="control-wrapper">
                                <button class="rd-button primary" type="button">Save</button>
                                <button class="rd-button" type="button">Cancel</button>
                            </div>
                        </div>
                    </form>
                    <hr>

                    <h3>Horizontal form</h3>
                    <form class="rd-form horizontal">
                        <div class="form-group">
                            <label class="control-label" for="input-type-text2">Input text</label>
                            <div class="control-wrapper">
                                <input id="input-type-text2" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Input radio</label>
                            <div class="control-wrapper">
                                <label><input type="radio" name="input-radio" value="1"> Input radio option 1</label><br>
                                <label><input type="radio" name="input-radio" value="2"> Input radio option 2</label><br>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Input radio inline</label>
                            <div class="control-wrapper">
                                <label><input type="radio" name="input-radio-inline" value="1"> 1</label>
                                <label><input type="radio" name="input-radio-inline" value="2"> 2</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Input checkbox</label>
                            <div class="control-wrapper">
                                <label><input type="checkbox"> Input checkbox 1</label><br>
                                <label><input type="checkbox"> Input checkbox 2</label><br>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Input checkbox inline</label>
                            <div class="control-wrapper">
                                <label><input type="checkbox"> 1</label>
                                <label><input type="checkbox"> 2</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="input-select2">Select box</label>
                            <div class="control-wrapper">
                                <select id="input-select2">
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
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="input-textarea2">Textarea</label>
                            <div class="control-wrapper">
                                <textarea id="input-textarea2"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label"></label>
                            <div class="control-wrapper">
                                <button class="rd-button primary" type="button">Save</button>
                                <button class="rd-button" type="button">Cancel</button>
                            </div>
                        </div>
                    </form>
                    <hr>

                    <h3>Sizes</h3>
                    <form class="rd-form">
                        <div class="form-group">
                            <label class="control-label">Input</label>
                            <div class="control-wrapper">
                                <input type="text" placeholder="normal">
                                <input class="input-small" type="text" placeholder="small">
                                <input class="input-large" type="text" placeholder="large">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Select box</label>
                            <div class="control-wrapper">
                                <select>
                                    <option>normal</option>
                                </select>
                                <select class="input-small">
                                    <option>small</option>
                                </select>
                                <select class="input-large">
                                    <option>large</option>
                                </select>
                            </div>
                        </div>
                    </form>
                    <form class="rd-form horizontal">
                        <div class="form-group">
                            <label class="control-label">Input</label>
                            <div class="control-wrapper">
                                <input type="text" placeholder="normal">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label small">Input small</label>
                            <div class="control-wrapper">
                                <input class="input-small" type="text" placeholder="small">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label large">Input large</label>
                            <div class="control-wrapper">
                                <input class="input-large" type="text" placeholder="large">
                            </div>
                        </div>
                    </form>
                </div><!--.rd-page-content-->
            </main>
<?php include 'includes/partials/page-footer.php'; ?> 
        </div><!--.rd-page-wrapper-->
        

<?php include 'includes/js-end-body.php'; ?> 
    </body>
</html>