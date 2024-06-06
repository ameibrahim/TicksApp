<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <?php include "include/userDynamicImports.php" ?>

    <link rel="stylesheet" href="css/root.css?29249424242424">
</head>
<body>

    <!-- <div class="box">
        <img src="assets/logos/neu-logo.png" alt="">
    </div> -->

    <?php include "components/header.php" ?>
    <?php include "components/menu.php" ?>

    <div class="main-container">

        <div class="predict-button-container">
            <div class="button" onclick="handlePredictContainerView()">Perform Tick Prediction</div>
        </div>

        <div class="mini-section">

            <div class="mini-section-header">
                <h2>Recent Predictions</h2>

                <div class="arrow-link">
                    <a href="pastpredictions.html">View All Predictions</a>
                    <p>→</p>
                </div>
            </div>

            <div class="past-predictions-container">
            </div>
        </div>

        <div class="mini-section">

            <div class="mini-section-header">
                <h2>Model Accuracies</h2>

                <div class="arrow-link">
                    <a href="pastpredictions.html">View All Available Models</a>
                    <p>→</p>
                </div>
            </div>

            <div class="model-accuracies-container">

                <div class="model-accuracy-wrapper">
                    <div class="model-type">VGG16</div>
                    <div class="model-name">VGG16-VARA01b-32x32-EP15-ACCU99-02-06-2024.keras</div>
                    <div class="model-accuracy">99.8%</div>
                </div>

                <!-- <div class="model-accuracy-wrapper">
                    <div class="model-type">CNN</div>
                    <div class="model-name">CNN-VARA01a-32x32-EP15-ACCU99-05-06-2024.keras</div>
                    <div class="model-accuracy">76%</div>
                </div>

                <div class="model-accuracy-wrapper">
                    <div class="model-type">RESNET</div>
                    <div class="model-name">RESNET-B053-ACCU96-23-06-2-24.keras</div>
                    <div class="model-accuracy">96%</div>
                </div> -->
            </div>
        
        </div>

    </div>


    <script>

        renderPastPredictions();

        function handlePredictContainerView(){
            openPopup('.prediction-overlay'); 
            resetPredictionOverlay();
        }

        async function getPastPredictions(){

            globalCache.put("userID", "3333434")
            
            let userID = globalCache.get('userID');
            console.log("userID: ", userID);

           return await AJAXCall({
            type: "fetch",
            phpFilePath: "../include/getPersonalPredictions.php",
            rejectMessage: "Getting Past Predictions Failed",
            params: `userID=3333434`
           })

        }

        function repeat(anything, times = 1){
            for (let i = 0; i < times; i++) {
                anything()
            }
        }

        async function renderPastPredictions(){

            const pastPredictionsContainer = document.querySelector(".past-predictions-container");
            pastPredictionsContainer.innerHTML = "";

            // console.log(renderEmptyLoader());
            // pastPredictionsContainer.innerHTML += renderEmptyLoader()

            let data = await getPastPredictions();

            console.log("data: ", data);

            pastPredictionsContainer.innerHTML = "";
            
            setTimeout(() => {
                data.forEach( pastPredictionData => {
                    const predictionElementContainer = renderPredictionElementContainer(pastPredictionData);
                    pastPredictionsContainer.append(predictionElementContainer);
                })
            }, 0)

        }

        function renderPredictionElementContainer(data){

            const predictionElementContainer = document.createElement("div");
            predictionElementContainer.className = "prediction-element-container";

            const innerImage = document.createElement("img");
            innerImage.src = "uploads/" + data.imageName;

            const predictionsDescriptions = document.createElement("div");
            predictionsDescriptions.className = "prediction-descriptions";

            const descriptionName = document.createElement("div");
            descriptionName.className = "decription-name";
            descriptionName.textContent = data.imageName;

            const fileSize = document.createElement("div");
            fileSize.className = "filesize";
            fileSize.textContent = data.filesize;

            const predictedClass = document.createElement("div");
            predictedClass.className = "predicted";
            predictedClass.textContent = data.result;

            predictionsDescriptions.append(descriptionName)
            predictionsDescriptions.append(fileSize)
            predictionsDescriptions.append(predictedClass)

            predictionElementContainer.append(innerImage);
            predictionElementContainer.append(predictionsDescriptions);

            predictionElementContainer.addEventListener("click", () => handlePredictionReview(data))

            return predictionElementContainer;

        }

        function renderEmptyLoader(){

            const predictionElementContainer = document.createElement("div");
            predictionElementContainer.className = "prediction-element-container";

            const loader = `
                <div class="loader-view predict-loader">
                    <div>
                        <div class="sk-grid">
                            <div class="sk-grid-cube"></div>
                            <div class="sk-grid-cube"></div>
                            <div class="sk-grid-cube"></div>
                            <div class="sk-grid-cube"></div>
                            <div class="sk-grid-cube"></div>
                            <div class="sk-grid-cube"></div>
                            <div class="sk-grid-cube"></div>
                            <div class="sk-grid-cube"></div>
                            <div class="sk-grid-cube"></div>
                            </div>
                    </div>
                </div>
            `;

            predictionElementContainer.innerHTML = loader;

            return predictionElementContainer;

            }

        function handlePredictionReview(data){

            const overlay = document.querySelector(".prediction-view-overlay");
            const imageReviewView = overlay.querySelector(".image-review-view");
            const predictionReviewLoader = overlay.querySelector(".prediction-review-loader");
            predictionReviewLoader.style.display = "grid";
            imageReviewView.style.display = "none";

            let { date: dateTrained, filename, accuracy, result } = data;

            console.log("preview Pop up data: ", data);

            openPopup(".prediction-view-overlay");

            let predictedClassPlaceholder = overlay.querySelector("#predicted-class-placeholder");
            let predictedDatePlaceholder = overlay.querySelector("#predicted-date-placeholder");
            let predictedModelPlaceholder = overlay.querySelector("#predicted-model-used");
            let predictedModelAccuracy = overlay.querySelector("#predicted-model-accuracy");

            predictedClassPlaceholder.textContent = result;
            predictedDatePlaceholder.textContent = dateTrained.split("T")[0];
            predictedModelPlaceholder.textContent = filename;
            predictedModelAccuracy.textContent = accuracy + "%";

            setTimeout(() => {
                predictionReviewLoader.style.display = "none";
                imageReviewView.src = "uploads/" + data.imageName;
                imageReviewView.style.display = "grid";
            }, 2000)
        }

    </script>

  
    <?php include "components/predictionOverlay.php" ?>
    <?php include "components/predictionViewOverlay.php" ?>
</body>
</html>