<div class="container">
    <div class="flex justify-center mt-3 space-x-2 text-base font-semibold text-gray-400 items-center" id="myTab"
        data-tabs-toggle="#myTabContent" role="tablist">

        <a href="#" class="py-1 px-3 bg-gray-200 rounded text-gray-600">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>

        <div role="presentation">
            <a href="#" class="py-1 px-2 bg-blue-400 rounded text-white" id="0"
                data-tabs-target="#dashboard0" type="button" role="tab" aria-controls="dashboard0"
                aria-selected="false">
                1</a>
        </div>
        <div role="presentation">
            <a href="#" class="py-1 px-2 bg-gray-200 rounded" id="1" data-tabs-target="#dashboard1"
                type="button" role="tab" aria-controls="dashboard1" aria-selected="false"> 2</a>
        </div>
        <div role="presentation">
            <a href="#" class="py-1 px-2 bg-gray-200 rounded" id="2" data-tabs-target="#dashboard2"
                type="button" role="tab" aria-controls="dashboard2" aria-selected="false"> 3</a>
        </div>

        <a href="#" class="py-1 px-2 bg-gray-200 rounded">
            <ion-icon name="chevron-forward"></ion-icon>
        </a>

    </div>

    <div class="mt-4" id="myTabContent">
        <div id="dashboard0" role="tabpanel" aria-labelledby="0">

            <h4 class="text-2xl font-semibold text-center"> Ngôn ngữ c </h4>
            <div class="flex items-center justify-between">
                <span class="text-base">Câu 1: Kết qủa băng 25</span>
                <button run-code type="button" class="button">Chạy đoạn mã</button>
            </div>
            <div source-code class="mt-3 card h-64"></div>
            <iframe editorPreview frameborder="0" class="mt-3 card w-full"></iframe>

        </div>

        <div id="dashboard1" role="tabpanel" aria-labelledby="1">
            <span class="text-base">Câu 2: Introduction</span>
            
            <pre class="language-javascript mt-3">
                function logStuff() {
                  var stuff = "I am logging this.";
                  console.log(stuff);  
                }
            </pre>

            <div class="answers">
                <div class="checkbox w-full bg-white rounded-lg border shadow-md sm:p-4 dark:bg-gray-800 dark:border-gray-700">
                    <input type="checkbox" id="chekcbox1-1">
                    <label for="chekcbox1-1"><span class="checkbox-icon"></span> Checkbox</label>
                </div>
                <div class="checkbox w-full bg-white rounded-lg border shadow-md sm:p-4 dark:bg-gray-800 dark:border-gray-700">
                    <input type="checkbox" id="chekcbox2-1">
                    <label for="chekcbox2-1"><span class="checkbox-icon"></span> Checkbox</label>
                </div>
                <div class="checkbox w-full bg-white rounded-lg border shadow-md sm:p-4 dark:bg-gray-800 dark:border-gray-700">
                    <input type="checkbox" id="chekcbox3-1" >
                    <label for="chekcbox3-1"><span class="checkbox-icon"></span> Checkbox</label>
                </div>
                <div class="checkbox w-full bg-white rounded-lg border shadow-md sm:p-4 dark:bg-gray-800 dark:border-gray-700">
                    <input type="checkbox" id="chekcbox4-1">
                    <label for="chekcbox4-1"><span class="checkbox-icon"></span> Checkbox</label>
                </div>
            </div>

        </div>

        <div id="dashboard2" role="tabpanel" aria-labelledby="2">
            <span class="text-base">Câu 3: Introduction</span>
            
            <pre class="language-javascript mt-3">
                function logStuff() {
                  var stuff = "I am logging this.";
                  console.log(stuff);  
                }
            </pre>

            <div class="answers">
                <div class="radio w-full bg-white rounded-lg border shadow-md sm:p-4 dark:bg-gray-800 dark:border-gray-700">
                    <input id="radio-1-1" name="radio1" type="radio" checked="">
                    <label for="radio-1-1"><span class="radio-label"></span> Radio Button</label>
                </div>
                <div class="radio w-full bg-white rounded-lg border shadow-md sm:p-4 dark:bg-gray-800 dark:border-gray-700">
                    <input id="radio-1-2" name="radio1" type="radio" checked="">
                    <label for="radio-1-2"><span class="radio-label"></span> Radio Button</label>
                </div>
                <div class="radio w-full bg-white rounded-lg border shadow-md sm:p-4 dark:bg-gray-800 dark:border-gray-700">
                    <input id="radio-1-3" name="radio1" type="radio" checked="">
                    <label for="radio-1-3"><span class="radio-label"></span> Radio Button</label>
                </div>
                <div class="radio w-full bg-white rounded-lg border shadow-md sm:p-4 dark:bg-gray-800 dark:border-gray-700">
                    <input id="radio-1-4" name="radio1" type="radio" checked="">
                    <label for="radio-1-4"><span class="radio-label"></span> Radio Button</label>
                </div>
            </div>

        </div>


    </div>
</div>
