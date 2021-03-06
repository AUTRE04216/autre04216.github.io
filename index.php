<html>
    <body>
        <?php
        header.Add("Access-Control-Allow-Origin", "*");
        ?>
        header.Add("Access-Control-Allow-Origin", "*")
        <!-- The data encoding type, enctype, MUST be specified as below -->
        <form enctype="multipart/form-data" action="upload.php" method="POST">
            <!-- MAX_FILE_SIZE must precede the file input field -->
            <!-- <input type="hidden" name="MAX_FILE_SIZE" value="99999999999999" /> -->
            <!-- Name of input element determines name in $_FILES array -->
            Send this file: <input name="file" type="file" multiple>
            <input type="submit" value="Send File" />
        </form>
        <br><br>
        <form enctype="multipart/form-data" action="setCombine.php" method="POST">
            Send this file: <input name="file[]" type="file" multiple>
            <input type="submit" value="Send File" />
        </form>
        <script>
            let bigList = [];
            let fileNameList = [];

            // fetch('https://api.github.com/repos/autre04216/jsonSets/git/trees/main?recursive=1')
            // .then(response => response.json())
            // .then(data => {
            //     for(let i = 0; i < 3; i++) {
            //         fileNameList.push(data["tree"][i]["path"]);
            //         // console.log(i);
            //     }
            //     for(let j = 0; j < 3; j++) {
            //         fetch("https://raw.githubusercontent.com/AUTRE04216/jsonSets/main/" + fileNameList[j], {
            //             // headers: {
            //             //     Authorization: "token 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"
            //             // }
            //         })
            //         .then((response) => {
            //             return response.json();
            //         })
            //         .then((myJson) => {
            //             console.log(j);
            //             bigList.push(myJson);
            //             if(j === 2) {
            //                 console.log(bigList);
            //                 let iForm = document.createElement("form");
            //                 let iInput = document.createElement("input");
            //                 let iSubmit = document.createElement("input");
            //                 iForm.style.display = "none";
            //                 iInput.style.display = "none";
            //                 iSubmit.style.display = "none";

            //                 iForm.enctype = "multipart/form-data";
            //                 iForm.action = "test.php";
            //                 iForm.method = "POST";

            //                 iInput.name = "file[]";
            //                 iInput.type = "text";

            //                 iSubmit.type = "submit";
            //                 iSubmit.value = "click me";
            //                 iSubmit.id = "autoClick";

            //                 iInput.value = JSON.stringify(bigList);

            //                 iForm.appendChild(iInput);
            //                 iForm.appendChild(iSubmit);
            //                 document.body.appendChild(iForm);
            //                 document.getElementById("autoClick").click();
            //             }
            //         });
            //     }
            // }); 

            async function getJsonTree() {
                const response = await fetch('https://api.github.com/repos/autre04216/jsonSets/git/trees/main?recursive=1');
                const tree = await response.json();
                return tree;
            }

            async function getJsonData(j) {
                const jsonR = await fetch("https://raw.githubusercontent.com/AUTRE04216/jsonSets/main/" + fileNameList[j], 
                {
                    headers: {Authorization: "token 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"}
                });
                const data = await jsonR.json();
                return data;
            }

            getJsonTree().then(tree => {
                console.log(tree);
                for(let i = 0; i < 3; i++) {
                    fileNameList.push(tree["tree"][i]["path"]);
                }
                for(let e = 0; e < 3; e++) {
                getJsonData(e).then(data => {
                    console.log(e);
                    console.log(data);
                });
            }
            });

            
        </script>
    </body>
</html>
