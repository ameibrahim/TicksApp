function handlePredictingImageChange(event){
    
    let file = event.target.files[0];

    let previewIMG = document.querySelector(".image-predict-chosen-preview");

    previewIMG.zIndex = 2;

    loadImage(file, ".image-predict-chosen-preview")
    globalCache.put("hasImageBeenSelected", true);
    globalCache.put("selectedImageForPrediction", file);

}

function resetPredictionOverlay(){

    document.querySelector('.image-predict-chosen-preview').src = '';
    globalCache.put("hasImageBeenSelected", false);
    globalCache.put("selectedImageForPrediction", null);

}

async function startPrediction(){

    openPopup(".loader-view.predict-loader");

    const selectedImage = globalCache.get("selectedImageForPrediction");
    const hasImageBeenSelected = globalCache.get("hasImageBeenSelected");
    // const { modelID, modelFilename, modelInputFeatureSize } = globalCache.get("chosenModelDetails");
    
    const { modelID, modelFilename, modelInputFeatureSize } = {
        modelID: "fd9f935nd",
        modelFilename: "VGG16-VARA01b-32x32-EP15-ACCU99-02-06-2024.keras",
        modelInputFeatureSize: "32"
    };

    if (!hasImageBeenSelected) {
        //TODO:  showSelectImageToast();
        console.log("Image has not been selected");
        return
    }

    try {

        //TODO: Uploading Images Doesn't Work ??? On Chrome Dev
        let fileUploadResult = await uploadFile(selectedImage);
        let imageName = fileUploadResult.newFileName
        
        let data = {
            imageName,
            modelFilename,
            modelInputFeatureSize,
        }
        
        //TODO: detectPredictImage

        // var jsonString = JSON.stringify(data);
        let tickPredictionResult = await getResultsForTick(createParamatersFrom(data));
        console.log(tickPredictionResult);

        let parameters = {
            id: uniqueID(1),
            userID: "3333434",
            date: getCurrentTimeInJSONFormat(),
            modelID,
            result: tickPredictionResult,
            imageName
        }

        let params = createParamatersFrom(parameters);

        console.log("params: ", params);

        await uploadPredictionToDatabase(params);
        closePopup(".loader-view.predict-loader");
        closePopup(".overlay.prediction-overlay");

        await renderPastPredictions();
        await handlePredictionReview(parameters);

    }catch(error){
        console.log(error);
    }
}

function getResultsForTick(params) {

    return new Promise( async (resolve, reject) => {
        let url = `http://165.22.182.47:5000/predict/?${params}`

        // http://165.22.182.47:8033/predict/?imageName=1717389419.jpg&&modelFilename=VGG16-VARA01b-32x32-EP15-ACCU99-02-06-2024.keras&&modelInputFeatureSize=32

        let result = await fetch(url, { 
            method: 'GET'
        });

        let JSONResult = await result.json();

        let classification = JSONResult.classification;
        resolve(classification)
    })
}

async function uploadPredictionToDatabase(params){

    try {
        let result = await AJAXCall({
            phpFilePath: "../include/savePrediction.php",
            rejectMessage: "Saving Prediction Failed",
            params,
            type: "post",
        })

        console.log(result);

    }catch(error){
        console.log(error)
    }
}