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

function renderModelAccuracyRow(data){

    const modelAccuracyRow =document.createElement("div");
    modelAccuracyRow.className = 'model-accuracy-wrapper';

    const modelTypeElement =document.createElement("div");
    modelTypeElement.className = 'model-type';
    modelTypeElement.textContent = data.type;

    const modelNameElement =document.createElement("div");
    modelNameElement.className = 'model-name';
    modelNameElement.textContent = data.filename;

    const accuracyElement =document.createElement("div");
    accuracyElement.className = 'model-accuracy';
    accuracyElement.textContent = data.accuracy + "%";

    modelAccuracyRow.addEventListener("click", () => {
        // callback a new popup
    });

    modelAccuracyRow.appendChild(modelTypeElement)
    modelAccuracyRow.appendChild(modelNameElement)
    modelAccuracyRow.appendChild(accuracyElement)
    return modelAccuracyRow;
}
