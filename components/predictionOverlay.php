<script src="js/modelChoice.js" defer></script>

<div class="overlay prediction-overlay">
    <div class="popup prediction-popup">
        <div class="popup-header">
            <div class="close-button" onclick="
            closePopup('.prediction-overlay');
            resetPredictionOverlay();
            ">
                <img src="../assets/icons/close.png" alt="">
            </div>
            <h1 class="pop-up-title">
                <div class="prediction-title">Predict Tick</div>
            </h1> 
        </div>

        <div class="popup-body predict-body">

            <div class="chosen-model-wrapper">
                <p>Predicting with:</p>
                <div class="tag" onclick="openPopup('.model-choice-overlay')">VGG16_VARA00z_128x128_EP30_ACCU99.56_24-06-2024.keras</div>
            </div>

            <label for="image-predict" class="image-upload-wrapper">
                <div class="select-image">
                    select an image to predict
                </div>
                <img src class="image-predict-chosen-preview" alt="">
                <input style="display:none;" type="file" id="image-predict" accept="image/*" onchange="handlePredictingImageChange(event)">
            </label>
            
        </div>

        <div class="loader-view predict-loader" style="display:none;">
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

        <div class="popup-footer">
            <div class="button" onclick="startPrediction()">start prediction</div>
        </div>
    </div>
</div>

<div class="overlay model-choice-overlay">
    <div class="popup model-type-container">
        <div class="popup-header">
            <div class="close-button" onclick="
            closePopup('.model-choice-overlay');
            ">
                <img src="../assets/icons/close.png" alt="">
            </div>
            <h1 class="pop-up-title">
                <div class="prediction-title">Predictions Models</div>
            </h1> 
        </div>

        <div class="popup-body prediction-models-body">
        </div>

        <div class="loader-view predict-loader" style="display:none;">
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

        <div class="popup-footer">
            <button disabled class="button confirm-model-changes-button" onclick="confirmModelChanges()">No Changes Made</button>
        </div>
    </div>
</div>