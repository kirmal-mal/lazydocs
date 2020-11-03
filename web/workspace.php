<?php
require_once "header.php"

?>

    <div class="workArea centralSplitArea">
        <div id="modeArea">
            <div id="modeTabs">
                <ul class="tabs">
                    <li><a href="">Template</a></li>
                    <li><a href="">Data Extractor</a></li>
                </ul>
            </div>
            <div class="tabContent"></div>
        </div>
        <div id="workingArea">
            <div id="controlMenu">
                <ul class="buttons">
                    <li id="emptyButton">&nbsp;</li>
                    <li><a href="">Download</a></li>
                    <li><a href="">Preview</a></li>
                </ul>
            </div>
            <div id="mainTableArea">
                <table id="mainTable">
                    <thead>
                        <th></th>
                        <th>Field 2</th>
                        <th>Field 3</th>
                        <th>Field 4</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fileName">File 1</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="fileName">File 2</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="fileName">File 3</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php
require_once "footer.php"
?>