<?php 
require 'includes/functions.php'; 

// for debugging form inputs.
if (isset($_SERVER['REQUEST_METHOD']) && strtolower($_SERVER['REQUEST_METHOD']) === 'post') {
    echo '<pre>' . print_r($_POST, true) . '</pre>' . PHP_EOL;
    if (!empty($_FILES)) {
        echo '<pre>' . print_r($_FILES, true) . '</pre>' . PHP_EOL;
    }
    exit();
}
?>
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
                    <form class="rd-form" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <legend>Input types</legend>
                        <?php
                        echo "\n";
                        $input_types = ['color', 'date', 'datetime-local', 'email', 'file', 'month', 'number', 'password', 'range', 'search', 'tel', 'text', 'time', 'url', 'week'];
                        foreach ($input_types as $input_type) {
                            echo indent(7).'<div class="form-group">'."\n";
                            echo indent(8).'<label class="control-label" for="input-type-'.$input_type.'">Input '.ucwords($input_type).'</label>'."\n";
                            echo indent(8).'<div class="control-wrapper">'."\n";
                            echo indent(9).'<input id="input-type-'.$input_type.'" type="'.$input_type.'" name="demo-input-' . $input_type . '">'."\n";
                            echo indent(8).'</div>'."\n";
                            echo indent(7).'</div>'."\n";
                        }
                        unset($input_type, $input_types);
                        ?> 
                        </fieldset>
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
                                <div class="form-description">The help message about this form input.</div>
                            </div>
                        </div>
                        <fieldset>
                            <legend>Input file</legend>
                            <div class="form-group">
                                <label class="control-label" for="rd-inputfile_single">Input single file</label>
                                <div class="control-wrapper">
                                    <span class="rd-button info small rd-inputfile" tabindex="0">
                                        <span class="label">Choose file</span>
                                        <input id="rd-inputfile_single" type="file" name="rd-inputfile1" tabindex="-1">
                                    </span>
                                    <span class="rd-input-files-queue"></span>
                                    <template class="rd-inputfile-reset-button">
                                        <button class="rd-button tiny" type="button" onclick="return RundizTemplateAdmin.resetInputFile(this);" title="Remove files"><i class="fas fa-times"></i><span class="screen-reader-only">Remove files</span></button>
                                    </template>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="rd-inputfile_multiple">Input multiple files</label>
                                <div class="control-wrapper">
                                    <span class="rd-button info small rd-inputfile" tabindex="0">
                                        <span class="label">Choose files</span>
                                        <input id="rd-inputfile_multiple" type="file" name="rd-inputfile_multiple[]" multiple="" tabindex="-1">
                                    </span>
                                    <span class="rd-input-files-queue"></span>
                                    <template class="rd-inputfile-reset-button">
                                        <button class="rd-button tiny" type="button" onclick="return RundizTemplateAdmin.resetInputFile(this);" title="Remove files"><i class="fas fa-times"></i><span class="screen-reader-only">Remove files</span></button>
                                    </template>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="rd-inputfile_disabled">Input file disabled</label>
                                <div class="control-wrapper">
                                    <span class="rd-button info small disabled rd-inputfile" tabindex="0">
                                        <span class="label">Choose file</span>
                                        <input id="rd-inputfile_disabled" type="file" name="rd-inputfile-disabled" disabled="" tabindex="-1">
                                    </span>
                                    <span class="rd-input-files-queue"></span>
                                    <template class="rd-inputfile-reset-button">
                                        <button class="rd-button tiny" type="button" onclick="return RundizTemplateAdmin.resetInputFile(this);" title="Remove files"><i class="fas fa-times"></i><span class="screen-reader-only">Remove files</span></button>
                                    </template>
                                    <div class="form-description">The help message about this form input.</div>
                                </div>
                            </div>
                            <h4>Dynamically insert/update input file</h4>
                            <div id="demo-custom-inputfile-placeholder" style="border: 1px dashed #ccc; padding: 0.625rem;"></div>
                            <button type="button" onclick="rdtaAddCustomInputFile('demo-custom-inputfile-placeholder');">Click here to add an input file</button>
                        </fieldset>
                        <fieldset>
                            <legend>Input checkbox/radio</legend>
                            <div class="form-group">
                                <label class="control-label">Input radio</label>
                                <div class="control-wrapper">
                                    <label><input type="radio" name="input-radio" value="1"> Input radio option 1</label><br>
                                    <label><input type="radio" name="input-radio" value="2"> Input radio option 2</label><br>
                                    <label class="disabled"><input type="radio" name="input-radio" value="3" disabled=""> Input radio option 3 disabled</label>
                                    <div class="form-description">The help message about this form input.</div>
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
                                    <label><input type="checkbox" name="checkbox[]"> Input checkbox 1</label><br>
                                    <label><input type="checkbox" name="checkbox[]"> Input checkbox 2</label><br>
                                    <label class="disabled"><input type="checkbox" name="checkbox[]" disabled=""> Input checkbox 3 disabled</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Input checkbox inline</label>
                                <div class="control-wrapper">
                                    <label><input type="checkbox" name="checkbox-inline[]"> 1</label>
                                    <label><input type="checkbox" name="checkbox-inline[]"> 2</label>
                                    <label class="disabled"><input type="checkbox" name="checkbox-inline[]" disabled=""> 3</label>
                                    <div class="form-description">The help message about this form input.</div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Select box</legend>
                            <div class="form-group">
                                <label class="control-label" for="input-select">Select box</label>
                                <div class="control-wrapper">
                                    <select id="input-select" name="demo-selectbox">
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
                                    <select id="input-select-multiple" multiple="" name="demo-selectbox-multiple">
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
                                    <select id="input-select-disabled" disabled="" name="demo-selectbox-disabled">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-group">
                            <label class="control-label" for="input-textarea">Textarea</label>
                            <div class="control-wrapper">
                                <textarea id="input-textarea" name="demo-textarea"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="input-textarea-disabled">Textarea disabled</label>
                            <div class="control-wrapper">
                                <textarea id="input-textarea-disabled" disabled="" name="demo-textarea-disabled"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label"></label>
                            <div class="control-wrapper">
                                <button class="rd-button primary" type="submit">Save</button>
                                <button class="rd-button" type="button">Cancel</button>
                                <button class="rd-button" type="button" onclick="rdtaGetFormData(this);">Form data (see console)</button>
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
                                <div class="form-description">The help message about this form input.</div>
                            </div>
                        </div>
                        <fieldset>
                            <legend>Input checkbox/radio</legend>
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
                        </fieldset>
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
                                    <option>The super very long option. 
                                        Donec varius laoreet purus in mollis. Ut ut nisi in metus elementum sollicitudin vel eu eros. 
                                        Aliquam varius velit libero, a ornare ligula posuere a. 
                                        Ut posuere sapien vel nisi porta, eu facilisis ex egestas. 
                                        Curabitur pharetra nisi vel condimentum tempor. 
                                        Donec vestibulum blandit risus, ac porttitor mi tempor nec. Quisque ac nunc risus.
                                    </option>
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
                                <div class="form-description">The help message about this form input.</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label small">Input small</label>
                            <div class="control-wrapper">
                                <input class="input-small" type="text" placeholder="small">
                                <div class="form-description">The help message about this form input.</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label large">Input large</label>
                            <div class="control-wrapper">
                                <input class="input-large" type="text" placeholder="large">
                                <div class="form-description">The help message about this form input.</div>
                            </div>
                        </div>
                    </form>
                </div><!--.rd-page-content-->
            </main>
<?php include 'includes/partials/page-footer.php'; ?> 
        </div><!--.rd-page-wrapper-->
        

<?php include 'includes/js-end-body.php'; ?> 
        <script>
            function rdtaGetFormData(thisObj) {
                let thisForm = thisObj.closest('form');
                let formData = new FormData(thisForm);
                console.log('Showing form values -------------------------');
                for (var value of formData.values()) {
                    if (value) {
                        console.log(value); 
                    }
                }
            }// rdtaGetFormData


            function rdtaAddCustomInputFile(targetId) {
                let customInputFile = '<span class="rd-button info small rd-inputfile" tabindex="0">\
                        <span class="label">Choose file</span>\
                        <input id="rd-inputfile_single" type="file" name="rd-inputfile-dynamic" tabindex="-1">\
                    </span>\
                    <span class="rd-input-files-queue"></span>\
                    <template class="rd-inputfile-reset-button">\
                        <button class="rd-button tiny" type="button" onclick="return RundizTemplateAdmin.resetInputFile(this);" title="Remove files">\
                            <i class="fas fa-times"></i>\
                            <span class="screen-reader-only">Remove files</span>\
                        </button>\
                    </template>';
                document.getElementById(targetId).innerHTML = customInputFile;
            }// rdtaAddCustomInputFile
        </script>
    </body>
</html>