<?php
require_once "header.php";
require_once "authorize.php";
?>
    <script>$.getScript("workspace.js");</script>
    <script>$.getScript("js\\savy.min.js");</script>
    <div class="workArea centralSplitArea">
        <div id="modeArea">
            <div id="modeTabs">
                <ul class="tabs">
                    <li><a href="#">Template</a></li>
                    <li><a href="#" alt="Work in progress" class="notimplemented">Data Extractor</a></li>
                </ul>
            </div>
            <div class="tabContent">
            <?php 
                    if (isset($_GET['remove']) && $_GET['remove'] == "removeTemplate" ) {
                        unset($_SESSION['template']);
                        unset($_GET['remove']);
                    }
                    if (isset($_SESSION['template'])) {
                        echo "<div id=\"uploaded\">Template is uploaded</div>";
                        echo "<form id=\"removeTemplateForm\" action=\"workspace.php\" method=\"get\">";
                        echo "<input type=\"submit\" value=\"removeTemplate\" name=\"remove\">";
                        echo "</form>";
                    } else {
                        require_once "uploadForm.html";
                    }
                ?>
            </div>
        </div>
        <div id="workingArea">
            <div id="controlMenu">
                <ul class="buttons">
                    <li id="emptyButton">&nbsp;</li>
                    <li><a href="#" class="notimplemented">Download All</a></li>
                    <li><a href="#" class="notimplemented">Preview</a></li>
                    <li><a href="#" id="resetButton">Reset Table</a></li>
                </ul>
            </div>

            <div id="mainTableArea">
                <?php 
                    if (isset($_SESSION['table'])) {
                        echo $_SESSION['table'];
                    } else {
                        require_once "table.html";
                    }
                ?>
            </div>
            <div id="phpErrorArea">
                
            </div>
        </div>
    </div>

<?php
require_once "footer.php"
?>