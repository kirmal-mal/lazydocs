<?php
require_once "header.php";
?>
    <script>$.getScript("workspace.js");</script>
    <div class="workArea centralSplitArea">
        <div id="modeArea">
            <div id="modeTabs">
                <ul class="tabs">
                    <li><a href="#">Template</a></li>
                    <li><a href="#" alt="Work in progress" class="notimplemented">Data Extractor</a></li>
                </ul>
            </div>
            <div class="tabContent"></div>
        </div>
        <div id="workingArea">
            <div id="controlMenu">
                <ul class="buttons">
                    <li id="emptyButton">&nbsp;</li>
                    <li><a href="#">Download</a></li>
                    <li><a href="#" class="notimplemented">Preview</a></li>
                </ul>
            </div>


            <div id="mainTableArea">
                <table id="mainTable">
                    <thead>
                        <tr id="headerRow">
                            <th>Download</th>
                            <th>Filename</th>
                            <th class="textFieldIcon">
                                <input type="text" value="TextToReplace" class="fieldTextField" name="field1">
                                <img src="img/remove_icon.png" class="cellButton removeColumnButton" title="Remove Column">
                            </th>
                            <th class="iconCell" id="lastColumn">
                                <img src="img/plus_icon.png" class="cellButton" id="addColumnButton" title="Add Column">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr id="templateRow">
                            <form class="downloadForm" method="GET" action="downloadHandler.php" id="form1"></form>
                            <td class="iconCell"><input form="form1" type="image" src="img/download_icon.png" alt="submit" class="downloadIcon" id="download1"></td>
                            <td class="fileName"><input form="form1" type="text" class="textField" name="filename"></td>
                            <td class="field" id="templateField"><input form="form1" type="text" class="textField" name="field1"></td>
                            <td class="iconCell">
                                <img src="img/remove_icon.png" class="cellButton removeRowButton" title="Remove Row">
                            </td>
                        </tr>
                        <tr id="lastRow">
                            <td class="iconCell">
                                <img src="img/addrow_icon.png" class="cellButton" id="addRowButton" title="Add Row">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php
require_once "footer.php"
?>