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
                <div class="tag">VGG16-A005-ACCU86-23-06-2-24.keras</div>
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